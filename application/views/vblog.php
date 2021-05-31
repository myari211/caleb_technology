<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Cache-Control" content="public" />
	<meta http-equiv="Pragma" content="no-cache" />   
	<meta http-equiv="Refresh" content="900" />
	<meta name="description" content="Balkat Communication| Digital Agency, Website Design, Creative & Corporate Branding, Mobile APPS - Agensi Digital, Jasa Pembuatan Website In Jakarta - Indonesia" />
	<meta name="keywords" content="Web Design, Web developer, Merchandising,  Branding, Jasa pembuatan Website, Grafik Design" />
	<meta property="og:title" content="balkat.com: Digital Media- Branding - SEO- Merchandising."/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="http://balkat.com/"/>
	<meta property="og:site_name" content="balkat.com" />
	<meta property="og:description" content="Web Design, Web developer, Merchandising,  Branding, Jasa pembuatan Website, Grafik Design" />
	
    <!-- PAGE TITLE -->
    <title>Balkat | BLOG</title>

    <!-- FAVICON AND APPLE TOUCHSCREEN ICONS -->
    <link rel="shortcut icon" href="<?php echo IMAGES_BASE_URL; ?>/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo IMAGES_BASE_URL; ?>/apple-touch-icon.png">
    
    

    <!-- ******************************
            STYLESHEETS
    *********************************** -->

    <!-- DEFAULT AND BOOTSTRAP STYLESHEET -->
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/normalize.css">
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/bootstrap-theme.min.css">

    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

    <!-- FONT ICONS -->
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/simple-line-icons.css" />
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/themify-icons.css" />

    <!-- PLUGINS DEFAULT STYSHEETS-->
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/jquery.mmenu.all.css">
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/owl.theme.css">
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/owl.transitions.css">    
    
    <!-- MAIN STYLESHEETS -->
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/main.css">
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/responsive.css" />

    <!-- MODERNIZER -->
    <script src="<?php echo JS_BASE_URL; ?>/modernizr-2.8.3.min.js"></script>

			
	<!--[if lt IE 9]>
        <script src="<?php echo JS_BASE_URL; ?>/html5shiv.min.js"></script>
        <script src="<?php echo JS_BASE_URL; ?>/respond.min.js"></script>
        <script src="<?php echo JS_BASE_URL; ?>/selectivizr-min.js"></script>
        <script src="<?php echo JS_BASE_URL; ?>/nwmatcher.js"></script>
        <script src="<?php echo JS_BASE_URL; ?>/IE9.js"></script>		
	<![endif]-->
</head>

<body class="do-blog-masonry-page">
    <!-- PRELOADER -->
   <?php include 'include/loader.php';?> 

    <!-- START THE MAIN CONTENT HERE -->

    <!--================================
                SIDE MENU
    =================================-->
 

    <?php include 'include/vopt_menu.php';?> 
    <!-- SIDE MENU END -->

    <!--================================
        HEADER
    =================================-->
   <?php include 'include/vheader.php';?> 
    <!-- HEADER END -->

    <!-- **************************************
                    Page Title
    *************************************** -->
    <section class="do-normal-page-title-section">
        <div class="container">
            <div class="row">
                <!-- Page Title -->
                <div class="do-page-title-wrapper">
                	<div class="do-default-page-title col-md-7 col-sm-7 col-xs-12">
                		<h2>BLOG</h2>
                		<p>CREATIVE ARTICLE</p>
                	</div>

                	<div class="do-breadcumb">
                		<ul>
                			<li><a href="<?php echo BASE_URL;?>">HOME</a></li>
                                        <?php if(!empty($category)) {?> 
                                        <li><a href="<?php echo BASE_URL.'/'.$title;?>"><?php echo strtoupper($title);?></a></li>
                                        <li><span><?php echo strtoupper($category);?></span></li>
                                            <?Php } else {?>
                                        <li><span><?php echo strtoupper($title);?></span></li>
                                            <?Php }?>
                		</ul>
                	</div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!-- DO PAGE TITLE END -->


    <!-- **************************************
                SINGLE PAGE CONTENT
    *************************************** -->
    <section class="do-blog-page-wrapper">
    	<div class="container">
    		<div class="row">
                <!-- BLOG Posts -->
             <div class="do-masonry-blog-wrapper col-md-8 col-sm-8 col-xs-12">
             <?php if($countBlog > 0){ ?>
                    <?php $i = 1;foreach($getBlog as $blog){ ?>
                     <?php 
                       $remarks = strip_tags($blog['blog_short_desc']);                                
                       if(strlen($remarks) > 400){                                               
                            $string = character_limiter($remarks, 400).'...';
                           }
                      else
                          {
                            $string = $remarks.'...';
                           }            ?>
                    <!-- BLOG ITEMS -->
                        <div class="do-blog-masonry-items do-blog-items">
                        <div class="do-blog-item-wrapper">
                            <div class="do-blog-img-wrapper">
                                <img src="<?php if ($blog['blog_image']){ echo BASE_URL.'/'.$blog['blog_image'];} else { echo IMAGES_BASE_URL.'/image-normal.jpg';}?>" alt="ENDLESS ROAD STARTS">
                                <div class="do-blog-post-date">
                                    <p><?php echo date_only($blog['blog_publish_date']) ;?> <span><?php echo month_only($blog['blog_publish_date']) ;?></span></p>
                                </div>
                            </div>
                            <div class="do-blo-title-excerpt">
                                <h3>
                                    <a href="<?php if ($blog['blog_alias']!= ''){echo $blog['blog_alias'];}else {echo $controller.'/detail/'.$blog['blog_id'];} ?>"><?php echo $blog['blog_title'] ;?></a>
                                </h3>
                                <p><?php echo $string ;?></p>
                            </div>
                        </div>
                    </div>
                    <!-- BLOG ITEMS END -->   
                    <?php $i++;} ?>
                  <?php } else {?>    
                  <div class="do-blo-title-excerpt">
                    <div class="do-blog-masonry-items do-blog-items">
                        <div class="do-blog-item-wrapper">
                                <p><?php echo 'No Article Available' ;?></p>
                                <h3>
                                    <a href="<?php echo BASE_URL.'/'.$title;?>"> Return to <?php echo strtoupper($title) ;?></a>
                                </h3>
                            </div>
                    </div>
                  </div>
                   <?php } ?>
                    
                    

                    <div id="do-blog-next-page-nav">
                        <a href="#"></a>
                    </div>
                </div>
                <!-- Blog Posts End -->

                <!-- SIDEBAR -->
           <?php include 'include/sidebar.php';?>
                <!-- SIDEBAR END -->
    		</div>
    	</div>
    </section>

    

    <!--================================
        SOCIAL LINK SECTION
    =================================-->
     <?php include 'include/sosmed.php';?>
    <!-- SOCIAL LINK SECTION END-->

    <!--================================
        FOOTER SECTION
    =================================-->
  <?php include 'include/vfooter.php';?>
    <!-- FOOTER SECTION END-->


        
		




	<!-- *******************************
                SCRIPTS
    ************************************ -->
    <!-- JQUERY -->    		
    <script src="<?php echo JS_BASE_URL; ?>/jquery-1.11.3.min.js"></script>
    
    <!-- PLUGINS -->
    <script src="<?php echo JS_BASE_URL; ?>/plugins.js"></script>

    <!-- CUSTOM SCRIPTS -->    
    <script src="<?php echo JS_BASE_URL; ?>/main.js"></script>
              					
</body>
</html>
