 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
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
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Name</th>
                  <th>Email</th>                  
                  <th>Phone</th>
                  <th>SMS Bal.</th>
                  <th>Whatapp Bal.</th>
                  

                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($user_data): 
                    $i=1;
                    ?>                  
                    <?php foreach ($user_data as $k => $v): ?>
                      <tr>
                        <td><?= $i;?></td>
                        <td><?=  $v['name'];?></td>
                        <td><?= $v['email']; ?></td>                        
                        <td><?= $v['phone'];?></td>
                        <td><?= $v['smsble'];?></td>
                        <td><?= $v['whatsaapble'];?></td>
                        

                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                        <td>
                         <a href="" onclick="adduser(<?= $v['id']?>)" class="btn btn-default" data-toggle="modal" data-target=".bannerformmodal"><i class="fa fa-plus"></i></a>
                          <?php if(in_array('updateUser', $user_permission)): ?>
                            <a href="<?php echo base_url('users/edit/'.$v['id'])?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                          <?php endif; ?>
                          <?php if(in_array('deleteUser', $user_permission)): ?>
                            <a href="<?php echo base_url('users/delete/'.$v['id'])?>" class="btn btn-default"><i class="fa fa-minus"></i></a>
                          <?php endif; ?>
                          
                        </td>
                      <?php  endif; ?>
                      </tr>
                    <?php $i++; endforeach ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!--modal-->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add Points</h4>
        </div>
        <form roll="form" method="POST" id="addpoints">
        <div class="modal-body">
          <input type="hidden" name="userId" id="userId">
            <div class="form-group">
              <div class="input-group">                               
                <span class="input-group-addon"><i class="fas fa-user"></i>User</span>
                <input id="username" type="text" class="form-control" name="username" id="username">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">                               
                <span class="input-group-addon">Sms:</span>
                <input id="smsble" type="text" class="form-control" name="smsble">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">                               
                <span class="input-group-addon">Whatsapp:</span>
                <input id="whatsaapble" type="text" class="form-control" name="whatsaapble">
              </div>
            </div>
            <!-- <div class="form-group">
            <div class="input-group col-md-6">
              <span class="input-group-addon">sms</span>
              <input type="number" name="smsble" class="form-control" value="<?= $v['smsble'];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-6">
              <span class="input-group-addon">Whatsapp</span>
              <input type="text" name="whatsaapble" class="form-control" value="<?= $v['whatsaapble'];?>">
            </div>
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-blue">Add</button>
          <button type="button" class="btn btn-blue" data-dismiss="modal">Exit</button>
        </div>
        </form>       
      </div>
    </div>
  </div>

  <!--//modal-->

  <script type="text/javascript">
    $(document).ready(function() {
      $('#userTable').DataTable();
      $("#mainUserNav").addClass('active');
      $("#manageUserNav").addClass('active');
    });
  </script>

  <script>
        $("#addpoints").on('submit',function()
        {   

            var smsble = $("#smsble").val();
            var whatsaapble =$("#whatsaapble").val();
                // AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "<?= base_url()?>Users/addPoint",
                    data: {
                      smsble: smsble,
                      whatsaapble: whatsaapble,
                    },
                    cache: false,
                    success: function(result){
                        alert(result);
                    }
                });
            return false;
        });
        function adduser(id) {
          $.ajax({
            url:"<?= base_url()?>Users/userdetails/"+id,
            type:"GET",
            dataType:'json',
            success:function(data)
            {
              $('#userId').val(data.id);
              $('#username').val(data.username);
              console.log(data);
            }
          })
        }
</script>
