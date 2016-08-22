<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
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


<!--main-->
<div  class="worap position-rt">
    <!--左边-->

    <?php if(ACTION_NAME=="index"){ ?>
    <!--课程 左边-->
    <div class="search-main">
        <div class="user-con-title"> <a class="onactive" href="#">"<?php echo ($searchkey); ?>"相关课程</a></div>
        <div>
            <?php if(!empty($data['data'])){ ?>
            <ul class="search-kcul fl">
               <?php if(isset($data["data"])): ?><?php foreach($data["data"] as $key=>$l): ?><li class="li" <?php if($key == 0){ ?>style="padding-top:0;"<?php } ?> ><img  src="<?php echo getCover($l['cover'] ,264,170);?>" width="264" height="170">
                    <div class="fr search-kcul-con">
                        <h2><a href="<?php echo U('classroom/Video/view',array('id'=>$l['id']));?>"><?php echo ($l["video_title"]); ?></a></h2>
                        <p><?php echo limitNumber($l['video_intro'],107);?></p>
                        <span>原价：<i><?php echo ($l["v_price"]); ?>学习币</i></span>
                        <div>
                            <label class="f3 fl" for="score">评分：</label>
                            <ul class="star_ul fl">
                                <li class="<?php if($l['video_score'] > 0 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
                                <li class="<?php if($l['video_score'] > 1 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
                                <li class="<?php if($l['video_score'] > 2 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
                                <li class="<?php if($l['video_score'] > 3 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
                                <li class="<?php if($l['video_score'] > 4 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="time-price">
                    	<a class="time-price-Start fr" href="<?php echo U('classroom/Video/view',array('id'=>$l['id']));?>">开始学习</a> 
                    </div>
                </li><?php endforeach; ?><?php endif; ?>
            </ul>
            <?php }else{ ?>
            <span style="padding-top:20px;position: absolute;">暂无相关搜索结果~</span>
            <?php } ?>

            <div class="sabrosus">
                <?php echo ($data["html"]); ?>
            </div>
        </div>
    </div>
      <?php } ?>

    <?php if(ACTION_NAME=="wenda"){ ?>
<div class="search-main">
    <div class="user-con-title"> <a class="onactive" href="#">"<?php echo ($searchkey); ?>"相关问答</a></div>
    <div>
        <?php if(!empty($data['data'])){ ?>
        <ul class="user-wenda">
            <?php if(isset($data["data"])): ?><?php foreach($data["data"] as $key=>$l): ?><!--提问循环-->
            <li class="li" <?php if($key == 0){ ?>style="padding-top:0;"<?php } ?>>
                <div class="discusslist"> <a target="_blank" title="<?php echo getUserName($l['uid']);?>" class="otherHead" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['uid']));?>"><img width="40" height="40" src="<?php echo getUserFace($l['uid'],'m');?>"></a>
                    <div class="detailmeg">
                        <div class="report">
                            <div class="mynote"><a title="<?php echo getUserName($l['uid']);?>" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['uid']));?>"><?php echo getUserName($l['uid']);?></a> <em>提问</em></div>
                            <p class="mynote"><a target="_blank" href="<?php echo U('wenda/Index/detail',array('id'=>$l['id']));?>"><?php echo limitNumber(t($l['wd_description']),120); ?></a> </p>
                        </div>

                        <?php if(!empty($l['wd_comment'])){ ?>
                        <div class="firendreply"> <a target="_blank" title="Sunflower" class="firendHead" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['wd_comment']['uid']));?>"><img src="<?php echo getUserFace($l['wd_comment']['uid'],'s');?>"></a>
                            <div class="lzreply"> <span><a title="<?php echo getUserName($l['wd_comment']['uid']);?>" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['wd_comment']['uid']));?>"><?php echo getUserName($l['wd_comment']['uid']);?></a> 回答</span> <em><?php echo limitNumber($l['wd_comment']['description'],120);?></em> </div>
                        </div>
                        <?php }else{ ?>
                        <span class="replydet">嗯～～，这个提问大家都在考虑......</span>
                        <?php } ?>

                        <div class="fbtime fl"><span class="fl">时间：<?php echo ($l["ctime"]); ?></span>
                            <?php if(isset($l["tags"])): ?><?php foreach($l["tags"] as $key=>$t): ?><a class="search-list-tag" target="_blank" href="<?php echo U('classroom/Search/wenda',array('searchtid'=>$t['tag_id'],'type'=>1));?>"><?php echo ($t["name"]); ?></a><?php endforeach; ?><?php endif; ?>
                            <!--<a class="search-course-from f3" href="/video/1352"> 源自：系列：Java 入门第一季... 3-11</a> --><span class="qa-comment-support fr"><i ><?php echo ($l["wd_browse_count"]); ?></i><span>浏览</span></span> <span class="qa-total-reply fr"><i class="qa-icon"></i><span><?php echo ($l["wd_comment_count"]); ?> 条回答</span></span> </div>
                    </div>
                </div>
            </li><?php endforeach; ?><?php endif; ?>
        </ul>
        <?php }else{ ?>
        <span style="padding-top:20px;position: absolute;">暂无相关搜索结果~</span>
        <?php } ?>
        <div class="sabrosus">
            <?php echo ($data["html"]); ?>
        </div>
    </div>
