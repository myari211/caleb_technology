  <section class="do-sevice-section" id="do-sevice-section">
        <div class="container">
            <div class="row">

                <?php if($countServicesHome > 0){ ?>
                <?php $i = 1;foreach($dataServicesHome as $services){ ?>  
                    <div class="do-service-container">
                    <div class="do-service-container-inner">
                        <div class="do-front-part">
                            <div class="do-front-content">
                      
                        <img src="<?php echo BASE_URL.'/'.$services['services_image'] ;?>" class="img-circle" width="40px" height="40px" lt="">
                      
                                <h3><?php echo $services['services_title'] ;?></h3>
                            </div>
                        </div>

                        <div class="do-back-part">
                            <div class="do-back-content">
                                <a href="<?php if ($services['services_alias']!= ''){ echo BASE_URL.'/'.$services['services_alias'];}else {echo BASE_URL.'/Services/detail/'.$services['services_id'];} ?>"> 
                                    <h3><?php echo $services['services_title'] ;?></h3>
                                </a>
                                <p><?php echo $services['services_short_desc'] ;?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                    <?php $i++;} ?>
                <?php } ?>    
               
            </div>
        </div>
    </section>