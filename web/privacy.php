<?php include 'includes/head.php';?>
<header class="text-white smallheader">
  <div class="container text-center">
    <h2>Privacy</h2>
  </div>
</header>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h3 class="pt-3">What we store</h3>
      <p>Information reported by the NemosMiner software is stored on this server so you can view the status of your mining machines. This information includes:</p>
      <ul>
        <li>A randomly generated user id that was assigned to you</li>
        <li>The worker name you gave each machine</li>
        <li>Current version of the software you are running</li>
        <li>Estimated profit of the machine</li>
        <li>The path and filename (relative to the installation directory) of each running miner</li>
        <li>The pools you are mining to, algorithms they are mining, current and benchmarked speeds for each miner</li>
        <li>Estimated profit for each running miner</li>
      </ul>
      <p>We specifically <b>do not</b> receive or store:</p>
      <ul>
        <li>Your name, email address, or any other personally identifying information</li>
        <li>Your bitcoin addresses or pool balances</li>
      </ul>
      <p>Though we do not intentionally capture it, server logs may include your IP address and browser information.</p>
    </div>
    <div class="col-md-12">
      <h3 class="pt-3">Who can access it?</h3>
      <p>We don't use any sort of accounts or authentication - anyone who knows or guesses your user id can view the status of your workers. User ids are randomly generated <a href="https://en.wikipedia.org/wiki/Universally_unique_identifier">UUIDs</a>.
    </div>
    <div class="col-md-12">
      <h3 class="pt-3">How we use your data</h3>
      <ul>
        <li>To display your worker status to you on this website</li>
        <li>To display your worker statusin the NemosMiner software</li>
        <li>To generate aggregate statistics, for example the total number of workers being monitored and the overall number of users</li>
      </ul>
    </div>
    <div class="col-md-12">
      <h3 class="pt-3">How to remove your data</h3>
      <p>Data for each miner is removed automatically 3 days after the last time it reported to the server</p>
    </div> 
  </div>
</div>
<?php include 'includes/foot.php';?>
