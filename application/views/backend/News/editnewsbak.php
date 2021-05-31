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
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEditNews/'.$rsNews[0]['news_id']; ?>" method="post" class="form-horizontal" role="form">
                              <?php if(isset($error)){ ?>
                                        <div class="form-group has-error">
                                                <div class="col-lg-12">
                                                      <label for="inputError" class="control-label"><?php echo $error;?></label>
                                                </div>
                                        </div>
                                        <?php } ?>
                                
                                <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">News Category</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="category_id" id="id_type">
                                            <?php foreach($Newscategory as $pg):?>
                                            <option <?php if($rsNews[0]['category_id'] == $pg->category_id ) echo 'selected';?> value='<?php echo $pg->category_id;?>'><?php echo $pg->category_title;?> </option>
                                            <?php endforeach ?>
                                        </select> 
                                        </div>
                                </div>
                                 
                               <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Title</label>
                                      <div class="col-lg-4">
                                          <input name="news_title" type="text" class="form-control" placeholder="News Title" value="<?php echo $rsNews[0]['news_title']; ?>">
                                         <input name="news_titleOld" type="hidden" value="<?php echo $rsNews[0]['news_title']; ?>">
                                       </div>
                                  </div>
                                
                                    <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">News Short Description</label>
                                      <div class="col-lg-10">
										  <textarea id="IDnewsshortdesc" name="news_shortdesc" class="form-control" placeholder="About Short Description" rows="4"><?php echo $rsNews[0]['news_short_desc']; ?></textarea>
										  <script>
												CKEDITOR.replace( 'IDnewsshortdesc', {
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
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">News Description</label>
                                      <div class="col-lg-10">
										  <textarea id="IDcontentdesc" name="news_desc" class="form-control ckeditor" placeholder="News Description" rows="7"><?php echo $rsNews[0]['news_desc']; ?></textarea>
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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Images</label>
                                                <?php
                                                      $news_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsNews[0]['news_image']);
                                                      if(!empty($rsNews[0]['news_image'])){
                                                              $news_image = BASE_URL.$rsNews[0]['news_image'];
                                                      } else {
                                                              $news_image = "";
                                                      }
                                                      ?>
                                      <div class="col-lg-4">
                                        <div style="margin-bottom:10px;" class="imageurl"><?php if(!empty($rsNews[0]['news_image'])){ ?><img src="<?php echo $news_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div>
                                        <input type="text" name="news_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $news_image ?>">
                                        <p class="help-block">width and height optimal is 400px x 400px</p>
                                        <div style="margin-right:10px;">
                                                      <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                      <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                         </div>
                                        </div>
                                  </div>
                                <div class="form-group">
                                    <label for="dtp_input2" class="col-md-2 control-label">Start Date</label>
                                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" size="16" type="text" value="<?php echo $rsNews[0]['news_publish_date']; ?>" >
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" id="dtp_input1" name="news_publish_date" value="<?php echo $rsNews[0]['news_publish_date']; ?>" /><br/>
                                </div>
                                    <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Tagging</label>
                                      <div class="col-lg-4">
                                    <select class="form-control" multiple="multiple" tabindex="1" name="newstag[]" id="tagPicker">
                                    <?php
                                    if(!empty($rsNews[0]['news_tagging'])){
                                            $news_tagging = explode(",",$rsNews[0]['news_tagging']);
                                            foreach($news_tagging as $tag){
                                                   echo "<option value='".$tag."' selected>".$tag."</option>";
                                            }
                                    }
                                    ?>
                                        <?php    
                                                foreach($tagging as $tag)                    
                                                {                                                      
                                                     echo "<option value=".$tag['tagging_title']." selected >".$tag['tagging_title']."</option>";
                                                }
                                                ?>
                                               
                                    </select>
                                  
                            </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Alias URL</label>
                                      <div class="col-lg-4">
                                          <input name="news_alias" type="text" class="form-control" placeholder="News Alias" value="<?php echo $rsNews[0]['news_alias']; ?>">
                                                    <input name="newsaliasOld" type="hidden" value="<?php echo $rsNews[0]['news_alias']; ?>">
                                           </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Meta Description</label>
                                      <div class="col-lg-4">
                                          <input name="news_metadescription" type="text" class="form-control" placeholder="News Meta Description" value="<?php echo $rsNews[0]['news_meta_description']; ?>">
                                </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Meta Keywords</label>
                                      <div class="col-lg-4">
                                          <input name="news_metakeywords" type="text" class="form-control" placeholder="News Meta Keywords" value="<?php echo $rsNews[0]['news_meta_keywords']; ?>">
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
	
	<script type="text/javascript">
//Select2
$.getScript('<?php echo JS_BASE_URL; ?>/select2.min.js',function(){
           
  /* dropdown and filter select */
  var select = $('#select2').select2();
  
  /* Select2 plugin as tagpicker */
  $("#tagPicker").select2({
    closeOnSelect:false
  });

}); //script         
      

$(document).ready(function() {});
</script>

<style type="text/css">
@import url('http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.css');
@import url('http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2-bootstrap.css');                                          
</style>
    <link href="<?php echo TOOLS_BASE_URL; ?>/bootstrap-datetimepicker/sample/bootstrap/css/bootstrap_icon.css" rel="stylesheet" type="text/css">
    <link href="<?php echo TOOLS_BASE_URL; ?>/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
    
    <script src="<?php echo TOOLS_BASE_URL; ?>/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script type="text/javascript">

	$('.form_date').datetimepicker({        
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

</script>
    <!--common script for all content-->
    <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js"></script>
</body>
</html	