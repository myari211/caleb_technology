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
                <?php echo $breadcrump['module_group_name']; ?> - 
                <?php echo $breadcrump['module_name']; ?> - Edit                          
              </header>                          
              <div class="panel-body">                                
                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEdit/'.$rsServices[0]['services_id']; ?>" method="post" class="form-horizontal" role="form">                              
                  <?php if(isset($error)){ ?>                                        
                  <div class="form-group has-error">                                                
                    <div class="col-lg-12">                                                      
                      <label for="inputError" class="control-label">
                        <?php echo $error;?>
                      </label>                                                
                    </div>                                        
                  </div>                                        
                  <?php } ?>                                                                
                  <div class="form-group">                                    
                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Selects Menu
                    </label>                                    
                    <div class="col-lg-10">                                        
                      <input type="text" name="menu_id" id="echoActive"  value="<?php echo $rsServices[0]['menu_id']; ?>" style="display: none"/>                                          
                      <?php include 'vopt_menu.php'; ?>                                     
                    </div>                                                                      
                  </div>                                 
                  <div class="form-group">                                    
                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Services View
                    </label>                                        
                    <div class="col-lg-4">                                        
                      <select class="form-control" name="page_type" id="id_type">                                            
                        <?php foreach($Pageview as $pg):?>                                            
                        <option 
                                <?php if($rsServices[0]['page_type'] == $pg->page_type ) echo 'selected';?> value='
                        <?php echo $pg->page_type;?>'>
                        <?php echo $pg->page_title;?> 
                        </option>                                            
                      <?php endforeach ?>                                        
                      </select>                                         
                  </div>                                
                  </div>                               
                <div class="form-group">                                      
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Services Title
                  </label>                                      
                  <div class="col-lg-4">                                          
                    <input name="services_title" type="text" class="form-control" placeholder="Services Title" value="<?php echo $rsServices[0]['services_title']; ?>">                                         
                    <input name="services_titleOld" type="hidden" value="<?php echo $rsServices[0]['services_title']; ?>">                                       
                  </div>                                  
                </div>                                
                <div class="form-group">                                      
                  <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Services Short Description
                  </label>                                      
                  <div class="col-lg-10">										  
                    <textarea id="IDcontentshortdesc" name="services_shortdesc" class="form-control" placeholder="Services Short Description" rows="4">
                      <?php echo $rsServices[0]['services_short_desc']; ?>
                    </textarea>										  
                    <script>												CKEDITOR.replace( 'IDcontentshortdesc', {
                        toolbar: [														{
                          name: 'document', items : [ 'Source'] }
                                  ,														{
                                    name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] }
                                  ,														{
                                    name: 'colors',      items : [ 'TextColor','BGColor' ] }
                                  ,														{
                                    name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] }
                                  ,														{
                                    name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] }
                                  ,													 ],													width : 900,													height: 200												}
                                                                                            );
                    </script>									 
                  </div>                                  
                </div>								  
                <div class="form-group">                                      
                  <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Services Description
                  </label>                                      
                  <div class="col-lg-10">										  
                    <textarea id="IDcontentdesc" name="services_desc" class="form-control ckeditor" placeholder="Services Description" rows="7">
                      <?php echo $rsServices[0]['services_desc']; ?>
                    </textarea>											
                    <script>												CKEDITOR.replace( 'IDcontentdesc', {
                        width : 900,													height: 300,													contentsCss : ["<?php echo CSS_BASE_URL;?>/style.css"]												}
                                                                                            );
                    </script>                                      
                  </div>                                  
                </div>                                     
                <div class="form-group">                                      
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Services Images
                  </label>                                                
                  <?php                                                      $services_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsServices[0]['services_image']);                                                      if(!empty($rsServices[0]['services_image'])){                                                              $services_image = BASE_URL.$rsServices[0]['services_image'];                                                      } else {                                                              $services_image = "";                                                      }                                                      ?>                                      
                  <div class="col-lg-4">                                        
                    <div style="margin-bottom:10px;" class="imageurl">
                      <?php if(!empty($rsServices[0]['services_image'])){ ?>
                      <img src="<?php echo $services_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;">
                      <?php } ?>
                    </div>                                        
                    <input type="text" name="services_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $services_image ?>">                                        
                    <p class="help-block">width and height optimal is 1350px x 370px
                    </p>                                        
                    <div style="margin-right:10px;">                                                      
                      <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse
                      </a>                                                      
                      <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset
                      </a>                                         
                    </div>                                        
                  </div>                                  
                </div>                                                                        
                <div class="form-group">                                      
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Services Background 1
                  </label>                                                
                  <?php                                                      $services_background1_thumbs = str_replace('/admin/images','/admin/.thumbs/images',$rsServices[0]['services_background1']);                                                      if(!empty($rsServices[0]['services_background1'])){                                                              $services_background1 = $rsServices[0]['services_background1'];                                                      } else {                                                              $services_background1 = "";                                                      }                                                      ?>                                      
                  <div class="col-lg-4">                                        
                    <div style="margin-bottom:10px;" class="imageurlbg1">
                      <?php if(!empty($rsServices[0]['services_background1'])){ ?>
                      <img src="<?php echo $services_background1; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;">
                      <?php } ?>
                    </div>                                        
                    <input type="text" name="services_background1" readonly="readonly" id="imageurlbg1" class="form-control" value="<?php echo $services_background1;?>">                                        
                    <p class="help-block">width and height optimal is 400px x 400px
                    </p>                                        
                    <div style="margin-right:10px;">                                                      
                      <a onClick="openKCFinder('imageurlbg1');" id="link-file" class="link">Browse
                      </a>                                                      
                      <a onClick="reset_value('imageurlbg1');" id="link-file" class="link">Reset
                      </a>                                         
                    </div>                                        
                  </div>                                  
                </div>                                    
                <div class="form-group">                                      
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Services Background 2
                  </label>                                                
                  <?php                                                      $services_background2_thumbs = str_replace('/admin/images','/admin/.thumbs/images',$rsServices[0]['services_background2']);                                                      if(!empty($rsServices[0]['services_background2'])){                                                              $services_background2 = $rsServices[0]['services_background2'];                                                      } else {                                                              $services_background2 = "";                                                      }                                                      ?>                                      
                  <div class="col-lg-4">                                        
                    <div style="margin-bottom:10px;" class="imageurlbg2">
                      <?php if(!empty($rsServices[0]['services_background2'])){ ?>
                      <img id="imgurl" src="<?php echo $services_background2; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;">
                      <?php } ?>
                    </div>                                        
                    <input type="text" name="services_background2" readonly="readonly" id="imageurlbg2" class="form-control" value="<?php echo $services_background2;?>" onchange="setVal(this);">                                       
                   <span class="m-form__help" style="color:#00F;">
                                      width and height optimal is 1350px x 370px 
                    </span>                                       
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
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Highlight 
                  </label>                                      
                  <div class="col-lg-4">                                                                                    
                    <input type="checkbox" value="1" id="services_highlight" name="services_highlight" 
                           <?php if ($rsServices[0]['services_highlight'] == 1){ echo 'checked'; }?> >                                       
                  </div>                                
                </div>                                 
                <div class="form-group">                                      
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Services Alias URL
                  </label>                                      
                  <div class="col-lg-4">                                          
                    <input name="services_alias" type="text" class="form-control" placeholder="Services Alias" value="<?php echo $rsServices[0]['services_alias']; ?>">                                                    
                    <input name="newsaliasOld" type="hidden" value="<?php echo $rsServices[0]['services_alias']; ?>">                                           
                  </div>                                  
                </div>                                
                <div class="form-group">                                      
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Services Meta Description
                  </label>                                      
                  <div class="col-lg-4">                                          
                    <input name="services_metadescription" type="text" class="form-control" placeholder="Services Meta Description" value="<?php echo $rsServices[0]['services_meta_description']; ?>">                                
                  </div>                                  
                </div>                                
                <div class="form-group">                                      
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Services Meta Keywords
                  </label>                                      
                  <div class="col-lg-4">                                          
                    <input name="services_metakeywords" type="text" class="form-control" placeholder="Services Meta Keywords" value="<?php echo $rsServices[0]['services_meta_keywords']; ?>">									 
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
<script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js">
</script>    
<script class="include" type="text/javascript" src="<?php echo JS_BASE_URL; ?>/jquery.dcjqaccordion.2.7.js">
</script>        
<script src="<?php echo JS_BASE_URL; ?>/respond.min.js" >
</script>		
<script src="<?php echo JS_BASE_URL; ?>/select2.min.js">
</script>	
<link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/select2.min.css">	
<script>	$(document).ready(function(){
    $("#IDnewstag").select2({
      tags: true		}
                           );
  }
                             );
</script>	    
<!--common script for all content-->    
<script src="<?php echo JS_BASE_URL; ?>/common-scripts.js">
</script>
</body>
</html	
