<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>
	<?php if(($_title)  !=  ""): ?><?php echo ($_title); ?> - <?php echo ($site["site_name"]); ?>
	<?php else: ?>
		<?php echo ($site["site_name"]); ?> - <?php echo ($site["site_slogan"]); ?><?php endif; ?>
</title>
<meta content="<?php if(($_keywords)  !=  ""): ?><?php echo ($_keywords); ?><?php else: ?><?php echo ($site["site_header_keywords"]); ?><?php endif; ?>" name="keywords">
<meta content="<?php if(($_description)  !=  ""): ?><?php echo ($_description); ?><?php else: ?><?php echo ($site["site_header_description"]); ?><?php endif; ?>" name="description">
<meta name="viewport" charset="UTF-8" content="user-scalable=no"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta property="qc:admins" content="0540645511715620111306375" />
<meta property="wb:webmaster" content="06f27823f54630cf" />
<meta property="qc:admins" content="05406453557630517515663757" />

<link href="__THEME__/image/favicon.ico?v=<?php echo ($site["sys_version"]); ?>" type="image/x-icon" rel="shortcut icon">
<!-- 站点css -->
<link href="__THEME__/css/css.php?t=css&f=base.css,common.css,index.css,logincss.css,media.css,style.css,wenda.css&v=<?php echo ($site["sys_version"]); ?>.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/js/tbox/box.css?20110820" rel="stylesheet" type="text/css" />
<script>
//全局变量
var SITE_URL  = '<?php echo SITE_URL; ?>';
var UPLOAD_URL= '<?php echo UPLOAD_URL; ?>';
var THEME_URL = '__THEME__';
var APPNAME   = '<?php echo APP_NAME; ?>';
var MID		  = '<?php echo $mid; ?>';
var UID		  = '<?php echo $uid; ?>';
var initNums  =  '<?php echo $initNums; ?>';
var SYS_VERSION = '<?php echo $site["sys_version"]; ?>';
var _ROOT_    = '__ROOT__';
// Js语言变量
var LANG = new Array();
//注册登录模板
var REG_LOGIN="<?php echo U('public/Passport/regLogin');?>";
//邮箱验证地址
var CLICK_EMIL="<?php echo U('public/Passport/clickEmail');?>";
//异步注册地址
var REG_ADDRESS="<?php echo U('public/Passport/ajaxReg');?>";
//异步登录
var LOGIN_ADDRESS="<?php echo U('public/Passport/ajaxLogin');?>";
//退出登录
var LOGINOUT_ADDRESS="<?php echo U('public/Passport/logout');?>";
</script>
<?php if(!empty($langJsList)) { ?>
<?php if(is_array($langJsList)): ?><?php $i = 0;?><?php $__LIST__ = $langJsList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><script src="<?php echo ($vo); ?>?v=<?php echo ($site["sys_version"]); ?>"></script><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php } ?>
<!-- 站点js -->
<!--[if lt IE 9]><script src="js/html5.js" type="text/javascript"></script><![endif]-->
<script src="__THEME__/js/js.php?t=js&f=jquery-1.7.1.min.js,jquery.form.js,common.js,core.js,module.js,module.common.js,jwidget_1.0.0.js,jquery.atwho.js,jquery.caret.js,ui.core.js,ui.draggable.js,jquery.qrcode.min.js,plugins/core.comment.js,plugins/core.digg.js&v=<?php echo ($site["sys_version"]); ?>.js"></script>
<script src="__THEME__/js/plugins/core.comment.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/user/user.js"></script>
<script src="__THEME__/js/cyjs/title_common.js"></script>
<script src="__THEME__/js/cyjs/cyjs_common.js"></script>
<script src="__THEME__/js/cyjs/offlights.js"></script>

</head>
<body>



