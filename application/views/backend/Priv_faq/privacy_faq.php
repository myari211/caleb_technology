 <div class="row">
                  <div class="col-lg-12">
                     <section class="panel">
                          <header class="panel-heading">
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> 
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
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Title</label>
                                    <div class="col-lg-10">
                                       <textarea id="title" name="title" class="form-control" placeholder="Title" rows="2"><?php if(!empty($title)){echo $title;} ?></textarea>
                                    </div>
                                  </div> 
                                    
                             <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Desc</label>
                                    <div class="col-lg-10">
                                        <textarea id="IDprivshortdesc" name="desc" class="form-control" placeholder="About Short Description" rows="4"><?php if(!empty($desc)){echo $desc;} ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'IDprivshortdesc', {
                                                toolbar: [
                                                        { name: 'document', items : [ 'Source'] },
                                                        { name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] },
                                                        { name: 'colors',      items : [ 'TextColor','BGColor' ] },
                                                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                                                        { name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] },
                                                 ],
                                                width : 900,
                                                height: 200
                                        });
                                        </script>
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