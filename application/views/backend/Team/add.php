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
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?>  - Add
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
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?>  Position Level</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="position_id" id="id_type">
                                             <?php foreach($Position as $pg):?>
                                            <option <?php if($position_id == $pg->position_id ) echo 'selected';?> value='<?php echo $pg->position_id;?>'><?php echo $pg->position_title;?> </option>
                                            <?php endforeach ?>
                                        </select> 
                                        </div>
                                </div>
                                 
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?>  Name</label>
                                      <div class="col-lg-4">
                                          <input name="team_title" type="text" class="form-control" placeholder="<?php echo $breadcrump['module_name']; ?>  Name " value="<?php if(!empty($team_stitle)){echo $team_title;} ?>">
                                      </div>
                                </div>  
                               <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?>  Position</label>
                                      <div class="col-lg-4">
                                          <input name="team_position" type="text" class="form-control" placeholder="<?php echo $breadcrump['module_name']; ?>  Position" value="<?php if(!empty($team_position)){echo $team_position;} ?>">
                                      </div>
                                </div>   
                                <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Description</label>
                                      <div class="col-lg-10">
                                    <textarea id="IDcontentdesc" name="team_desc" class="form-control ckeditor" placeholder="<?php echo $breadcrump['module_name']; ?> Description" rows="7"><?php if(!empty($team_desc)){echo $team_desc;} ?></textarea>
                                       
                                      </div>
                                </div>
                                                
                        
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Images</label>
                                      <div class="col-lg-4">
                                            <div style="margin-bottom:10px;" class="imageurl"></div>
                                            <input type="text" name="team_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php if(!empty($team_imageurl)){echo $team_imageurl;} ?>">
                                            <p class="help-block">width and height optimal is 400px x 400px</p>
                                            <div style="margin-right:10px;">
                                                <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                            </div>
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