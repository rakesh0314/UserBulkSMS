<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>

         <?php if($user_permission): ?>
          <li class="treeview" id="mainUserNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Client</span>
              <span class="pull-right-container"><?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
              <li id="manageUserNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> Manage Client</a></li>
            <?php endif; ?>

            <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
              <li id="manageUserNav"><a href="<?php echo base_url('users/userwallet') ?>"><i class="fa fa-circle-o"></i>Client Wallet</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(in_array('viewGroup', $user_permission)): ?>
          <li><a href="<?php echo base_url('users/smsreport/') ?>"><i class="fas fa-envelope" aria-hidden="true"></i><span>Bulksms</span></a></li>
          <?php endif; ?>

          

         <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview" id="mainUserNav">
            <a href="#"><i class="fas fa-sms" aria-hidden="true"></i>
            <span>Whatsapp</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createUser', $user_permission)): ?>
              <li id="createUserNav"><a href="<?php echo base_url('users/whatsappview')?>"><i class="fa fa-circle-o"></i>Whatsapp sms view</a></li>
              <?php endif; ?>

              <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
              <li id="manageUserNav"><a href="<?php echo base_url('users/smsfilter') ?>"><i class="fa fa-circle-o"></i>Number filter view</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

        <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview" id="mainUserNav">
            <a href="#">
              <i class="fa fa-id-card" aria-hidden="true"></i>
              <span>Sender ID</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createUser', $user_permission)): ?>
              <li id="createUserNav"><a href="<?php echo base_url('users/sender') ?>"><i class="fa fa-circle-o"></i>Sms senderId</a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
          
          <?php if(in_array('viewGroup', $user_permission)): ?>
          <li><a href="<?php echo base_url('users/group/') ?>"><i class="fas fa-users"></i> <span>Group</span></a></li>
        <?php endif; ?>
       

         <?php if(in_array('viewProfile', $user_permission)): ?>
          <li><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-o"></i> <span>Profile</span></a></li>
        <?php endif; ?>

        <?php endif; ?>
        <!-- user permission info -->
        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>