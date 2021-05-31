                 <?php if(count($getContent) > 0){ ?>
                    <?php  foreach ($getContent as $header) {?>
                       
                     <div id="container-top" class="container-fluid">
                        <div class="row">
                          <div class="col-xs-12 col-md-12 banner">
                            <img src="<?php echo BASE_URL. $header['content_image']; ?>"/> 
                            <div class="row ">
                              <div class="col-md-6 banner-quote">
                                <p>
                                  <?php echo strtoupper($header['content_desc']) ?>
                                </p>
                              </div>
                              <div class="text-center current-page-container-material">
                                <a href="<?php echo BASE_URL; ?>">HOME</a> / 
                                <span class="current-page-contact">&nbsp <?php echo strtoupper($controller) ?></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                <?php  }?>
                <?php  }?>
                <div class="container-fluid service-motto-container">
                  <div class="custom-container service-motto">
                    <p><?php echo strtoupper($header['content_title']) ?></p>
                  </div>
                </div>      
               
  