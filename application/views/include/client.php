 <section class="do-testimonial-section" data-stellar-background-ratio="0.5">
        <div class="do-dark-overlay"></div>
        <div class="container">
            <div class="row">

                <!-- SECTION HEADING -->
                <div class="do-section-heading do-section-heading-light">
                    <h1>CLIENT SAYS</h1>
                </div>
                <!-- SECTION HEADING END -->

                <!-- Testimonial Slider -->
                <div id="do-testimonial-1st" class="owl-carousel do-testimonial">
                 <!-- Slides -->
                <?php if($countClientHome > 0){ ?>
                <?php $i = 1;foreach($dataClientHome as $client)
                   // print_r($client);
                    { ?>  
                      <div class="do-testimonial-slides">
                        <p><?php echo $client['content_desc'] ;?></p>
                        <span><?php echo $client['content_title'] ;?></span>
                        <img src="<?php echo BASE_URL.'/'.$client['content_image'] ;?>" width="100px" height="60px" alt="">
                    </div>
                <?php $i++;} ?>
                <?php } ?>   
                  
                    <!-- Slides End -->


                </div>
                <!-- Testimonial Slider End -->
            </div>
        </div>
    </section>
