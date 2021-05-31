 <div class="row">
                  <div class="col-lg-12">
                     <section class="panel">
                          <header class="panel-heading">
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> - Quote
                          </header>
                          <div class="panel-body">
                                    <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doAddQuote'; ?>" method="post" class="form-horizontal" role="form">
                                  <?php if(isset($error)){ ?>
								  <div class="form-group has-error">
									  <div class="col-lg-12">
										<label for="inputError" class="control-label"><?php echo $error;?></label>
									  </div>
								  </div>
								  <?php } ?>
                                  
				<div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Brand Quote</label>
                                    <div class="col-lg-10">
                                       <textarea id="brand_quote" name="brand_quote" class="form-control" placeholder="Brand Quote" rows="2"><?php if(!empty($brand_quote)){echo $brand_quote;} ?></textarea>
                                    </div>
                                  </div> 
                                  <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Event Quote</label>
                                    <div class="col-lg-10">
                                       <textarea id="event_quote" name="event_quote" class="form-control" placeholder="Event Quote" rows="2"><?php if(!empty($event_quote)){echo $event_quote;} ?></textarea>
                                    </div>
                                  </div>      
                             
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                        <input name="tbSave" class="btn btn-info btn-sm" type="submit" value="Save">&nbsp;
                                        <input name="cancel" class="btn btn-info btn-sm" type="button" value="Cancel" onClick="location.href='<?php echo BASE_URL_BACKEND.'/training'; ?>'">
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>