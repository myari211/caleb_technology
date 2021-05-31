<section class="do-portfolio-section do-section">
        <div class="container">
            <div class="row">
                <!-- SECTION HEADING -->
                <div class="do-section-heading">
                    <h1>WORKS</h1>
                    <p class="do-section-subheading">OUR CREATIVE GALLERY</p>
                </div>
                <!-- SECTION HEADING END -->

                <!-- WORKS -->
                <div class="do-portfolio-works do-portfolio-one-px">
                    
                   <?php if($countWorksHome > 0){ ?>
                    <?php $i = 1;foreach($dataWorksHome as $works){ ?> 
                    <div class="do-work-item <?php echo cssWorks($works['works_order']);?>">
                        <div class="do-work-item-inner-wrap appear fadeIn" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <img src="<?php echo BASE_URL.'/'.$works['works_image'] ;?>" alt="">
                            <div class="do-work-item-hover">
                                <a href="<?php if ($works['works_alias']!= ''){ echo BASE_URL.'/'.$works['works_alias'];}else {echo BASE_URL.'/Works/detail/'.$works['works_id'];} ?>" class="do-single-page-link"></a>
                                <div class="do-work-item-details">
                                    <h3 class="do-work-item-title">
                                       <a href="<?php if ($works['works_alias']!= ''){echo BASE_URL.'/'.$works['works_alias'];}else {echo BASE_URL.'/Works/detail/'.$works['works_id'];} ?>"><?php echo $works['works_title'] ;?></a>
                                    </h3>
                                    <span class="do-work-item-subtitle"><?php echo $works['works_short_desc'] ;?></span>
                                </div>
                                <a href="<?php echo BASE_URL.'/'.$works['works_image'] ;?>" class="do-work-item-popup"></a>
                            </div>
                        </div>
                    </div>
                    <?php $i++;} ?>
                    <?php } ?>    
                </div>
                <!-- WORKS END -->
            </div>
        </div>

        <a href="works" class="do-btn-round-outline">MORE</a>
    </section>