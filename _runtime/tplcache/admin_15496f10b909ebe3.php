<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo l('ADMIN_PUBLIC_LOGIN');?></title>
<style type="text/css">
body {font-family:arial;font-size: 12px;background: url(__APP__/image/back-admin.png) repeat;margin: 0px;color:#999999}
li{list-style-type: none;}
ul, form, input{font-size:12px; padding:0; margin:0;}
a:link{color:#999;text-decoration:none}
a:visited{color:#999;text-decoration:none}
a:hover{color: #ffffff;text-decoration:underline}
a img{border: none;}
img{border: 0px;}
.login-wrap{ width:400px; height:430px; position:fixed; top:50%; left:50%; margin:-215px 0 0 -200px; }
.login-inner .login{position:absolute;right:10px;top:70px;width:320px;color:#333333;}
.s-txt{padding:0 0 0 10px; background:none; height:28px;line-height: inherit ;*line-height:28px;  vertical-align:middle; border:1px solid #eeeeee; margin-right:10px;}
.s-txt-focus{padding:0 0 0 10px; background:none; height:28px;line-height: inherit ;*line-height:28px;  vertical-align:middle; border:1px solid #cce4f4; margin-right:10px; outline:none}
.login-wrap .hd{width:400px; text-align:center}
.login-wrap .login-inner{background: url(__APP__/image/login-hd-back.png) no-repeat ;width:337px;height:345px;position:relative; margin:27px 0 0 31px ;}
.login-inner .login .title{color:#535353;font-size:14px;font-weight:700;padding:0 0 10px;background:url(__APP__/image/line-bt-double.gif) repeat-x left bottom}
.login-wrap .fd{width:400px; text-align:center;height:16px;line-height:16px;padding:10px 0}

.login-wrap .login .form-tt{display:block;float:left;height:16px;line-height:16px;padding:6px 0 0;width:53px;text-align:left; color:#999999}
.login-wrap .login .form-name{height:16px;line-height:16px;padding:6px 0 0}
.form-login input{vertical-align:middle}
.form-login ul{padding:15px 0 0 0;margin:0 auto; width:282px; float:right;}
.form-login ul li{padding:0 0 15px;overflow:hidden;zoom:1}
.form-login label{padding:0 0 5px}
.form-login .s-txt, .form-login .s-txt-focus{width:183px}
.form-login a{text-decoration:none; color:#ffffff; text-align:center; height:30px;}
/*蓝色按钮*/
.btn-green-big{display:block;line-height:30px;text-align:center; background:#65ADDD; margin:20px 0 0; width:249px; height:30px; color:#ffffff; text-align:center;letter-spacing:2em}
.btn-green-big a{}
.btn-green-big:hover{background-position:0 -40px;}

</style>
<script type="text/javascript" src="<?php echo THEME_PUBLIC_URL;?>/js/jquery.js"></script>
<link href="__THEME__/image/favicon.ico?v=<?php echo ($site["sys_version"]); ?>" type="image/x-icon" rel="shortcut icon">
<script type="text/javascript">
function changeverify(){
	var date = new Date();
    var ttime = date.getTime();
    var url = "__ROOT__/public/captcha.php";
    $('#verifyimg').attr('src',url+'?'+ttime);
};
// 绑定回车事件
$(function() {
    $(this).bind('keydown', function(e) {
        var key = e.which;
        if(key == 13) {
            var name = $.trim($('#login_name').val());
            var pwd = $.trim($('#login_pwd').val());
            var verify = $.trim($('#login_verify').val());
            if(name != '' && pwd != '' && verify != '') {
                document.reg.submit();   
            }
        }
    });
});
</script>

</head>
<body>
<!--外包-->
<div class="login-wrap">
    <div class="login">
        <div class="hd"><img src="__APP__/image/login-hd-logo.png" /></div>
        <div class="login-inner">
            <div class="login">
            	<!--<div class="title"><?php echo L('PUBLIC_ADMINISTRATOR_LOGIN');?></div>-->
                <form action="<?php echo U('admin/Public/doLogin');?>" name="reg" method="post" class="form-login" >
                <ul>
                    <?php if($uid){ ?>
                        <li><div class="form-tt"><?php echo L('PUBLIC_ACCOUNT');?>：</div><div class="form-name"><?php echo ($user["uname"]); ?></div>
                         <div class="form-row"><input id="login_name" type="hidden" name='uid' value='<?php echo ($uid); ?>'></div>
                        </li>
                    <?php }else{ ?>
                        <li>
                           <div class="form-tt"><?php echo L('PUBLIC_ACCOUNT');?>：</div>
                            <div class="form-row"><input id="login_name" class="s-txt" onfocus="this.className='s-txt-focus'" onblur="this.className='s-txt'" type="text" name="email" value=""></div>
                        </li>
                    <?php } ?>
                    <li>
                        <div class="form-tt"><?php echo L('PUBLIC_PASSWORD');?>：</div>
                         <div class="form-row"><input id="login_pwd" class="s-txt" onfocus="this.className='s-txt-focus'" onblur="this.className='s-txt'" type="password" name="password" value=""></div>
                    </li>
                    <li>
                        <div class="form-tt"><?php echo L('PUBLIC_VERIFICATION_CODE');?>：</div>
                         <div class="form-row"><input id="login_verify" class="s-txt" onfocus="this.className='s-txt-focus'" onblur="this.className='s-txt'" name="verify" value="" style="width:109px" >
                        <img src="__ROOT__/public/captcha.php" id="verifyimg" alt="<?php echo L('PUBLIC_CHANGE_ONE');?>"  style="vertical-align:middle;padding:0 5px 0 0" onclick="changeverify()"/><!--<a href="javascript:void(0);" onclick="changeverify()">看不清，换一张</a>--> </div>
                    </li>
                    <li>
                    <div class="form-row"><a href="#" onclick="document.reg.submit();" class="btn-green-big" >&nbsp;<?php echo L('PUBLIC_LOGIN');?></a>
                    <input type="submit" style='display:none'></div>
                    </li>
                </ul>
                </form>
            </div>
        </div>
        <div class="fd"><?php echo ($site["site_footer"]); ?></div>
    </div>
</div>
<!--//外包-->
</body>
</html>