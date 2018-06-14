<form method="post" id="comment_form">
    <div class="form-group">
      <br />
     <label>Dosen</label>
     <input type="text" name="nama_dosen" id="subject" class="form-control">
    </div>
    <div class="form-group">
     <label>komentar</label>
     <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
    </div>
    <input type="checkbox" name="cek" value="hadir">hadir
    <input type="checkbox" name="cek" value="tidak hadir">Tidak Hadir
    <div class="form-group">
     <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
    </div>
   </form>

   <script>
$(document).ready(function(){

  function load_unseen_notification(view = '')
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
     $('.dropdown-menu').html(data.notification);
     if(data.unseen_notification > 0)
     {
      $('.count').html(data.unseen_notification);
     }
    }
   });
  }

 load_unseen_notification();

 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });

 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 setInterval(function(){
  load_unseen_notification();;
 }, 5000);

});
</script>
