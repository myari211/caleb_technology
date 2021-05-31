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
                             <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doAddNews'; ?>" method="post" class="form-horizontal" role="form">
                                  <?php if(isset($error)){ ?>
                                <div class="form-group has-error">
                                        <div class="col-lg-12">
                                              <label for="inputError" class="control-label"><?php echo $error;?></label>
                                        </div>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Title</label>
                                      <div class="col-lg-4">
                                          <input name="news_title" type="text" class="form-control" placeholder="News Title" value="<?php if(!empty($newstitle)){echo $newstitle;} ?>">
                                      </div>
                                </div> 
                                 <div class="form-group" id="btnAdd">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">News Category</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="category_id" id="id_type">
                                             <?php    
                                                foreach($Newscategory as $pg)                    
                                                {                                                      
                                                     echo "<option value=".$pg->category_id.">".$pg->category_title."</option>";
                                                }
                                                ?>
                                        </select> 
                                           
                                        </div>
                                    <div class="btn" onclick="addCat()"><i class="icon-plus"></i></div>
                                </div>
                                <div class="form-group" id="addCat" style="display: none">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Add Category</label>
                                      <div class="col-lg-4">
                                          <input name="category_title" type="text" class="form-control" placeholder="Category Title" value="<?php if(!empty($category_title)){echo $category_title;} ?>">                                      
                                      </div>
                                      <div class="btn" onclick="cancelCat()"><i class="icon-minus"></i></div>
                                </div> 
                               
                                
                                <div class="form-group">
                                    <label for="dtp_input1" class="col-md-2 control-label">Publish Date</label>
                                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" size="16" type="text" value="" readonly="">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" id="dtp_input1" name="news_publish_date" value="<?Php echo date("Y-m-d H:i:s");?>" /><br/>
                                </div>
                                
                             <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">News Short Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="IDnewsshortdesc" name="news_shortdesc" class="form-control" placeholder="About Short Description" rows="4"><?php if(!empty($news_shortdesc)){echo $news_shortdesc;} ?></textarea>
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
                                    <textarea id="IDcontentdesc" name="news_desc" class="form-control ckeditor" placeholder="News Description" rows="7"><?php if(!empty($newsdesc)){echo $newsdesc;} ?></textarea>
                                       
                                      </div>
                                </div>
                                
                                 <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Images</label>
                                      <div class="col-lg-4">
                                           <div style="margin-bottom:10px;" class="imageurl">
                                                <img id="imgurl" src="" style="max-width:400px; padding:5px; border:solid 1px #ccc;">                                   
                                                </div>
                                                <input type="text" name="news_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php if(!empty($newsimageurl)){echo $newsimageurl;} ?>" onchange="setVal(this);">
                                                <div style="margin-right:10px;">
                                                     <a class="btn btn-outline-primary btn-sm" data-toggle="modal"  href="javascript:;" data-target="#Modalimageurl" onClick="openKCFinder('categoryimageurl');" id="link-file" class="link"><i class="icon-eye-open"></i></a>
                                                    <a class="btn btn-outline-primary btn-sm" onClick="reset_value('imageurl');" id="link-file" class="link"><i class="icon-refresh"></i></a>
                                                 </div>
                                                <span class="m-form__help" style="color:#00F;">
                                                    width and height optimal is 400px x 400px
                                                </span>
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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Tagging</label>
                                      <div class="col-lg-4">
                                          <select class="form-control" multiple="multiple" tabindex="1" name="newstag[]" id="tagPicker">
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
                                          <input name="news_alias" type="text" class="form-control" placeholder="News Alias" value="<?php if(!empty($newsalias)){echo $newsalias;} ?>">
                                      </div>
                                </div>
                                 
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Meta Description</label>
                                    <div class="col-lg-4">
                                        <input name="news_metadescription" type="text" class="form-control" placeholder="News Meta Description" value="<?php if(!empty($newsmetadescription)){echo $newsmetadescription;} ?>">
                                    </div>
                                </div>
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">News Meta Keywords</label>
                                    <div class="col-lg-4">
                                          <input name="news_metakeywords" type="text" class="form-control" placeholder="News Meta Keywords" value="<?php if(!empty($newsmetakeywords)){echo $newsmetakeywords;} ?>">
                                    </div>
                                </div>
                                
                                
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                        <input name="tbSave" class="btn btn-info btn-sm" type="submit" value="Save">&nbsp;
                                        <input name="cancel" class="btn btn-info btn-sm" type="button" value="Cancel" onClick="location.href='<?php echo BASE_URL_BACKEND.'/news'; ?>'">
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
    <script src="<?php echo JS_BASE_URL; ?>/jquery.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo JS_BASE_URL; ?>/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/jquery.scrollTo.min.js"></script>
    
    <script src="<?php echo JS_BASE_URL; ?>/respond.min.js" ></script>
    

    
    <!--date pic-->
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
    $('.form_time').datetimepicker({
      
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });

</script>
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
    <!--common script for all pages-->
    <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js"></script>
</body>
</html	