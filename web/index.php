<?php
require_once('private/functions.php');
cleanup();
$stats = get_user_count();
?>

<?php include 'includes/head.php';?>
<header class="text-light largeheader">
  <div class="container text-center">
    <h1>Welcome to the NemosMiner Monitoring Server</h1>
    <p class="lead">Keep tabs on all your mining rigs from one place!</p>
    <p>Currently monitoring <?=$stats['workers']?> workers for <?=$stats['users']?> users</p>
  </div>
</header>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 bg-light text-center p-4">
      <h2 class="pt-4">Need to get started?</h2>
      <p class="lead">Follow <a href="setup.php">this guide</a> to get started.</p>
    </div>
    <div class="col-md-6 text-center p-4">
      <h2 class="pt-4">Already setup?</h2>
      <p class="lead">Enter your user id to view your workers</p>
      <form action="workers.php" method="get">
        <div class="form-group">
          <label for="user">User ID</label>
          <input type="text" class="form-control" id="user" name="user">
        </div>
        <button type="submit" class="btn btn-primary">View workers</button>
      </form>  
            
    </div>
  
  </div>
</div>
<?php include 'includes/foot.php';?>
