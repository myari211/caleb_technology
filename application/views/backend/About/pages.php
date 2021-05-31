
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> -  Pages
                          </header>
				
						  <?php if(isset($error)){ ?>
						  <div class="panel-body">
							  <div class="form-group has-error">
								  <label for="inputError" class="col-sm-2 control-label col-lg-2"><?php echo $error;?></label>
							  </div>
						  </div>
						  <?php } ?>
						  <?php if($add && count($ListContentPage) == 0){ ?>
						  <div class="panel-body">
							<div class="col-lg-12">
								<?php if($add){ ?>
									<input class="btn btn-primary btn-sm" type="button" value="Add" onclick="window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/addPages/'">
								<?php } ?>
                                                               
							</div>
                                                      
						  </div>
						  <?php } ?>
						
						
                          <div class="panel-body">
                              <section id="unseen">
                               <form name="formAssignmentPage" method="POST" action="" onsubmit="return false;">
                                
                                <table class="table table-bordered table-striped table-condensed table-hover" id="data_sortpages">
                                  <thead>
                                  <tr>
                                      <th width="5">No</th>
                                      <th><?php echo $breadcrump['module_name']; ?>  Page Title</th>
                                      <th class="no-sort"><?php echo $breadcrump['module_name']; ?>  Page Images</th> 
                                       <th class="no-sort"><?php echo $breadcrump['module_name']; ?>  Page File</th> 
                                    
                                        <?php if($page_type != 1) { ?>
                                        <th>Sub Pages </th>
                                     <?php } ?>
                                      <th class="no-sort" width="140">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  
                                  <?php
                                    if(count($ListContentPage) > 0){
                                    $no=0;
                                    foreach($ListContentPage as $cp){
                                            $no++;
                                    ?>
                                    <tr>
                                      <td><?php echo $no;?></td>
                                      <td><?php echo $cp['content_page_title'];?></td>
                                      <td><?php 
                                            if(!empty($cp['content_page_image'])){
                                            $cp_image_thumbs = str_replace('/admin/images','/admin/.thumbs/images',$cp['content_page_image']);
                                            $cp_image = $cp['content_page_image'];
                                            ?>
                                            <a id="viewBackend" href="#viewDataImage<?php echo $cp['content_page_id'];?>">
                                                    <img src="<?php echo BASE_URL.$cp_image_thumbs;?>">
                                            </a>
                                            <div style="display: none;">
                                                    <div id="viewDataImage<?php echo $cp['content_page_id'];?>">
                                                            <img src="<?php echo BASE_URL.$cp_image;?>" >
                                                    </div>
                                            </div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                             <a class="btn-success btn-sm" title="Click to Show" target="_blank" href="<?php echo $cp['content_page_file'];?>"> <i class="icon-download"></i> </a> &nbsp;
                                        </td>
                                       
                                       <?php if($cp['page_type'] != 1) { ?> 
                                        <td>     <a class="btn-success btn-sm" title="Click to Inactive" href="<?php echo BASE_URL_BACKEND."/Content_subpage/".$cp['content_page_id'];?>"> <i class="icon-tasks"></i> </a> &nbsp;   </td>
                                         <?php } ?>  
                                      <td>
                                          
                                            <?php if($approve){ ?>
                                                    <?php if($cp['content_page_active_status'] == 1) {?>
                                                            <a class="btn-success btn-sm" title="Click to Inactive" href="<?php echo BASE_URL_BACKEND."/".$controller."/activePage/".$cp['content_page_id'];?>"><i class="icon-ok"></i></a> &nbsp; 
                                                    <?php } else { ?>
                                                            <a class="btn-danger btn-sm" title="Click to Active" href="<?php echo BASE_URL_BACKEND."/".$controller."/activePage/".$cp['content_page_id'];?>"><i class="icon-remove"></i></a> &nbsp;
                                                    <?php } ?>
                                            <?php } ?>

                                            <?php if($edit){ ?>
                                                    <a class="btn-primary btn-sm" title="Click to Edit" href="<?php echo BASE_URL_BACKEND.'/'.$controller;?>/editPage/<?php echo $cp['content_page_id'];?>"><i class="icon-pencil"></i></a> &nbsp; 
                                            <?php } ?>

                                            <?php if($delete){ ?>
                                                    <a class="btn-danger btn-sm" title="Click to Delete" onclick="var answer = confirm('delete <?php echo $cp['content_page_title'];?> ?'); if (answer){window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/deletePage/<?php echo $cp['content_page_id'];?>';}"><span class="icon-trash"></span></a> &nbsp;
                                            <?php } ?>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } else {?>
                                    <tr>
                                          <td align="center" colspan="10">Data Not Found</td>
                                    </tr>
                                    <?php } ?>
                                    
                                        </tbody>
                                    </table>
                                   </form>
                              </section>
                          </div>
						  <?php //echo($paging); ?>
					  </section>
                  </div>
              </div>
              <!-- page end-->
 <script language="javascript">
	function updateOrderPage(){
		var frm = document.formAssignmentPage;
		var answer = confirm('are you sure want to update order?');
		
		if(answer){
			frm.action = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/doOrderPage';
			frm.submit();
		} else {
			return false;
		}
	}

	$(document).ready(function() {
		$("#perpage").change(function() {
			var n = $(this).val();
			frmSearch.submit();
		});
		
		$("#langid\\[\\]").change(function(e){
			var val = $(this).val();
			mystring  = val.split("-");
			var size = mystring.length;
			
			if(size == 3){
				window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;;?>/editLang/'+val;
			} else if(size == 2){
				window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;;?>/addLang/'+val;
			}
		});

	});
	</script>
        
        <script>
    $(document).ready(function() {
      
        $('#data_sortpages').dataTable( {
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
} );
    });
    </script>