       <div class="col-lg-6 center-block">    
        <div class="message_box">
            <?php
            if (isset($success) && strlen($success)) {
                echo '<div class="success">';
                echo '<p>' . $success . '</p>';
                echo '</div>';
            }
 
            if (isset($errors) && strlen($errors)) {
                echo '<div class="error">';
                echo '<p>' . $errors . '</p>';
                echo '</div>';
            }
 
            if (validation_errors()) {
                echo validation_errors('<div class="error">', '</div>');
            }
            ?>
        </div>
        <div>
              <?php echo form_open_multipart(BASE_URL_BACKEND."/Material_file/insert", array('id' => 'upload-file-form'));
            ?>
           <?php //echo form_open_multipart("backend/file/doupload","id='categoryForm'","method='method='","class='form-horizontal'");?>
            
             <div class="col-sm-8 col-md-8">
                            <div class="product-image-wrapper panel panel-default ">
                            <div class="panel-body">
                            <div class="productinfo text-center">
				<div class='photo-box'>
				<div class="form-group">
                                      
                                    
                                        <input type="text" class="ic-title-field form-control" name="file_title[]" id="file_title1"  placeholder="file Title" value="">
                                      
                               </div>
                        <div class="form-group">                                                    
                            <div style="margin-bottom:2px;" class="fileurl1"></div>
                            <input type="text" name="material_file[]" readonly="readonly" id="fileurl1" class="form-control" value="">
                            <div style="margin-right:50px;">
                                          <a onClick="openKCFinderFile('fileurl1');" id="link-file" class="link" style="cursor:pointer;">Browse</a>
                                          <a onClick="reset_value('fileurl1');" id="link-file" class="link">Reset</a>
                                           <p class="help-block" style="color:#00F;">Pdf,Doc,Xls)</p>
                            </div>
                        </div>           
                        <div class="form-group">
                                      
                                   <input type="text" id="file_order1" name="file_order[]" class="ic-description-field form-control" placeholder="File Order" value="1">
                                       
                                     
                    </div>
                    <div id="moreFile"></div>
                    <div style="clear:both;"></div>
                   
                    <script type="text/javascript">
                        $(function() {
                            var file_number = 2;
                            $('#fileMore').click(function() {
                                //add more file
                                var moreFileTag = '';

                                        moreFileTag += '<div class="form-group">';
                                        moreFileTag += '<input id="file_title' + file_number + '" name="file_title[]" type="text" class="ic-title-field form-control" placeholder="File Title">';
                                        moreFileTag += '</div>';
                                        
                                        moreFileTag += ' <div class="form-group">';
                                                 
                                                    moreFileTag += '<div style="margin-bottom:2px;" class="fileurl' + file_number + '"></div>';
                                                    moreFileTag += ' <input type="text" name="material_file[]" readonly="readonly" id="fileurl' + file_number + '" class="form-control" value="">';
                                                    moreFileTag += '<div style="margin-right:50px;">';
                                                    moreFileTag += '<a onclick="openKCFinderFile(&#39;fileurl' + file_number + '&#39;);" id="link-file" class="link" style="cursor:pointer;">Browse </a>';
                                                    moreFileTag += '<a onClick="reset_value(&#39;fileurl' + file_number + '&#39;);" id="link-file" class="link" style="cursor:pointer;">Reset</a>';
                                                    moreFileTag += '<p class="help-block" style="color:#00F;">Pdf,Doc,Xls)</p>';
                                                    moreFileTag += '</div>';
                                                    
                                                  
                                        moreFileTag += '</div>';
                                        moreFileTag += ' <div class="form-group">';
                                        moreFileTag += '<input  type="text" id="file_order' + file_number + '" name="file_order[]" value ="1" class="ic-description-field form-control ckeditor" placeholder="File Stock">';                               
                                        moreFileTag += '</div>';
                                        moreFileTag += '&nbsp;<a href="javascript:del_file(' + file_number + ')" style="cursor:pointer;" onclick="return confirm(\"Are you really want to delete ?\")">Delete ' + file_number + '</a></div>';


                                $('<dl id="delete_file' + file_number + '">' + moreFileTag + '</dl>').fadeIn('slow').appendTo('#moreFile');

                               // CKEDITOR.enableAutoInline = true;
                               //  CKEDITOR.inline( 'file_order' + file_number );
                                file_number++;

                            });



                        });
                    </script>	

  
                   
                <a href="#" id="fileMore" class="btn btn-submit btn-outline btn-white">Add More File</a>                        
                 <input type="submit" name="file_upload" value="Save" class="btn btn-submit btn-outline btn-primary"/>
                 <input class="btn btn-primary btn-danger" type="button" value="Cancel" onClick="javascript:hideFormUpload()">
                   
				</div>
                            </div>
                            </div>
                            </div>
                            </div>
            
            
            
         
            
            <?php
            echo form_close();
            ?>
        </div>       
</div> 
<script type="text/javascript">
    function del_file(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("input[id^='upload_file']").each(function() {
            var id = parseInt(this.id.replace("upload_file", ""));
            $("#upload_file" + id).change(function() {
                if ($("#upload_file" + id).val() !== "") {
                    $("#moreImageUploadLink").show();
                }
            });
        });
    });
</script>

           
<script language="javascript">
	function Confirm_hapus(){
		if(confirm("KONFIRMASI PENGHAPUSAN DATA\nTekan OK untuk melanjutkan penghapusan data")==true){
			return true;
		}else{
			return false;
		}
	}
</script>