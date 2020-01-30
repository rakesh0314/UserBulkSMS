  <div class="content-wrapper">
   <section class="content-header">
      <h3>Group View</h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Users</h3>
            </div>
            <div class="box-body">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
               Add New Group</button> 
              <table id="userTable" class="table table-bordered table-striped">
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
  </section>
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