</div>
    <?php } ?>


<?php if(ACTION_NAME=="videowd"){ ?>
<div class="search-main">
    <div class="user-con-title"> <a class="onactive" href="#">"<?php echo ($searchkey); ?>"相关课程问答</a></div>
    <div>
        <?php if(!empty($data['data'])){ ?>
        <ul class="user-wenda">
            <?php if(isset($data["data"])): ?><?php foreach($data["data"] as $key=>$l): ?><!--提问循环-->
                <li class="li" <?php if($key == 0){ ?>style="padding-top:0;"<?php } ?> >
                    <div class="discusslist"> <a target="_blank" title="<?php echo getUserName($l['uid']);?>" class="otherHead" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['uid']));?>"><img width="40" height="40" src="<?php echo getUserFace($l['uid'],'m');?>"></a>
                        <div class="detailmeg">
                            <div class="mynote"><a title="Sunflower" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['uid']));?>"><?php echo getUserName($l['uid']);?></a> <em> 提问</em></div>
                            <p class="mynote"><a target="_blank" href="<?php echo ($l["href"]); ?>"><?php echo limitNumber($l['qst_title'],120);?> </a> </p>
                            <div class="fbtime fl"><span class="fl">时间：<?php echo ($l["ctime"]); ?></span><a class="search-course-from f3" href="<?php echo ($l["href"]); ?>"> 源自：<?php echo limitNumber($l['video_title'],15);?></a> <span class="qa-comment-support fr"><i class="zan-icon"></i><span><?php echo ($l["qst_help_count"]); ?>同问</span></span> <span class="qa-total-reply fr"><i class="qa-icon"></i><span><?php echo ($l["qst_comment_count"]); ?>条评论</span></span> </div>
                        </div>
                    </div>
                </li><?php endforeach; ?><?php endif; ?>
        </ul>
        <?php }else{ ?>
        <span style="padding-top:20px;position: absolute;">暂无相关搜索结果~</span>
        <?php } ?>

        <div class="sabrosus">
            <?php echo ($data["html"]); ?>
        </div>
    </div>
</div>
<?php } ?>


    <!--右边-->
    <!--右边-->
<ul class="search-ul">
    <?php if(empty($_GET['searchtid'])){ ?>
    <li><a href="<?php echo U('classroom/Search/index',array('searchkey'=>$searchkey));?>" <?php if(ACTION_NAME=="index"){echo "class='active'";} ?>  >课程<span class="font12">(<?php echo ($video_count); ?>)</span></a></li>
    <?php } ?>
    <li><a href="<?php echo U('classroom/Search/wenda',array('searchkey'=>$searchkey,'searchtid'=>$searchtid,'type'=>1));?>" <?php if(ACTION_NAME=="wenda" && $_GET['type']==1){echo "class='active'";} ?> >技术问答<span class="font12">(<?php echo ($js_count); ?>)</span></a></li>

    <li><a href="<?php echo U('classroom/Search/wenda',array('searchkey'=>$searchkey,'searchtid'=>$searchtid,'type'=>2));?>"  <?php if(ACTION_NAME=="wenda" && $_GET['type']==2){echo "class='active'";} ?> >技术分享<span class="font12">(<?php echo ($fx_count); ?>)</span></a></li>

    <li><a href="<?php echo U('classroom/Search/wenda',array('searchkey'=>$searchkey,'searchtid'=>$searchtid,'type'=>3));?>"  <?php if(ACTION_NAME=="wenda" && $_GET['type']==3){echo "class='active'";} ?>>活动建议<span class="font12">(<?php echo ($jy_count); ?>)</span></a></li>
    <?php if(empty($_GET['searchtid'])){ ?>
    <li><a href="<?php echo U('classroom/Search/videowd',array('searchkey'=>$searchkey));?>"  <?php if(ACTION_NAME=="videowd" ){echo "class='active'";} ?>>课程问答<span class="font12">(<?php echo ($wdviode_count); ?>)</span></a></li>
    <?php } ?>
</ul>
</div>
</div>
<!--footer-->
<script type="text/javascript">
$(function(){
    var headHeight = $(".header-worap").height();
    var footHeight = $(".footer-worap").height();
    var miniHeight = parseInt($(document).height()-(headHeight+footHeight+75));
    $(".worap").css({"min-height":miniHeight+'px'});
});
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