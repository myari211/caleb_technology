<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- PAGE TITLE -->
   

    <!-- FAVICON AND APPLE TOUCHSCREEN ICONS -->
       <title>Balkat | <?php echo $title; ?></title>
        <meta http-equiv="Cache-Control" content="public" />
	<meta http-equiv="Pragma" content="no-cache" />   
	<meta http-equiv="Refresh" content="900" />
	<meta name="description" content=" <?php echo $description; ?>" />
	<meta name="keywords" content=" <?php echo $keywords; ?>" />
	<meta property="og:title" content="balkat.com:  <?php echo $title; ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="http://balkat.com/"/>
	<meta property="og:site_name" content="balkat.com" />
	<meta property="og:description" content=" <?php echo $description; ?>" />
	
    <!-- FAVICON AND APPLE TOUCHSCREEN ICONS -->
     <?php include 'include/style.php';?> 
</head>

<body class="do-portfolio-single-page-one">
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
                		<h2>PORTFOLIO</h2>
                		<p>PLACE FOR CREATIVE WORKS</p>
                	</div>

                	<div class="do-breadcumb">
                		<ul>
                			<li><a href="<?php echo BASE_URL ;?>">HOME</a></li>
                                        <li><a href="<?php echo BASE_URL ;?>/Works">WORKS</a></li>
                			<li><span><?php echo strtoupper($title); ?></span></li>
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
    <?php if($countWorks > 0){ ?>
        <?php $i = 1;foreach($getWorks as $works){ ?>
    <section class="do-portfolio-single-page-wrapper">
    	<div class="container">
    		<div class="row">
                    
                    
                <!-- DO SINGLE PAGE DETAILS -->
                <div class="do-portfolio-single-page-content">

                    <!-- DO PORTFOLIO MAIN IMAGE -->
                    <div class="do-single-portfolio-img-wrapper">
                        <img src="<?php echo BASE_URL.'/'.$works->works_image ;?>" alt="">
                    </div>
                    <!-- DO PORTFOLIO MAIN IMAGE END -->

                    <!-- DO PORTFOLIO DETAILS -->
                    <div class="do-single-portfolio-details">
                       
                        <div class="col-md-8 col-sm-7 col-xs-12 do-image-details">
                            <h2><?php echo $works->works_title ;?></h2>
                            <p>
                               <?php echo $works->works_desc ;?> 
                            </p>
                        </div>
                   
                        <div class="col-md-4 col-sm-5 col-xs-12 do-wrok-info">
                            <?php if (!empty($works->works_about)) {?> 
                            <div class="do-about-portfolio-work">
                                <h3>About work</h3>
                                <p> <?php echo $works->works_about ;?> </p>
                            </div>
                            <?php }?>
                            <?php if (!empty($works->works_client)) {?> 
                            <div class="do-portfolio-client-info">
                                <h3>Client</h3>
                                 <p><?php echo $works->works_client ;?></p> 
                            </div>
                             <?php }?>
                        </div>
                       
                        
                    </div>
                    <!-- DO PORTFOLIO DETAILS END -->

                    <!-- DO PORTFOLIO SUB IMAGE -->
                    <div class="do-portfolio-sub-img">
                        <?php if ($works->gallery) {?> 
                            <?php $num = 1; foreach ($works->gallery as $wg) { ?>
                             <div>
                                <img src="<?php echo IMAGES_BASE_URL .'/'.$wg->gallery_image; ?>" alt="">
                            </div>                      
                            <?php $num ++; }?>
                            <?php }?>
                    </div>
                    <!-- DO PORTFOLIO SUB IMAGE END -->
                </div>
                <!-- DO SINGLE PAGE DETAILS END -->


                <!-- DO RELETED WORKS -->
                <?php if ($works->related) {?> 
                <div class="do-portolio-related-work">
                    <h3 class="do-section-subtitle">related work</h3>

                    <div id="do-related-work-carousal" class="owl-carousel do-related-work-carousal">
                        
                        <?php $num = 1; foreach ($works->related as $wr) { ?>                          
                        <div class="do-work-item">
                            <div class="do-work-item-inner-wrap related">
                                <img src="<?php echo BASE_URL.'/'.$wr->works_image ;?>" alt="">
                                <div class="do-work-item-hover">
                                    <a href="<?php if ($wr->works_alias != ''){echo BASE_URL.'/'.$wr->works_alias;}else {echo BASE_URL.'/Works/detail/'.$wr->works_id;} ?>" class="do-single-page-link"></a>
                                    <div class="do-work-item-details">
                                        <h3 class="do-work-item-title">
                                            <a href="<?php if ($wr->works_alias != ''){echo BASE_URL.'/'.$wr->works_alias;}else {echo BASE_URL.'/Works/detail/'.$wr->works_id;} ?> "> <?php echo $wr->works_title ;?></a>
                                        </h3>
                                        <span class="do-work-item-subtitle"><?php echo $wr->works_short_desc ;?></span>
                                    </div>
                                    <a href="<?php echo BASE_URL.'/'.$wr->works_image ;?>" class="do-work-item-popup"></a>
                                </div>
                            </div>
                        </div>                                               
                        <?php $num ++; }?>
                       
                    </div>
                </div>
                 <?php }?>
                <!-- DO RELETED WORKS END -->
            </div>
    	</div>

        <!-- DO PORTFOLIO SINGLE PAGINATION -->
        <div class="do-portfolio-single-navigation">
            
            <?php if($prev){?>
            <a href="<?php echo BASE_URL.'/Works/detail/'.$prev;?>" class="do-prev-portfolio-work">
                <i class="pe-7s-angle-left"></i>
            </a> <?php } ?> 
            <?php if($next){?>
            <a href="<?php echo BASE_URL.'/Works/detail/'.$next;?>" class="do-next-portfolio-work">
                <i class="pe-7s-angle-right"></i>
            </a>
            <?php } ?> 
            
        </div>
        <!-- DO PORTFOLIO SINGLE PAGINATION END -->
    </section>
 <?php $i++;} ?>
<?php } ?> 
    

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
