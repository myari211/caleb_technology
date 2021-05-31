 <div class="row">
                  <div class="col-lg-12">
                     <section class="panel">
                          <header class="panel-heading">
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> - HEADER Quote
                          </header>
                          <div class="panel-body">
                                    <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doAddHeadQuote'; ?>" method="post" class="form-horizontal" role="form">
                                  <?php if(isset($error)){ ?>
								  <div class="form-group has-error">
									  <div class="col-lg-12">
										<label for="inputError" class="control-label"><?php echo $error;?></label>
									  </div>
								  </div>
								  <?php } ?>
                                  <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Head Quote</label>
                                    <div class="col-lg-10">
                                       <textarea id="quote_desc" name="quote_desc" class="form-control" placeholder="Head Quote" rows="2"><?php if(!empty($quote_desc)){echo $quote_desc;} ?></textarea>
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