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
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> - Add Vision Mision
                          </header>
                        <div class="panel-body">
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doAddVisionMision'; ?>" method="post" class="form-horizontal" role="form">
                                  <?php if(isset($error)){ ?>
                                <div class="form-group has-error">
                                    <div class="col-lg-12">
                                          <label for="inputError" class="control-label"><?php echo $error;?></label>
                                    </div>
                                </div>
                                    <?php } ?>
                              
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Title</label>
                                      <div class="col-lg-4">
                                          <input name="vimis_title" type="text" class="form-control" placeholder="Title" value="<?php if(!empty($vimis_stitle)){echo $vimis_title;} ?>">
                                      </div>
                                </div>                        
                                 <div class="form-group" style="display:none">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Short Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="IDworksshortdesc" name="vimis_shortdesc" class="form-control" placeholder="About Short Description" rows="4"><?php if(!empty($vimis_shortdesc)){echo $vimis_shortdesc;} ?></textarea>
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
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Description</label>
                                      <div class="col-lg-10">
                                    <textarea id="IDcontentdesc" name="vimis_desc" class="form-control ckeditor" placeholder="Description" rows="7"><?php if(!empty($vimis_desc)){echo $vimis_desc;} ?></textarea>
                                       
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