<body>
	<section id="container" class="">
      <?php include VIEWS_PATH_BACKEND."/menu.php"; ?>
	  
	  <?php include VIEWS_PATH_BACKEND."/leftMenu.php"; ?>

	   <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
					<section class="panel">
                          <header class="panel-heading">
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> - Edit
                          </header>
                          <div class="panel-body">
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEditPage/'.$rsContent[0]['content_page_id']; ?>" method="post" class="form-horizontal" role="form">
                              <?php if(isset($error)){ ?>
                                        <div class="form-group has-error">
                                                <div class="col-lg-12">
                                                      <label for="inputError" class="control-label"><?php echo $error;?></label>
                                                </div>
                                        </div>
                                        <?php } ?>
                                 <input type="text" name="menu_id" id="echoActive"  value="<?php echo $rsContent[0]['menu_id']; ?>" style="display: none"/> 
                                 
                                 <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">About Page View</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="page_type" id="id_type">
                                            <?php foreach($Pageview as $pg):?>
                                            <option <?php if($rsContent[0]['page_type'] == $pg->page_type ) echo 'selected';?> value='<?php echo $pg->page_type;?>'><?php echo $pg->page_title;?> </option>
                                            <?php endforeach ?>
                                        </select> 
                                        </div>
                                </div>
                               <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">About Page Title</label>
                                      <div class="col-lg-4">
                                          <input name="content_page_title" type="text" class="form-control" placeholder="About Page Title" value="<?php echo $rsContent[0]['content_page_title']; ?>">
                                         <input name="content_page_titleOld" type="hidden" value="<?php echo $rsContent[0]['content_page_title']; ?>">
                                       </div>
                                  </div>
                                <div class="form-group" style="display:none">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">About Page Short Description</label>
                                      <div class="col-lg-10">
										  <textarea id="IDcontentshortdesc" name="content_page_shortdesc" class="form-control" placeholder="About Page Short Description" rows="4"><?php echo $rsContent[0]['content_page_short_desc']; ?></textarea>
										  <script>
												CKEDITOR.replace( 'IDcontentshortdesc', {
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
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">About Page Description</label>
                                      <div class="col-lg-10">
										  <textarea id="IDcontentdesc" name="content_page_desc" class="form-control ckeditor" placeholder="About Page Description" rows="7"><?php echo $rsContent[0]['content_page_desc']; ?></textarea>
											<script>
												CKEDITOR.replace( 'IDcontentdesc', {
													
													width : 900,
													height: 300,
													contentsCss : ["<?php echo CSS_BASE_URL;?>/style.css"]
												});
											</script>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">About Page Images</label>
                                                <?php
                                                      $content_page_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsContent[0]['content_page_image']);
                                                      if(!empty($rsContent[0]['content_page_image'])){
                                                              $content_page_image = $rsContent[0]['content_page_image'];
                                                      } else {
                                                              $content_page_image = "";
                                                      }
                                                      ?>
                                      <div class="col-lg-4">
                                        <div style="margin-bottom:10px;" class="imageurl">
                                            <?php if(!empty($rsContent[0]['content_page_image'])){ ?>
                                            <img id="imgurl" src="<?php echo $content_page_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div>
                                        <input type="text" name="content_page_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $content_page_image ?>" onchange="setVal(this);">
                                        <p class="help-block">width and height optimal is 400px x 400px</p>
                                       <div style="margin-right:10px;">
                                            <a class="btn btn-outline-primary btn-sm" data-toggle="modal"  href="javascript:;" data-target="#Modalimageurl" onClick="openKCFinder('categoryimageurl');" id="link-file" class="link"><i class="icon-eye-open"></i></a>
                                           <a class="btn btn-outline-primary btn-sm" onClick="reset_value('imageurl');" id="link-file" class="link"><i class="icon-refresh"></i></a>
                                        </div> 
                                      <script>
                                        function setVal(sel)
                                            {
                                                var url =sel.value;
                                                $("#imgurl").attr("src", url);

                                              }
                                        </script>
                                        </div>
                                  </div>
                                  <div class="modal fade" id="Modalimageurl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                        <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">
                                                                                &times;
                                                                        </span>
                                                                </button>
                                                        </div>
                                                    <div class="modal-body">
                                                        <iframe height="100%" width="100%" class="filemanager" src="<?=TOOLS_BASE_URL;?>/filemanager/dialog.php?type=1&field_id=imageurl&akey=2063c1608d6e0baf80249c42e2be5804&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll;  min-height: 400px;"></iframe>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Page File</label>
                                      <div class="col-lg-4">
                                          <div style="margin-bottom:10px;" class="imageurl">
                                            <img id="imgiconurl" src="<?=TOOLS_BASE_URL;?>/filemanager/img/ico/pdf.jpg" style="max-width:100px; padding:5px; border:solid 1px #ccc;">                                   
                                            </div>
                                            <input type="text" name="cataloguefileurl" readonly="readonly" id="fileurl" class="form-control" value="<?php echo $rsContent[0]['content_page_file']; ?>" onchange="setValFile(this);">
                                            <div style="margin-right:10px;">
                                                 <a data-toggle="modal"  href="javascript:;" data-target="#Modalfileurl" onClick="openKCFinder('cataloguefileurl');" class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x" id="link-file" class="link"><i class="icon-eye-open"></i></a>
                                                <a class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x" onClick="reset_value('fileurl');" id="link-file" class="link"><i class="icon-refresh"></i></a>
                                             </div>
                                            <span class="m-form__help" style="color:#00F;">
                                               Max 2 MB PDF
                                            </span>
                                            <script>
                                        function setValFile(sel)
                                            {
                                                var urls ='<?=TOOLS_BASE_URL;?>/filemanager/img/ico/pdf.jpg';
                                                $("#imgiconurl").attr("src", urls);

                                              }
                                        </script>
                                        </div>
                                </div>
                                 <div class="modal fade" id="Modalfileurl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">
                                                                        &times;
                                                                </span>
                                                        </button>
                                                </div>
                                            <div class="modal-body">
                                    <iframe height="100%" width="100%" class="filemanager" src="<?=TOOLS_BASE_URL;?>/filemanager/dialog.php?editor=tinymce&type=2&lang=en_EN&popup=0&crossdomain=0&field_id=fileurl&relative_url=0&akey=2063c1608d6e0baf80249c42e2be5804&fldr=Catalogue%2F&5c94a07ba98b4&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; min-height: 400px;"></iframe>
                                        </div>
                                        </div>
                                </div>
                        </div>
                         
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">About Page Alias URL</label>
                                      <div class="col-lg-4">
                                          <input name="content_page_alias" type="text" class="form-control" placeholder="About Page Alias" value="<?php echo @$rsContent[0]['content_page_alias']; ?>">
                                                    <input name="newsaliasOld" type="hidden" value="<?php echo @$rsContent[0]['content_page_alias']; ?>">
                                           </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">About Page Meta Description</label>
                                      <div class="col-lg-4">
                                          <input name="content_page_metadescription" type="text" class="form-control" placeholder="About Page Meta Description" value="<?php echo $rsContent[0]['content_page_meta_description']; ?>">
                                </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">About Page Meta Keywords</label>
                                      <div class="col-lg-4">
                                          <input name="content_page_metakeywords" type="text" class="form-control" placeholder="About Page Meta Keywords" value="<?php echo $rsContent[0]['content_page_meta_keywords']; ?>">
									 </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                        <input name="tbEdit" class="btn btn-info btn-sm" type="submit" value="Save">&nbsp;
                                        <input name="cancel" class="btn btn-info btn-sm" type="button" value="Cancel" onClick="location.href='<?php echo BASE_URL_BACKEND.'/'.$controller; ?>'">
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
	  
	  <?php include VIEWS_PATH_BACKEND."/footer.php"; ?>

	</section>
	
	<!-- js placed at the end of the document so the content load faster -->
     <!--  <script src="<?php //echo JS_BASE_URL; ?>/jquery.js"></script>-->
    <script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo JS_BASE_URL; ?>/jquery.dcjqaccordion.2.7.js"></script>
    
    <script src="<?php echo JS_BASE_URL; ?>/respond.min.js" ></script>
	
	<script src="<?php echo JS_BASE_URL; ?>/select2.min.js"></script>
	<link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/select2.min.css">
	<script>
	$(document).ready(function(){
		$("#IDnewstag").select2({
			 tags: true
		});
	});
	</script>
	
    <!--common script for all content-->
    <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js"></script>
</body>
</html	