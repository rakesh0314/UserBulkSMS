<style type="text/css">
  body{
    background-image: url("<?= base_url().'assets/user/' ?>images/bulk.jpg");
     background-repeat: no-repeat;
     background-size: cover;
  }
</style>
<body>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2 class="card-title">Sender ID</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <a href="<?= base_url()?>"><span class="glyphicon glyphicon-home"></span></a>
                    </div>
                    </div>
                    
                    <div class="card-body">
                      <button type="button" class="btn btn-success" data-toggle="modal" oninput="this.value = this.value.toUpperCase()" data-target="#myModal">Add New Sender ID</button>
              </div> 
              <div class="table-responsive">    
              <table class="table table-striped" id="senderlisting" >
                <thead>
                  <tr>
                    <th><b>Sr.No</b></th>
                    <th><b>Sender Name</b></th>
                    <th><b>Date &nbsp; Time</b></th>
                    <th><b>Status</b></th>
                  </tr>
                </thead>
                <tbody id="Records">
                <td>    
                <form name="actionAp" id="actionAp">                                         
                <select name="actionS" id="actionS" class="form-control" onchange="trideep(this.value,'<?php echo $row['senderIdNum']; ?>');">
                 <option value="-1">Select Status</option>
                <option value="1">Approve</option>
                <option value="2">Reject</option>
                </select>                                        
                </form>   
                </td>                    
                </tbody>
              </table>
              </div>
            </div>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </div>
</div>
</body>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
      <form method="POST" id="sendersave">
      <div class="modal-header">
      <h4 class="modal-title">Add New SenderID</h4>
      <button type="button" class="close" data-dismiss="modal"></button>
      </div>
      <div class="modal-body">
       <div class="body">
          <label for="text">Add New SenderID</label>
            <input type="text" required=""  class="form-control" id="sendername" name="sendername" oninput="this.value = this.value.toUpperCase()">
      </div>                         
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create</button>
      </div>
      </form>
      </div>
      </div>
      </div>


<script type="text/javascript">
  $(document).ready(function()
  {
    senderlist();
  })
  function senderlist(){
    $.ajax({
    type  : 'get',
    url   : 'Enduser/sendershow',
    async : false,
    dataType : 'json',
    success : function(data){
      var html = '';
      var i;
      for(i=0; i<data.length; i++){
         html += '<tr>'+
             '<td>'+data[i].senderid+'</td>'+
             '<td>'+data[i].sendername+'</td>'+
             '<td>'+data[i].date+'</td>'+
             '<td>'+
               ''+'</td>'+
             '</tr>';
      }
      $('#Records').html(html);         
    }
  });
  }

  $('#sendersave').on('submit',function(){
    var sendername = $('#sendername').val();
      $.ajax({
      type : "POST",
      url  : "Enduser/sendersave",
      contentType:false,
      processData:false,
      data : new FormData(this),
      success: function(data){
        senderlist();
      }
    });
  });
</script>
<script type="text/javascript">
   $(document).ready(function(){
         jQuery('#sendername').keyup(function() {
    $(this).val($(this).val().toUpperCase());     
  });
</script>