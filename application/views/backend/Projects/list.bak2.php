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
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> -  List
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
									<input class="btn btn-primary btn-sm" type="button" value="Add" onclick="window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/add/'">
								<?php } ?>
                                                                <?php if($order){ ?>
									<input class="btn btn-primary btn-sm" type="button" value="Order" onClick="javascript:updateOrder()"><br><br>
								<?php } ?>
                                                               
							</div>
						  </div>
						  
						
						
                          <div class="panel-body">
                              <section id="unseen">
                               <form name="formAssignment" method="POST" action="" onsubmit="return false;">
                                
                                <table class="table table-bordered table-striped table-condensed table-hover" id="data_sort">
                                  <thead>
                                  <tr>
                                      <th width="5">No</th>
                                      <th>Projects Title</th>
                                      <th>Slide Show</th>
                                      <th class="no-sort">Projects Images</th>
                                       <th>Order</th>
                                      <th>Start Date</th>
                                      <th>End Date</th>
                                      <th>Location</th>
                                      <th class="no-sort" width="140">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  
                                  <?php
                                    if(count($getSlide) > 0){
                                    $no=0;
                                    foreach($getSlide as $projects){
                                            $no++;
                                    ?>
                                    <tr>
                                      <td><?php echo $no;?></td>
                                      
                                      <td><?php echo $projects['projects_title'];?></td>
                                      <td><?php if($projects['projects_highlight']==1){ echo 'Yes';} else { echo 'No';} ?></td> 
                                      <td><?php 
                                            if(!empty($projects['projects_image'])){
                                            $projects_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$projects['projects_image']);
                                            $projects_image = BASE_URL.$projects['projects_image'];
                                            ?>
                                            <a id="viewBackend" href="#viewDataImage<?php echo $projects['projects_id'];?>">
                                                    <img src="<?php echo $projects_image_thumbs;?>">
                                            </a>
                                            <div style="display: none;">
                                                    <div id="viewDataImage<?php echo $projects['projects_id'];?>">
                                                            <img src="<?php echo $projects_image;?>" >
                                                    </div>
                                            </div>
                                            <?php } ?>
                                      </td>
                                      <td align="center">
                                        <?php if($order && $projects['projects_highlight']==1){ ?>
                                           <input type="text" class="form-control" style="text-align:center;" name="order[<?php echo $projects['projects_id'];?>]" size="1" maxlength="2" value="<?php echo $projects['projects_order'];?>">
                                         <?php } ?>
                                      </td>  
                                      <td><?php echo date_convert($projects['projects_start_date']);?></td>
                                      <td>
                                          <?php if ($projects['projects_end_date'] == '00-00-0000 00:00:00')  { echo 'On Going';} 
                                           else { echo date_convert($projects['projects_end_date']);} ?>
                                      </td>
                                      <td><?php echo $projects['projects_location'];?></td>       
                                      <td>  
                                            <?php if($approve){ ?>
                                                    <?php if($projects['projects_active_status'] == 1) {?>
                                                            <a class="btn-success btn-sm" title="Click to Inactive" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$projects['projects_id'];?>"><i class="icon-ok"></i></a> &nbsp; 
                                                    <?php } else { ?>
                                                            <a class="btn-danger btn-sm" title="Click to Active" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$projects['projects_id'];?>"><i class="icon-remove"></i></a> &nbsp;
                                                    <?php } ?>
                                            <?php } ?>

                                            <?php if($edit){ ?>
                                                    <a class="btn-primary btn-sm" title="Click to Edit" href="<?php echo BASE_URL_BACKEND.'/'.$controller;?>/edit/<?php echo $projects['projects_id'];?>"><i class="icon-pencil"></i></a> &nbsp; 
                                            <?php } ?>

                                            <?php if($delete){ ?>
                                                    <a class="btn-danger btn-sm" title="Click to Delete" onclick="var answer = confirm('delete <?php echo $projects['projects_title'];?> ?'); if (answer){window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/delete/<?php echo $projects['projects_id'];?>';}"><span class="icon-trash"></span></a> &nbsp;
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
          </section>
      </section>
      <!--main content end-->
	  
	  <?php include VIEWS_PATH_BACKEND."/footer.php"; ?>

	</section>
	
	<!-- js placed at the end of the document so the content load faster -->
    <script src="<?php echo JS_BASE_URL; ?>/jquery.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo JS_BASE_URL; ?>/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/jquery.scrollTo.min.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo JS_BASE_URL; ?>/respond.min.js" ></script>

    <!--common script for all content-->
    <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js"></script>
	<!-- data_tabel -->
        <link href="<?php echo CSS_BASE_URL; ?>/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
	<script src="<?php echo JS_BASE_URL; ?>/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="<?php echo JS_BASE_URL; ?>/plugins/dataTables/dataTables.bootstrap.js"></script>
         <script src="<?php echo JS_BASE_URL; ?>/plugins/metisMenu/jquery.metisMenu.js"></script>
	<!-- fancybox -->
	<script src="<?php echo TOOLS_BASE_URL; ?>/fancybox/source/jquery.fancybox.js"></script>
	<link href="<?php echo TOOLS_BASE_URL; ?>/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<script type="text/javascript">
	$(function() {
		//fancybox
		jQuery("a#viewBackend").fancybox({
			'overlayShow'		: true,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'width'				: '100%',
			'height'			: '100%'
		});
	});
	</script>
	<!-- end fancybox -->
    <script>
    $(document).ready(function() {
      
        $('#data_sort').dataTable( {
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
} );
    });
    </script>
	<script language="javascript">
	function updateOrder(){
		var frm = document.formAssignment;
		var answer = confirm('are you sure want to update order?');
		
		if(answer){
			frm.action = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/doOrder';
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
</body>
</html	