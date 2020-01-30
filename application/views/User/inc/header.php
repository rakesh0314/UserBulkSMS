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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Homepage</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?= base_url().'assets/user/' ?>js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
     <script type="text/javascript">
      // Load the Google Transliterate API
      google.load("elements", "1", {
            packages: "transliteration"
          });
      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };
        var control = new google.elements.transliteration.TransliterationControl(options);
        control.makeTransliteratable(['mesHin']);
      }
      google.setOnLoadCallback(onLoad);
      //The Google Transliterate API
    </script>
    <!-- Dashboard Core -->
    <link href="<?= base_url().'assets/user/' ?>css/dashboard.css" rel="stylesheet"/>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="<?= base_url().'assets/user/' ?>js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?= base_url().'assets/user/' ?>plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?= base_url().'assets/user/' ?>plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="<?= base_url().'assets/user/' ?>plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?= base_url().'assets/user/' ?>plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?= base_url().'assets/user/' ?>plugins/input-mask/plugin.js"></script>
    <!-- Datatables Plugin -->
    <script src="<?= base_url().'assets/user/' ?>plugins/datatables/plugin.js"></script>
  </head>
    <body class="wback">
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="#">
               <img src="<?= base_url().'assets/user/' ?>images/heandshek.png" class="header-brand-img" alt="tabler logo"><b><i>BulkSmS</i></b></a>
              <div class="d-flex order-lg-2 ml-auto">
                  <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(<?= base_url().'assets/user/' ?>demo/faces/female/25.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                     <?php if($this->session->userdata('userlogin')==true){ ?>
                      <span class="text-default"><?php echo $user->loginid; ?></span>
                      <?php };?>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="<?= base_url()?>Profile">
                      <i class="dropdown-icon fe fe-user"></i>Profile</a>
                    <a class="dropdown-item" href="<?= base_url()?>Enduser/logout">
                      <i class="dropdown-icon fe fe-log-out"></i>Sign out
                      <?php ;?>
                    </a>
                  </div>
                </div>
              </div> 
           
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a> 
            </div>
          </div>
        </div>
         <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="<?= base_url()?>Home" class="nav-link active"><i class="fe fe-home"></i>Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-check-square"></i>SmS Service</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="<?= base_url()?>Form" class="dropdown-item ">Send SMS</a>
                      <a href="<?= base_url()?>Report" class="dropdown-item ">Report</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-check-square"></i>Whatsapp</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="<?= base_url()?>Filter" class="dropdown-item ">WhatsApp Number Filter</a>
                      <a href="<?= base_url()?>Whatsapp" class="dropdown-item ">Send Whatsapp Sms</a>
                      <a href="<?= base_url()?>Galary" class="dropdown-item">Galary</a>
                    </div>
                  </li>
                <li class="nav-item dropdown">
            <a href="<?= base_url()?>Group" class="nav-link"><i class="fe fe-check-square"></i>Group</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url()?>Sender" class="nav-link"><i class="fe fe-check-square"></i>SenderID</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url()?>Wallet" class="nav-link"><i class="fe fe-check-square"></i>Wallet</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
