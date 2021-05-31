
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> -  Download
                          </header>
				
						  <?php if(isset($error)){ ?>
						  <div class="panel-body">
							  <div class="form-group has-error">
								  <label for="inputError" class="col-sm-2 control-label col-lg-2"><?php echo $error;?></label>
							  </div>
						  </div>
						  <?php } ?>
						  
						  <div class="panel-body">
							<div class="col-lg-12">
								<?php if($add){ ?>
									<input class="btn btn-primary btn-sm" type="button" value="Add" onclick="window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/addMaterial/'">
								<?php } ?>
                                                               <?php if($order){ ?>
									<input class="btn btn-primary btn-sm" id="btn_order" type="button" value="Order" onClick="javascript:updateOrderPage()"><br><br>
								<?php } ?>
							</div>
                                                      
						  </div>
						  
						
						
                          <div class="panel-body">
                              <section id="unseen">
                               <form name="formAssignmentMaterial" method="POST" action="" onsubmit="return false;">
                                
                                <table class="table table-bordered table-striped table-condensed table-hover" id="data_sortmaterial">
                                  <thead>
                                  <tr>
                                      <th width="5">No</th>
                                      <th>Material Images</th>
                                      <th>Material Title</th>
                                      <th>material File</th>
                                      <th>Highlight</th>
                                      <th>Material Order</th>
                                      <th class="no-sort" width="140">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  
                                  <?php
                                    if(count($ListMaterial) > 0){
                                    $no=0;
                                    foreach($ListMaterial as $material){
                                            $no++;
                                    ?>
                                    <tr>
                                      <td><?php echo $no;?></td>
                                     
                                      <td><?php 
                                            if(!empty($material['material_image'])){
                                            $material_image_thumbs = str_replace('/admin/images','/admin/.thumbs/images',$material['material_image']);
                                            $material_image = $material['material_image'];
                                            ?>
                                            <a id="viewBackend" href="#viewDataImage<?php echo $material['material_id'];?>">
                                                    <img src="<?php echo BASE_URL.$material_image_thumbs;?>">
                                            </a>
                                            <div style="display: none;">
                                                    <div id="viewDataImage<?php echo $material['material_id'];?>">
                                                            <img src="<?php echo BASE_URL. $material_image;?>" >
                                                    </div>
                                            </div>
                                            <?php } ?>
                                      </td>
                                      <td><?php echo $material['material_title'];?></td>
                                      <td>
                                                 <a class="btn-success btn-sm" title="Click to Material File" href="<?php echo BASE_URL_BACKEND."/Material_file/".$material['material_id'];?>"> <i class="icon-tasks"></i> </a> &nbsp; 
                                        </td>
                                        <td><?php if($material['material_highlight']==1){ echo 'Yes';} else { echo 'No';} ?></td> 
                                      <?php if($order){ ?>
                                       <td align="center"><input type="text" class="form-control" style="text-align:center;" name="order[<?php echo $material['material_id'];?>]" size="1" maxlength="2" value="<?php echo $material['material_order'];?>"></td>
                                      <?php } ?>
                                            
                                      <td>
                                          
                                            <?php if($approve){ ?>
                                                    <?php if($material['material_active_status'] == 1) {?>
                                                            <a class="btn-success btn-sm" title="Click to Inactive" href="<?php echo BASE_URL_BACKEND."/".$controller."/activeMaterial/".$material['material_id'];?>"><i class="icon-ok"></i></a> &nbsp; 
                                                    <?php } else { ?>
                                                            <a class="btn-danger btn-sm" title="Click to Active" href="<?php echo BASE_URL_BACKEND."/".$controller."/activeMaterial/".$material['material_id'];?>"><i class="icon-remove"></i></a> &nbsp;
                                                    <?php } ?>
                                            <?php } ?>

                                            <?php if($edit){ ?>
                                                    <a class="btn-primary btn-sm" title="Click to Edit" href="<?php echo BASE_URL_BACKEND.'/'.$controller;?>/editMaterial/<?php echo $material['material_id'];?>"><i class="icon-pencil"></i></a> &nbsp; 
                                            <?php } ?>

                                            <?php if($delete){ ?>
                                                    <a class="btn-danger btn-sm" title="Click to Delete" onclick="var answer = confirm('delete <?php echo $material['material_title'];?> ?'); if (answer){window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/deleteMaterial/<?php echo $material['material_id'];?>';}"><span class="icon-trash"></span></a> &nbsp;
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
		var frm = document.formAssignmentMaterial;
		var answer = confirm('are you sure want to update order?');
		
		if(answer){
			frm.action = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/doOrderMaterial';
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
      
        $('#data_sortmaterial').dataTable( {
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
} );
    });
    </script>