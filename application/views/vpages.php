<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- PAGE TITLE -->
    <title>Balkat | <?php echo html_entity_decode($title) ;?> </title>
    <meta http-equiv="Cache-Control" content="public" />
    <meta http-equiv="Pragma" content="no-cache" />   
    <meta http-equiv="Refresh" content="900" />
    <meta name="description" content="Balkat Communication| Digital Agency, Website Design, Creative & Corporate Branding, Mobile APPS - Agensi Digital, Jasa Pembuatan Website In Jakarta - Indonesia" />
    <meta name="keywords" content="Web Design, Web developer, Merchandising,  Branding, Jasa pembuatan Website, Grafik Design,  Location,  Contact US" />
    <meta property="og:title" content="balkat.com: Digital Media- Branding - SEO- Merchandising."/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="http://balkat.com/"/>
    <meta property="og:site_name" content="balkat.com" />
    <meta property="og:description" content="Web Design, Web developer, Merchandising,  Branding, Jasa pembuatan Website, Grafik Design" />
	
    <!-- FAVICON AND APPLE TOUCHSCREEN ICONS -->
     <?php include 'include/style.php';?> 
</head>

<body class="do-contact-us-page">
    <!-- PRELOADER -->
   <?php include 'include/loader.php';?> 

    <!-- START THE MAIN CONTENT HERE -->

    <!--================================
                SIDE MENU
    =================================-->
    <!-- PAGE OVERLAY WHEN MENU ACTIVE -->
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
                		<h2><?php echo html_entity_decode($title) ;?> </h2>
                		<p> <?php echo html_entity_decode($pages_short_desc) ;?> </p>
                	</div>

                	<div class="do-breadcumb">
                		<ul>
                			<li><a href="<?php echo BASE_URL ;?>">HOME</a></li>
                			<li><span><?php echo strtoupper($title) ;?></span></li>
                		</ul>
                	</div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!-- DO PAGE TITLE END -->
    <section class="do-blog-single-wrapper">
    	<div class="container">
    		<div class="row">
    			<!-- BLOG SINGLE CONTENT -->
    			<div class="do-blog-single-content col-md-8 col-sm-8 col-xs-12">
    			<?php if (!empty($pages_image)) {?>
                        <div class="do-blog-single-img-wrapper">
    					<img src="<?php echo BASE_URL .'/'.$pages_image ;?>" alt="Blog Single Image">
                        </div>
                        <?php } ?>
                            
                        <?php if ($pages_id != 17 ) {?>  
                        <div class="do-blog-single-details ">	    		
                        <!--  POST TEXT -->
                        <div class="do-blog-post-text do-blog-single-inner-sec">
                            <?php echo html_entity_decode($pages_desc) ;?>                          
                        </div>
                        </div>
                        <?php } ?>
    			</div>
    			<!-- BLOG SINGLE CONTENT END -->

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

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/google-map-init.js"></script>
    
    <!-- PLUGINS -->
    <script src="<?php echo JS_BASE_URL; ?>/plugins.js"></script>

    <!-- CUSTOM SCRIPTS -->    
    <script src="<?php echo JS_BASE_URL; ?>/main.js"></script>
              					
</body>
</html>
