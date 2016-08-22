<?php if (!defined('THINK_PATH')) exit();?><div id="selectUploadType" class="chanage lh30 " style=" line-height:24px; font-size:12px; padding:10px 0; color:#999999;" >
请选择个人正面大照片作为头像，照片不能小于300px*300px<br/>
支持JPG,JPGE,PNG格式，大小限制<?php echo (($attach_max_size)?($attach_max_size):0); ?>M以内
</div>

<form id='noflashUpload' model-node="avatar_upload_form" enctype="multipart/form-data" action="<?php echo U('public/Account/doSaveAvatar', array('step'=>'upload'));?>" method="post">
    <dl class="form-avatar">
        <dd class="ft16 lh30 pb40">
            <input event-node="select_file" type="file" name="Filedata" class="" />
            <span event-node="loading" style="display:none;"><img src="__THEME__/image/load.gif" />加载中...</span>
        </dd>
        <dd>
        	<ul class="ph_img_box clearfix">
                  <li class="ph_img fl"><img class="toux_img1 toux_img_reset" src="<?php echo ($avatar["avatar_big"]); ?>" /><p>(150px*150px)</p></li>
                  <li class="ph_img m_70_40_0_40 fl"><img class="toux_img2 toux_img_reset" src="<?php echo ($avatar["avatar_big"]); ?>" /><p>(80px*80px)</p></li>
                  <li class="ph_img mt120 fl"><img class="toux_img3 toux_img_reset" src="<?php echo ($avatar["avatar_big"]); ?>" /><p>(28px*28px)</p></li>
            </ul>
            <div model-node="avatar_scan" class="mod-avatar" style="display:none">
                <div class="cut-1"><img event-node="avatar_big" src="<?php echo ($avatar["avatar_big"]); ?>" width="150" /><p>(150px*150px)</p></div>
            </div>
        </dd>
    </dl>
</form>
<form model-node="avatar_setting_form" enctype="multipart/form-data" action="<?php echo U('public/Account/doSaveAvatar', array('step'=>'save'));?>" method="post" style="display:none;">
    <dl class="form-avatar">
        <dd class="pb20" style="position:relative">
            <div model-node="avatar_area" class="mod-avatar left" style="width:300px; margin-bottom:10px; border-right:1px solid #E5E5E5; position:relative"></div>
            <div class="mod-avatar left" style="">
                <div model-node="avatar_preview" class="left" style=" width: 200px; height: 200px; border:1px solid #B4B5AF; overflow:hidden; position:absolute; top:0; right:0"></div>
            </div>
        </dd>
        <dd>                                    
            <input event-node="avatar_picurl" type="hidden" name="picurl">
            <input event-node="avatar_picwidth" type="hidden" name="picwidth">
            <input event-node="avatar_fullpicurl" type="hidden" name="fullpicurl">
            <input event-node="avatar_x1" type="hidden" name="x1">
            <input event-node="avatar_y1" type="hidden" name="y1">
            <input event-node="avatar_x2" type="hidden" name="x2">
            <input event-node="avatar_y2" type="hidden" name="y2">
            <input event-node="avatar_w" type="hidden" name="w">
            <input event-node="avatar_h" type="hidden" name="h">
            <div>图片保存之后将自动生成不同尺寸的头像</div>
            <a event-node="avatar_save" event-args="tip=<?php echo L('PUBLIC_IMAGE_SAVE_IS');?>？" class="Save sel_w btn_big_r" href="#" ><?php echo L('PUBLIC_SAVE');?></a>
            <a event-node="avatar_reset" class="Save sel_w btn_big_r" href="#" style="background:#CCC"><?php echo L('PUBLIC_CANCEL');?></a>
        </dd>
    </dl>
</form>
<script src="__THEME__/js/module.form.js?v20121111"></script>
<script src="__THEME__/js/avatar/module.avatar.js?v20130423"></script>
<script src="__THEME__/js/avatar/avatar.js?v20130423"></script>
<script type="text/javascript">
<?php if(!empty($callback)){
    echo 'var upload_callback = "'.$callback.'"';
}else{
    echo 'var upload_callback = "nocallback"';
} ?>

var avatar_success = function(msg){
	var src = $('img.toux_img_reset:first').attr('src')+'?'+Math.random();;
	if(src.indexOf('/avatar/') == -1){
		window.location = '<?php echo U("classroom/User/setInfo", array("tab"=>1));?>';
		return;
	}
	$('.set_user_face').attr('src', src);
	$('img.toux_img_reset').each(function(){
		var src = $(this).attr('src')+'?'+Math.random();
		$(this).attr('src', src);
		
	});
	notes('头像保存成功', 'success');
    if(upload_callback!='nocallback'){
        notes('头像保存成功', 'success');
        setTimeout(function(){
            eval(upload_callback+'()');
        }, 200);
    }
};

var avatar_error = function(){
	notes('头像保存失败', 'failure');
};
</script>