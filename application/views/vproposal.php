<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- PAGE TITLE -->
    <title>Balkat | Request Proposal</title>
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

   <section class="do-normal-page-title-section">
        <div class="container">
            <div class="row">
                <!-- Page Title -->
                <div class="do-page-title-wrapper">
                	<div class="do-default-page-title col-md-7 col-sm-7 col-xs-12">
                		<h2>REQUEST PROPOSAL</h2>
                                <p>DROP US A LINE <br/>AND LETS  GET THINGS A ROLLINGS!</p>
                	</div>

                	<div class="do-breadcumb">
                		<ul>
                			<li><a href="<?php echo BASE_URL;?>">HOME</a></li>
                			<li><span>REQUEST PROPOSAL</span></li>
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
    <section class="do-portfolio-single-page-wrapper">
    	<div class="container">
    		<div class="row">
                <!-- DO SINGLE PAGE DETAILS -->
                <div class="do-blog-single-content col-md-8 col-sm-8 col-xs-12">

                    <!-- DO PORTFOLIO MAIN IMAGE -->
                   
                    <div class="do-blog-single-img-wrapper">
                            <img src="<?php echo IMAGES_BASE_URL;?>/placeholder-extrafeature.jpg"  alt="Blog Single Image">
                    </div>
                    <!-- DO PORTFOLIO MAIN IMAGE END -->

                    <!-- DO PORTFOLIO DETAILS -->
                    <div class="do-single-portfolio-details">
                        <section class="do-contact-page-wrapper">
    	<div class="container">
            
    		<div class="row">  
    <div class="do-contact-form-wrapper">
                     
                        <span> <?php echo $notif; ?> </span>
                        <?php echo form_error('full_name'); ?>
                         <?php echo form_error('phone'); ?>
                          <?php echo form_error('email'); ?>
                        <?php echo form_error('location'); ?> 
                         <?php echo form_error('message'); ?>
                       <?php echo form_open(BASE_URL.'/Proposal/request', 'class="location-form" id="myform"'); ?>
                        
                            <input type="text" name="full_name" id="do-input-name" placeholder="Name">
                            
                            <input type="text" name="phone" id="do-input-phone" placeholder="Phone">
                           
                            <input type="email" name="email" id="do-input-email" placeholder="Email">
                          
                            <input type="text" name="location" id="do-input-web" placeholder="Location">
                            <select name="services">
								<option value=" ">Select a Service</option>
                                <option value="Brand Communication">BRAND COMMUNICATION</option>
                                <option value="Digital Development">DIGITAL DEVELOPMENT</option>
                                <option value="Merchandising">MERCHANDISING</option>
                                <option value="Search Engine Management">SEARCH ENGINE MANAGEMENT</option>
                            </select>  
                            <select name="price_range">
								<option value="">Choose Your Budget</option>
                                <option value="Below IDR 5.000.000"> < IDR 5.000.000</option>
                                <option value="IDR Rp 5.000.000 - Rp 15.000.000">IDR Rp 5.000.000 - 15.000.000</option>
                                <option value="IDR Rp 15.000.000 - Rp 25.000.000">IDR  15.000.000 - 25.000.000</option>
                                <option value="IDR 25.000.000 - Rp 50.000.000">IDR  25.000.000 - 50.000.000</option>
                                <option value="Above IDR 50.000.000"> > IDR 50.000.000</option>
							    <option value="Prefer Not To Say"> I Prefer not To Say</option>
                            </select>
                            <textarea name="message" id="do-input-message" cols="30" rows="10" class="do-input-message" placeholder="Tell us about your poroject"></textarea>
                            
                            <div class="g-recaptcha" data-sitekey="6LeLAyITAAAAAPcbqxatbwqSoFI2U_78E8eGzwOM"></div>
                            <script src='https://www.google.com/recaptcha/api.js'></script>
                            <input type="submit" id="do-submit-btn" class="do-btn-round-solid" value="SEND">
                          
                          
                       <?php echo form_close(); ?>
                    </div>
    		</div>
    	</div>
    </section>

                        
                    </div>
                  
                </div>
                <!-- DO SINGLE PAGE DETAILS END -->


               
    		</div>
    	</div>

    </section>

    <!-- **************************************
                SINGLE PAGE CONTENT
    *************************************** -->
    

    
    

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
