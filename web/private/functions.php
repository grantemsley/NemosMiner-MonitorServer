<?php

// Connect to the database
function connect_database() {
  require dirname(__FILE__).'/config.php';

  try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch(PDOException $e) {
    die("Datbase connection failed. Please try again later.");
  }
  
  # Create the tables if they don't exist
  $db->exec("CREATE TABLE IF NOT EXISTS stats (
      user VARCHAR(100),
      worker VARCHAR(100),
      version VARCHAR(50),
      status VARCHAR(50),
      profit DOUBLE,
      lastseen INTEGER,
      data TEXT,
      PRIMARY KEY(user,worker)
    );");
  return $db;
}

// Get all the workers matching user.
function get_workers($user) {
  $db = connect_database();
  $query = "SELECT * FROM stats WHERE user = :user ORDER BY worker";

  $stmt = $db->prepare($query);
  $stmt->bindParam(':user', $user);
  $result = $stmt->execute();

  $workers = [];
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $workers[] = $row;
  }
  return($workers);
}

function get_workers_json($user) {
  $db = connect_database();
  $query = "SELECT * FROM stats WHERE user = :user ORDER BY worker";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':user', $user);
  $result = $stmt->execute();

  $workers = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Decode the data field so it can be json encoded properly
  foreach($workers as $key => $worker) {
    $workers[$key]['data'] = json_decode($workers[$key]['data']);
  }

  return json_encode($workers, JSON_PRETTY_PRINT);
}

// Update a worker's last seen timestamp.
function update_worker($user, $worker, $version = "Unknown", $status = "Unknown", $profit = 0, $data = "") {
  $now = time();

  $db = connect_database();
  $query = "REPLACE INTO stats (user, worker, version, status, profit, lastseen, data)
    VALUES (:user, :worker, :version, :status, :profit, :lastseen, :data);";

  try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':worker', $worker);
    $stmt->bindParam(':version', $version);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':profit', $profit);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':lastseen', $now);
    if($stmt->execute()) {
      return "Success";
    } else {
      return "Failure";
    }
  } catch(Exception $e) {
    return "Database failure.";
  }
}

// Remove any miners across all accounts that haven't been seen for x days
function cleanup($days = 3) {
  $now = time();
  $olderthan = $now - ($days * 24 * 60 * 60);

  $db = connect_database();
  $query = "DELETE FROM stats WHERE lastseen < :olderthan;";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':olderthan', $olderthan);
  $stmt->execute();
}

function convert_to_hashrate($value) {
  # If value is not just a number, return it as is
  if(!is_numeric($value)) { return $value; }

  $units = array('H/s','KH/s','MH/s','GH/s','TH/s','PH/s');

  $pow = floor(($value ? log($value) : 0) / log(1000));
  $pow = min($pow, count($units) -1);

  $value /= pow(1000, $pow);
  return round($value, 2) . ' ' . $units[$pow];
}

// Generate v4 UUID for unique user key
function generate_uuid() {
  return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

// Get the total users reporting to this system
function get_user_count() {
  $db = connect_database();
  $query = "SELECT COUNT(DISTINCT user) as users, COUNT(DISTINCT worker) as workers FROM stats";
  $stmt = $db->prepare($query);
  $result = $stmt->execute();
  return json_encode($stmt->fetch(PDO::FETCH_ASSOC));
}
  
