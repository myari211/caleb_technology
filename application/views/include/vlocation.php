<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- PAGE TITLE -->
    <title>Balkat | Contact Us</title>
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
                		<h2>CONTACT US</h2>
                		<p>GET IN TOUCH</p>
                	</div>

                	<div class="do-breadcumb">
                		<ul>
                			<li><a href="<?php echo BASE_URL ;?>">HOME</a></li>
                			<li><span>CONTACT</span></li>
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
    <section class="do-contact-page-wrapper">
    	<div class="container">
    		<div class="row">  
                <!-- GOOGLE MAP -->
                <div class="do-google-map">
                    <div id="map"></div>
                </div>
                <!-- GOOGLE MAP END -->

                <!-- CONTACT FORM AND ADDRESS -->
                <div class="do-contact-form-address-wrapper">
                    <!-- CONTACT FORM -->
                    <div class="do-contact-form-wrapper">
                      <h3>SEND YOUR MESSAGE</h3>
                        <span> <?php echo $notif; ?> </span>
                        <?php echo form_error('full_name'); ?>
                         <?php echo form_error('phone'); ?>
                          <?php echo form_error('email'); ?>
                        <?php echo form_error('web'); ?> 
                         <?php echo form_error('message'); ?>
                       <?php echo form_open(BASE_URL.'/location/contactUs', 'class="location-form" id="myform"'); ?>
                        
                            <input type="text" name="full_name" id="do-input-name" placeholder="Name">
                            
                            <input type="text" name="phone" id="do-input-phone" placeholder="Phone">
                           
                            <input type="email" name="email" id="do-input-email" placeholder="Email">
                          
                            <input type="text" name="web" id="do-input-web" placeholder="Web">
                                                     
                            <textarea name="message" id="do-input-message" cols="30" rows="10" class="do-input-message" placeholder="Comment"></textarea>
                           
                            <button type="submit" id="do-submit-btn" class="do-btn-round-solid">SEND</button>
                       <?php echo form_close(); ?>
                    </div>
                    <!-- CONTACT FORM END -->

                    <!-- ADDRESS -->
                    <div class="do-contact-add-wrapper">
                        <div class="do-contact-info">
                            <h4>GET IN TOUCH</h4>
                            <p>Have an interesting project that you want us to work on?
                                <br/>
                            Or simply want to meet up for coffee? We’d love to hear from you.</p>
                        </div>

                        <div class="do-contact-address">
                            <h4>CONTACT INFO</h4>
                            <ul>
                                <li class="do-address">Jl. Sukarjo Wiryopranoto No. 55A<br>
                                Jakarta Barat-11160 <br> Indonesia</li>

                                <li class="do-phone">[ +62 ] 216296302</li>
                                <li class="do-email">hello@balkat.com</li>
                            </ul>

                            <div class="do-coantact-social">
                                <a href="#">
                                    <i class="ti-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-twitter-alt"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-vimeo-alt"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-dribbble"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-behance"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- ADDRESS END -->
                </div>
                <!-- CONTACT FORM AND ADDRESS END -->
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
