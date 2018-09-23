<?php
require_once('private/functions.php');
cleanup();
$stats = get_user_count();
include 'includes/head.php';
?>

<header class="text-white smallheader">
  <div class="container text-center">
    <h2>Your workers:</h2>
  </div>
</header>
<div class="container-fluid pt-5 pb-5">
  <div class="row">
    <div class="col-md-12">
      <table id="workers" class="table mb-4"
        data-toggle="table"
        data-url="/api/workers.php?user=<?=$_GET['user']?>"
        data-response-handler="formatWorkers"
        data-sort-name="workername"
        data-cache="false"
        data-show-columns="true"
        data-show-toggle="true"
        data-show-refresh="true"
        data-detail-view="true"
        data-detail-formatter="detailFormatter"
        data-icons="icons"
        data-icons-prefix="fa"
        data-row-style="colorStatus"
      >
        <thead>
          <tr>
            <th data-field="worker" data-sortable="true">Worker Name</th>
            <th data-field="status" data-sortable="true">Status</th>
            <th data-field="flastseen" data-sortable="true">Last Seen</th>
            <th data-field="version" data-sortable="true">Version</th>
            <th data-field="fprofit" data-sortable="true">Estimated Profit</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
function formatWorkers(data) {
  // This function can alter the returned data before building the table to formatting it better
  $.each(data, function(index, item) {
    item.flastseen = timeSince(item.lastseen);
    item.fprofit = formatBTC(item.profit);

    // If worker hasn't reported in 10 minutes, mark as offline
    if( ((new Date() - new Date(item.lastseen*1000)) / 1000) > 10*60) {
      item.status = "Offline";
    }

    item.a = "a"
  });
  return data;
}

function colorStatus(row,index) {
  console.log(row);
  return {classes: row.status};
}

function detailFormatter(index, row) {
  var html = [];
  html.push("<div class='pl-5 pr-5'>");
  html.push("<h5>Running Miners</h5>");
  html.push("<table class='table'>");
  html.push("<thead><tr><th>Name</th><th>Algorithm</th><th>Pool</th><th>Type</th><th>Profit</th><th>Current Speed</th><th>Benchmarked Speed</th><th>Path</th></tr></thead>");
  $.each(row.data, function (key, value) {
    console.log(value);
    html.push('<tr>');
    html.push('<td>'+value.Name+'</td>');
    html.push('<td>'+value.Algorithm+'</td>');
    html.push('<td>'+value.Pool+'</td>');
    html.push('<td>'+value.Type+'</td>');
    html.push('<td>'+value.Profit+'</td>');
    html.push('<td>'+value.CurrentSpeed+'</td>');
    html.push('<td>'+value.EstimatedSpeed+'</td>');
    html.push('<td>'+value.Path+'</td>');
    html.push('</tr>');
  });
  html.push("</table>");
  return html.join('');
}
</script>


<?php include 'includes/foot.php';?>
