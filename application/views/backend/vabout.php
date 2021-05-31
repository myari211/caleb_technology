<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- PAGE TITLE -->
    <title>Balkat | About</title>
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
	
    <!-- FAVICON AND APPLE TOUCHSCREEN ICONS -->
     <?php include 'include/style.php';?> 
</head>

<body>
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
                    ABOUT
    *************************************** -->
   <?php foreach ($getAbout as $ga) {?>
    
     <?php   if($ga->about_order == 1){
               include "include/section_about.php";
               } 
               elseif ($ga->about_order == 2){
               include "include/section_feature.php";
                }
                elseif ($ga->about_order == 3){
               include "include/section_team.php";
                }
                elseif ($ga->about_order == 4){
                include "include/section_exra.php";
            }?>
    
    <?php }?>
 

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
