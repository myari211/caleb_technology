<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="zWV5lUkbeMHhzMxi6DT7IQeoG0o_RerSsbCqzhstNLI" />
	<meta name="theme-color" content="#4b1a18">
	<meta name="msapplication-navbutton-color" content="#4b1a18">
	<meta name="apple-mobile-web-app-status-bar-style" content="#4b1a18">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo IMG_BASE_URL; ?>/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PT Caleb Technology | <?php echo strtoupper($controller) ?></title>

    <!-- Bootstrap -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo CSS_BASE_URL; ?>/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo CSS_BASE_URL; ?>/sticky-footer-navbar.css" rel="stylesheet"/>
    <link href="<?php echo CSS_BASE_URL; ?>/style.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_BASE_URL; ?>/slick.css"/>
    <!-- // Add the new slick-theme.css if you want the default styling -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_BASE_URL; ?>/slick-theme.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- HEADER-->
 <?php include 'include/vheader.php'; ?>

    
<?php include 'include/header_content.php'; ?>
    <?php if(count ($getContentPage) > 0){ ?>
        <?php $i=1; foreach ($getContentPage as $page) { ?>
    <div class="container-fluid <?php if  (($i % 2) == 1) {echo 'serive-container';} else { echo 'serive-container-engineering';}?> ">
        <div class="custom-container">
          <div class="row">
            <div class="col-md-12">
              <p class="<?php if  (($i % 2) == 1) {echo 'service-header';} else { echo 'service-header-engineering';}?>">
                <?php echo strtoupper($page->content_page_title) ?>
              </p>
            </div>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-9421529648543981"
     data-ad-slot="3938798405"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
            <div class="col-md-12 <?php if  (($i % 2) == 1) {echo 'service-text-container';} else { echo 'service-text-container';}?>">
              <p class="<?php if  (($i % 2) == 1) {echo 'service-text';} else { echo 'service-text-engineering';}?>">
                  <?php echo $page->content_page_desc;?>
              </p>
            </div>

          </div>
        </div>
        <div class="custom-container custom-container-carousal">
          <div class="row">
            <!-- SIMPLE CAROUSAL -->
            <div class="carousal-kit popup-gallery<?php echo $i;?>">
               <?php if(count ($page->sub_page) > 0){ ?>			
                        <?php  foreach ($page->sub_page as $sp) {?>
                            <a href="<?php echo $sp->content_subpage_image; ?>" class="itempopup<?php echo $i;?>" title="<?php echo $sp->content_subpage_title; ?>"><img src="<?php echo $sp->content_subpage_image; ?>" /></a>
			 <?php  }?>				   
                    <?php  }?> 
            </div>
          </div>
        </div>
      </div>
    
        <?php   $i++; }?>  
    <?php  }?>
      

    
    
    
      <!-- ENGINEERING AND SERIVCE DIVISION -->
      

      <!--HAVE AN IDEA-->

        <!--FOOTER-->
       <!-- HEADER-->
 <?php include 'include/vfooter.php'; ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/index.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/simple-carousal.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMGd3X1l4kmhJGVP6_7Rat7O6UTp9Hof0&callback=initMap" async defer></script>
    <script type="text/javascript">
	$(document).ready(function() {
	$('.popup-gallery1').magnificPopup({
		delegate: 'a.itempopup1',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Caleb Technology</small>';
			}
		}
	});
	$('.popup-gallery2').magnificPopup({
		delegate: 'a.itempopup2',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Caleb Technology</small>';
			}
		}
	});
});
	</script>
	
	<script type="text/javascript">
			 $(document).on("scroll", function(){
				if
			  ($(document).scrollTop() > 100){
				  $("#tophead").hide();
					updateSliderMargin();
				}
				else
				{
					$("#tophead").show();
					updateSliderMargin();
				}
			}); 
</script>
	
  </body>
</html>
