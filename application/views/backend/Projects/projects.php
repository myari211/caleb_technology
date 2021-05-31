  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> -  List
                          </header>
						  <?php if(isset($error)){ ?>
						  <div class="panel-body">
							  <div class="form-group has-error">
								  <label for="inputError" class="col-sm-2 control-label col-lg-2"><?php echo $error;?></label>
							  </div>
						  </div>
						  <?php } ?>
						  
						  <div class="panel-body">
							<div class="col-lg-12">
								<?php if($add){ ?>
									<input class="btn btn-primary btn-sm" type="button" value="Add" onclick="window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/add/'">
								<?php } ?>
                                                               
                                                               
							</div>
						  </div>
						  
						
						
                          <div class="panel-body">
                              <section id="unseen">
                               
                                
                                <table class="table table-bordered table-striped table-condensed table-hover" id="data_sort">
                                  <thead>
                                  <tr>
                                      <th width="5">No</th>
                                      <th>Projects Title</th>
                                      <th>Start Date</th>
                                      <th>End Date</th>
                                      <th>Location</th>
                                      <th class="no-sort" width="140">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  
                                  <?php
                                    if(count($ListProjects) > 0){
                                    $no=0;
                                    foreach($ListProjects as $projects){
                                            $no++;
                                    ?>
                                    <tr>
                                      <td><?php echo $no;?></td>
                                      
                                      <td><?php echo $projects['projects_title'];?></td> 
                                      
                                     
                                      <td><?php echo date_convert($projects['projects_start_date']);?></td>
                                      <td>
                                          <?php if ($projects['projects_end_date'] == '00-00-0000 00:00:00')  { echo 'On Going';} 
                                           else { echo date_convert($projects['projects_end_date']);} ?>
                                      </td>
                                      <td><?php echo $projects['projects_location'];?></td>       
                                      <td>  
                                            <?php if($approve){ ?>
                                                    <?php if($projects['projects_active_status'] == 1) {?>
                                                            <a class="btn-success btn-sm" title="Click to Inactive" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$projects['projects_id'];?>"><i class="icon-ok"></i></a> &nbsp; 
                                                    <?php } else { ?>
                                                            <a class="btn-danger btn-sm" title="Click to Active" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$projects['projects_id'];?>"><i class="icon-remove"></i></a> &nbsp;
                                                    <?php } ?>
                                            <?php } ?>

                                            <?php if($edit){ ?>
                                                    <a class="btn-primary btn-sm" title="Click to Edit" href="<?php echo BASE_URL_BACKEND.'/'.$controller;?>/edit/<?php echo $projects['projects_id'];?>"><i class="icon-pencil"></i></a> &nbsp; 
                                            <?php } ?>

                                            <?php if($delete){ ?>
                                                    <a class="btn-danger btn-sm" title="Click to Delete" onclick="var answer = confirm('delete <?php echo $projects['projects_title'];?> ?'); if (answer){window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/delete/<?php echo $projects['projects_id'];?>';}"><span class="icon-trash"></span></a> &nbsp;
                                            <?php } ?>
                                      </td>
                                      
                                      
                                    </tr>
                                    <?php } ?>
                                    <?php } else {?>
                                    <tr>
                                        <td align="center" colspan="10">Data Not Found</td>
                                    </tr>
                                    <?php } ?>
                                    
                                        </tbody>
                                    </table>
                                  
                              </section>
                          </div>
						  <?php //echo($paging); ?>
                        </section>
                  </div>
              </div>