<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#4b1a18">
	<meta name="msapplication-navbutton-color" content="#4b1a18">
	<meta name="apple-mobile-web-app-status-bar-style" content="#4b1a18">	<meta http-equiv="Cache-Control" content="public" />	<meta http-equiv="Pragma" content="no-cache" />	<meta name="description" content="Industries that we have experience with, Oil & Gas Industry, Power Generation, Chemical & Petrochemical, Pulp & Paper" />	<meta name="keywords" content="Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts" />	<meta property="og:title" content="caleb-technology.com: Engineering company that engages in all activities related to Engineerin."/>	<meta property="og:type" content="article"/>	<meta property="og:url" content="https://caleb-technology.com/"/>	<meta property="og:site_name" content="caleb-technology.com" />	<meta property="og:description" content="Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts" />	<meta property="og:image" content="https://caleb-technology.com/assets/img/logo.png" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo IMG_BASE_URL; ?>/favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NEWS | CALEB</title>

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
           <?php include 'include/header_content.php'; ?>

      <div class="container-fluid serive-container">
        <div class="custom-container">
          <div class="row">
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
			<div class="news-list-wrapper">
				<div class="col-nl-left">
                                    
                                    <?php if(count ($getNews) > 0){ ?>
                                    <?php $i=1; foreach ($getNews as $news) { ?>
					<div class="col-news-item">
						<div class="cni-wrapper">
							<div class="img-news-item" style="background-image:url(<?php echo BASE_URL.'/'.$news['news_image'];?>);"></div>
							<h2><?php echo $news['news_title'];?></h2>
                                                        <p class="date-news"><?php echo STRTOUPPER($news['category_title']);?> / <?php echo date_convert($news['news_publish_date']);?></p>
							<div class="news-summary">
								<?php echo $news['news_short_desc'];?>
							</div>
							<a href="<?php if ($news['news_alias']!= ''){ echo BASE_URL.'/'.$news['news_alias'];}else {echo BASE_URL.'/News/detail/'.$news['news_id'];} ?>" class="button-read-more">READ MORE...</a>
						</div>
					</div>
				   <?php   $i++; }?>  
                                <?php  }?>	
					<div class="clear"></div>
				</div>
				<div class="col-nl-right">
					<div class="col-nlr-category">
						<h4>CATEGORIES</h4>
						<ul>
							<?php   foreach($Newscategory as $ng)  {   ?>                     
                                                                <li>
                                                                  <a href="<?php  echo BASE_URL.'/News/Category/'. $ng->category_title; ?>">
                                                                      <i class="fa fa-angle-right"></i> <?php  echo strtoupper($ng->category_title); ?>
                                                                  </a>
                                                                 </li>                      
                                                              <?php }?>
						</ul>
					</div>
					<div class="col-nlr-category">
                                             <?php   if(!empty($getRecentNews))  {   ?>
						<h4>RECENT POST</h4>
						<ul>
                                                     <?php   foreach($getRecentNews as $gn)  {   ?> 
							<li>
								<a href="<?php if ($gn->news_alias!= ''){echo BASE_URL.'/'.$gn->news_alias;}else {echo BASE_URL.'/News/detail/'.$gn->news_id;} ?>"> <?php  echo strtoupper($gn->news_title); ?></a>
							</li>
							<?php }?>
						</ul>
                                             <?php }?>
					</div>
					<div class="col-nlr-category">
                                            <?php   if(!empty($getTag))  {   ?>
						<h4>TAG CLOUD</h4>
                                                 <?php   foreach($getTag as $tag)  {   ?> 
						<a href="<?php echo BASE_URL.'/News/tag/'.$tag->tagging_title; ?>" class="tag-news"><?php  echo strtoupper($tag->tagging_title); ?></a>
                                                <?php }?>
                                            <?php }?>
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
