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


<div class="mask"></div>
<!-- 购买确认弹出框 -->
<div class="buyOperating">
    <div class="w-close"><a class="mr15 mt5">×</a></div>
    <div class="w-notice">
        <h4>提示：该专辑需要支付<em id="total_price" class="coin_num_l"><?php echo ($merge_video_list['total_price']?:0); ?></em>学币，您当前账户余额为<em class="coin_num_l"><?php echo ($user_info['balance']?:0); ?></em>学币。是否继续？</h4>
    </div>
    <div class="agreement">
        <a><span id="protocol" class="agree"></span>我已经阅读并同意</a>
        <a>《收费课程服务协议》</a>
    </div>
    <div class="buy-btn">
        <a class="btn"  onclick="buyVideos();">确认支付</a>
        <a class="btn" href="<?php echo U('classroom/User/recharge');?>">充值</a>
        <a class="btn cancel">暂不支付</a>
    </div>
</div>
<div class="shop-worap">
  <div class="title">您当前选择了<span class="allNum"></span>个课程：</div>
  <div class="shop-table">
  <table width="1160" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="130"><label class="inputcheckbox"><input type="checkbox" class="inputcheckbox fl" name="CheckboxGroup1" value="复选框" > <strong class="fl">&nbsp;&nbsp;全选</strong></label><a href="javascript:;" class="delAll shop-Operation-top fl">&nbsp;&nbsp;批量删除</a></th>
    <th width="500"><strong>课程名称</strong></th>
    <th width="285"><strong>价格</strong></th>
    <th width="110"><strong>支付状态</strong></th>
    <th width="61"><strong>操作</strong></th>
  </tr>
  <?php if(is_array($merge_video_list['data'])): ?><?php $i = 0;?><?php $__LIST__ = $merge_video_list['data']?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><tr class="<?php if(($i%2)  ==  "0"): ?>t1<?php else: ?>t2<?php endif; ?> item">
    <td width="130"><label class="inputcheckbox single"><?php if($vo['tlimit_state']): ?><?php else: ?><input type="checkbox" price="<?php echo ($vo['is_buy']?0:$vo['price']); ?>"  data-id="<?php echo ($vo['video_id']); ?>" class="<?php echo ($vo['is_buy']?'':no_buy); ?> inputcheckbox fl" name="CheckboxGroup1" ><?php endif; ?><span class="fl">&nbsp;&nbsp;<?php echo ($i); ?></span></label></td>
    <td width="500"><a href="<?php echo U('classroom/Video/view',array('id'=>$vo['video_id']));?>" class="f3"><?php echo ($vo['video_info']['video_title']?:'暂时没有课程名称'); ?></a></td>
    <td width="285" class=" font12"><span class="price cyellow"><?php echo ($vo['price']?:0); ?></span>学习币<?php if($vo['tlimit_state']): ?>　<span class="cgreen">(限时免费)</span><?php endif; ?></td>
    <td width="100" class=" font12">
    <?php if(($vo["is_buy"])  ==  ""): ?><span class="">未支付</span>
    <?php else: ?><span class="cgreen">已支付</span><?php endif; ?>
    </td>
    <td  class=" font12" width="100"><a data-id="<?php echo ($vo['video_id']); ?>" href="javascript:;" class="delMerge f3">删除</a></td>
  </tr><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
</table>
<div class="shop-bottom">
    <div class="p"><strong class="fblu"><span class="allNum"></span></strong>个未支付课程，共计<strong class="fyellow"></strong>个学习币</div>
    <div class="width"><a href="javascript:;" class="delAll shop-Operation fl">批量删除</a><a id="buy" href="#" class="shop-bottombnt">确定并支付</a></div>
</div>
</div>
</div>
<!---购买结束-->

