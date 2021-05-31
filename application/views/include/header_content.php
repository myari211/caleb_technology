   <div id="container-top" class="container-fluid">
    <div class="row">             
            <div class="col-xs-12 col-md-12 banner">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10000">
                      <!-- Indicators -->
                    <?php if (count($getContent) > 1){ ?>
                      <ol class="carousel-indicators">
                      <?php $i = 0; foreach($getContent as $header){ ?>
                          <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php  if ($i == 0) { echo 'active';} ?>"></li> 
                        
                     <?php $i++;} ?>	
                      </ol>
                <?php } ?>	
          <!-- Wrapper for slides -->
           <div class="carousel-inner carousel-header" role="listbox">
            <?php $i = 0; foreach($getContent as $header){ ?>
          
                <div class="item <?php  if ($i == 0) { echo 'active';} ?>">
                  <img src="<?php echo BASE_URL. $header['content_image']; ?>" alt="...">
                  
                    <div class="row ">
                        <div class="col-md-6 banner-quote">
                            <p> <?php echo strtoupper($header['content_desc']) ?></p>
                        </div>
                    </div>
                      
                </div>
          
            <?php $i++;} ?>	        
          </div>
       <?php if (count($getContent) > 1){ ?>
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
     <?php } ?>	        
          <div class="text-center current-page-container-material">
                                <a href="<?php echo BASE_URL; ?>">HOME</a> / 
                                <span class="current-page-contact">&nbsp <?php echo strtoupper($controller) ?></span>
           </div>
          
        </div>
      </div>
    </div>
  </div>           
                <div class="container-fluid service-motto-container">
                  <div class="custom-container service-motto">
                    <p><?php echo strtoupper($quote_head) ?></p>
                  </div>
                </div>      
               
   