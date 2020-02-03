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
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add users</h3>
            </div>
            
            <form role="form" action="<?php base_url('') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group col-sm-6 col-md-6 col-xs-12 col-lg-6">
                  <label for="username">username:</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter UserName." autocomplete="off">
                </div>

                <div class="form-group col-sm-6 col-md-6 col-xs-12 col-lg-6">
                  <label for="name">Full Name:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name." autocomplete="off">
                </div>

                <div class="form-group col-sm-6 col-md-6 col-xs-12 col-lg-6">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email." autocomplete="off">
                </div>
                <div class="form-group col-sm-6 col-md-6 col-xs-12 col-lg-6">
                  <label for="phone">Contect no.:</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Contect Number."  autocomplete="off" maxlength="10" minlength="10" required oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                </div>
                <div class="form-group col-sm-6 col-md-6 col-xs-12 col-lg-6">
                  <label for="type">User Type:</label>
                  <!-- <input type="number" class="form-control" id="enterpoints" name="enterpoints" placeholder="Enter Points" autocomplete="off"> -->
                  <select class="form-control" name="type">
                    <option selected="true" disabled="true">select</option>
                    <option value="1">Resaler</option>
                    <option value="2">Normal</option>
                  </select>
                </div> 
                <div class="form-group col-sm-6 col-md-6 col-xs-12 col-lg-6">
                  <label for="adderss">Adderss:</label>
                  <textarea class="form-control" id="adderss" name="adderss" placeholder="Enter Adderss"></textarea>
                  
                </div>
                <div class="form-group col-sm-6 col-md-6 col-xs-12 col-lg-6">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password." autocomplete="off">
                </div>
                <div class="form-group col-sm-6 col-md-6 col-xs-12 col-lg-6">
                  <label for="password">ConfirmPassword:</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter ConfirmPassword." autocomplete="off">
                </div>
             </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
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

<!-- <script type="text/javascript">
  $(document).ready(function() {
    $("#groups").select2();
    $("#mainUserNav").addClass('active');
    $("#createUserNav").addClass('active');
  });
</script>
 -->