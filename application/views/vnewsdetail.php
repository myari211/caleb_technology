<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	<meta name="google-site-verification" content="zWV5lUkbeMHhzMxi6DT7IQeoG0o_RerSsbCqzhstNLI" />
	<meta name="theme-color" content="#4b1a18">
	<meta name="msapplication-navbutton-color" content="#4b1a18">
	<meta name="apple-mobile-web-app-status-bar-style" content="#4b1a18">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo IMG_BASE_URL; ?>/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News | <?php echo $title; ?></title>
        <meta name="description" content=" <?php echo $description; ?>" />
	<meta name="keywords" content=" <?php echo $keywords; ?>" />
	<meta property="og:title" content="<?php echo BASE_URL; ?>:  <?php echo $title; ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="<?php echo BASE_URL; ?>"/>
	<meta property="og:site_name" content="<?php echo BASE_URL; ?>" />
	<meta property="og:description" content=" <?php echo $description; ?>" />
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
   <?php include 'include/vheader.php'; ?>

	
    <div id="container-top" class="container-fluid breadcrumb-container">
      <div class="custom-container">
        <div class="row">
          <div class="col-md-12 ">
              <div class="pull-right top-header-contact current-page-container">
                <a href="<?php echo BASE_URL; ?>">HOME</a> /<a href="<?php echo BASE_URL.'/'.$controller; ?>"><?php echo strtoupper($controller) ?></a>/
                <span class="current-page"> <?php echo strtoupper($title) ?></span>
              </div>
          </div>
        </div>
      </div>
    </div>

<div class="news-date-detail"><?php echo STRTOUPPER($category_title);?> / <?php echo date_convert($news_publish_date);?></div>
	<div class="img-news-detail-wrapper">
		<img src="<?php echo BASE_URL.'/'.$news_image;?>"/>
	</div>

      <div class="container-fluid serive-container">
        <div class="custom-container">
          <div class="row">
            
			<div class="news-list-wrapper">
				<div class="col-nl-left">
					<div class="news-detail-content">
						<h1><?php echo STRTOUPPER($title);?></h1><br>
						<p><?php echo $news_desc; ?></p>
						<div class="share-url">
							<a href="#" class="tag-news">SHARE</a>
							<a href="#" class="tag-news">COPY URL</a>
						</div>
					</div>
				</div>
				<div class="col-nl-right">
					<div class="col-nlr-category">
						<h4>TAG CLOUD</h4>
                                                <?php
                                    if(!empty($news_tagging)){
                                            $news_tagging = explode(",",$news_tagging);
                                            $tagging = array_unique($news_tagging);
                                            foreach($tagging as $tag){
                                            echo "<a href='".BASE_URL.'/News/tag/'.$tag."' class='tag-news'>".strtoupper($tag)."</a>";
                                            }
                                    }
                                    ?>
						
					</div>
				</div>
			</div>

          </div>
        </div>
      </div>
   
      <!--HAVE AN IDEA & FOOTER-->
    <?php include 'include/vfooter.php'; ?>	


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/index.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/simple-carousal.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMGd3X1l4kmhJGVP6_7Rat7O6UTp9Hof0&callback=initMap" async defer></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