<?php if(empty($_SESSION['mid'])){ ?>
	<script>
var CLICK_VERIFY="<?php echo U('public/Passport/clickVerify');?>";
var CLICK_UNAME="<?php echo U('public/Passport/clickUname');?>";
var CLICK_PHONE="<?php echo U('public/Passport/clickPhone');?>";
var CLICK_PHONEVER="<?php echo U('public/Passport/clickPhoneVer');?>";
var SETUSERFACE="<?php echo U('public/Passport/setUserFace');?>";
var GET_PHONEVERIFY="<?php echo U('public/Passport/getVerify');?>";

//更换验证码
function changeverify(){
	var date = new Date();
    var ttime = date.getTime();
    var url = "__ROOT__/public/captcha.php";
    $('#verifyimg').attr('src',url+'?'+ttime);

};

/**
 * 取消注册
 */
function removeReg(){
    $("#transparent").css("display","none");
}
</script>
<div id="transparent">

  <div id="loging-worap-regsiter"> <a class="loging-Cancel" href="javascript:;" onclick="removeReg()">×</a>
      <!--登录-->
    <div id="loging-worap">
          <div class="title">登录</div>
          <div class="loging">
              <ul>
                  <li>
                      <label class="label">帐&nbsp; &nbsp;&nbsp;&nbsp;号:</label>
                      <input name="log_username" id="log_username" class="regsiter-width" maxlength="20"  type="text" placeholder="用户名/邮箱/手机">

                  </li>
                  <li>
                      <label class="label">密&nbsp; &nbsp;&nbsp;&nbsp;码:</label>
                      <input name="log_pwd" id="log_pwd"  class="regsiter-width" maxlength="20" type="password" placeholder="请输入登录密码">
                  </li>

              </ul>
              <div class="loging-xy">
                  <div class="loging-xy-bottom">
                      <input name=""  id="logSub" onclick="logSub()"  class="loging-xy-submit" type="submit" value="登录"/>
                      <a href="<?php echo U('home/Repwd/index');?>">忘记密码？</a></div>
                  <style>
                      .ico-sina{background:url("__APP__/image/LOGO_48x48.png");}
                      .ico-qzone{background:url("__APP__/image/QQ_Logo_wiki4848.png");}
                      .ico-renren{background:url("__APP__/image/Renren_logo_48×48.png");}
                  </style>

                  <div class="loging-bottom">
                      <?php if(Addons::requireHooks('login_input_footer') && Addons::hook('login_input_footer')): ?>
                      <div class="login-ft" style="">
                          <span>其它帐号登录：</span><?php echo Addons::hook('login_input_footer');?>
                      </div>
                      <?php endif; ?>
                  </div>
              </div>
          </div>
      </div>
      <!--注册-->
    <div id="regsiter-worap">
      <div class="title">注册</div>
      <form>
        <div class="regsiter">
          <div class="teb"><a href="javascript:;" class="f3"onclick="phoneReg(this)" >手机注册</a>&nbsp;&nbsp;|&nbsp;&nbsp;
          <a href="javascript:;"  onclick="emailReg(this)">邮箱注册</a></div>
          <!---手机注册-->
          <ul id="phoneReg">
           <li>
              <label class="label">手机号码:</label>
              <input class="regsiter-width" type="text" id="prphone" maxlength="11" placeholder="请输入手机号码">
            </li>
            <li>
              <label class="label">验&nbsp;证&nbsp;码:</label>
              <input class="width130" type="text" id="prverify" maxlength="6" placeholder="请输入收到的验证码">
              <a class="width80" href="javascript:;" onclick="getPhoneVerify()">获取验证码</a><span class="width97"  style="display:none" ><a id="dtime"></a> 重新发送</span> </li>
            <li>
              <label class="label">账户密码:</label>
              <input class="regsiter-width" id="prpassword" maxlength="20" type="password" placeholder="请输入用户密码，6-20个字符">
            </li>
            <li>
              <label class="label">&nbsp;</label>
              <input name="" onclick="phoneNext()" class="regsiter-xy-submit" type="button" value="下一步"/>
            </li>
          </ul>
          <!---邮箱注册--->
          <ul id="emailReg"  style="display: none">
            <li>
              <label class="label">邮箱地址</label>
              <input value="" class="regsiter-width" id="erusername" type="text" placeholder="请输入您的常用邮箱地址">
            </li>
            <li>
              <label class="label">图片验证</label>
              <input class="width121" type="text" id="erverify" placeholder="请输入右侧验证码">
              <a  href="#"><img class="width108" src="__ROOT__/public/captcha.php" title="点击刷新" onclick="changeverify()" id="verifyimg"></a> </li>
            <li>
              <label class="label">账户密码</label>
              <input value="" class="regsiter-width" id="erpasswrod" type="password" placeholder="请输入用户密码，6-20个字符">
            </li>

            <li>
              <label class="label">&nbsp;</label>
            <!--  <p class="p">错误提示</p>-->
              <input name="" onclick="onemaliNext()" class="regsiter-xy-submit" type="button" value="下一步"/>
            </li>
          </ul>
        </div>
      </form>
    </div>


  </div>
  <!--邮箱提示-->
 <!-- <div class="regsiter-main-msg">
    <h3><i class="tru"></i>验证邮件已发送，请前往邮箱点击激活链接完成注册</h3>
    <p class="p">注册邮箱：1111566555@admin.com</p>
    <div class="bottom"><a href="#" class="span">(20)重新发送</a><a href="#" class="a">前往邮箱 >></a></div>
  </div>-->
  <!--头像设置-->
   <!--<div class="regsiter-main-headerworap">
   <iframe src="<?php echo U('public/Passport/setUserFace');?>" frameborder="0" scrolling="no" width="814" height="426"></iframe>
   </div>-->
  <!--用户信息-->
	<div class="regsiter-main">
	    <h2>让学友们更了解你！</h2>
	    <form>
	      <ul class="">
	        <li>
	          <label class="label">昵称:</label>
	          <input class="width" id="uname" type="text" maxlength="6" placeholder="请输入用户昵称">
	        </li>
	        <li>
	          <label class="label">性别</label>
	          <input id="sex"  name="sex" type="radio" value="1"  checked="checked" />
	          <label>男</label>
	          <input id="sex" name="sex" type="radio" value="2" />
	          <label>女</label>
	        </li>
	        <li>
	          <label class="label">地区:</label>
	         <?php echo W('Area',array('curPro'=>$user['province'],'curCity'=>$user['city'],'area'=>$user['area'],'city_names'=>$user['location'],'tpl'=>'zyCardArea'));?>
	        </li>
	        <li>
	          <label class="label">职业:</label>
	          <input id="profession" class="width" type="text" maxlength="10" placeholder="请输入您的职业,10个字符内">
	        </li>
	        <li>
	          <label class="label">个人简介:</label>
	          <textarea id="intro" class="textareawidth" maxlength="500" placeholder="请输入个人简介,6-500个字符内" cols="" rows=""></textarea>
	        </li>
	      </ul>
	      <div class="bntbox"><a class="bnt" href="javascript:;" onclick="setUserInfo()">完成填写，注册！</a><a href="javascript:;" class="a" onclick="prevBang()">返回</a> </div>
	    </form>
    </div>
    <div id="loging-back"></div>
</div>
<script>
    $(document).keydown(function(event){
        if($("#transparent").css("display")=="block"){
            if(event.keyCode == 13){
                logSub();
            }
        }

    });
</script>
<?php } ?>
<!--header-->
<div class="header">
    <div class="header-top">
    	<div class="wrap">
            <div class="header-logo">
                <a href="/" title="Eduline"><img src="<?php echo ($site["logo_head"]); ?>"/></a>
            </div>
            <div class="header-search index">
                <form>
                	<input type="hidden" name="app" value="classroom" >
			        <input type="hidden" name="mod" value="Search" >
			        <input type="hidden" name="act" value="index" >
                    <input type="text" id="searchkey" name="searchkey" placeholder="搜索关键词">
                    <input type="submit" class="submit">
                </form>
            </div>
            <div class="header-login">
                <div class="login-ewm">
                	<img src="__THEME__/images/appdownload.png" class="lazyloading">
                    <p>eduline<br>客户端下载</p>
                </div>
                <?php if(empty($_SESSION['mid'])){ ?>
                	<div class="login-nav">
                		<a href="javascript:;" onClick="reg_login()">登录</a><span>/</span><a href="javascript:;" onClick="reg_login()">注册</a>
			    	</div>
			    <?php }else{ ?>
			    	<div class="login-box">
	                    <a href="<?php echo U('classroom/UserShow/index',array('uid'=>$_SESSION['mid']));?>"><img src="<?php echo getUserFace($_SESSION['mid']);?>" class="lazyloading"><span><?php echo getUserName($_SESSION['mid']);?></span></a>
	                    <dl class="login-after-position">
					         <dd class="login-after-bdbt"><a href="<?php echo U('classroom/Home/wenda');?>">我的问答</a></dd>
					         <dd class="login-after-bdbt"><a href="<?php echo U('classroom/Home/note');?>">我的笔记</a></dd>
					         <dd class="login-after-bdbt"><a href="<?php echo U('classroom/User/setInfo');?>">我的设置</a></dd>
					         <dd class="login-after-bdbt"><a href="<?php echo U('public/Message/index');?>">我的消息</a></dd>
					         <dd class="login-after-bdbt"><a href="javascript:;" onClick="logout()">退出</a></dd>
					     </dl>
	                </div>
	                <!--消息提示-->
				    <ul class="news-msg"
				          <?php if(!empty($mid) &&(!empty($unreadnum) || !empty($systemnum) || !empty($commentnum))){ ?>
				          		style="display:block;"
				          <?php }else{ ?>
				        		style="display:none;"
				          <?php } ?> >
				          <a class="shanchu-ico" href="javascript:;" onClick="closeMsg()">×</a>
				          <?php if(!empty($unreadnum) && !empty($mid)){ ?>
				                <li><?php echo ($unreadnum); ?>条新的私信，&nbsp;<a href="<?php echo U('public/Message/index');?>">查看消息</a></li>
				          <?php } ?>
				          <?php if(!empty($systemnum) && !empty($mid)){ ?>
				                <li><?php echo ($systemnum); ?>条新的系统消息，&nbsp;<a href="<?php echo U('public/Message/notify');?>">查看消息</a></li>
				          <?php } ?>
				          <?php if(!empty($commentnum) && !empty($mid)){ ?>
				                <li><?php echo ($commentnum); ?>条新的评论消息，&nbsp;<a href="<?php echo U('public/Message/comment');?>">查看消息</a></li>
				         <?php } ?>
				     </ul>
			    <?php } ?>
                
            </div>
        </div>
    </div>
    <div class="header-bot">
    	<div class="wrap">
            <ul class="header-nav">
                <?php if(is_array($site_top_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_top_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php if($vo["app_name"] == more): ?><li onmouseover="mouseup(this);" onmouseout="mouseout(this);">
		                <a href="<?php echo ($vo['url']); ?>" ><?php echo ($vo['navi_name']); ?></a>
		                <div id="menu_box">
		                  <?php if(is_array($vo['child'])): ?><?php $i = 0;?><?php $__LIST__ = $vo['child']?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$val): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a target="<?php echo ($val['target']); ?>" href="<?php echo ($val['url']); ?>" ><?php echo ($val['navi_name']); ?></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
		                </div>
		              </li>
		            <?php else: ?>
		      			  <li <?php if(APP_NAME == $vo['app_name'] || ( APP_NAME == 'classroom' && MODULE_NAME == $vo['app_name'] ) ){echo "class='active'";} ?>><a target="<?php echo ($vo['target']); ?>" href="<?php echo ($vo['url']); ?>" ><?php echo ($vo['navi_name']); ?></a></li><?php endif; ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?> 
	        	<?php if(!empty($_SESSION['mid'])){ ?>
	        		<li <?php if(MODULE_NAME == "Home" || MODULE_NAME=="User"){echo "class='active'";} ?> ><a href="<?php echo U('classroom/Home/video');?>" >管理中心</a></li>
	        	<?php } ?>
	        	
            </ul>
        </div>
    </div>
</div>
<!--右边浮动-->
<?php $videolisturl =  $mid ? U('classroom/Video/merge') :  "javascript:reg_login();"; ?>
<div id="albumShop" class="shopfixed"> 
	<a href="<?php echo $videolisturl; ?>" class="shop">&nbsp; 
		<span id="albumNum" class="shop-msg">
			  <?php if(function_exists('getVideoMergeNum')){ ?>
			  		<?php echo getVideoMergeNum($mid,session_id());?>
			  <?php } else { ?>
			  		0
			  <?php } ?>
	    </span>
	</a> 
	<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($site["site_qq"]); ?>&site=www.51eduline.com&menu=yes"   class="qa">&nbsp;</a> 
	<a href="#" class="wx">&nbsp;<div class="erwm"><img  src="<?php echo getAttachUrlByAttachId($site['site_qrcode']);?>"><i></i></div></a> 
</div>

<script>
function mouseup(cate){
  var left=$(cate).offset().left;
  $("#menu_box").css("display","block");
}
function mouseout(cate){
  $("#menu_box").css("display","none");
}

function closeMsg(){
    $(".news-msg").remove();
}

</script>


<!---选择地址弹出框-->
<script>
$(document).ready(function(){
	$('div.user-con-title a:eq(<?php echo intval($_GET["tab"]);?>)').click();
  $("#user-shcool_select").click(function(){
	 $(".user-fixdworap").css("display","block");
  });
});
</script>
<div class="worap position-rt">
    <!--左-->
    <div class="user-nav">
    <h2>管理</h2>
    <dl>
        <dt id="dshow"><a href="javascript:;" onclick="magbtn(this)">内容管理</a></dt>
        <dd <?php if(ACTION_NAME=="video"){echo "class='hover'";} ?>><a href="<?php echo U('classroom/Home/video');?>">课程</a></dd>
        <dd <?php if(ACTION_NAME=="album"){echo "class='hover'";} ?>><a href="<?php echo U('classroom/Home/album');?>">专辑</a></dd>
        <dd <?php if(ACTION_NAME=="course"){echo "class='hover'";} ?>><a href="<?php echo U('classroom/Home/course');?>">约课</a></dd>
        <dd <?php if(ACTION_NAME=="wenda"){echo "class='hover'";} ?>><a href="<?php echo U('classroom/Home/wenda');?>">问答</a></dd>
        <dd <?php if(ACTION_NAME=="wenti"){echo "class='hover'";} ?>><a href="<?php echo U('classroom/Home/wenti');?>">提问</a></dd>
        <dd <?php if(ACTION_NAME=="review"){echo "class='hover'";} ?>><a href="<?php echo U('classroom/Home/review');?>">点评</a></dd>
        <dd <?php if(ACTION_NAME=="note"){echo "class='hover'";} ?>><a href="<?php echo U('classroom/Home/note');?>">笔记</a></dd>
        <?php if($GLOBALS['ts']['teacher'] == 1){ ?>
        <dd <?php if(ACTION_NAME=="teacher_course"){echo "class='hover'";} ?> ><a href="<?php echo U('classroom/Home/teacher_course');?>">我的授课</a>
        <dd <?php if(ACTION_NAME=="teacherVideo"){echo "class='hover'";} ?> ><a href="<?php echo U('classroom/User/teacherVideo');?>">我上传的课程</a>
        <?php } ?>
    </dl>
    
    <dl>
        <dt id="dshow"><a href="javascript:;" onclick="magbtn(this)">财富管理</a></dt>
        <dd <?php if(ACTION_NAME=="recharge"){echo "class='hover'";} ?> ><a href="<?php echo U('classroom/User/recharge');?>">充值</a></dd>
        <dd <?php if(ACTION_NAME=="account"){echo "class='hover'";} ?> ><a href="<?php echo U('classroom/User/account');?>">余额</a></dd>
        <dd <?php if(ACTION_NAME=="card"){echo "class='hover'";} ?> ><a href="<?php echo U('classroom/User/card');?>">绑定银行卡</a></dd>
    </dl>

    <dl>
        <dt id="dshow"><a href="javascript:;" onclick="magbtn(this)">账户管理</a></dt>
        <dd <?php if(ACTION_NAME=="setInfo"){echo "class='hover'";} ?> ><a href="<?php echo U('classroom/User/setInfo');?>">账户设置</a></dd>
        <?php if($GLOBALS['ts']['teacher'] == 1){ ?>
        <dd <?php if(ACTION_NAME=="teachcourse"){echo "class='hover'";} ?> ><a href="<?php echo U('classroom/User/teachcourse');?>">授课课程设置</a>
        <dd <?php if(ACTION_NAME=="teacherDeatil"){echo "class='hover'";} ?> ><a href="<?php echo U('classroom/User/teacherDeatil');?>">教师信息设置</a>
        <?php } ?>
    </dl>
</div>
    <!--中 -->
    <div class="user-con fl user-pbottom">
        <div class="user-con-title">
            <a href="javascript:void(0);" class="onactive" >基本信息</a>
            <a href="javascript:void(0);">头像设置</a>
            <a href="javascript:void(0);">修改密码</a>
            <a href="javascript:void(0);">申请认证</a>
            <a href="javascript:void(0);">帐号绑定</a>
        </div>
        <div class="user-Release" >
                <style type="text/css">
                    .modify_pe{ width:610px;height: auto; line-height:30px; position:relative; float:left; }
                    .modify_pe input{position:absolute;top:0;left:0px;height:28px;border:1px solid #CCC;vertical-align:middle;padding:0 5px;color:#666; width:200px;}
                    .modify_pe input:focus{border-color:#2388c0}
                    .modify_pe a{color:#2388c0; margin-left:10px; vertical-align:middle}
                    .modify_pe a.btn{position:absolute;top:0;left:210px;height:30px;padding:0 15px; line-height:30px;background:#2B92F9;color:#FFF;}
                    .modify_pe a.btn:hover{background:#1981E8;}
                    .modify_pe p{display:block;height:18px;position:absolute; text-indent:22px;line-height:18px;top:5px; left:330px; font-size:12px; color:#999999}
                    .user-set-sz li p{ left:115px}
                    .user-set-sz{ padding-left:130px}
                    .user-set-sz .user-submit{ width:332px;margin-top:30px;}
                    .select{ height:22px;}
            </style>
            	<div class=" Manage_all" id="basic_sets">
            	<form action="" method="post" onsubmit="return false;">
                <!-- start modify phone -->
                <?php if($user['phone']): ?>
                <div class="clearfix modify_phone" style="display:none">
                	<span class="selected_title  fl">
                       <em>*</em> 手机号：
                    </span>
                    <div class="modify_pe modify_pe fl">
                    	<?php $phone = substr($user['phone'],0,3).'****'.substr( $user['phone'] , 7); ?>
                    	<strong><?php echo ($phone); ?></strong><a href="javascript:;" type="code" step="1" class="btn" style="width:91px;text-align:center">获取验证码</a><p class="warn">手机号用于密码找回和重要信息接收</p>
                    </div>
                </div>
                <div class="clearfix modify_phone" style="display:none">
                	<span class="selected_title selected_title_a color_hui fl">
                       <em>*</em> 验证码：
                    </span>
                    <div class="modify_pe fl"><input type="text" value="" class="user-width fl" style="padding:0; margin:0"/><a href="javascript:;" class="btn" type="submit" step="1">提交</a><span></span>
                    </div>
                </div>
                <?php endif; ?>
                <!-- 新号码 -->
                <div class="clearfix modify_phone check" style="display:none">
                	<span class="selected_title  fl">
                       <em>*</em> 新手机号：
                    </span>
                    <div class="modify_pe fl"><input type="text" value="" class="user-tex border" /><a href="javascript:;" class="btn" type="code" step="2" style="width:91px;text-align:center">获取验证码</a><p>手机号用于密码找回和重要信息接收</p>
                    </div>
                </div>
                <div class="clearfix  modify_phone check" style="display:none">
                	<span class="selected_title fl">
                       <em>*</em> 验证码：
                    </span>
                    <div class="modify_pe fl"><input type="text" value="" /><a href="javascript:;" class="btn" type="submit" step="2">提交</a><span></span>
                    </div>
                </div>
				<!-- end modify phone -->
                <!--基本信息-->
                <ul class="user-set-sz">
     <li>
        <label class="label"><em>*</em> 登录帐号：</label>
        <span  id="set_user_login"><?php echo ($user["login"]); ?></span>
      </li>
       <li>
        <label class="label"><em>*</em> 昵 称：</label>
        <input name="uname" class="user-width" style="border: 1px solid #cce4f4;" type="text" placeholder="" value="<?php echo strpos($user['uname'],'@')?'':$user['uname'];?>">
      </li>
       <li>
        <label class="label"><em>*</em> 手机号码：</label>
        <?php ;$phone = $user['phone']?substr($user['phone'],0,3).'****'.substr( $user['phone'] , 7):'未设置' ?>
        <div class="user-tex"><span><?php echo ($phone); ?></span></div><a id="modify_phone" href="javascript:;" class="user-btn"><?php echo ($user['phone']?'修改':'设置'); ?></a>
        <p style=" display:none"><em class="user-stop"></em>用于密码找回和重要信息接收</p>
      </li>
      <li class="modify_email">
        <label class="label"><em>*</em> 常用邮箱：</label>
        <div id="modify_pe_show" class="user-tex"><span><?php echo ($user["email"]); ?></span><a style="color:#65addd" href="javascript:;" <?php echo ($user['mail_activate']?'':'type="activate"'); ?>><?php echo ($user['mail_activate']?'已验证':'验证邮箱'); ?></a></div><a href="javascript:;" type="edit" class="user-btn">修改</a>
        <div id="modify_pe_edit" style="display:none"><input class="user-tex" type="text" value="<?php echo ($user["email"]); ?>" old="<?php echo ($user["email"]); ?>" /><a href="javascript:;" class="user-btn" type="save">保存</a></div>
        <p style=" display:none"><em class="user-stop"></em><span class="note">用于密码找回和重要信息接收</span></p>
      </li>
      <li>
        <label class="label"><em>*</em> 性别：</label>
        <input type="radio" value="1" name="sex" <?php echo ($user['sex']==1?'checked':''); ?>/>
        <label>男&nbsp;&nbsp;&nbsp;</label>
         <input type="radio" value="2" name="sex" <?php echo ($user['sex']==2?'checked':''); ?>/>
        <label>女</label>
      </li>
      <li>
        <label class="label"><em>*</em> 地区：</label>
       <?php echo W('Area',array('curPro'=>$user['province'],'curCity'=>$user['city'],'area'=>$user['area'],'city_names'=>$user['location'],'tpl'=>'zyCardArea'));?>
      </li>
      <li>
        <label class="label"><em>&nbsp;&nbsp;</em>职  业：</label>
        <input class="user-width" name="profession" type="text" placeholder="" value="<?php echo ($user['profession']); ?>">
      </li>
      <li>
        <label class="label"><em>&nbsp;&nbsp;</em>个人简介：</label>
        <textarea id="" class="user-textarea" name="intro"><?php echo ($user["intro"]); ?></textarea>
      </li>
    
    <li>
        <label class="label">&nbsp;</label>
        <input  class="user-submit" type="submit"  onclick="setUserInfo(this)" value="保 存">
      </li>
      </ul>
<script src="__THEME__/js/gjwjs/jquery.mzcategory.js" type="text/javascript"></script>
<script type="text/javascript">
function setUserInfo(a){
	var form = $(a).parents('form');
	var province = form.find('select#province option:selected').val();
	var city     = form.find('select#city option:selected').val();
	var uname    = form.find('input[name=uname]');
	if(!$.trim(uname.val())){
		notes('昵称必须要填写', 'failure');
		uname.focus(); return false;
	}
	if(!/^[\u4E00-\u9FA5\w]{1,}$/.test(uname.val())){
		notes('昵称仅支持中英文、数字、下划线', 'failure');
		uname.focus(); return false;
	}
	if(province<=0||city<=0){
		notes('请先选择地区', 'failure');
		return false;
	}
	$.post(U('classroom/User/saveUser'), form.serialize(), function(data){
		if(data.status){
			notes('基本信息更改成功', 'success');
			setTimeout('window.location.reload();', 2000);
		}else{
			notes(data.info, 'failure');
		}
	}, 'json');
}
</script>
</form>
            </div>
            <!-- 头像设置 -->
            <div class="mt50 plr20 Manage_all clearfix" style="width:520px;display:none">
              <?php echo W('Avatar',array('avatar'=>$user,'defaultImg'=>$user['avatar_big'],'theme'=>'zyAvatar'));?>
            </div>
            <!-- 头像设置 -->
            <!-- 修改密码 -->
            <div class=" Manage_all" style="display:none;">
            <form>
            <p style=" height:50px; line-height:40px; font-size:12px; padding-left:140px">密码由字母，数字，符号组成，6-15个字符，区分大小写</p>
            <ul class="user-set-sz">
     <li>
        <label class="label"><em>*</em> 原始密码：</label>
        <input class="user-width" type="password" id="head_search" rel="请输入原密码" name="oldpassword">
      </li>
      <li>
        <label class="label"><em>*</em> 新密码：</label>
        <input class="user-width" type="password" id="head_search" rel="请输入新密码" name="password">
      </li>
      <li>
        <label class="label"><em>*</em> 确认密码：</label>
        <input class="user-width" type="password" id="head_search" rel="请输入确认密码" name="repassword">
      </li>
      <li>
        <label class="label">&nbsp;</label>
        <input  class="user-submit"  id="edit-password"  type="submit"  value="保 存">
      </li>
      </ul>
       </form>
            </div>
            <!-- 修改密码结束 -->
            <!--  申请认证 -->
            <div class=" Manage_all" style="display:none;">
            	<form id="renzhengform" method="post" action="" onsubmit="return false;">
                <input type="hidden" name="vtype" value="<?php echo ($verifyInfo['usergroup_id']); ?>" id="vtype">
                <ul class="user-set-sz">
     <li>
        <label class="label"><em>*</em> 当前状态：</label>
        <span><?php echo ($status); ?></span>
      </li>
       <?php if($edit == 1 || !$verifyInfo){ ?>
       <li>
        <label class="label"><em>*</em> 认证类型：</label>
        <?php if(is_array($auType)): ?><?php $i = 0;?><?php $__LIST__ = $auType?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$rs): ?><?php ++$i;?><?php $mod = ($i % 2 )?><input type="radio" value="<?php echo ($rs["user_group_id"]); ?>" name="usergroup_id" onclick='changeText(<?php echo ($rs["user_group_id"]); ?>)' class="usergroup_id" id="renzhenglx_<?php echo ($rs["user_group_id"]); ?>" <?php if(($verifyInfo['usergroup_id']=="" &&  $vo['user_group_id']==5) || $vo['user_group_id']==$verifyInfo['usergroup_id']){ ?>checked="checked"<?php } ?> >
        <label for="renzhenglx_<?php echo ($rs["user_group_id"]); ?>">&nbsp;<?php echo ($rs["user_group_name"]); ?></label><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </li>
      <li>
      <label class="label"><em>*</em> 认证分类：</label>
      <select name="user_verified_category_id" id="user_verified_category_id">
        <option value="0">请选择认证分类</option>
        <?php if(is_array($verified_category)): ?><?php $i = 0;?><?php $__LIST__ = $verified_category?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$val): ?><?php ++$i;?><?php $mod = ($i % 2 )?><option value="<?php echo ($val["user_verified_category_id"]); ?>"><?php echo ($val["title"]); ?></option><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </select>
      </li>
      <li>
        <label class="label"><em>*</em> 真实姓名：</label>
       <input type="text" class="user-width" name="realname" id="realname" <?php if($verifyInfo['verified'] !== ""){ ?>value="<?php echo ($verifyInfo['realname']); ?>"<?php } ?> class="head_search upload_input_a" rel="真实姓名">
      </li>
       <li>
        <label class="label"><em>*</em> 身份证号：</label>
       <input type="text" class="user-width" name="idcard" id="idcard" <?php if($verifyInfo['verified'] !== ""){ ?>value="<?php echo ($verifyInfo['idcard']); ?>"<?php } ?> class="head_search upload_input_a" rel="身份证号">
      </li>
		<li>
        <label class="label"><em>&nbsp;&nbsp;</em>个人地址：</label>
        <input name="address" class="user-width" id="address" <?php if($verifyInfo['verified'] !== ""){ ?>value="<?php echo ($verifyInfo['address']); ?>"<?php } ?> class="head_search upload_input_a" rel="个人地址"/>
      </li>
      <li>
        <label class="label"><em>*</em> 联系电话：</label>
        <?php if($verifyInfo['phone']){
                            	$phone = $verifyInfo['phone'];
                            }elseif($user['phone']){
                            	$phone = $user['phone'];
                            }else{
                            	$phone = null;
                            } ?>
        <input class="user-width" <?php echo $phone?' readonly value="'.$phone.'"':'';?> type="text" name="phone" id="phone" rel="联系电话">
      </li>
      <li>
        <label class="label"><em>*</em> 认证理由：</label>
       <textarea id="reason" class="user-textarea" name="reason"><?php if($verifyInfo['verified'] !== ""){ ?><?php echo (format($verifyInfo['reason'])); ?><?php } ?></textarea>
      </li>
      <li style="height:auto;">
      <style type="text/css">
.input-content{ padding-top:55px;}
.input-content .image-list:after{content:".";display:block;height:0;clear:both;visibility:hidden;}
.input-content .image-list li{ float:left; height:140px; width:100px; overflow:hidden; text-align:center; margin-left:2px;padding-bottom: 0;}
.input-content .image-list li img{ width:100px; height:100px;}
.input-content .weibo-file-list li{ line-height:30px; position:relative; border:1px solid #EEE; margin-bottom:10px;}
.input-content .weibo-file-list li a.ico-close{ position:absolute; top:6px; right:10px;}
.input-content .weibo-file-list li a.ico-close,.input-content .weibo-file-list li a.ico-close:hover{background:url(__THEME__/image/del.png) no-repeat 0 0;width:18px;height:18px;display:inline-block;overflow:hidden;vertical-align:0;_vertical-align:2px;_background:url(__THEME__/image/del.gif) no-repeat 0 0;}
.input-content .weibo-file-list li a.ico-close:hover{background-position:0 -50px;vertical-align:0;_vertical-align:2px}

.ico-doc-small, .ico-docx-small, .ico-xls-small, .ico-xlsx-small, .ico-txt-small, .ico-pdf-small, .ico-pdfx-small, .ico-ppt-small, .ico-pptx-small, .ico-pic-small, .ico-jpg-small, .ico-jpeg-small, .ico-gif-small, .ico-png-small, .ico-bmp-small, .ico-tif-small, .ico-rar-small , .ico-zip-small , .ico-doc, .ico-docx, .ico-xls, .ico-xlsx, .ico-txt, .ico-pdf, .ico-pdfx, .ico-ppt, .ico-pptx, .ico-pic, .ico-jpg, .ico-jpeg, .ico-gif, .ico-png, .ico-bmp, .ico-tif, .ico-rar, .ico-zip,.ico-attach
{width:16px;height:16px;background:url(__THEME__/image/ico-file.png) no-repeat;display:inline-block;vertical-align:middle;overflow:hidden;margin:0 5px 0 0}

.ico-doc-small, .ico-docx-small, .ico-xls-small, .ico-xlsx-small, .ico-txt-small, .ico-pdf-small, .ico-pdfx-small, .ico-ppt-small, .ico-pptx-small, .ico-pic-small, .ico-jpg-small, .ico-jpeg-small, .ico-gif-small, .ico-png-small, .ico-bmp-small, .ico-tif-small, .ico-rar-small, .ico-zip-small{width:18px;height:18px;vertical-align: -4px;}

.ico-doc, .ico-docx, .ico-xls, .ico-xlsx, .ico-txt, .ico-pdf, .ico-pdfx, .ico-ppt, .ico-pptx, .ico-pic, .ico-jpg, .ico-jpeg, .ico-gif, .ico-png, .ico-bmp, .ico-tif, .ico-rar, .ico-zip{width:48px;height:48px}


.ico-doc{background-position:0 0}          .ico-doc-small{background-position:0 -58px}
.ico-docx{background-position:0 0}         .ico-docx-small{background-position:0 -58px}
.ico-xls{background-position:-58px 0}      .ico-xls-small{background-position:-28px -58px}
.ico-xlsx{background-position:-58px 0}     .ico-xlsx-small{background-position:-28px -58px}
.ico-txt{background-position:-174px 0}     .ico-txt-small{background-position:-84px -58px}
.ico-pdf{background-position:-116px 0}     .ico-pdf-small{background-position:-56px -58px}
.ico-pdfx{background-position:-116px 0}    .ico-pdfx-small{background-position:-56px -58px}
.ico-ppt{background-position:-232px 0}     .ico-ppt-small{background-position:-112px -58px}
.ico-pptx{background-position:-232px 0}    .ico-pptx-small{background-position:-112px -58px}
.ico-pic{background-position:-290px 0}     .ico-pic-small{background-position:-140px -58px}
.ico-jpg{background-position:-348px 0}     .ico-jpg-small{background-position:-168px -58px}
.ico-jpeg{background-position:-348px 0}    .ico-jpeg-small{background-position:-168px -58px}
.ico-gif{background-position:-406px 0}     .ico-gif-small{background-position:-196px -58px}
.ico-png{background-position:-522px 0}     .ico-png-small{background-position:-252px -58px}
.ico-bmp{background-position:-580px 0}     .ico-bmp-small{background-position:-280px -58px}
.ico-tif{background-position:-464px 0}     .ico-tif-small{background-position:-224px -58px}
.ico-rar{background-position:-638px 0}     .ico-rar-small{background-position:-308px -58px}
.ico-zip{background-position:-638px 0}     .ico-zip-small{background-position:-308px -58px}
.ico-attach{background-position:-365px -59px;width:14px;height:15px;display:inline-block;vertical-align:top;margin:1px 0 0 5px;*margin-top:-2px;}

</style>
		<label class="label"><em>*</em> 认证附件：</label>
        <div class="user-tex">
        <?php echo W('Upload',array('attachIds'=>$verifyInfo['attachIds'], 'uploadType'=>'image', 'urlquery'=>'attach_type=feed_image&upload_type=image&thumb=1'));?>
        </div>
       <p style="">认证本人手持身份证照片，证件所有信息清晰可见，手持证件人的五官清晰可见。教师认证必须上传教师资格证等其相关证明<a href="javacript:;" style="color:#2388c0; display:none">参考实例</a></p>
      </li>
      <li>
        <label class="label">&nbsp;</label>
        <input  class="user-submit" onclick="saveVerify();" type="submit" value="保 存">
      </li>
      </ul>
                <?php }else{ ?>

         <li>
        <label class="label"><em>*</em> 认证类型：</label>
        <label> 
        <?php if(is_array($auType)): ?><?php $i = 0;?><?php $__LIST__ = $auType?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php if($vo['user_group_id']==$verifyInfo['usergroup_id']){ ?><label><?php echo ($vo["user_group_name"]); ?></label><?php } ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?></label>
      </li>
      <li>
      <label class="label"><em>*</em> 认证分类：</label>
      <?php if(is_array($verified_category)): ?><?php $i = 0;?><?php $__LIST__ = $verified_category?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$val): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php 
        if($val['user_verified_category_id']==$verifyInfo['user_verified_category_id']){ ?>
        <?php echo ($val["title"]); ?>
      <?php } ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </li>
       <li>
        <label class="label"><em>*</em> 真实姓名：</label>
       <label><?php echo ($verifyInfo['realname']); ?></label>
      </li>
       <li>
        <label class="label"><em>*</em> 身份证号：</label>
       <label><?php echo ($verifyInfo['idcard']); ?></label>
      </li>
	   <li>
        <label class="label"><em>&nbsp;&nbsp;</em>个人地址：</label>
        <label> <?php echo ($verifyInfo['address']?:'无'); ?></label>
      </li>
       <li>
        <label class="label"><em>*</em> 联系电话：</label>
        <label><?php echo ($verifyInfo['phone']); ?></label>
      </li>
       <li>
        <label class="label"><em>*</em> 认证理由：</label>
        <label><?php echo ($verifyInfo['reason']); ?></label>
      </li>
       <li>
        <label class="label"><em></em> 认证附件：</label>
        <label><?php if($verifyInfo['attachment']){ ?><?php echo ($verifyInfo['attachment']); ?><?php }else{ ?>无<?php } ?></label>
      </li>
                <?php } ?>
                </form>
            </div>
            <!--  申请认证 -->
            <!-- 账号绑定 -->
            <div class="pb40 plr40 clearfix Manage_all" style="display:none;">
              <div class="mt30">
                    <ul class="txt_bar_a">
                       <?php if(isset($bindType['sina'])):$rs = $bindData[$bindType['sina']];?>
                       <li>
                           <div class="txt_bar_div">
                               <span class="txt_bar_span1">新浪微博</span>
                               <?php if($rs['isBind']):?>
                               <a class="fr color_blue ml30" href="javascript:;" onclick="unbind('<?php echo ($rs["name"]); ?>','<?php echo ($rs["type"]); ?>','<?php echo ($rs["addon"]); ?>','<?php echo ($rs["unbind_hook"]); ?>');">解除绑定</a>
                               <?php else:?>
                               <a class="Share sel_w fr mt4" target="_blank" href="<?php echo Addons::createAddonShow($rs['addon'],$rs['bind_hook'],array('type'=>$rs['type'],'do'=>'bind'));?>">点击绑定</a>
                               <?php endif;?>
                           </div>
                           <div class="mt10 Introduction">
                               <p class="ml85 fb lh30">绑定新浪微博后，你可以：</p>
                               <p class="ml85 lh30">快速找到已加入Eduline的好友，和他们一起学习 </p>
                               <p class="ml85 lh30">邀请好友加入Eduline，和你一起学习</p>
                           </div>
                       </li>
                       <?php endif;?>
                       <?php if(isset($bindType['qzone'])):$rs = $bindData[$bindType['qzone']];?>
                       <li>
                           <div class="txt_bar_div">
                           <span class="txt_bar_span2">腾讯QQ</span>
                               <?php if($rs['isBind']):?>
                               <a class="fr color_blue ml30" href="javascript:;" onclick="unbind('<?php echo ($rs["name"]); ?>','<?php echo ($rs["type"]); ?>','<?php echo ($rs["addon"]); ?>','<?php echo ($rs["unbind_hook"]); ?>');">解除绑定</a>
                               <?php else:?>
                               <a class="Share sel_w fr mt4" target="_blank" href="<?php echo Addons::createAddonShow($rs['addon'],$rs['bind_hook'],array('type'=>$rs['type'],'do'=>'bind'));?>">点击绑定</a>
                               <?php endif;?>
                           </div>
                           <div class="Introduction">
                               <p class="ml85 fb lh30">绑定QQ后，你可以：</p>
                               <p class="ml85 lh30">快速找到已加入Eduline的好友，和他们一起学习</p>
                               <p class="ml85 lh30">邀请好友加入Eduline，和你一起学习</p>
                           </div>
                       </li>
                       <?php endif;?>
                       <?php if(isset($bindType['renren'])):$rs = $bindData[$bindType['renren']];?>
                       <li>
                           <div class="txt_bar_div mt10">
                           <span class="txt_bar_span3">人人网</span>
                               <?php if($rs['isBind']):?>
                               <a class="fr color_blue ml30" href="javascript:;" onclick="unbind('<?php echo ($rs["name"]); ?>','<?php echo ($rs["type"]); ?>','<?php echo ($rs["addon"]); ?>','<?php echo ($rs["unbind_hook"]); ?>');">解除绑定</a>
                              <?php else:?>
                               <a class="Share sel_w fr mt4" target="_blank" href="<?php echo Addons::createAddonShow($rs['addon'],$rs['bind_hook'],array('type'=>$rs['type'],'do'=>'bind'));?>">点击绑定</a>
                               <?php endif;?>
                           </div>
                           <div class="Introduction">
                               <p class="ml85 fb lh30">绑定人人网后，你可以：</p>
                               <p class="ml85 lh30">快速找到已加入Eduline的好友，和他们一起学习</p>
                               <p class="ml85 lh30">邀请好友加入Eduline，和你一起学习</p>
                           </div>
                       </li>
                       <?php endif;?>
                       <?php if(isset($bindType['weixin'])):$rs = $bindData[$bindType['weixin']];?>
                       <li>
                           <div class="txt_bar_div">
                           <span class="txt_bar_span4">微信</span>
                               <?php if($rs['isBind']):?>
                               <a class="fr color_blue ml30" href="javascript:;" onclick="unbind('<?php echo ($rs["name"]); ?>','<?php echo ($rs["type"]); ?>','<?php echo ($rs["addon"]); ?>','<?php echo ($rs["unbind_hook"]); ?>');">解除绑定</a>
                               <?php else:?>
                               <a class="Share sel_w fr mt4" target="_blank" href="<?php echo Addons::createAddonShow($rs['addon'],$rs['bind_hook'],array('type'=>$rs['type'],'do'=>'bind'));?>">点击绑定</a>
                               <?php endif;?>
                           </div>
                           <div class="Introduction">
                               <p class="ml85 fb lh30">绑定微信后，你可以：</p>
                               <p class="ml85 lh30">快速找到已加入Eduline的好友，和他们一起学习</p>
                               <p class="ml85 lh30">邀请好友加入Eduline，和你一起学习</p>
                           </div>
                       </li>
                       <?php endif;?>
                    </ul>
</div>
            </div>
            <!-- 账号绑定结束 -->
        </div>

    </div>
    <!--右-->
    
<div class="user-r fl">
    <div class="user-rheader back"> <img src="<?php echo getUserFace($user['uid'],'b');?>">
        <h2><?php echo strip_tags(getUserSpace($user['uid']),'<img>');?></h2>
        <?php $credits = getUserCredit($uid);?>
        <?php $tmp = getFollowCount(array($uid));?>
        <ul>
            <li>课程：<?php echo ($videocont); ?></li>
            <li>学币：<?php echo unLast0(getUserLearncoin($uid));?></li>
            <li>提问：<?php echo ($twcont); ?></li>
            <li>回答：<?php echo ($commcont); ?></li>
            <li>粉丝：<?php echo ($tmp[$uid]['follower']); ?></li>
            <li>学分：<span id="setCreditScore"><?php echo ($credits['credit']['score']['value']); ?></span></li>
            <li>问答：<?php echo ($wdcont); ?></li>
            <li>笔记：<?php echo ($note); ?></li>
        </ul>
        <?php echo W('CheckIn', array('tpl'=>'zy'));?>

    </div>
</div>

<script type="text/javascript">
function setCreditScore(num){
	if(!num) return ;

	setTimeout(function(){
		var val = parseInt($('#setCreditScore').text());
		$('#setCreditScore').text(val+num);
	}, 2000);
	
}
</script>

</div>


<script type="text/javascript">
$(".user-con-title a").click(function(){
	$(this).addClass("onactive").siblings().removeClass();
	var index = $(this).index();
	$(".Manage_all").hide().eq(index).show();
});
$('#modify_phone').click(function(){
	$(this).parents('.Manage_all form').children().hide();
	$('#basic_sets .modify_phone').hide().slice(0,2).show();
});
$('#basic_sets .modify_phone a').click(function(){
	var _this = $(this);
	if(_this.data('locked')) return;
	_this.data('locked', true);

	var type  = _this.attr('type');
	var step  = _this.attr('step');
	var span  = _this.next();
	var input = _this.prev();
	input.val($.trim(input.val()));
	if(type == 'code'){
		_this.text('正在发送');
		if(_this.attr('step') == 2){
			if(!input.val()){
				span.removeClass().addClass('err').text('请先输入手机号');
				input.focus(); _this.data('locked', false); return ;
			}
			var post = {phone:input.val()}
		}else{
			post = {}}
		$.post(U('classroom/User/sendCode'),post, function(data){
			if(data == 'ok'){
				span.removeClass().addClass('ok').text('短信验证码已发送至您的手机，请输入后继续');
				var time = 90;
				var _codesetInterval = setInterval(function(){
					 if(time <= 0){
						 _this.text('获取验证码').data('locked', false);
						 clearInterval(_codesetInterval);
					 }else{
						 _this.text('重新获取( '+time+' )');
						 time--;
					 }
				}, 1000);
			}else{
				span.removeClass().addClass('err').text(data);
				_this.text('获取验证码').data('locked', false);
			}
		});
	}else if(type == 'submit'){
		span.removeClass().text('')
		if(!input.val()){
			 notes('请输入验证码','failure');	
			input.focus();_this.data('locked', false);return;
		}
		var post = {code:input.val()};
		if(_this.attr('step') == 2){
			var input0 = _this.parents('.modify_phone').prev().find('input:first');
			if(!input0.val()){
				input0.next().next().removeClass()
				 .addClass('err').text('请先输入手机号');
				 _this.data('locked', false);
				input0.focus(); return ;
			}
			post.phone = input0.val();
		}
		$.post(U('classroom/User/checkCode'),post,function(data){
			if(data == 'ok'){
				if(typeof post.phone == 'undefined'){
					var box = $('#basic_sets .modify_phone').hide();
					box.slice(0,2).hide(); box.slice(2,4).show();
				}else{
					span.addClass('ok').text('手机号已经成功更改');
					setTimeout('window.location.reload()', 2000);
				}
			}else{
				span.addClass('err').text(data);
				_this.data('locked', false);
			}
		});
	}
});
$('.modify_email a').click(function(){
	var _this = $(this);
	var type  = _this.attr('type');
	if(type  == 'edit'){
		$('#modify_pe_edit').show();
		$('#modify_pe_show').hide();
		_this.hide();
		_this.siblings('p').find('span').text('用于密码找回和重要信息接收');
	}else if(type == 'save'){
		var input = _this.prev();
		input.val($.trim(input.val()));
		if(!input.val()||input.val().toLowerCase()
		   ==input.attr('old').toLowerCase()){
			$('#modify_pe_show').show();
			_this.parent().hide().prev().show();
			input.val(input.attr('old'));
		}else if(!/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/.test(input.val())){
			notes('请输入正确的电子邮箱地址！', 'failure');return ;
		}else{
			$.post(U('classroom/User/setEmail'),{email:input.val()},function(data){
				if(data == 'ok'){
					notes('Email已经成功更改', 'success');
					input.val(input.val()).attr('old', input.val());
					_this.parent().hide().prev().show();
					$('#modify_pe_show').show();
					$('#modify_pe_show').find('a').text('验证邮箱')
					.attr('type', 'activate').data('locked', false);
					$('#modify_pe_show span').text(input.val());
					$('#set_user_login').text(input.val());
					_this.parent().siblings('p').find('span').text('用于密码找回和重要信息接收');
				}else{
					notes(data, 'failure');
				}
			});
		}
	}else if(type == 'activate'){
		var _this = $(this);
		if(_this.data('locked')){
			return ;
		}
		_this.text('正在发送').data('locked', true);
		$.post(U('classroom/User/sendEmailActivate'),function(data){
			var span = _this.parent().siblings('p').find('span');
			if(data == 'ok'){
				notes('邮件已经发送成功！', 'success');
				_this.text('发送成功');
				span.removeClass().addClass('ok').text('激活邮件已发送，请登录邮箱点击链接进行验证');
			}else{
				notes(data, 'failure');
				_this.text('重新发送').data('locked', false);
				span.removeClass().addClass('err').text(data);
			}
		});
	}
});
</script>

<script>

$('#renzhengform input:file').click(function(){
	$('#renzhengform input:file').val('');
});
var setInfo3 = '<?php echo U(APP_NAME."/".MODULE_NAME."/".ACTION_NAME, array("tab"=>3));?>';
var delverify = function(){
	if(confirm('确定要注销认证吗？')){
		$.post(U('public/Account/delverify'),{},function(txt){
			if(txt == 1){
				notes('注销成功', 'success');
				setTimeout(function(){
					window.location = setInfo3;},'2000');
			}else{
				notes('注销失败', 'failure');
			}
		});
	}
};
var saveVerify = function(){
    var vtype = $('input.usergroup_id:checked').val();
	  if(!vtype){
		  notes('请选择认证类型', 'failure');
		  return false;
	  }
    if($("#user_verified_category_id").val()==0){
      notes('请选择认证分类', 'failure');
      return false;
    }
    var company = $('#company').val();
    var realname = $('#realname').val();
    var idcard = $('#idcard').val();
    var phone = $('#phone').val();
    var reason = $('#reason').val();
    var verifiedCategory = $('#verifiedCategory').val();
    var attach_ids = $('#attach_ids').val();
	  if(!/^[\u4E00-\u9FA5·]{2,}$/.test($.trim(realname))){
		  notes('请输入正确的真实姓名', 'failure');
		  return false;
	  }
	  if(!/^[\dxX]{15,18}$/.test(idcard)){
		  notes('请输入正确的身份号码', 'failure');
		  return false;
	  }
	  if(!/^[\d\-]{7,11}$/.test(phone)){
		  notes('请输入联系电话', 'failure');
		  return false;
	  }
	  if(!reason){
		  notes('请输入认证理由', 'failure');
		  return false;
	  }
	
      var other_data_ids = $('#other_data_ids').val();

      var data = $('#renzhengform').serialize();
      $.post(U('public/Account/doAuthenticate'),data,function(msg){
          if(msg == 1){
            notes('申请成功，请等待审核', 'success');
			setTimeout(function(){
				window.location = setInfo3;
			},'2000');
          }else{
            notes(msg, 'failure');
			return false;
          }
		  
      });
    }
</script>
<script type="text/javascript">
$('#edit-password').click(function(e){
	var form = $(this).parents('form');
	inputs = form.find('input:password');
	if(!inputs.eq(0).val()){
		notes('原密码必须输入', 'failure');
		inputs.eq(0).focus();
		return false;
	}
	if(inputs.eq(1).val().length < 6 || inputs.eq(1).val().length > 15){
		notes('新密码为6-15个字符', 'failure');
		inputs.eq(1).focus();
		return false;
	}
	if(/^\d+$/.test(inputs.eq(1).val())){
		notes('密码不能为纯数字', 'failure');
		inputs.eq(1).focus();
		return false;
	}
	if(inputs.eq(1).val() != inputs.eq(2).val()){
		notes('密码输入不一致', 'failure');
		inputs.eq(2).focus();
		return false;
	}
	$.post(U('public/Account/doModifyPassword'), form.serialize(), function(data){
		if(data.status){
			form.find('input:password').val('');
			notes(data.info, 'success');
		}else{
			notes(data.info, 'failure');
		}
	}, 'json');
	return false;
});

var changeText = function(value){
    $.post(U('admin/User/getVerifyCategory'),{value:value},function(data){
		$('#user_verified_category_id').html(data);
    });
};
</script>
<script src="__THEME__/js/module.form.js"></script>
<script>
//取消新浪帐号绑定
function unbind(name,type,addon,hooks){
    if(confirm('确认要取消绑定'+name+'？')){
        $.post( U('public/Widget/addonsRequest'),{addon:addon,hook:hooks,type:type},function(txt){
            if(txt){
                window.location = '<?php echo U(APP_NAME."/".MODULE_NAME."/".ACTION_NAME, array("tab"=>4));?>';
            }
        });
    }
}
function setSync(sync,type){
    if(sync=='unsync'){
        if(!confirm('确认要取消同步么？')){
            return false;
        }
        $.post( U('public/Widget/addonsRequest'),{addon:'Login',hook:'login_unbind_publish_weibo',type:type},function(txt){
            if(txt){
                window.location = '<?php echo U(APP_NAME."/".MODULE_NAME."/".ACTION_NAME, array("tab"=>4));?>';
            }
        });
    }else{
        $.post( U('public/Widget/addonsRequest'),{addon:'Login',hook:'login_ajax_bind_publish_weibo',type:type},function(txt){
            if(txt){
                window.location = '<?php echo U(APP_NAME."/".MODULE_NAME."/".ACTION_NAME, array("tab"=>4));?>';
            }
        });
    }
}
</script>
<!--footer-->
<div class="footer">
	<div class="wrap">
    	<div class="footer-main">
        	<div class="footer-logo">
            	<a href="/" title="eduline"><img src="<?php echo ($site["logo_foot"]); ?>" class="logo-img"></a>
                <ul class="logo-ul">
                	<li class="l1"><a href="javascript:;"></a></li>
                    <li class="l2"><a href="javascript:;"></a></li>
                    <li class="l3"><a href="javascript:;"></a></li>
                    <li class="l4"><a href="javascript:;"></a></li>
                </ul>
            </div>
            <?php if(is_array($pageCategory)): ?><?php $i = 0;?><?php $__LIST__ = $pageCategory?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><div class="footer-link">
	            	<dl>
	                	<dt><?php echo ($key); ?></dt>
	                	<?php if(is_array($vo)): ?><?php $i = 0;?><?php $__LIST__ = $vo?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a target="_blank" <?php if($v['url']) { ?> href="<?php echo ($v['url']); ?>" <?php }else{ ?> href="<?php echo U('public/Single/info',array('id'=>$v['id']));?>" <?php } ?> ><?php echo ($v["title"]); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
	                </dl>
	            </div><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
            
        </div>
    </div>
    <div class="copyright"><?php echo ($site['site_footer']); ?></div>
</div>

<!-- 统计代码-->
<div id="site_analytics_code" style="display:none;">
<?php echo (base64_decode($site["site_analytics_code"])); ?>
</div>
<?php if(($site["site_online_count"])  ==  "1"): ?><script src="<?php echo SITE_URL;?>/online_check.php?uid=<?php echo ($mid); ?>&uname=<?php echo ($user["uname"]); ?>&mod=<?php echo MODULE_NAME;?>&app=<?php echo APP_NAME;?>&act=<?php echo ACTION_NAME;?>&action=trace"></script><?php endif; ?>


<!--百度推广网页转化-->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F9efa5e6b982a815a97700d8e78129b16' type='text/javascript'%3E%3C/script%3E"));
</script>

</body>
</html>