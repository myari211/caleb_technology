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
    <?php echo form_open_multipart(BASE_URL_BACKEND."/Content_subpage/insert", array('id' => 'upload-file-form'));
?>
    <div class="col-sm-10 col-md-10">
      <div class="product-image-wrapper panel panel-default ">
        <div class="panel-body">
          <div class="productinfo text-center">
            <div class='photo-box'>
              <div class="form-group">                             
                <input type="text" class="ic-title-field form-control" name="subpage_title[]" id="subpage_title1" type="text" class="form-control" placeholder="Sub PageTitle" value="">                                      
              </div>
              <div class="form-group" 
                   <?php if($page_type == 2) { echo 'style="display:none"';}?>>                                                    
              <div style="margin-bottom:2px;" class="imageurl1">
                <img id="imgurl" src="" style="max-width:400px; padding:5px; border:solid 1px #ccc;">
              </div>
              <input type="text" name="subpage_image[]" readonly="readonly" id="imageurl1" class="form-control" value="" onchange="setVal(this);">
              <p class="help-block">width and height optimal is 240px x 240px
              </p>
              <div style="margin-right:50px;">
                <a class="btn btn-outline-primary btn-sm" data-toggle="modal"  href="javascript:;" data-target="#Modalimageurl" id="link-file" class="link">
                  <i class="icon-eye-open">
                  </i>
                </a>
                <a class="btn btn-outline-primary btn-sm" onClick="reset_value('imageurls');" id="link-file" class="link">
                  <i class="icon-refresh">
                  </i>
                </a>                                           
              </div>
            </div>  
            <div class="form-group" 
                 <?php if($page_type == 3) { echo 'style="display:none"';}?>>                                
            <textarea id="IDaccordesc1" name="subpage_desc[]" class="ic-description-field form-control ckeditor" placeholder="Accordion Description" rows="7">
            </textarea>
            <script>
              CKEDITOR.replace( 'IDaccordesc1', {
                toolbar: [
                  {
                    name: 'document', items : [ 'Source'] }
                  ,
                  {
                    name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] }
                  ,
                  {
                    name: 'colors',      items : [ 'TextColor','BGColor' ] }
                  ,
                  {
                    name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] }
                  ,
                  {
                    name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] }
                  ,
                  {
                    name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] }
                  ,
                ],
                width : 800,
                height: 100
              }
                              );
            </script> 
          </div>
          <div id="moreAccordion">
          </div>
          <div style="clear:both;">
          </div>
          <div id="moreAccordionLink" style="">
          </div>
          <script type="text/javascript">
            $(function() {
              var subpage_number = 2;
              $('#accordionMore').click(function() {
                //add more file
                var moreSubpageTag = '';
                moreSubpageTag += '<div class="form-group">';
                moreSubpageTag += '<input id="subpage_title' + subpage_number + '" name="subpage_title[]" type="text" class="ic-title-field form-control" placeholder="Sub PageTitle">';
                moreSubpageTag += '</div>';
                moreSubpageTag += ' <div class="form-group" <?php if($page_type == 2) { echo 'style="display:none"';}?>>';
                moreSubpageTag += '<div style="margin-bottom:2px;" class="imageurl' + subpage_number + '"></div>';
                moreSubpageTag += ' <input type="text" name="subpage_image[]" readonly="readonly" id="imageurl' + subpage_number + '" class="form-control" value="">';
                moreSubpageTag += ' <p class="help-block">width and height optimal is 400px x 400px</p>';
                moreSubpageTag += '<div style="margin-right:50px;">';
                moreSubpageTag += '<a onclick="openKCFinder(&#39;imageurl' + subpage_number + '&#39;);" id="link-file" class="link" style="cursor:pointer;">Browse </a>';
                moreSubpageTag += '<a onClick="reset_value(&#39;imageurl' + subpage_number + '&#39;);" id="link-file" class="link" style="cursor:pointer;">Reset</a>';
                moreSubpageTag += '</div>';
                moreSubpageTag += '</div>';
                moreSubpageTag += ' <div class="form-group" <?php if($page_type == 3) { echo 'style="display:none"';}?>>';
                moreSubpageTag += '<textarea id="IDaccordescs' + subpage_number + '" name="subpage_desc[]" class="ic-description-field form-control ckeditor" placeholder="Accordion Description" rows="7">Sub PageDesc</textarea>';
                moreSubpageTag += '</div>';
                moreSubpageTag += '&nbsp;<a href="javascript:del_accordion(' + subpage_number + ')" style="cursor:pointer;" onclick="return confirm(\"Are you really want to delete ?\")">Delete ' + subpage_number + '</a></div>';
                $('<dl id="delete_file' + subpage_number + '">' + moreSubpageTag + '</dl>').fadeIn('slow').appendTo('#moreAccordion');
                CKEDITOR.replace( 'IDaccordescs' + subpage_number , {
                  toolbar: [
                    {
                      name: 'document', items : [ 'Source'] }
                    ,
                    {
                      name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] }
                    ,
                    {
                      name: 'colors',      items : [ 'TextColor','BGColor' ] }
                    ,
                    {
                      name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] }
                    ,
                    {
                      name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] }
                    ,
                    {
                      name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] }
                    ,
                  ],
                  width : 800,
                  height: 100
                }
                                );
                // CKEDITOR.enableAutoInline = true;
                //  CKEDITOR.inline( 'IDaccordescs' + subpage_number );
                subpage_number++;
              }
                                       );
            }
             );
          </script>	
          <footer>
            <a href="#" id="accordionMore" class="btn btn-outline">Add More field
            </a>                        
            <input type="submit" name="file_upload" value="Upload" class="btn btn-submit btn-outline btn-primary"/>
            <input class="btn btn-primary btn-danger" type="button" value="Cancel" onClick="javascript:hideFormUpload()">
          </footer>
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
        <iframe height="100%" width="100%" class="filemanager" src="<?=TOOLS_BASE_URL;?>/filemanager/dialog.php?type=1&field_id=imageurl1&akey=2063c1608d6e0baf80249c42e2be5804&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll;  min-height: 400px;">
        </iframe>
      </div>
    </div>
  </div>
</div> 
<script type="text/javascript">
  function del_accordion(eleId) {
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
      }
                                   );
    }
                                      );
  }
                   );
</script>
<script>
  function setVal(sel)
  {
    var url =sel.value;
    $("#imgurl").attr("src", url);
  }
</script>       
<script language="javascript">
  function Confirm_hapus(){
    if(confirm("KONFIRMASI PENGHAPUSAN DATA\nTekan OK untuk melanjutkan penghapusan data")==true){
      return true;
    }
    else{
      return false;
    }
  }
</script>
