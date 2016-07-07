<!doctype html>
<html lang="en">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
      <title><?php wp_title(" - ", true, "right"); ?><?php bloginfo('name'); ?></title>
      
      <meta name="author" content="Bastiaan Jacobs">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="HandheldFriendly" content="True">
      <meta name="viewport" content="width=device-width, maximum-scale=1.0">
      
      <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
      <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">

      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

      <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.css">

      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Quando">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
      
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/packery.pkgd.min.js"></script>
      <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

        <!--[if lt IE 9]>
          <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
        <?php wp_head(); ?>
    </head>

    <body>
      
    <div id="loader-wrapper">
        <div id="loader"></div>
     
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
     
    </div>
    
    <!--header-->
    <header>
      <!--navigation-->
      <nav>
        <!--logo-->
        <a href="<?php echo home_url(); ?>">
          <section class="logo"></section>
        </a>
        <!--logo-->
        <?php wp_nav_menu(); ?>
      </nav>
      <!--navigation-->
      <section class="intro">
          <div class="intro__fog"></div>
          <div class="intro__fog secondary"></div>
          <div class="intro__fog opposite"></div>
          <div class="intro__head"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></div>
          <div class="intro__sub"><a href="<?php echo home_url(); ?>"><?php bloginfo('description'); ?></a></div>
          <div class="btn">Blog Posts</div>
      </section>
    </header>
    <!--header-->