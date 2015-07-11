<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
.progress-bar.animate 
{
   width: 100%;
}
</style>
<script>
// Setup
this.$('.js-loading-bar').modal(
{
  backdrop: 'static',
  show: false
}
);

$(document).ready(function() 
{
  var $modal = $('.js-loading-bar'),
      $bar = $modal.find('.progress-bar');
  
  $modal.modal('show');
  $bar.addClass('animate');

  setTimeout(function() 
  {
    $bar.removeClass('animate');
    $modal.modal('hide');
  }, 3000);
}
);
</script>
</head>
<body>

<div class="modal js-loading-bar">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-body">
       <div class="progress progress-popup">
        <div class="progress-bar"></div>
       </div>
     </div>
   </div>
 </div>
</div>
</body>
</html>