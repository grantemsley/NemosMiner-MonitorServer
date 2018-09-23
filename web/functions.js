// fix bootstrap-table icons
window.icons = {
  refresh: 'fa-sync',
  toggle: 'fa-id-card',
  columns: 'fa-columns',
  clear: 'fa-trash'
};

function timeSince(unixtimestamp) {
  var seconds = Math.floor((new Date() - new Date(unixtimestamp*1000)) / 1000);
  var interval = Math.floor(seconds / 31536000);
  if (interval >= 1) {
    return interval + " years ago";
  }
  interval = Math.floor(seconds / 2592000);
  if (interval >= 1) {
    return interval + " months ago";
  }
  interval = Math.floor(seconds / 86400);
  if (interval >= 1) {
    return interval + " days ago";
  }
  interval = Math.floor(seconds / 3600);
  if (interval >= 1) {
     return interval + " hours ago";
  }
  interval = Math.floor(seconds / 60);
  if (interval >= 1) {
    return interval + " minutes ago";
  }
  return Math.floor(seconds) + " seconds ago";
}

function formatBTC(value) {
  return parseFloat(value).toFixed(8);
};


