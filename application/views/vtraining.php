<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="zWV5lUkbeMHhzMxi6DT7IQeoG0o_RerSsbCqzhstNLI" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo IMG_BASE_URL; ?>/favicon.ico">
	<meta name="theme-color" content="#4b1a18">
	<meta name="msapplication-navbutton-color" content="#4b1a18">
	<meta name="apple-mobile-web-app-status-bar-style" content="#4b1a18">
	<meta http-equiv="Cache-Control" content="public" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta name="description" content="Industries that we have experience with, Oil & Gas Industry, Power Generation, Chemical & Petrochemical, Pulp & Paper" />
	<meta name="keywords" content="Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts" />
	<meta property="og:title" content="caleb-technology.com: Engineering company that engages in all activities related to Engineerin."/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="https://caleb-technology.com/"/>
	<meta property="og:site_name" content="caleb-technology.com" />
	<meta property="og:description" content="Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts" />
	<meta property="og:image" content="https://caleb-technology.com/assets/img/logo.png" />
	
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
  <?php include 'include/vheader.php'; ?>

    
<?php include 'include/header_content.php'; ?>
	  
	  <!--      COMPANY PARTNER-->

	<!--      OUR TEAM-->
	<div class="container-fluid company-our-team dark-bg">
        <div class="custom-container">
          <div class="row">
            <div class="col-xs-12 col-md-12 company-our-team-title">
                <span>EVENTS</span>
            </div>
			<div class="col-xs-12 col-md-12 company-partner-text event-text">
			  <p><?php echo $event_quote;?></p>
			</div>
                <div class="col-md-12 company-our-team-list">
                <?php if(count ($getTraining) > 0){ ?>
                    <?php $i=1; foreach ($getTraining as $training) {
                         $date = date('Y-m-d', strtotime($training['training_date']));
                        $count_time = $date .' '.$training['training_start_time'];
                        ?>
                    
                    <a href="<?php if ($training['training_alias']!= ''){ echo BASE_URL.'/'.$training['training_alias'];}else {echo BASE_URL.'/Training/detail/'.$training['training_id'];} ?>" class="news-item-list <?php if  (($i % 2) == 1) {echo 'nil-left';} else { echo 'nil-right';}?>">
                            <div class="img-nil" style="background-image:url(<?php echo BASE_URL.'/'.$training['training_image'];?>);"></div>
                            <div class="content-sum-nil">
                                    <h4><?php echo STRTOUPPER($training['training_title']);?></h4>
                                    <div class="event-location"><?php echo $training['training_location'];?></div>
                                    <div class="event-hour"><?php echo $training['training_start_time'];?> to <?php echo $training['training_end_time'];?></div>
                                    <div class="event-privacy">
                                        <?php if($training['training_type']==1){echo 'Close to Public';} else {echo 'Open to Public';}?>
                                    </div>
                                    <p><?php echo $training['training_short_desc'];?> </p>
                                    <div class="time-left">
                                            <div class="tl-box">
                                                    <div class="tl-number" id="daysBox<?php echo $i;?>"></div>
                                                    <div class="tl-words">DAY</div>
                                            </div>
                                            <div class="tl-box">
                                                    <div class="tl-number" id="hoursBox<?php echo $i;?>"></div>
                                                    <div class="tl-words">HOUR</div>
                                            </div>
                                            <div class="tl-box">
                                                    <div class="tl-number" id="minsBox<?php echo $i;?>"></div>
                                                    <div class="tl-words">MIN</div>
                                            </div>
                                            <div class="tl-box">
                                                    <div class="tl-number" id="secsBox<?php echo $i;?>"></div>
                                                    <div class="tl-words">SEC</div>
                                            </div>
                                                 <script>
                                                    function count<?php echo $i;?>() {
                                                            var xmas = new Date("<?php echo $count_time;?>");
                                                            var now = new Date();
                                                            //alert (now);
                                                            var timeDiff = xmas.getTime() - now.getTime();
                                                            if (timeDiff <= 0) {
                                                                    var seconds = '0';
                                                                    var minutes = '0';
                                                                    var hours = '0';
                                                                    var days = '0';
                                                                    document.getElementById("daysBox<?php echo $i;?>").innerHTML = days;
                                                                    document.getElementById("hoursBox<?php echo $i;?>").innerHTML = hours;
                                                                    document.getElementById("minsBox<?php echo $i;?>").innerHTML = minutes;
                                                                    document.getElementById("secsBox<?php echo $i;?>").innerHTML = seconds;
                                                                    clearTimeout(timer);
                                                                   // document.write("event is here!");
                                                                    // Run any code needed for countdown completion here
                                                            } else{
                                                            var seconds = Math.floor(timeDiff / 1000);
                                                            var minutes = Math.floor(seconds / 60);
                                                            var hours = Math.floor(minutes / 60);
                                                            var days = Math.floor(hours / 24);
                                                            hours %= 24;
                                                            minutes %= 60;
                                                            seconds %= 60;
                                                            document.getElementById("daysBox<?php echo $i;?>").innerHTML = days;
                                                            document.getElementById("hoursBox<?php echo $i;?>").innerHTML = hours;
                                                            document.getElementById("minsBox<?php echo $i;?>").innerHTML = minutes;
                                                            document.getElementById("secsBox<?php echo $i;?>").innerHTML = seconds;
                                                            var timer = setTimeout('count<?php echo $i;?>()',1000);
                                                        }
                                                    }
                                                    </script>
                                                  <script>count<?php echo $i;?>();</script>
                                            <div class="clear"></div>
                                    </div>
                            </div>
                            <div class="date-nil">
                                    <div class="dnil-day"><?php echo date_only($training['training_date']);?></div>
                                    <div class="dnil-month"><?php echo month_short($training['training_date']);?></div>
                            </div>
                    </a>
                    <?php   $i++; }?>  
                <?php  }?>
                    <div class="clear"></div>
            </div>
          </div>
      </div>
    </div>
  
	  <div class="container-fluid company-partner brands-wrapper">
		<div class="custom-container">
		  <div class="row">
			<div class="col-xs-12 col-md-12 company-partner-title">
			  <span>LATEST TRAINING</span>
			</div>
			<div class="col-xs-12 col-md-12 company-partner-text">
			  <p><?php echo $brand_quote;?></p>
			</div>
		  </div>
		</div>
		<!-- SIMPLE CAROUSEL PARTNERS -->

		<div class="custom-container custom-container-carousal">
		  <div class="row">
			<div class="col-xs-12 col-md-12">
			  <div class="carousal-kit popup-gallery2">
                           <?php if($countLatest_trainingHome > 0){ ?>
                            <?php $i = 1;foreach($dataLatest_trainingHome as $latest_training){ ?>  
                                <a href="<?php echo BASE_URL.'/'.$latest_training['latest_training_image'] ;?>" class="itempopup2" title="<?php echo $latest_training['latest_training_title'] ;?>"><img src="<?php echo BASE_URL.'/'.$latest_training['latest_training_image'] ;?>" /></a>
                            <?php $i++;} ?>
                            <?php } ?>  
			</div>
		  </div>
		</div>
	  </div>
	</div><!--company partner-->
	
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
