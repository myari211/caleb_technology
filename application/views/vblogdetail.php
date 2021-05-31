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
                		<h2>BLOG</h2>
                		<p>OUR CREATIVE BLOG</p>
                	</div>

                	<div class="do-breadcumb">
                		<ul>
                			<li><a href="<?php echo BASE_URL ;?>">HOME</a></li>
                                        <li><a href="<?php echo BASE_URL ;?>/Blog">BLOG</a></li>
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
   
    
    <section class="do-blog-single-wrapper">
    	<div class="container">
    		<div class="row">
                    
                    
    			<!-- BLOG SINGLE CONTENT -->
                    <?php if($countBlog > 0){ ?>
                 <?php $i = 1;foreach($getBlog as $blog){ ?> 
                        
    			<div class="do-blog-single-content col-md-8 col-sm-8 col-xs-12">
    				<div class="do-blog-single-img-wrapper">
    					<img src="<?php if ($blog->blog_image){ echo BASE_URL.'/'.$blog->blog_image;} else { echo IMAGES_BASE_URL.'/image-normal.jpg';}?>" alt="Blog Single Image">

    					<div class="do-post-format-icon">
    						<i class="fa fa-quote-right"></i>
    					</div>
    				</div>
                            

	    			<div class="do-blog-single-details ">
	    				<!--  POST TITLE -->
	    				<div class="do-blog-post-title-wrapper do-blog-single-inner-sec">
	    					<div class="do-blog-post-date">
                                                    
                                <span class="do-post-date"><?php echo date_only($blog->blog_create_date) ;?></span>
                                <span class="do-post-month"><?php echo month_only($blog->blog_create_date) ;?> </span>
	    					</div>

	    					<div class="do-blog-post-titles">
	    						<h1><a href="#"> <?php echo $blog->blog_title ;?></a></h1>
	    						<a href="#" class="do-blog-post-author">ADMIN BALKAT</a>
	    					</div>
	    				</div>
	    				<!--  POST TITLE END-->

                        <!--  POST TEXT -->
                        <div class="do-blog-post-text do-blog-single-inner-sec">
                            <?php echo $blog->blog_desc ;?>
                            <br/>
                           
                        </div>
                        <!--  POST TEXT END -->


    				</div>
    			</div>
                        
                         <?php $i++;} ?>
                        <?php } ?> 
    			<!-- BLOG SINGLE CONTENT END -->

    			<!-- SIDEBAR -->
    			 <?php include 'include/sidebar.php';?>
    			<!-- SIDEBAR END -->
    		</div>
    	</div>
        
        
           <!-- DO PORTFOLIO SINGLE PAGINATION -->
        <div class="do-portfolio-single-navigation">
            
            <?php if($prev){?>
            <a href="<?php echo BASE_URL.'/Blog/detail/'.$prev;?>" class="do-prev-portfolio-work">
                <i class="pe-7s-angle-left"></i>
            </a> <?php } ?> 
            <?php if($next){?>
            <a href="<?php echo BASE_URL.'/Blog/detail/'.$next;?>" class="do-next-portfolio-work">
                <i class="pe-7s-angle-right"></i>
            </a>
            <?php } ?> 
            
        </div>
        <!-- DO PORTFOLIO SINGLE PAGINATION END -->
        
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
