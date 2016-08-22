<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo APPS_URL;?>/admin/_static/admin.css" rel="stylesheet" type="text/css">
<link href="__THEME__/image/favicon.ico?v=<?php echo ($site["sys_version"]); ?>" type="image/x-icon" rel="shortcut icon">
<script>
/**
 * 全局变量
 */
var SITE_URL  = '<?php echo SITE_URL; ?>';
var THEME_URL = '__THEME__';
var APPNAME   = '<?php echo APP_NAME; ?>';
var UPLOAD_URL ='<?php echo UPLOAD_URL;?>';
var MID		  = '<?php echo $mid; ?>';
var UID		  = '<?php echo $uid; ?>';
// Js语言变量
var LANG = new Array();
</script>
<script type="text/javascript" src="__THEME__/js/jquery.js"></script>
<script type="text/javascript" src="__THEME__/js/core.js"></script>
<script src="__THEME__/js/module.js"></script>
<script src="__THEME__/js/common.js"></script>
<script src="__THEME__/js/module.common.js"></script>
<script src="__THEME__/js/module.weibo.js"></script>
<script type="text/javascript" src="<?php echo APPS_URL;?>/admin/_static/admin.js?t=11"></script>
<script type="text/javascript" src = "__THEME__/js/ui.core.js"></script>
<script type="text/javascript" src = "__THEME__/js/ui.draggable.js"></script>