<script type="text/javascript">
var countPrice = 0;
    (function(){
    	$('.allNum').text(parseInt($('.item input[price!="0"]:checked').size()));
        $('.item').each(function(k,i){
			if($(this).find('input').is(':checked')){
				countPrice += parseInt($(this).find('input').attr('price'));
			} 
        });
        if($('tbody tr th .inputcheckbox').is(':checked')) $('.shop-Operation-top').show();
        $('.fyellow').text(countPrice);
        $('#total_price').text(countPrice);
    })();
    $(function(){
        var headHeight = $('.header-worap').height();
        var footHeight = $('.footer-worap').height();
        var miniHeight = parseInt($(document).height() - (headHeight+footHeight+76));
        $('.shop-worap').css({"min-height":miniHeight+'px'});
        //全选/反选
        $('tbody tr th .inputcheckbox').live('click',function(){
            if($(this).find('input').is(':checked')){
                $('.shop-Operation-top').show();
                $('tbody tr td input').attr('checked',true);
				$('.allNum').text(parseInt($('.item input[price!="0"]:checked').size()));
				countPrice = 0;
                $('.item').each(function(k,i){
                    if($(this).find('input').is(':checked')){
                    	countPrice += parseInt($(this).find('input').attr('price'));
					} 
                });
                $('.fyellow').text(countPrice);
                $('#total_price').text(countPrice);
            }else{
            	$('.shop-Operation-top').hide();
                $('tbody tr td input').attr('checked',false);
				$('.allNum').text(0);
				$('.fyellow').text(0);
				$('#total_price').text(0);
            }
        });
		//单个选中、未选中状态
		$('.item .single').live('click',function(){
			$('.allNum').text(parseInt($('.item input[price!="0"]:checked').size()));
				countPrice = 0;
                $('.item').each(function(k,i){
                   if($(this).find('input').is(':checked')){
                	   countPrice += parseInt($(this).find('input').attr('price'));
					} 
                });
                $('.fyellow').text(countPrice);
                $('#total_price').text(countPrice);
		});
       //删除
        $('.delMerge').live('click',function(){
            var _this = $(this);
            $.get("<?php echo U('classroom/Video/delVideoMerge');?>",{id:_this.attr('data-id')},function(data){
                if(!data.status){
                    notes(data.info,'failure');
                    return false;
                }
                _this.parents('tr').remove();
                var albumNum = $('#albumNum').text();
                $('#albumNum').text(parseInt(albumNum)-1);
                $('.allNum').text(parseInt($('.item input[price!="0"]:checked').size()));
                countPrice = 0;
                $('.item').each(function(k,i){
                    if($(this).find('input').is(':checked')){
                    	countPrice += parseInt($(this).find('input').attr('price'));
					} 
                });
                $('.fyellow').text(countPrice);
                $('#total_price').text(countPrice);
            },'json');
        });


        //批量删除
        $('.delAll').live('click',function(){
            var _this = $(this);
            if($('.item input:checked').size()<=0){
                notes('请勾选课程','failure');
                return false;
            }
            var videoIds = new Array();
            $('.item').each(function(i,v){
                if($(this).find('input').is(':checked')){
                    videoIds.push(parseInt($(this).find('input').attr('data-id')));
                } 
            });
            $.post("<?php echo U('classroom/Video/delVideoMerges');?>",{videoIds:videoIds},function(data){
                if(!data.status){
                    notes(data.info,'failure');
                    return false;
                }
                
                $('.item').each(function(k,i){
                    var item_this = $(this);
                    if(item_this.find('input').is(':checked')){
                        item_this.remove();
                    } 
                });
                $('.fyellow').text(0);
                $('#total_price').text(countPrice);
                $('.allNum').text(parseInt($('.item input[price!="0"]:checked').size()));
                $('#albumNum').text(parseInt($('.item').size()));
            },'json');
        });

      //点击购买
        $('#buy').live('click',function(){
            if($('.item input:checked').size()<=0){
                notes('请勾选课程','failure');
                return false;
            }
            $('.buyOperating').show();
            var mask_height = $(document).height();
            $('.mask').height(mask_height).show();
        });
        //同意协议
        $('.agreement #protocol').click(function(){
            var type = $(this).attr('class');
            if(type == 'no-agree'){
                $(this).attr('class','agree');
            }else{
                $(this).attr('class','no-agree');   
            }
        });
        //暂不支付
        $('.w-close a,.buy-btn .cancel').click(function(){
            $('.buyOperating,.mask').hide();
        });
    });
	function close_show(obj){
		$(obj).parent().parent().hide();
		$("#transparent").hide();
	}
	function buyVideos(){
		if($('.agreement .agree').size() < 1){
	        notes("购买专辑必须同意《收费课程服务协议》",'failure');
	        return;
	    }
        var vids = new Array();
        var total_price = 0;
        $(".item").each(function(k,v){
            vids.push($(this).find("input:checked").attr('data-id'));
        });
        total_price = parseInt($('#total_price').text());
        $.post("<?php echo U('classroom/Video/buyVideos');?>",{vids:vids,price:total_price},function(data){
            if(data.status){
                notes(data.info,'success');
                location.href="<?php echo U('classroom/Home/video');?>";
            }else{
                notes(data.info,'failure');
                return false;
            }
        },'json');
        
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