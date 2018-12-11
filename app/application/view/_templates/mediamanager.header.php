<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Help each other by sharing your reviews"/>
        <meta name="keywords" content="review, hoaxed.me, help each other" />
        <meta name="robots" content="index, follow" />
        <title>Hoaxed.me | Help each other by sharing your reviews</title>

        <!-- Stylesheets
    ================================================= -->
        <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>css/style.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>css/ionicons.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>css/sweet-alert.css" />
        <script src="<?php echo URL; ?>js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo URL; ?>js/sweet-alert.min.js"></script>
         <script type="text/javascript">
             var url = "<?php echo URL; ?>";
        </script>
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="<?php echo URL; ?>images/fav.png"/>
    </head>
  <body>

    <!-- Header
    ================================================= -->
        <header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>images/logo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li><a href="<?php echo URL; ?>customer/feed" role="button">Home</a></li>
              <li><a href="<?php echo URL; ?>customer/feed" role="button" >Newsfeed</a></li>
              <li><a href="<?php echo URL; ?>customer/help" role="button">Timeline</a></li>
              <li><a href="<?php echo URL; ?>customer/help">Contact</a></li>
              <li><a href="<?php echo URL; ?>customer/logout">Logout</a></li>
            </ul>
            
            <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Search friends, photos, videos">
              </div>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->
