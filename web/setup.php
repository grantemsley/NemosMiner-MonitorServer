<?php include 'includes/head.php';?>
<header class="text-white smallheader">
  <div class="container text-center">
    <h2>Setup Guide</h2>
  </div>
</header>
<section class="">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="pt-3">Step 1: Install NemosMiner</h3>
        <ul>
          <li>Download the latest version from <a href="https://github.com/nemosminer/NemosMiner/releases">https://github.com/nemosminer/NemosMiner/releases</a></li>
          <li>Extract the zip file</li>
          <li>Run NemosMiner.bat</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="pt-3">Step 2: Setup NemosMiner</h3>
        <img src="images/configpage.png"/>
        <ul>
          <li>Set Wallet Address to your bitcoin address</li>
          <li>Set Worker Name to a name for this machine - all your workers must have unique names</li>
          <li>Set MPH UserName to your username on MiningPoolHub</li>
          <li>Set MPH API Key to your <a href="https://miningpoolhub.com/?page=account&action=edit">MiningPoolHub API Key</a></li>
        </ul>
        <p>You can change the other settings as desired.  See the <a href="https://github.com/nemosminer/NemosMiner">github page</a> for full details.</p>
      </div>
    </div>
  </div>
</section>
<section class="">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="pt-3">Step 3: Setup Monitoring</h3>
        <img src="images/monitoringpage.png"/>
        <ul>
          <li>Switch to the monitoring tab</li>
          <li>Set server to <code><?=((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF'])?></code></li>
          <li><b>If this is your first worker:</b> Click Generate New User ID</li>
          <li><b>Otherwise:</b> Copy and paste your exiting user ID into the box.</li>
          <li>Check Report to server if you want to send status reports for this worker. You might leave this unchecked if you run the software on a machine you don't normally mine on.</li>
          <li>Check Show other workers to retrieve the status of all your workers and show in the GUI. You might leave this unchecked on machines that run headless and don't need to show anything.</li>
          <li>Click Save Config</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/foot.php';?>
