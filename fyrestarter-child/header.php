<!DOCTYPE html>
<html lang="en">
<!--
                 /
        //        /
        //      //
         //     //
         ///    //
          //   ////
          ///  ////
         ////  /////
         //// //////
         //// ///////
        ///// ///////
       ////// ////////
      /////// //////////
/     ////// ////////////
 //   ////// //////////////
  /// ////// ////////////////
   ///////// ///////////////////
    ////////  /////////////////////
     //////// /////////////////////////
     ///////// //////////////////////////
     ////////// ///////////////////////////
     /////////// ///////////////////////////
      /////////// ///////////////////////////
      ///////////// //////////////////////////
      /////////////////                    ////
     //////////////////                    /////
     //////////////////     /////////////////////
     //////////////////     /////////////////////
     //////////////////     /////////////////////
     //////////////////                //////////
      /////////////////                //////////
       ////////////////     ////////////////////
        ///////////////     ////////////////////
         //////////////     ///////////////////
           ////////////     ////////////////
             //////////     ///////////////
               ////////     /////////////
                 //////     /////////
-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  
  <link rel="stylesheet" href="https://use.typekit.net/quq7cmk.css">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/ScrollTrigger.min.js"></script> -->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?php echo get_option('track_code'); ?> 

  <?php wp_head(); ?> 

</head>

<?php if (!empty(get_option('top_banner_txt'))) { ?>
  <body id="fyre" <?php body_class('has-banner'); ?> itemscope itemtype="<?php echo get_option('schema_url'); ?>">
<?php } else { ?>
  <body id="fyre" <?php body_class(); ?> itemscope itemtype="<?php echo get_option('schema_url'); ?>">
<?php } ?>

<div id="loader">
  <div class="load-icon">
    <!-- <img src="/wp-content/uploads/2020/08/icon-green-logo.png"> -->
    <img src="/wp-content/uploads/2020/08/ICON-Logo-Animation-Reversed.gif">
  </div>
</div>

<div id="intro-vid">
  <video id="bgvid" class="thebg video" muted="" playsinline="" autoplay="autoplay">
      <source src="/wp-content/uploads/2020/08/ICON-Background-Color-1.mp4" type="video/mp4"> 
  </video>
  <video id="frontvid" class="thebg video" muted="" playsinline="" autoplay="autoplay">
      <source src="/wp-content/themes/fyrestarter-child/assets/imgs/ICON-Background-Faces.webm" type="video/webm"> 
  </video>
</div>

<div id="nav-header">

<?php if (!empty(get_option('top_banner_txt'))) { ?>
  <div id="nav-banner" class="red-bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-between">
            <div class="middle-content"><h3 class="wht-txt futura-med"><?php echo get_option('top_banner_txt'); ?></h3></div><div class="middle-content"><div class="flex-btn"><a class="btn wht-btn" href="<?php echo get_option('top_banner_btn_link'); ?>"><?php echo get_option('top_banner_btn_txt'); ?></a></div></div>
          </div>
        </div>
      </div>
    </div>  
  </div>
<?php } ?>

<!-- nav -->
  <header id="navigation" class="sticky-grab">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="d-flex justify-content-between"> 
            <div id="logo" class="navbar-brand">
              <a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo( 'name' ); ?>">
                <?php echo '<img class="hidden-md-down" itemprop="logo" src="'.get_option('logo_url').'" />';?>
                <img class="hidden-lg-up" src="/wp-content/uploads/2020/08/icon-mobile.png">
              </a>
            </div>     
            <div class="nav-right middle-content">
              <div class="d-flex">
                <?php
                  //FIND DAY OF WEEK IN TIMEZONE
                  $dateTime = new \DateTime(
                      'now',
                      new \DateTimeZone('America/Los_Angeles')
                  );
                  //VAR
                  $day = $dateTime->format('D');
                  //IF SUNDAY
                  if($day === 'Sun' || 1 == get_option('livestream_display')) { ?>
                    <a class="btn red-btn" href="<?php echo get_option('livestream_url'); ?>" target="_blank">Live Sermon</a>
                <?php } ?>
                <div id="mobile-btn">
                  <span class="top"></span>
                  <span class="middle"></span>
                  <span class="bottom"></span>
                </div>
              </div>
            </div>  
          </nav>
        </div>
      </div>
    </div>
  </header>
<!-- nav -->

<!-- off canvas -->
  <div id="off-canvas-nav" class="grn-bg wht-txt">
    <div class="container">
      <img src="/wp-content/uploads/2020/07/veritcal-icon-grn.png">
      <div id="mobile-trigger-close"><span>&#10005;</span></div> 
      <div class="row">
        <div class="col-12">
          <div id="mobile-menu-all">
            <?php wp_nav_menu( array(
              'theme_location' => 'primary',
              'menu_class' => 'main-menus d-flex flex-column',
            ) ); ?>
          </div>         
        </div>
      </div>
    </div>
  </div>
<!-- off canvas -->

</div>

<!-- mobile nav -->

<div id="body-contents">

<main id="main">
