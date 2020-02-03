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
                        <h2 class="card-title">Group View</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <a href="<?= base_url()?>"><span class="glyphicon glyphicon-home"></span></a>
                    </div>
                    </div>
              <div class="card-body"> 
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="static" data-keyboard="false">
               Add New Group</button>             
              <div class="table-responsive">
              <table class="table table-striped" id="grouplisting">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Group Name</th>
                    <th>Username</th>
                    <th>Group Creation Date</th>
                    <th>Add Numbers</th>
                    <th>View Numbers</th>
                  </tr>
                </thead>
                <tbody id="listRecords">                    
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <!-- //id="groupForm"  -->
    <div class="modal-content">
      <form method="POST" id="groupsave">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      
      <div class="modal-body">
       <div class="body">
        <label for="text">Add New Group</label>
          <input type="text" class="form-control" id="groupname" name="groupname">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>
</body>


<script type="text/javascript">
  $(document).ready(function()
  {
    grouplist();
  })
  function grouplist(){
    $.ajax({
    type  : 'get',
    url   : 'Enduser/show',
    async : false,
    dataType : 'json',
    success : function(data){
      var html = '';
      var i;
      for(i=0; i<data.length; i++){
         html += '<tr>'+
             '<td>'+data[i].gid+'</td>'+
             '<td>'+data[i].groupname+'</td>'+
             '<td>'+data[i].username+'</td>'+
              '<td>'+data[i].date+'</td>'+
              '<td>'+
               '<a href="<?= base_url()?>Add_number/'+data[i].gid+'">Add Number</a>'+'</td>'+
                 '<td>'+
                 '<a href="<?= base_url()?>View_number">View_Number</a>'+'</td>'+
                   '</tr>';
      }
      $('#listRecords').html(html);         
    }
  });
  }

  $('#groupsave').submit('click',function(){
    var groupname = $('#groupname').val();
      $.ajax({
      type : "POST",
      url  : "Enduser/save",
      dataType : "JSON",
      data : {groupname:groupname},
      success: function(data){
        $('#gid').val("");
        $('#groupname').val("");
        grouplist();
      }
    });
  });
</script>
