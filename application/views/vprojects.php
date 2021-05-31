<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="zWV5lUkbeMHhzMxi6DT7IQeoG0o_RerSsbCqzhstNLI" />
	<meta name="theme-color" content="#4b1a18">
	<meta name="msapplication-navbutton-color" content="#4b1a18">
	<meta name="apple-mobile-web-app-status-bar-style" content="#4b1a18">	<meta http-equiv="Cache-Control" content="public" />	<meta http-equiv="Pragma" content="no-cache" />	<meta name="description" content="Industries that we have experience with, Oil & Gas Industry, Power Generation, Chemical & Petrochemical, Pulp & Paper" />	<meta name="keywords" content="Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts" />	<meta property="og:title" content="caleb-technology.com: Engineering company that engages in all activities related to Engineerin."/>	<meta property="og:type" content="article"/>	<meta property="og:url" content="https://caleb-technology.com/"/>	<meta property="og:site_name" content="caleb-technology.com" />	<meta property="og:description" content="Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts Engineering, Construction, Commissioning, Hiring Of Professionals,Maintenance Operation ,Supply of Materials & Spare Parts" />	<meta property="og:image" content="https://caleb-technology.com/assets/img/logo.png" />
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
      <!-- HEADER-->
   <?php include 'include/vheader.php'; ?>
<div id="container-top" class="container-fluid breadcrumb-container">
      <div class="custom-container">
        <div class="row">
          <div class="col-md-12 ">
              <div class="pull-right top-header-contact current-page-container">
               <a href="<?php echo BASE_URL; ?>">HOME</a> / 
                <span class="current-page">&nbsp <?php echo strtoupper($controller) ?></span>
              </div>

          </div>
        </div>
      </div>
    </div>
<!-- BREADCRUMB-->
 
	
			<!-- PROJECT SLIDE SHOW -->
			<div class="slide-project">
				<?php $i = 0; foreach($dataProjectsHome as $pro){ ?>
                                   
                                <div>
					<a href="#"><img class="carousel-image" alt="Image Caption" src="<?php echo BASE_URL.$pro['projects_image'];?>"></a>
					<div class="ket-project">
                                            <h2><?php echo strtoupper($pro['projects_title']);?></h2>
                                                <p>USER: <span>
                                                    <?php if ($pro['client_id'] == $pro['user_id']) 
                                                        { echo strtoupper($pro['client_title']);} 
                                                        else { echo strtoupper($pro['client_title']) .' - '. strtoupper($pro['user_title']) ;} ?>
                                                    </span></p>
						<p>PROJECT: <span><?php echo $pro['projects_services'];?></span></p>
						<p>LOCATION: <span><?php echo $pro['projects_location'];?></span></p>
                                                <p>YEAR: <span><?php echo year_only($pro['projects_start_date']);?></span></p>
						<p>DESCRIPTION: <span><?php echo html_entity_decode($pro['projects_desc']);?></span></p>
					</div>
				</div>
				<?php $i++;} ?>	
			</div>
			
    <div class="container-fluid">
        <div class="row">

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

        </div>
    </div>
          <!--CLIENT LIST-->
          <div class="container-fluid company-client">
              <div class="custom-container">
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

        <!--PROJECT LIST-->
        <div class="container-fluid project-list">
    <div class="custom-container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="project-list-header">
            PROJECT LIST
          </h1>
        </div>
        <!-- PROJECT LIST Table -->
        <div class="col-md-12">
           <table class="project-list-table display" id="data_sort" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th style="display: none">NO</th>
              <th>DESCRIPTION</th>
              <th>CLIENT</th>
              <th>LOC</th>
              <th>YEAR</th>  
            </tr>
              
            </thead>
            <tbody>
                <?php
                    if(count($ListProjects) > 0){
                    $no=0;
                    foreach($ListProjects as $projects){
                     $start_year = year_only($projects['projects_start_date']);
                     $start_month = month_only($projects['projects_start_date']);
                     if ($projects['projects_end_date'] != '00-00-0000 00:00:00') {
                         $end_year = year_only($projects['projects_end_date']);
                         $end_month = month_only($projects['projects_start_date']);  
                         if ($start_month == $end_month && $end_year == $start_year){
                             $time= $start_month.' '.$end_year;
                            } 
                         else if ($start_month != $end_month && $end_year == $start_year){
                             $time= $start_month.' - '.$end_month.' '.$end_year;
                            } 
                         else {
                             $time= $start_month.' '.$start_year .' - '.$end_month.' '.$end_year;
                            }                                
                     }
                    else {
                            $time = $start_month.' '.$start_year .' - On going'; 
                        }
                     
                        
                    $no++;
                    ?>
                <tr>
                <td style="display: none"><?php echo $no;?></td>
                <td><?php echo $projects['projects_desc'];?></td>
                <td>
                    <?php if ($projects['client_id'] != $projects['user_id']) 
                    { 
                      echo strtoupper($projects['client_title']) .' - '. strtoupper($projects['user_title']) ;  
                    } 
                    else {
                    echo strtoupper($projects['client_title']);
                    }
                    ?>
                </td>
                <td><?php echo $projects['projects_location'];?></td>
                <td><?php echo $time;?> </td>
              </tr>
                 <?php } ?>
                    <?php } else {?>
                    <tr>
                        <td align="center" colspan="10">Data Not Found</td>
                    </tr>
                    <?php } ?>
              
              
             
            </tbody>
          </table>

        </div>
        <div class="col-md-12" style="display: none">
          <div class="project-list-paginator">
            <div class="col-md-2 paginator-prev"><a href="#"> PREV </a></div>
            <div class="col-md-8 pagination-numbers">
              <a href="#" class="pagination-number-selected">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#">6</a>

            </div>
            <div class="col-md-2 paginator-next"><a href="#">NEXT</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

	<!--HAVE AN IDEA && FOOTER-->
	<?php include 'include/vfooter.php'; ?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/index.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMGd3X1l4kmhJGVP6_7Rat7O6UTp9Hof0&callback=initMap" async defer></script>
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.slide-project').slick({
			  arrows: true,
			  slidesToShow: 3,
			  slidesToScroll: 1,
			  autoplay: false,
			  autoplaySpeed: 10000,
			  responsive: [
				{
				  breakpoint: 768,
				  settings: {
					arrows: true,
					slidesToShow: 3
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					arrows: true,
					centerPadding: '40px',
					slidesToShow: 3
				  }
				}
			  ]
		  });
		});
	</script>
        <link href="<?php echo CSS_BASE_URL; ?>/jquery.dataTables.min.css" rel="stylesheet"/>
        <link href="<?php echo CSS_BASE_URL; ?>/rowReorder.dataTables.min.css" rel="stylesheet"/>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.1.2/js/dataTables.rowReorder.min.js"></script>
         <script>
           $(document).ready(function() {
                var table = $('#data_sort').DataTable( {
					"lengthMenu": [ 5, 10, 15, 20 ],
                    rowReorder: {
                        snapX: 10
                    }
					
                } );
            } );
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
