<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>PT Caleb Technology</title>

  <!-- Bootstrap -->
   <link href="<?php echo CSS_BASE_URL; ?>/bootstrap.min.css" rel="stylesheet"/>
  <link href="<?php echo CSS_BASE_URL; ?>/sticky-footer-navbar.css" rel="stylesheet"/>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
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
   <!-- HEADER-->
 <?php include 'include/vheader.php'; ?>
<!-- SLIDER-->
<?php include 'include/slider.php'; ?>


  <!--        ROW STATS-->

 <div class="container-fluid company-stats">
    <div class="custom-container">
      <div class="row">
        <div class="col-xs-12 col-md-3 stats-container">
          <div class="stats-inner-container">
            <img src="<?php echo IMG_BASE_URL; ?>/icon/teammember.png"/>
            <span class="stats-number font-open-sans-condensed count"><?php echo $CountTeam;?></span>
            <span class="stats-text">TEAM MEMBERS</span>
          </div>
        </div>
        <div class="col-xs-12 col-md-3 stats-container">
          <div class="stats-inner-container">
             <img src="<?php echo IMG_BASE_URL; ?>/icon/project.png"/>
            <span class="stats-number font-open-sans-condensed count"><?php echo $CountProject;?></span>
            <span class="stats-text">PROJECTS</span>
          </div>
        </div>

        <div class="col-xs-12 col-md-3 stats-container">
          <div class="stats-inner-container">
            <img src="<?php echo IMG_BASE_URL; ?>/icon/client.png"/>
            <span class="stats-number font-open-sans-condensed count"><?php echo $CountClient;?></span>
            <span class="stats-text">CLIENTS</span>
          </div>
        </div>
        <div class="col-xs-12 col-md-3 stats-container">
          <div class="stats-inner-container">
          <img src="<?php echo IMG_BASE_URL; ?>/icon/partners.png"/>
            <span class="stats-number font-open-sans-condensed count"><?php echo $CountMaterial;?></span>
            <span class="stats-text">PARTNERS</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--      COMPANY INFO-->
  <div class="container-fluid company-info">
    <div class="custom-container">
      <div class="row">
        <div class="col-xs-12 col-md-12 company-info-text">
          <p>
          <?php echo $quote_desc;?>
          </p>
        </div>
      </div>

      <div class="row">
        <div class="company-info-profile-container col-md-12">
          <ul>
            <li>
              <div class="company-info-profile-inner-container">
                <div class="company-info-profile"><img src="<?php echo IMG_BASE_URL; ?>/icon/profile.png"/></div>
                <div class="company-info-profile-text"> <p>PROFILE</p></div>
              </div>
            </li>

            <li>
              <div class="company-info-profile-inner-container">
                <div class="company-info-profile"><img src="<?php echo IMG_BASE_URL; ?>/icon/project-bgmerah.png"/></div>
                <div class="company-info-profile-text"> <p>PROJECT</p></div>
              </div>
            </li>

            <li>
              <div class="company-info-profile-inner-container">
                <div class="company-info-profile"><img src="<?php echo IMG_BASE_URL; ?>/icon/service.png"/></div>
                <div class="company-info-profile-text"> <p>SERVICE</p></div>
              </div>
            </li>

          </ul>
        </div>
      </div>

    </div>
  </div>



  <!--      COMPANY PARTNER-->
  <div class="container-fluid company-partner">
    <div class="custom-container">
      <div class="row">
        <div class="col-xs-12 col-md-12 company-partner-icon">
          <img src="<?php echo IMG_BASE_URL; ?>/icon/partner-titlehome.png">
        </div>
        <div class="col-xs-12 col-md-12 company-partner-title">
          <span><?php echo $partner_title;?></span>
          <hr class="company-partner-hr"/>
        </div>

        <div class="col-xs-12 col-md-12 company-partner-text">
            <p><?php echo html_entity_decode($partner_desc);?></p>
        </div>
      </div>
    </div>
    <!-- SIMPLE CAROUSEL PARTNERS -->

    <div class="custom-container custom-container-carousal">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="carousal-kit">
             <?php if($countMaterialHome > 0){ ?>
                <?php $i = 1;foreach($dataMaterialHome as $material){ ?>
                     <div  class=""><img src="<?php echo BASE_URL.'/'.$material['material_image'] ;?>" /></div>
                <?php $i++;} ?>
            <?php } ?>
        </div>
      </div>
      <div class="col-xs-12 col-md-12 company-partner-viewall">
        <p><a href="#">VIEW ALL</a></p>
      </div>
    </div>
  </div>
</div><!--company partner-->

<!--      OUR TEAM-->
<div class="container-fluid company-our-team">
        <div class="custom-container">
          <div class="row">
            <div class="col-xs-12 col-md-12 company-our-team-icon">
                  <img src="<?php echo IMG_BASE_URL; ?>/icon/ourteam.png">
            </div>
            <div class="col-xs-12 col-md-12 company-our-team-title">
                <span>OUR TEAM</span>
                <hr class="company-our-team-hr"/>
            </div>

            <div class="col-md-12 company-our-team-list">
                <ul>
                <?php if($countTeamHome > 0){ ?>
                <?php $i = 1;foreach($dataTeamHome as $team) { ?>  
                   <li class="col-xs-12 col-md-4">
                        <img src="<?php echo BASE_URL.'/'.$team['team_image'] ;?>">
                        <div class="company-our-team-pp-name">
                            <p><?php echo $team['team_title'] ;?></p>
                        </div>
                    </li>
                <?php $i++;} ?>
                <?php } ?>    
                   
                </ul>

            </div>

            <div class="col-xs-12 col-md-12 company-our-team-viewall">
                 <p><a href="#">VIEW ALL</a></p>
            </div>
          </div>
      </div>
    </div>

  <!--CLIENT LIST-->
  <div class="container-fluid company-client">
      <div class="">
         <div class="row">
             <div class="col-xs-12 col-md-12 company-client-list-icon">
                  <img src="<?php echo IMG_BASE_URL; ?>/icon/clientlist.png">
            </div>
            <div class="col-xs-12 col-md-12 company-client-list-title">
                <span>CLIENT LIST</span>
                <hr class="company-client-list-hr"/>
            </div>
          </div>

          <!-- SIMPLE CAROUSEL PARTNERS -->

          <div class="custom-container custom-container-carousal">
            <div class="row">
              <div class="col-xs-12 col-md-12">
                <div class="carousal-kit">
                <?php if($countClientHome > 0){ ?>
                <?php $i = 1;foreach($dataClientHome as $client){ ?>  
                    <div  class=""><img src="<?php echo BASE_URL.'/'.$client['client_image'] ;?>" /></div>
                <?php $i++;} ?>
                <?php } ?>   
                 
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

<!--MOTTO-->
<div class="container-fluid company-motto-container">
      <div class="custom-container ">
        <div class="row">
          <div class="col-xs-12 col-md-12 company-motto">
              <p>"<?php echo html_entity_decode($testimonial_desc);?>"</p>
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
  <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script src="<?php echo JS_BASE_URL; ?>/index.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMGd3X1l4kmhJGVP6_7Rat7O6UTp9Hof0&callback=initMap" async defer></script>
<script type="text/javascript">
			$(document).on("scroll", function(){
				if
			  ($(document).scrollTop() > 100){
				  $("#header").addClass("nav-up");
					updateSliderMargin();
				}
				else
				{
					$("#header").removeClass("nav-up");
					updateSliderMargin();
				}
			});
	</script>

</body>
</html>
