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
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doAdd'; ?>" method="post" class="form-horizontal" role="form">
                                  <?php if(isset($error)){ ?>
                                <div class="form-group has-error">
                                    <div class="col-lg-12">
                                          <label for="inputError" class="control-label"><?php echo $error;?></label>
                                    </div>
                                </div>
                                    <?php } ?>
                               
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Client Title</label>
                                      <div class="col-lg-4">
                                          <input name="client_title" type="text" class="form-control" placeholder="Client Title" value="<?php if(!empty($client_title)){echo $client_title;} ?>">
                                      </div>
                                </div>  
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Client Images</label>
                                      <div class="col-lg-4">
                                            <div style="margin-bottom:10px;" class="imageurl"></div>
                                            <input type="text" name="client_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php if(!empty($client_imageurl)){echo $client_imageurl;} ?>">
                                            <p class="help-block">width and height optimal is 240px x 240px</p>
                                            <div style="margin-right:10px;">
                                                <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                            </div>
                                        </div>
                                </div>
                                 <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Highlight </label>
                                      <div class="col-lg-4">
                                           <input type="checkbox" value="1" id="client_highlight" name="client_highlight">
                                      </div>
                                </div>       
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Client Meta Description</label>
                                    <div class="col-lg-4">
                                        <input name="client_metadescription" type="text" class="form-control" placeholder="Client Meta Description" value="<?php if(!empty($client_metadescription)){echo $client_metadescription;} ?>">
                                    </div>
                                </div>
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Client Meta Keywords</label>
                                    <div class="col-lg-4">
                                          <input name="client_metakeywords" type="text" class="form-control" placeholder="Client Meta Keywords" value="<?php if(!empty($client_metakeywords)){echo $client_metakeywords;} ?>">
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
    
	<!--common script for all pages-->
    <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js"></script>
  
    
<script type="text/javascript">
    function addCat(){
        $("#btnAdd").hide(); 
       $("#addCat").show();
	} 
    function cancelCat(){
       $("#btnAdd").show(); 
       $("#addCat").hide();
	} 
    
</script>
    
</body>
</html	