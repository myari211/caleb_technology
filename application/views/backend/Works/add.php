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
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Selects Menu</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="menu_id" id="echoActive"  value="" style="display: none"/> 
                                         <?php include 'vopt_menu.php'; ?> 
                                    </div>                                      
                                </div>
                                    
                                <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Services</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="services_id" id="services_id">
                                             <?php    
                                                foreach($Services as $pg)                    
                                                {                                                      
                                                     echo "<option value=".$pg->services_id.">".$pg->services_title."</option>";
                                                }
                                                ?>
                                        </select> 
                                           
                                        </div>
                                  
                                </div>    
                                    
                                <div class="form-group" id="btnAdd">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Works Category</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="category_id" id="id_type">
                                             <?php    
                                                foreach($Workscategory as $pg)                    
                                                {                                                      
                                                     echo "<option value=".$pg->category_id.">".$pg->category_title."</option>";
                                                }
                                                ?>
                                        </select> 
                                           
                                        </div>
                                    <div class="btn" onclick="addCat()"><i class="icon-plus"></i></div>
                                </div>
                                 <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Works Category Tag</label>
                                        <div class="col-lg-8">
                                       
                                             <?php    
                                                foreach($Workscategory as $pg)                    
                                                {?>                                                      
                                                  <div id="check-box">
                                                    <input type="checkbox" name="categotu_tag[]" id="checkboxG<?php echo $pg->category_id; ?>" value="<?php echo $pg->category_id;?>" class="css-checkbox" />
                                                    <label for="checkboxG<?php echo $pg->category_id; ?>" class="css-label"> <?php echo $pg->category_title; ?> </label>
                                                    </div> 
                                               <?php }
                                                ?>
                                       
                                           
                                        </div>
                                   
                                </div>   
                                    
                                    
                                    <div class="form-group" id="addCat" style="display: none">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Add Category</label>
                                      <div class="col-lg-4">
                                          <input name="category_title" type="text" class="form-control" placeholder="Category Title" value="<?php if(!empty($category_title)){echo $category_title;} ?>">                                      
                                      </div>
                                      <div class="btn" onclick="cancelCat()"><i class="icon-minus"></i></div>
                                </div> 
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Works Title</label>
                                      <div class="col-lg-4">
                                          <input name="works_title" type="text" class="form-control" placeholder="Works Title" value="<?php if(!empty($works_title)){echo $works_title;} ?>">
                                      </div>
                                </div>                        
                                <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Works Short Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="IDworksshortdesc" name="works_shortdesc" class="form-control" placeholder="About Short Description" rows="4"><?php if(!empty($works_shortdesc)){echo $works_shortdesc;} ?></textarea>
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
                                                height: 200
                                        });
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Works Description</label>
                                      <div class="col-lg-10">
                                    <textarea id="IDworksdesc" name="works_desc" class="form-control ckeditor" placeholder="Works Description" rows="7"><?php if(!empty($works_desc)){echo $works_desc;} ?></textarea>
                                       
                                      </div>
                                </div>
                                    
                                    
                                 <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Works About </label>
                                    <div class="col-lg-10">
                                        <textarea id="IDworksaboutdesc" name="works_about" class="form-control" placeholder="About Short Description" rows="4"><?php if(!empty($works_about)){echo $works_about;} ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'IDworksaboutdesc', {
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
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Works Client</label>
                                    <div class="col-lg-10">
                                        <textarea id="IDworkclient" name="works_client" class="form-control" placeholder="About Short Description" rows="4"><?php if(!empty($works_client)){echo $works_client;} ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'IDworkclient', {
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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Highlight </label>
                                      <div class="col-lg-4">
                                           <input type="checkbox" value="1" id="works_highlight" name="works_highlight">
                                      </div>
                                </div>                 
                
                                <div style="clear:both;"></div>   <div style="clear:both;"></div>                  
                                
                                
                                    
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Works Images</label>
                                      <div class="col-lg-4">
                                            <div style="margin-bottom:10px;" class="imageurl"></div>
                                            <input type="text" name="works_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php if(!empty($works_imageurl)){echo $works_imageurl;} ?>">
                                            <p class="help-block">width and height optimal is 400px x 400px</p>
                                            <div style="margin-right:10px;">
                                                <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Works Alias URL</label>
                                      <div class="col-lg-4">
                                          <input name="works_alias" type="text" class="form-control" placeholder="Works Alias" value="<?php if(!empty($works_alias)){echo $works_alias;} ?>">
                                      </div>
                                </div>
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Works Meta Description</label>
                                    <div class="col-lg-4">
                                        <input name="works_metadescription" type="text" class="form-control" placeholder="Works Meta Description" value="<?php if(!empty($works_metadescription)){echo $works_metadescription;} ?>">
                                    </div>
                                </div>
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Works Meta Keywords</label>
                                    <div class="col-lg-4">
                                          <input name="works_metakeywords" type="text" class="form-control" placeholder="Works Meta Keywords" value="<?php if(!empty($works_metakeywords)){echo $works_metakeywords;} ?>">
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