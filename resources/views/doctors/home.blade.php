<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<head>
<script>
$(function(){
  $(".open-AddBookDialog").click(function(){
     var message = $(this).data('id');
     $("p").html(message);    
    $("#addBookDialog").modal("show");
  });
});
</script>
</head>
<a data-id="mew" title="Add this item" class="open-AddBookDialog">Open Modal</a>

<div id="addBookDialog" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <p></p>
       {{-- <input type="hidden" name="bookId" id="bookId" value=""/> --}}
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</html>