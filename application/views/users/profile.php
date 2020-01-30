<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-condensed table-hovered">
                <tr>
                  <th>Username</th>
                  <td><?php echo $user_data['username']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $user_data['email']; ?></td>
                </tr>
                <tr>
                  <th>Name</th>
                  <td><?php echo $user_data['name']; ?></td>
                </tr>
                <tr>
                  <th>Contect Number</th>
                  <td><?php echo $user_data['phone']; ?></td>
                </tr>
                <tr>
                  <th>Type</th>
                  <td><?php echo $user_data['type']; ?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Gameplay history</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Time </th>
                  <th>Points earned</th>
                  <th>Points losed</th>
                  <th>Total earnings</th>
                  

                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                      <tr>
                        <td>User</td>
                        <td>DD/MM/YYYY</td>
                        <td>4550 pts</td>
                        <td>550 pts</td>
                        <td>4000 pts</td>
                      </tr>
                      <tr>
                        <td>User 2</td>
                        <td>DD/MM/YYYY</td>
                        <td>7550 pts</td>
                        <td>790 pts</td>
                        <td>6760 pts</td>
                      </tr>
                </tbody>
              </table>
            </div>

            <!-- /.box-body -->
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payment history</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Time</th>
                  <th>Points bought</th>
                  <th>Points withdrawn</th>
                  <th>Pending payments</th>
                  <th>Referral earnings</th>
                  

                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                      <tr>
                        <td>DD/MM/YYYY</td>
                        <td>4550 pts</td>
                        <td>550 pts</td>
                        <td>4000 pts</td>
                        <td>300 pts</td>
                      </tr>
                      <tr>
                        <td>DD/MM/YYYY</td>
                        <td>4550 pts</td>
                        <td>550 pts</td>
                        <td>4000 pts</td>
                        <td>300 pts</td>
                      </tr>
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
   <script type="text/javascript">
    $(document).ready(function() {
      $('#userTable').DataTable();
      $('#userTable1').DataTable();

      $("#mainUserNav").addClass('active');
      $("#manageUserNav").addClass('active');
    });
  </script>
   
