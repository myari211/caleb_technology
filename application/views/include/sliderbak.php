<?php if($countBannerHome > 0){ ?>
<div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-12 banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="2000">
          <!-- Indicators -->
          <ol class="carousel-indicators">
        <?php $i = 0; foreach($dataBannerHome as $banner){ ?>
            <?php if($banner['banner_type'] == 1){?>
              <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php  if ($i == 0) { echo 'active';} ?>"></li> 
             <?php } ?>
        <?php $i++;} ?>	
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php $i = 0; foreach($dataBannerHome as $banner){ ?>
            <?php if($banner['banner_type'] == 1){?>

                <div class="item <?php  if ($i == 0) { echo 'active';} ?>">
                  <img src="<?php echo BASE_URL.$banner['banner_images'];?>" alt="...">
                  <div class=" <?php  if ($i == 0) { echo 'custom-container banner-quote';} ?>">
                    <div class="row ">
                        <div class="col-md-6 banner-quote">
                            <p>"<?php echo html_entity_decode($banner['banner_desc']);?>"</p>
                        </div>
                    </div>
                  </div>        
                </div>
            <?php } ?>
            <?php $i++;} ?>	        
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php } ?> 