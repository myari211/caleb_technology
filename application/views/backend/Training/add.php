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
                <?php echo $breadcrump['module_name']; ?> - Add                          
              </header>                        
              <div class="panel-body">                                
                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doAddContent'; ?>" method="post" class="form-horizontal" role="form">                                  
                  <?php if(isset($error)){ ?>                                
                  <div class="form-group has-error">                                    
                    <div class="col-lg-12">                                          
                      <label for="inputError" class="control-label">
                        <?php echo $error;?>
                      </label>                                    
                    </div>                                
                  </div>                                    
                  <?php } ?>                                
                  <input type="text" name="menu_id" id="echoActive"  value="<?php echo $menu_id;?>" style="display: none"/>                                                                                  
                  <div class="form-group">                                      
                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">
                      <?php echo $breadcrump['module_name']; ?> Title
                    </label>                                      
                    <div class="col-lg-4">                                          
                      <input name="content_title" type="text" class="form-control" placeholder="Content Title" value="<?php if(!empty($contenttitle)){echo $contenttitle;} ?>">                                      
                    </div>                                
                  </div>                                                                                        
                  <div class="form-group">                                      
                    <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">
                      <?php echo $breadcrump['module_name']; ?> Description
                    </label>                                      
                    <div class="col-lg-10">                                    
                      <textarea id="IDcontentdesc" name="content_desc" class="form-control ckeditor" placeholder="Content Description" rows="7">
                        <?php if(!empty($contentdesc)){echo $contentdesc;} ?>
                      </textarea>                                                                             
                    </div>                                
                  </div>                                                                                                  
                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">  Images</label>
                                      <div class="col-lg-4">
                                           <div style="margin-bottom:10px;" class="imageurl">
                                                <img id="imgurl" src="" style="max-width:400px; padding:5px; border:solid 1px #ccc;">                                   
                                                </div>
                                                <input type="text" name="content_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php if(!empty($contentimageurl)){echo $contentimageurl;} ?>" onchange="setVal(this);">
                                                <div style="margin-right:10px;">
                                                     <a class="btn btn-outline-primary btn-sm" data-toggle="modal"  href="javascript:;" data-target="#Modalimageurl" onClick="openKCFinder('categoryimageurl');" id="link-file" class="link"><i class="icon-eye-open"></i></a>
                                                    <a class="btn btn-outline-primary btn-sm" onClick="reset_value('imageurl');" id="link-file" class="link"><i class="icon-refresh"></i></a>
                                                 </div>
                                                <span class="m-form__help" style="color:#00F;">
                                                   width and height optimal is 240px x 240px
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
                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">
                      <?php echo $breadcrump['module_name']; ?> Alias URL
                    </label>                                      
                    <div class="col-lg-4">                                          
                      <input name="content_alias" type="text" class="form-control" placeholder="Content Alias" value="<?php if(!empty($contentalias)){echo $contentalias;} ?>">                                      
                    </div>                                
                  </div>				
                  <div class="form-group">                                      
                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">
                      <?php echo $breadcrump['module_name']; ?> Meta Description
                    </label>                                    
                    <div class="col-lg-4">                                        
                      <input name="content_metadescription" type="text" class="form-control" placeholder="Content Meta Description" value="<?php if(!empty($contentmetadescription)){echo $contentmetadescription;} ?>">                                    
                    </div>                                
                  </div>				
                  <div class="form-group">                                      
                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">
                      <?php echo $breadcrump['module_name']; ?> Meta Keywords
                    </label>                                    
                    <div class="col-lg-4">                                          
                      <input name="content_metakeywords" type="text" class="form-control" placeholder="Content Meta Keywords" value="<?php if(!empty($contentmetakeywords)){echo $contentmetakeywords;} ?>">                                    
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
  <!--common script for all pages-->    
  <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js">
  </script>          
</body>
</html	
