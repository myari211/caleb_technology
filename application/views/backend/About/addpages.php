<script type="text/javascript">
    function del_subpage(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }
</script>


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
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> - Add
                          </header>
                        <div class="panel-body">
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doAddContentPages'; ?>" method="post" class="form-horizontal" role="form">
                                  <?php if(isset($error)){ ?>
                                <div class="form-group has-error">
                                    <div class="col-lg-12">
                                          <label for="inputError" class="control-label"><?php echo $error;?></label>
                                    </div>
                                </div>
                                    <?php } ?>
                               <input type="text" name="menu_id" id="echoActive"  value="<?php echo $menu_id;?>" style="display: none"/>
                                <?php if($NosubPage != 0) { ?>  
                               <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Page View</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="page_type" id="id_type">
                                             <?php foreach($Pageview as $pg):?>
                                            <option <?php if($page_type == $pg->page_type ) echo 'selected';?> value='<?php echo $pg->page_type;?>'><?php echo $pg->page_title;?> </option>
                                            <?php endforeach ?>
                                        </select> 
                                        </div>
                                </div>
                                 <?php } else {?> 
                                <input type="text" name="page_type"  value="1" style="display: none"/>
                                 <?php }?> 
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Page Title</label>
                                      <div class="col-lg-4">
                                          <input name="content_page_title" type="text" class="form-control" placeholder="<?php echo $breadcrump['module_name']; ?> Page Title" value="<?php if(!empty($content_page_stitle)){echo $content_page_title;} ?>">
                                      </div>
                                </div>                        
                                 <div class="form-group" style="display:none">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Page Short Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="IDworksshortdesc" name="content_page_shortdesc" class="form-control" placeholder="About Short Description" rows="4"><?php if(!empty($content_page_shortdesc)){echo $content_page_shortdesc;} ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'IDworksshortdesc', {
                                                toolbar: [
                                                        { name: 'document', items : [ 'Source'] },
                                                        { name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] },
                                                        { name: 'colors',      items : [ 'TextColor','BGColor' ] },
                                                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                                                        { name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] },
                                                 ],
                                                width : 900,
                                                height: 100
                                        });
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Page Description</label>
                                      <div class="col-lg-10">
                                    <textarea id="IDcontentdesc" name="content_page_desc" class="form-control ckeditor" placeholder="<?php echo $breadcrump['module_name']; ?> Page Description" rows="7"><?php if(!empty($content_page_desc)){echo $content_page_desc;} ?></textarea>
                                       
                                      </div>
                                </div>
                                 <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Page Images</label>
                                      <div class="col-lg-4">
                                            <div style="margin-bottom:10px;" class="imageurl"></div>
                                            <input type="text" name="content_page_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php if(!empty($content_page_imageurl)){echo $content_page_imageurl;} ?>">
                                            <p class="help-block">width and height optimal is 400px x 400px</p>
                                            <div style="margin-right:10px;">
                                                <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                            </div>
                                        </div>
                                </div>               
                        
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Page File</label>
                                      <div class="col-lg-4">
                                            <div style="margin-bottom:10px;" class="fileupl"></div>
                                            <input type="text" name="content_page_file" readonly="readonly" id="fileupl" class="form-control" value="<?php if(!empty($content_page_imageurl)){echo $content_page_imageurl;} ?>">
                                            <p class="help-block" style="color:#00F;">Pdf,Doc,Xls)</p>
                                            <div style="margin-right:10px;">
                                                <a onClick="openKCFinderFile('fileupl');" id="link-file" class="link">Browse</a>
                                                <a onClick="reset_value('fileupl');" id="link-file" class="link">Reset</a>
                                            </div>
                                        </div>
                                </div>
                             
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Page Meta Description</label>
                                    <div class="col-lg-4">
                                        <input name="content_page_metadescription" type="text" class="form-control" placeholder="<?php echo $breadcrump['module_name']; ?> Page Meta Description" value="<?php if(!empty($content_page_metadescription)){echo $content_page_metadescription;} ?>">
                                    </div>
                                </div>
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Page Meta Keywords</label>
                                    <div class="col-lg-4">
                                          <input name="content_page_metakeywords" type="text" class="form-control" placeholder="<?php echo $breadcrump['module_name']; ?> Page Meta Keywords" value="<?php if(!empty($content_page_metakeywords)){echo $content_page_metakeywords;} ?>">
                                    </div>
                                </div>
                                     
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                        <input name="tbSave" class="btn btn-info btn-sm" type="submit" value="Save">&nbsp;
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
	
	
	<!-- js placed at the end of the document so the pages load faster -->
   <!--  <script src="<?php //echo JS_BASE_URL; ?>/jquery.js"></script>-->
    <script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo JS_BASE_URL; ?>/jquery.dcjqsubpage.2.7.js"></script>
 
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
    
	<!--common script for all pages-->
    <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js"></script>
  
    
    
</body>
</html	