<script type="text/javascript" src = "__THEME__/js/swfupload/js/fileprogress.js"></script>
<script type="text/javascript" src = "__THEME__/js/swfupload/js/handlers.js"></script>
<script type="text/javascript" src = "__THEME__/js/swfupload/swfupload/swfupload.js"></script>
<script type="text/javascript" src = "__THEME__/js/swfupload/js/swfupload.queue.js"></script>
<?php /* 非admin应用的后台js脚本统一写在  模板风格对应的app目录下的admin.js中*/
if(APP_NAME != 'admin' && file_exists(APP_PUBLIC_PATH.'/admin.js')){ ?>
<script type="text/javascript" src="<?php echo APP_PUBLIC_URL;?>/admin.js"></script>
<?php } ?>
<?php if(!empty($langJsList)) { ?>
<?php if(is_array($langJsList)): ?><?php $i = 0;?><?php $__LIST__ = $langJsList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><script src="<?php echo ($vo); ?>"></script><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php } ?>
</head>
<body>
<?php set_time_limit(0); ?>
	<link rel="stylesheet" href="__THEME__/js/swfupload/css/style.css">
	<style type="text/css">
		.ico_top, .ico_btm {background: url("__THEME__/admin/image/ico_top_btm.gif") no-repeat scroll 0 0 transparent; height: 14px;width: 12px;}
		.ico_top, .ico_btm { display: inline-block; vertical-align: middle;}
		.ico_top { background-position: -12px 0;}
		.ico_btm {background-position: -24px 0;}
		.ico_top:hover { background-position: 0 0;}
		.ico_btm:hover { background-position: -35px 0;}
	</style>
	
	<script type="text/javascript">
	var swfu;
	window.onload = function() {
		var uptoken = "<?php echo ($uptoken); ?>";
		var filename= "<?php echo ($filename); ?>";
		var entrycode="<?php echo ($entrycode); ?>";
		var settings = {
			flash_url : "__THEME__/js/swfupload/swfupload/swfupload.swf",
			upload_url: "http://up-z1.qiniu.com",
			post_params: {"token" :uptoken ,"key" :filename,"persistentOps": "avthumb/mp4|saveas/cWJ1Y2tldDpxa2V5;avthumb/flv|saveas/cWJ1Y2tldDpxa2V5Mg=="},
			file_size_limit : "1024 MB",
			file_post_name:'file',
			file_types : "*.flv;*.f4v;*.mp4;*.mp3",
			file_types_description : "All Files",
			file_upload_limit : 1,  //配置上传个数
			file_queue_limit : 0,
			custom_settings : {
				progressTarget : "fsUploadProgress",
				cancelButtonId : "btnCancel"
			},
			debug: false,
			// Button settings
			button_image_url: "__THEME__/js/swfupload/TestImageNoText_65x29.png",
			button_width: "100",
			button_height: "29",
			button_top_padding: 30,
			button_placeholder_id: "spanButtonPlaceHolder",
			button_text_style: ".theFont { font-size: 16; }",
			button_text_left_padding: 12,
			button_text_top_padding: 3,	
			file_queued_handler : fileQueued,
			file_queue_error_handler : fileQueueError,
			file_dialog_complete_handler : fileDialogComplete,
			upload_start_handler : uploadStart,
			upload_progress_handler : uploadProgress,
			upload_error_handler : uploadError,
			upload_success_handler : uploadSuccess,
			upload_complete_handler : uploadComplete,
			queue_complete_handler : queueComplete	
		};
		swfu = new SWFUpload(settings);
     };
     function testclick(){
    	 swfu.cancelQueue_misszhou();
     }
	</script>
	<div id="container" class="so_main">
    <div class="page_tit">
        <div class="right">
            <?php if(($back_id)  !=  "-1"): ?><a href="<?php echo U('classroom/AdminVideo/index');?>" class="btn_a"><span>返回</span></a><?php endif; ?>
        </div>
        <?php echo ($pageTitle); ?>
    </div>
    <?php if(!empty($pageTab)): ?>
    
    <div class="tit_tab">
        <ul>
        <?php !$_REQUEST['tabHash'] && $_REQUEST['tabHash'] =  $pageTab[0]['tabHash']; ?>
        <?php if(is_array($pageTab)): ?><?php $i = 0;?><?php $__LIST__ = $pageTab?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$t): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo ($t["url"]); ?>&tabHash=<?php echo ($t["tabHash"]); ?>" <?php if($t['tabHash'] == $_REQUEST['tabHash']){ echo 'class="on"';} ?>><?php echo ($t["title"]); ?></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
        </ul>
    </div>
    <?php endif; ?>
    <form method="POST" action="<?php echo U('classroom/AdminVideo/doAddVideo');?>" id="detail_form" name="detail_form" onsubmit="return j_validateCallback(this,checkForm,post_callback)">
    	<input type="hidden" name="systemdata_list" value="video_Admin" class="s-txt">
    	<input type="hidden" name="systemdata_key" value="addVideo" class="s-txt">
    	<input type="hidden" name="pageTitle" value="添加课程" class="s-txt">
    	<input type="hidden" name="id" value="<?php echo ($id); ?>" />
    	<div class="form2">
    		<dl class="lineD" id="dl_video_title">
		      	<dt><font color="red"> * </font>课程名称：</dt> 
		      	<dd>
		      		<input name="video_title" id="form_video_title" type="text" value="<?php echo ($video_title); ?>" class="s-txt">
		      		<?php if($_GET['id']){ ?> 
		      		<a href="<?php echo U('classroom/Album/watch',array('aid'=>$id,'type'=>1));?>" target="_blank">查看视频</a> | 
		      		<a href="javascript:void(0);" onclick="deletevideo('<?php echo ($qiniu_key); ?>');">删除视频</a>
		      		<?php } ?> 
		    	</dd>
		    </dl>
		    
		    <dl class="lineD">
		    	<dt><font color="red"> * </font>课程分类：</dt>
		    	<dd>
		    		<?php $fullcategorypaths = trim($fullcategorypath , ','); ?>
		    		<?php echo W('VideoLevel',array('type'=>1,'default'=>$fullcategorypaths));?>
		    	</dd>
		    </dl>
		    
		    <dl class="lineD" id="dl_video">
		    	<dt><font color="red"> * </font>课程简介：</dt>
		    	<dd>
		    		<textarea name="video_intro" id="form_video_intro" rows="10" cols="80"><?php echo ($video_intro); ?></textarea>
		    	</dd>
		    </dl>
		    
		    <dl class="lineD" id="form_v_price">
		    	<dt><font color="red"> * </font>价格：</dt>
		    	<dd>
		    		<input name="v_price" type="text" value="<?php echo ($v_price); ?>" class="s-txt">元(1-1000)
		    	</dd>
		    </dl>
		    
		    <dl class="lineD" id="form_v_price">
		    	<dt>会员折扣：</dt>
		    	<dd>
		    		<input name="discount" type="text" value="<?php echo ($discount); ?>" class="s-txt" >(0-1)
		    	</dd>
		    </dl>
		    
		    <dl class="lineD">
                <dt><font color="red"> * </font>封面上传：</dt>
                <dd id="image_cover">
                    <?php echo W('Upload',array('callback'=>'callback','uploadType'=>'image','limit'=>1,'inputname'=>'cover','urlquery'=>'input_id=cover'));?>
                    <?php if($cover_path){ ?>
                    <div id="small_cover">
                        <img style="max-width:100px;padding:2px; border:1px solid #ccc" src="<?php echo ($cover_path); ?>" />
                        <input type="hidden" name="cover_ids" data="cover_ids" value="<?php echo ($cover); ?>" />
                    </div>
                    <?php } ?>
                </dd>
            </dl>
            
            <dl <?php if($_GET['id']&&!empty($qiniu_key)){ ?>style="display:none"<?php } ?> class="lineD" id="video_upload_d">
		    	<dt><font color="red"> * </font>上传视频：</dt>
		    	<dd>
		    	     <?php if($upload_room == 0){ ?> 
		    	         <?php echo W('UploadAttach',array('limit'=>'1','allow_exts'=>'mp4,flv,f4v'));?>
		    	     <?php }else{ ?> 
						 <div id="content">
							<div class="swfupload-box">
							    <p>点击“浏览”按钮，选择您要上传的文件后，系统将自动上传并在完成后提示您。</p>
							    <p>一次只能上传一个视频文件！</p>
							    <p>支持流行视频格式flv，f4v，mp4</p>
								<form id="form1" action="index.php" method="post" enctype="multipart/form-data">
									<div class="fieldset flash" id="fsUploadProgress"></div>
									<div style="margin-top:15px;">
										<div style="width:auto;float:left;"><span id="spanButtonPlaceHolder" ></span></div>
										<input id="btnCancel" type="button" value="取消上传" onclick="testclick();" disabled="disabled" style="margin-left: 5px; font-size: 8pt; height: 29px;" />
									</div>
								</form>
							</div>
						</div>
					<?php } ?>
		    	</dd>
		    </dl>
		    
		    <dl class="lineD">
		    	<dt>课件上传：</dt>
		    	<dd>
		    		<?php echo W('Upload',array('callback'=>'filecallback','uploadType'=>'file','limit'=>1,'inputname'=>'videofile'));?>多个文件请打包上传
		    		<?php if($videofile_ids){ ?>
		    			<input type="hidden" name="videofile_ids" id="old_coursefile_ids" value="<?php echo ($videofile_ids); ?>" />
		    		<?php } ?>
		    	</dd>
		    </dl>
		    
		    <dl class="lineD" id="form_tag">
				<dt><font color="red"> * </font>课程标签：</dt>
		    	<dd>
					<input type="text" name="video_tag" id="form_video_tag" value="<?php echo ($str_tag); ?>" class="s-txt"  />
					<p>多个标签请以半角&lt;,&gt;逗号分割</p>
				</dd>
			</dl>
			
			<dl class="lineD">
		    	<dt>是否属于专辑：</dt>
		    	<dd>
		    		<input type="checkbox" id="is_part_album" name="is_part_album" <?php if($is_part_album){ ?>checked<?php } ?> value="1">设置为专辑课程
		    	</dd>
		    </dl>
		    
		    <dl class="lineD">
		    	<dt>所属专辑：</dt>
		    	<dd>
		    		<?php if(is_array($album_list)): ?><?php $i = 0;?><?php $__LIST__ = $album_list?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><input type="checkbox" name="album_id[]" <?php if( in_array($key , $album_ids) ){ ?>checked<?php } ?> value="<?php echo ($key); ?>"><?php echo ($vo); ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
		    	</dd>
		    </dl>
			
		    <dl class="lineD" id="form_teacherlist">
		    	<dt><font color="red"> * </font>讲师选择：</dt>
		    	<dd>
					<select name="trid">
					  	<?php if(isset($trlist)): ?><?php foreach($trlist as $key=>$tl): ?><option value="<?php echo ($tl["id"]); ?>" <?php if($teacher_id == $tl['id']){ ?>selected="selected"<?php } ?> ><?php echo ($tl["name"]); ?></option><?php endforeach; ?><?php endif; ?>
					</select>
		    	</dd>
		    </dl>
			
			<dl class="lineD" id="form_listingtime">
		    	<dt><font color="red"> * </font>上架时间：</dt>
		    	<dd>
		    		<input name="listingtime" type="text" value="<?php if($listingtime){ ?><?php echo date("Y-m-d H:i:s", $listingtime);?><?php } ?>" class="s-txt"  onfocus="core.rcalendar(this,'full');" readonly="readonly">
		    	</dd>
		    </dl>
		    
		    <dl class="lineD" id="form_uctime">
		    	<dt><font color="red"> * </font>下架时间：</dt>
		    	<dd>
		    		<input name="uctime" type="text" value="<?php if($uctime){ ?><?php echo date("Y-m-d H:i:s", $uctime);?><?php } ?>" class="s-txt" onfocus="core.rcalendar(this,'full');" readonly="readonly">
		    	</dd>
		    </dl>
		    
		    <?php if($_GET['id']){ ?>
		    <dl class="lineD" id="dl_author">
		    	<dt><font color="red"> * </font>创建者：</dt>
		    	<dd>
		    		<?php echo getUserSpace($uid);?>
		    	</dd>
		    </dl>
		    <?php } ?>
		     
		    <dl class="lineD" id="form_listingtime">
		    	<dt>是否参加限时打折：</dt>
		    	<dd>
		    		<input name="is_tlimit" id="is_tlimit" type="checkbox" value="1" <?php if($is_tlimit){ ?>checked<?php } ?> >勾选参加限时打折
		    	</dd>
		    </dl>
		    
		    <dl class="lineD" <?php if(!$is_tlimit){ ?> style="display:none"<?php } ?> id="form_limit_discount">
		    	<dt>限时折扣：</dt>
		    	<dd>
		    		<input name="limit_discount" id="limit_discount" <?php if(!$is_tlimit){ ?>readonly<?php } ?> type="text" value="<?php echo ($limit_discount); ?>" class="s-txt" style="width:100px">限时折扣(默认为原价，支持小数点后2位，请0-1之前的数字)
		    	</dd>
		    </dl>
		    
		    <dl class="lineD" <?php if(!$is_tlimit){ ?> style="display:none"<?php } ?> id="form_starttime">
		    	<dt>限时打折开始时间：</dt>
		    	<dd>
		    		<input name="starttime" type="text" <?php if(!$is_tlimit){ ?>readonly<?php } ?> id="starttime" value="<?php if($starttime){ ?><?php echo date("Y-m-d H:i:s", $starttime);?><?php } ?>" class="s-txt" style="width:100px" onfocus="core.rcalendar(this,'full');" readonly="readonly">
		    	</dd>
		    </dl>
		    
		    <dl class="lineD" <?php if(!$is_tlimit){ ?> style="display:none"<?php } ?> id="form_endtime">
		    	<dt>限时打折结束时间：</dt>
		    	<dd>
		    		<input name="endtime" type="text" <?php if(!$is_tlimit){ ?>readonly<?php } ?> value="<?php if($starttime){ ?><?php echo date("Y-m-d H:i:s", $endtime);?><?php } ?>" class="s-txt" style="width:100px" onfocus="core.rcalendar(this,'full');" readonly="readonly">
		    	</dd>
		    </dl>
		    
		    <dl class="lineD">
		    	<dt>是否精选：</dt>
		    	<dd>
		    		<input type="checkbox" id="is_best" name="is_best" <?php if($is_best){ ?>checked<?php } ?> value="1">设置精选
		    	</dd>
		    </dl>
		    
		    <input id="videokey" name="videokey" type="hidden" value="<?php echo ($qiniu_key); ?>">
		    
		    <div class="page_btm">
			<input type="submit" class="btn_b" value="保存" id="form_submit">
    	</div>
    	</div>
    	
    	
    </form>
    <script type="text/javascript">
		function j_validateCallback(form,call,callback) {
			var $form = $(form);
			if(typeof call != 'undefined' && call instanceof Function){    
				$i = call($form);
				if(!$i){
					return false;
				}
			}
			var _submitFn = function(){
				$.ajax({
					type: form.method || 'POST',
					url:$form.attr("action"),
					data:$form.serializeArray(),
					dataType:"json",
					cache: false,
					success: function(xMLHttpRequest, textStatus, errorThrown){
						if(typeof callback != 'undefined' && callback instanceof Function){   
							callback($form,xMLHttpRequest);
						}  
					},
					error: function(xhr, ajaxOptions, thrownError){
						ui.error("未知错误!");
					}
				});
			}
			_submitFn();
			return false;
		}
		
		function checkForm(form){
			var video_title = form.find('input[name="video_title"]').val();
			if(''==video_title){
				ui.error("课程标题不能为空");
				return false;
			}
			var video_intro = form.find('textarea[name="video_intro"]').val();
			if(''==video_intro){
				ui.error("课程简介不能为空");
				return false;
			}
			var v_price = form.find('input[name="v_price"]').val();
			if(''==v_price || undefined == v_price || v_price < 0 || v_price > 1000){
				ui.error("课程价格不能为空，或者范围有错");
				return false;
			}
			
			var listingtime = form.find('input[name="listingtime"]').val();
			if(''==listingtime){
				ui.error("上架架时间不能为空");
				return false;
			}
			
			var uctime = form.find('input[name="uctime"]').val();
			if(''==uctime){
				ui.error("下架时间不能为空");
				return false;
			} 
			
			var video_tag = form.find('input[name="video_tag"]').val();
			if(''==video_tag){
				ui.error("课程标签不能为空不能为空");
				return false;
			}
			var myAdminLevelhidden = form.find('input[name="myAdminLevelhidden"]').val();
			if('0'==myAdminLevelhidden){
				ui.error("请选择课程分类");
				return false;
			}
			var cover = form.find('input[name="cover_ids"]').val();
			if(''==cover){
				ui.error("请上传课程封面");
				return false;
			}
			/*
			var videokey=form.find('input[name="videokey"]').val();
			if(''==videokey){
				ui.error("请上传课程视频");
				return false;
			}
			*/
			return true;
			
		}
		function post_callback(_form,data){
			if(data.status != undefined){
				if(data.status == '0'){
					ui.error(data.info);
				} else {
					ui.success(data.info);
					window.location.href = U('classroom/AdminVideo/index')+"&tabHash=index";
				}
			}
		}
		//删除视频
		function deletevideo(key){
			
			if(''==key){
				ui.error("视频不存在！");
				return ;
			}
			$.ajax({
				type: 'POST',
				url:"<?php echo U('classroom/AdminVideo/deletevideo');?>",
				data:{videokey:key},
				dataType:"json",
				cache: false,
				success: function(data){
					if(data.status == '0'){
						ui.error(data.info);
					} else {
						$("#videokey").val("");//设置videokey为空
						$("#video_upload_d").css("display","block");//显示上传框
						$("#form_submit").attr('disabled',"true");//设置上传按钮为禁用
						ui.success(data.info);
						
					}
					
				},
				error: function(xhr, ajaxOptions, thrownError){
					ui.error("未知错误!");
				 
				}
			});
			
		}
		
    	function callback(data){
    		
    		$("#"+data.input_id+"").remove();
    		$("#image_"+data.input_id).append(
    			'<div id='+data.input_id+'>'
    			+'<img style="max-width:100px;padding:2px; border:1px solid #ccc" src='+UPLOAD_URL+'/'+data.src+' />'
    			+'</div>'
    		).find('input:file').val('');
    		$("#"+data.input_id+"_ids").val(data.attach_id);
    	}
    	function filecallback(data){
    		$("#old_coursefile_ids").remove();
    		$("#coursefile_ids").val(data.attach_id);
    	}
    	$(document).ready(function(){
			$('#detail_form input:file').click(function(){
				$('input:file').val('');
			});
    		$('#original_recommend').change(function(){ 
    			var che = $("#original_recommend").attr("checked");
			   	if(che == true){
			   		$("#re_sort").removeAttr("readonly");
			   	} else {
			   		$("#re_sort").attr("readonly",'readonly');
			   	}
			});
			$('#best_recommend').change(function(){ 
    			var che = $("#best_recommend").attr("checked");
			   	if(che == true){
			   		$("#be_sort").removeAttr("readonly");
			   	} else {
			   		$("#be_sort").attr("readonly",'readonly');
			   	}
			});
			
			$('#is_tlimit').change(function(){ 
    			var che = $("#is_tlimit").attr("checked");
			   	if(che == true){
			   		$("#form_limit_discount,#form_starttime,#form_endtime").show();
			   		$("#limit_discount,#starttime,#endtime").removeAttr("readonly");
			   	} else {
			   		$("#form_limit_discount,#form_starttime,#form_endtime").hide();
			   		$("#form_limit_discount,#form_starttime,#endtime").attr("readonly","readonly");
			   		$("#limit_discount,#starttime,#endtime").val('');
			   	}
			});
    	});
		
	</script>
<?php if(!empty($onload)){ ?>
<script type="text/javascript">
/**
 * 初始化对象
 */
//表格样式
$(document).ready(function(){
    <?php foreach($onload as $v){ echo $v,';';} ?>
});
</script>
<?php } ?>

<?php if(ACTION_NAME == 'feed'): ?>
<script type="text/javascript">
core.loadFile(THEME_URL+'/js/plugins/core.weibo.js', function () {
	setTimeout(function () {
        // 重写方法
        core.weibo.showBigImage = function (a, b) {
            var $parent = $('#tr' + a).find('div[model-node="feed_list"]');
            $parent.find('div').each(function () {
                var relVal = $(this).attr('rel');
                if (relVal == 'small') {
                    $(this).hide();
                } else if (relVal == 'big') {
                    $(this).show();
                }
            });
        };
	}, 1000);
});
</script>
<?php endif; ?>

</body>
</html>