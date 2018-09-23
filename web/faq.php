<?php include 'includes/head.php';?>
<header class="text-white smallheader">
  <div class="container text-center">
    <h2>Frequently Asked Questions</h2>
  </div>
</header>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h3 class="pt-3">The estimated profit looks wrong</h3>
      <p>The estimated profit, for both the worker and the individual miners, is just an estimate - based on the benchmarked speed of the miners and the pool's profitability estmates. It's the value used to determine which miner to run to maximize profit, but it will rarely match your actual earnings. It doesn't take into account all of the fees, and the pool estimates are based on their past performance - there's no way to accurately predict how profitable each pool will be in the future. The estimates are still useful in comparing workers to see which is making more, and spotting ones with abnormally high or low values that might indicate benchmarking or pool data issues.</p> 
      <p>For accurate profit information, use the earnings tracking built into the NemosMiner software - that tracks your actual pool balances to show how much you have actually earned.</p>
      <h3 class="pt-3">Why is my user id random? Can't I just pick a username?</h3>
      <p>The user ids are random to make it harder for other people to find your user id. There is no authentication, so anyone with the user id can see your status.<p>
      <p>To make life easier, we recommend bookmarking the status page - the bookmark will remember your user id for you.
      <h3 class="pt-3">How do I remove a worker?</h3>
      <p>Workers automatically get removed when they haven't reported in for 3 days.</p>
    </div> 
  </div>
</div>
<?php include 'includes/foot.php';?>
