<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="zWV5lUkbeMHhzMxi6DT7IQeoG0o_RerSsbCqzhstNLI" />
	<meta name="theme-color" content="#4b1a18">
	<meta name="msapplication-navbutton-color" content="#4b1a18">
	<meta name="apple-mobile-web-app-status-bar-style" content="#4b1a18">	<meta http-equiv="Pragma" content="no-cache" />	<meta name="description" content="Industries that we have experience with, Oil & Gas Industry, Power Generation, Chemical & Petrochemical, Pulp & Paper" />	<meta name="keywords" content="Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts" />	<meta property="og:title" content="caleb-technology.com: Engineering company that engages in all activities related to Engineerin."/>	<meta property="og:type" content="article"/>	<meta property="og:url" content="https://caleb-technology.com/"/>	<meta property="og:site_name" content="caleb-technology.com" />	<meta property="og:description" content="Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts" />	<meta property="og:image" content="https://caleb-technology.com/assets/img/logo.png" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo IMG_BASE_URL; ?>/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title>PT Caleb Technology | <?php echo strtoupper($controller) ?></title>

    <!-- Bootstrap -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo CSS_BASE_URL; ?>/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo CSS_BASE_URL; ?>/sticky-footer-navbar.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/feature-carousel.css" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_BASE_URL; ?>/slick.css"/>
    <!-- // Add the new slick-theme.css if you want the default styling -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_BASE_URL; ?>/slick-theme.css"/>
    <link href="<?php echo CSS_BASE_URL; ?>/style.css" rel="stylesheet"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
	 <?php include 'include/vheader.php'; ?>
<div id="container-top" class="container-fluid breadcrumb-container">
      <div class="custom-container">
        <div class="row">
          <div class="col-md-12 ">
              <div class="pull-right top-header-contact current-page-container">
               <a href="<?php echo BASE_URL; ?>"> HOME</a> / 
                <span class="current-page"> <?php echo strtoupper($controller) ?></span>
              </div>

          </div>
        </div>
      </div>
    </div>

      <div class="container-fluid serive-container">
        <div class="custom-container">
          <div class="row">
            
			<div class="training-detail-wrapper">
				<div class="col-training">
					<div class="training-detail-content news-detail-content">
						<h1><?php echo strtoupper($title) ?></h1><br>
						<?php echo html_entity_decode($desc) ?>
					</div>
				</div>
			</div>

          </div>
        </div>
      </div>
  
  <!--HAVE AN IDEA && FOOTER-->
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
