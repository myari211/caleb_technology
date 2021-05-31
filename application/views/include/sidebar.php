 <div class="do-blog-sidebar col-md-4 col-sm-4 col-xs-12">
                    <!-- CATEGORY WIDGET -->
                    <div class="do-blog-sidebar-widget">
                        <?php   if(!empty($Blogcategory))  {   ?>
                        <h3 class="do-sidebar-widget-title">CATAGORIES</h3>
                        <ul>
                              <?php   foreach($Blogcategory as $pg)  {   ?>                     
                              <li>
                                <a href="<?php  echo BASE_URL.'/Blog/Category/'. $pg->category_title; ?>">
                                    <i class="fa fa-angle-right"></i> <?php  echo $pg->category_title; ?>
                                </a>
                               </li>                      
                            <?php }?>                   
                        </ul>
                        <?php }?>
                    </div>
                    <!-- CATEGORY WIDGET END -->

                    <!-- RECENT POST WIDGET -->
                    <div class="do-blog-sidebar-widget">
                        
                        <?php   if(!empty($getRecentBlog))  {   ?>
                        <h3 class="do-sidebar-widget-title">RECENT POSTS</h3>
                        <ul>
                             <?php   foreach($getRecentBlog as $gb)  {   ?>                     
                              <li>
                                <a href="<?php if ($gb->blog_alias!= ''){echo BASE_URL.'/'.$gb->blog_alias;}else {echo BASE_URL.'Blog/detail/'.$gb->blog_id;} ?>">
                                    <i class="fa fa-angle-right"></i> <?php  echo $gb->blog_title; ?>
                                </a>
                               </li>                   
                                                     
                            <?php }?>                
                        </ul>
                      <?php }?>
                    </div>
                    <!-- RECENT POST WIDGET END -->

                    <!-- TAG CLOUD WIDGET -->
                  
                    <!-- TAG CLOUD WIDGET END -->
                </div>