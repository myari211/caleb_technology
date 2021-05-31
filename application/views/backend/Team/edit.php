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
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEdit/'.$rsTeam[0]['team_id']; ?>" method="post" class="form-horizontal" role="form">
                              <?php if(isset($error)){ ?>
                                        <div class="form-group has-error">
                                                <div class="col-lg-12">
                                                      <label for="inputError" class="control-label"><?php echo $error;?></label>
                                                </div>
                                        </div>
                                        <?php } ?>
                                 <input type="text" name="menu_id" id="echoActive"  value="<?php echo $rsTeam[0]['menu_id']; ?>" style="display: none"/> 
                                 
                                 <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Position Level</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="position_id" id="id_type">
                                            <?php foreach($Position as $pg):?>
                                            <option <?php if($rsTeam[0]['position_id'] == $pg->position_id ) echo 'selected';?> value='<?php echo $pg->position_id;?>'><?php echo $pg->position_title;?> </option>
                                            <?php endforeach ?>
                                        </select> 
                                        </div>
                                </div>
                               <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Name</label>
                                      <div class="col-lg-4">
                                          <input name="team_title" type="text" class="form-control" placeholder="<?php echo $breadcrump['module_name']; ?>  Name" value="<?php echo $rsTeam[0]['team_title']; ?>">
                                         <input name="team_titleOld" type="hidden" value="<?php echo $rsTeam[0]['team_title']; ?>">
                                       </div>
                                  </div>
                                 <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?>  Position</label>
                                      <div class="col-lg-4">
                                          <input name="team_position" type="text" class="form-control" placeholder="<?php echo $breadcrump['module_name']; ?>  Position" value="<?php echo $rsTeam[0]['team_position']; ?>">
                                      </div>
                                </div>  
                                <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Description</label>
                                      <div class="col-lg-10">
                                        <textarea id="IDcontentdesc" name="team_desc" class="form-control ckeditor" placeholder="<?php echo $breadcrump['module_name']; ?> Description" rows="7"><?php echo $rsTeam[0]['team_desc']; ?></textarea>
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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"><?php echo $breadcrump['module_name']; ?> Images</label>
                                                <?php
                                                      $team_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsTeam[0]['team_image']);
                                                      if(!empty($rsTeam[0]['team_image'])){
                                                              $team_image = $rsTeam[0]['team_image'];
                                                      } else {
                                                              $team_image = "";
                                                      }
                                                      ?>
                                      <div class="col-lg-4">
                                        <div style="margin-bottom:10px;" class="imageurl"><?php if(!empty($rsTeam[0]['team_image'])){ ?><img src="<?php echo BASE_URL.$team_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div>
                                        <input type="text" name="team_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo BASE_URL.$team_image ?>">
                                        <p class="help-block">width and height optimal is 400px x 400px</p>
                                        <div style="margin-right:10px;">
                                                      <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                      <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                         </div>
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