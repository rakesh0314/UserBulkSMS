<!doctype html>
<html lang="en" dir="ltr">  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <!-- Generated: 2019-04-04 16:55:45 +0200 -->
    <title>Login</title>
    <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="<?= base_url().'assets/user/' ?>css/dashboard.css" rel="stylesheet" />
    <script src="<?= base_url().'assets/user/' ?>js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?= base_url().'assets/user/' ?>plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?= base_url().'assets/user/' ?>plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="<?= base_url().'assets/user/' ?>plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?= base_url().'assets/user/' ?>/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?= base_url().'assets/user/' ?>/plugins/input-mask/plugin.js"></script>
    <!-- Datatables Plugin -->
    <script src="<?= base_url().'assets/user/' ?>/plugins/datatables/plugin.js"></script>
    <style type="text/css">
  body{
    background-image: url("<?= base_url().'assets/user/' ?>images/sms.jpg");
     background-repeat: no-repeat;
     background-size: cover;
  }
</style>
  </head>
  <body>
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
               <!--  <img src="<?= base_url().'assets/user/' ?>images/bitmap-2.png" class="img-responsive" alt=""> -->
              </div>
              <form class="card" autocomplete="off" action="<?php echo base_url(); ?>enduser/check_login" method="post" id="userlogform">
                <div class="card-body p-6">
                  <div class="card-title" style="font-style: italic;"><b>Login to your account</b></div>
                  <div class="form-group">
                    <label class="form-label">LoginId</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter LoginId">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                      <a href="#" class="float-right small">I forgot password</a>
                    </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                </div>
              </form>
              <!-- <div class="text-center text-muted">
                Don't have account yet? <a href="<?php echo base_url();?>enduser/register">Sign up</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

<!-- Mirrored from preview.tabler.io/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2019 12:15:50 GMT -->
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  
        <script type="text/javascript">  
  
        // Ajax post  
        $(document).ready(function(){  
        $("#submit").click(function(){  
        var loginid = $("#loginid").val();  
        var password = $("#password").val();  
        // Returns error message when submitted without req fields.  
        if(loginid==''||password=='')  
        {  
        jQuery("div#err_msg").show();  
        jQuery("div#msg").html("All fields are required");  
        }  
        else  
        {  
        // AJAX Code To Submit Form.  
        $.ajax({  
        type: "POST",  
        url:  "<?php echo base_url(); ?>" + "login/check_login",  
        data: {loginid: loginid, password: password},  
        cache: false,  
        success: function(result){  
            if(result!=0){  
                // On success redirect.  
            window.location.replace(result);  
            }  
            else  
                jQuery("div#err_msg").show();  
                jQuery("div#msg").html("Login Failed");  
        }  
        });  
        }  
        return false;  
        });  
        });  
        </script>   