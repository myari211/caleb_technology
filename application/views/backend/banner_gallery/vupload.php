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
              <?php echo form_open_multipart(BASE_URL_BACKEND."/Banner_gallery/doupload", array('id' => 'upload-file-form'));
            ?>
           <?php //echo form_open_multipart("backend/gallery/doupload","id='categoryForm'","method='method='","class='form-horizontal'");?>
            <fieldset>
                <legend>Upload Multiple File(s)</legend>
                <section>
                    <label>Browse a file</label>
                    
                      <div class="form-group element">
                          <input type="file" name="upload_file1" id="upload_file1" class="form-control" readonly="true"/>
                      </div>
                  
                    <div id="moreImageUpload"></div>
                    <div style="clear:both;"></div>
                    <div id="moreImageUploadLink" style="display:none;">
                        <a href="javascript:void(0);" id="attachMore">Attach another file</a>
                    </div>
                    <footer>
                 <input type="submit" name="file_upload" value="Upload" class="btn btn-submit btn-outline btn-primary"/>
                 <input class="btn btn-primary btn-danger" type="button" value="Cancel" onClick="javascript:hideFormUpload()">
                    </footer>
                </section>
            </fieldset>
            
            <?php
            echo form_close();
            ?>
        </div>       
</div> 

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
<script type="text/javascript">
    $(document).ready(function() {
        var upload_number = 2;
        $('#attachMore').click(function() {
            //add more file
            var moreUploadTag = '';
           
            moreUploadTag += '<input type="file" id="upload_file' + upload_number + '" name="upload_file' + upload_number + '" class="form-control" readonly="true"/>';
            moreUploadTag += '&nbsp;<a href="javascript:del_file(' + upload_number + ')" style="cursor:pointer;" onclick="return confirm(\"Are you really want to delete ?\")">Delete ' + upload_number + '</a></div>';
            $('<dl id="delete_file' + upload_number + '">' + moreUploadTag + '</dl>').fadeIn('slow').appendTo('#moreImageUpload');
            upload_number++;
        });
    });
</script>
<script type="text/javascript">
    function del_file(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }
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