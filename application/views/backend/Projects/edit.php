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
                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEdit/'.$rsProjects[0]['projects_id']; ?>" method="post" class="form-horizontal" role="form">                                
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
                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Projects Client
                    </label>                                    
                    <div class="col-lg-4">                                    
                      <select class="form-control" name="client_id" id="client_id">                                        
                        <?php foreach($Projectsclient as $pg):?>                                        
                        <option 
                                <?php if($rsProjects[0]['client_id'] == $pg->client_id ) echo 'selected';?> value='
                        <?php echo $pg->client_id;?>'>
                        <?php echo $pg->client_title;?> 
                        </option>                                        
                      <?php endforeach ?>                                    
                      </select>                                     
                  </div>                            
                  </div>                              
                <div class="form-group">                                
                  <label for="menu" class="col-lg-2 col-sm-2 control-label">Projects User
                  </label>                                    
                  <div class="col-lg-4">                                    
                    <select class="form-control" name="user_id" id="client_id">                                        
                      <?php foreach($Projectsclient as $pg):?>                                        
                      <option 
                              <?php if($rsProjects[0]['user_id'] == $pg->client_id ) echo 'selected';?> value='
                      <?php echo $pg->client_id;?>'>
                      <?php echo $pg->client_title;?> 
                      </option>                                        
                    <?php endforeach ?>                                    
                    </select>                                     
                </div>                            
              </div>                               
              <div class="form-group">                                   
                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Projects Title
                </label>                                   
                <div class="col-lg-4">                                       
                  <input name="projects_title" type="text" class="form-control" placeholder="Projects Title" value="<?php echo $rsProjects[0]['projects_title']; ?>">                                      
                  <input name="projects_titleOld" type="hidden" value="<?php echo $rsProjects[0]['projects_title']; ?>">                                    
                </div>                            
              </div>                            
              <div class="form-group">                                 
                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Projects Services
                </label>                                 
                <div class="col-lg-4">                                     
                  <input name="projects_services" type="text" class="form-control" placeholder="Projects Services" value="<?php echo $rsProjects[0]['projects_services']; ?>">                                 
                </div>                            
              </div>                                                                 
              <div class="form-group">                              
                <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Projects Description
                </label>                              
                <div class="col-lg-10">                            
                  <textarea id="IDprojectsdesc" name="projects_desc" class="form-control ckeditor" placeholder="Projects Description" rows="7">
                    <?php echo $rsProjects[0]['projects_desc']; ?>
                  </textarea>                                    
                  <script>                                        CKEDITOR.replace( 'IDprojectsdesc', {
                      toolbar: [                                                        {
                        name: 'document', items : [ 'Source'] }
                                ,                                                        {
                                  name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] }
                                ,                                                        {
                                  name: 'colors',      items : [ 'TextColor','BGColor' ] }
                                ,                                                        {
                                  name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] }
                                ,                                                        {
                                  name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] }
                                ,                                                 ],                                                width : 900,                                                height: 200                                        }
                                                                                  );
                  </script>                              
                </div>                            
              </div>                            
              <div class="form-group">                                
                <label for="dtp_input1" class="col-md-2 control-label">Start Date
                </label>                                
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">                                    
                  <input class="form-control" size="16" type="text" value="<?php echo date('Y-m-d', strtotime($rsProjects[0]['projects_start_date'])); ?>" >                                    
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-remove">
                    </span>
                  </span>                                    
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                  </span>                                
                </div>                                
                <input type="hidden" id="dtp_input1" name="projects_start_date" value="<?php echo date('Y-m-d', strtotime($rsProjects[0]['projects_start_date'])); ?>" />
                <br/>                            
              </div>                            
              <div class="form-group">                                
                <label for="dtp_input2" class="col-md-2 control-label">End Date
                </label>                                
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">                                    
                  <input class="form-control" size="16" type="text" value="<?php echo date('Y-m-d', strtotime($rsProjects[0]['projects_end_date'])); ?>" >                                    
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-remove">
                    </span>
                  </span>                                    
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                  </span>                                
                </div>                                
                <input type="hidden" id="dtp_input2" name="projects_end_date" value="<?php echo date('Y-m-d', strtotime($rsProjects[0]['projects_end_date'])); ?>" />
                <br/>                            
              </div>                                                                 
              <div class="form-group">                                
                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Projects Location
                </label>                                
                <div class="col-lg-4">                                    
                  <input name="projects_location" type="text" class="form-control" placeholder="Projects Location" value="<?php echo $rsProjects[0]['projects_location']; ?>">                                
                </div>                            
              </div>                             
              <div class="form-group">                              
                <label for="projects_highlight" class="col-lg-2 col-sm-2 control-label">Highlight 
                </label>                              
                <div class="col-lg-4">                                    
                  <?php if($rsProjects[0]['projects_highlight'] == 1){ ?>                                  
                  <input type="checkbox" value="1" id="projects_highlight" name="projects_highlight" checked="">                                    
                  <?php } else { ?>                                    
                  <input type="checkbox" value="1" id="projects_highlight" name="projects_highlight">                                    
                  <?php }?>                              
                </div>                            
              </div>    
                  
             <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"> Images</label>
                        <?php                                              
                            $projects_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsProjects[0]['projects_image']);  
                            if(!empty($rsProjects[0]['projects_image'])){  
                                $projects_image = BASE_URL.$rsProjects[0]['projects_image'];
                                } else {                                                      
                                    $projects_image = "";                                              

                                }                                              
                        ?>  
                                      <div class="col-lg-4">
                                          <div style="margin-bottom:10px;" class="imageurl">
                                                     <?php if(!empty($rsProjects[0]['projects_image'])){ ?>
                                                    <img id="imgurl" src="<?php echo $projects_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;">
                                                    <?php } ?>
                                                  </div>    
                                                <input type="text" name="content_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $projects_image; ?>" onchange="setVal(this);">
                                                <div style="margin-right:10px;">
                                                     <a class="btn btn-outline-primary btn-sm" data-toggle="modal"  href="javascript:;" data-target="#Modalimageurl" onClick="openKCFinder('categoryimageurl');" id="link-file" class="link"><i class="icon-eye-open"></i></a>
                                                    <a class="btn btn-outline-primary btn-sm" onClick="reset_value('imageurl');" id="link-file" class="link"><i class="icon-refresh"></i></a>
                                                 </div>
                                                <span class="m-form__help" style="color:#00F;">
                                                   width and height optimal is 1350px x 370px
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
                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Projects Meta Description
                </label>                                      
                <div class="col-lg-4">                                          
                  <input name="projects_metadescription" type="text" class="form-control" placeholder="Projects Meta Description" value="<?php echo $rsProjects[0]['projects_meta_description']; ?>">                                
                </div>                            
              </div>                                
              <div class="form-group">                                      
                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Projects Meta Keywords
                </label>                                      
                <div class="col-lg-4">                                          
                  <input name="projects_metakeywords" type="text" class="form-control" placeholder="Projects Meta Keywords" value="<?php echo $rsProjects[0]['projects_meta_keywords']; ?>">									 
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
<link href="<?php echo TOOLS_BASE_URL; ?>/bootstrap-datetimepicker/sample/bootstrap/css/bootstrap_icon.css" rel="stylesheet" type="text/css">    
<link href="<?php echo TOOLS_BASE_URL; ?>/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">        
<script src="<?php echo TOOLS_BASE_URL; ?>/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript">
</script>    
<script type="text/javascript">	$('.form_date').datetimepicker({
    weekStart: 1,        todayBtn:  1,        autoclose: 1,        todayHighlight: 1,        startView: 2,        minView: 2,        forceParse: 0    }
                                                              );
</script>    
<!--common script for all content-->    
<script src="<?php echo JS_BASE_URL; ?>/common-scripts.js">
</script>
</body>
</html	
