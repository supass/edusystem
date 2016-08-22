<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php if(($_title)  !=  ""): ?><?php echo ($_title); ?> - <?php echo ($site["site_name"]); ?><?php else: ?><?php echo ($site["site_name"]); ?> - <?php echo ($site["site_slogan"]); ?><?php endif; ?></title>
    <meta content="<?php if(($_keywords)  !=  ""): ?><?php echo ($_keywords); ?><?php else: ?><?php echo ($site["site_header_keywords"]); ?><?php endif; ?>" name="keywords">
    <meta content="<?php if(($_description)  !=  ""): ?><?php echo ($_description); ?><?php else: ?><?php echo ($site["site_header_description"]); ?><?php endif; ?>" name="description">
    <meta name="viewport" charset="UTF-8" content="user-scalable=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <!--[if lt IE 9]><script src="js/html5.js" type="text/javascript"></script><![endif]-->
    <link href="__THEME__/image/favicon.ico?v=<?php echo ($site["sys_version"]); ?>" type="image/x-icon" rel="shortcut icon">
    <link href="__THEME__/css/base.css" rel="stylesheet" type="text/css" />
    <link href="__THEME__/css/index.css" rel="stylesheet" type="text/css" />
    <link href="__THEME__/css/hdft.css" rel="stylesheet" type="text/css" />
    <link href="__THEME__/css/logincss.css" rel="stylesheet" type="text/css" />
    <link href="__THEME__/css/wenda.css" rel="stylesheet" type="text/css" />
    <link href="__THEME__/css/video.css" rel="stylesheet" type="text/css" />
    <script>
        /**
         * 全局变量
         */
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

    </script>
    <?php if(!empty($langJsList)) { ?>
    <?php if(is_array($langJsList)): ?><?php $i = 0;?><?php $__LIST__ = $langJsList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><script src="<?php echo ($vo); ?>?v=<?php echo ($site["sys_version"]); ?>"></script><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    <?php } ?>
    <script src="__THEME__/js/js.php?t=js&f=jquery-1.7.1.min.js,jquery.form.js,common.js,core.js,module.js,module.common.js,jwidget_1.0.0.js,jquery.atwho.js,jquery.caret.js,ui.core.js,ui.draggable.js,plugins/core.comment.js,plugins/core.digg.js&v=<?php echo ($site["sys_version"]); ?>.js"></script>
    <script src="__THEME__/js/plugins/core.comment.js?v=<?php echo ($site["sys_version"]); ?>"></script>
    <script src="__THEME__/js/user/user.js"></script>
    <script src="__THEME__/js/cyjs/title_common.js"></script>
    <script src="__THEME__/js/cyjs/cyjs_common.js"></script>
    <script src="__THEME__/js/cyjs/offlights.js"></script>
    <script src="__ROOT__/player/ckplayer/ckplayer.js"></script>

</head>
<body>
<!-- 遮罩层 -->
<div class="mask"></div>
<div class="clear"></div>
<!-- 购买确认弹出框 -->
<div class="buyOperating">
    <div class="w-close"><a class="mr15 mt5">×</a></div>
    <div class="w-notice">
        <h4>提示：该专辑需要支付<em id="myxuebinum" class="coin_num_l">0</em>学币，您当前账户余额为<em class="coin_num_l"><?php echo ($balance['balance']); ?></em>学币。是否继续？</h4>
    </div>
    <div class="agreement">
        <a><span id="protocol" class="agree"></span>我已经阅读并同意</a>
        <a>《收费课程服务协议》</a>
    </div>
    <div class="buy-btn">
        <a class="btn"  onclick="buyOperat(<?php echo ($vid); ?>);">确认支付</a>
        <a class="btn" href="<?php echo U('classroom/User/recharge');?>">充值</a>
        <a class="btn cancel">暂不支付</a>
    </div>
</div>
<!--
<div class="coursebox f-cb" id="j-coursebox">-->
    <div class="g-mn2c m-courselb">
        <div id="video_play1" class="m-courselearn">
            <!--左边视屏头部标题系列-->
            <div class="video-top">
                <div class="video-top-l">
                <?php if( $type == 1): ?><a href="<?php echo U('classroom/Video/view','id='.$aid);?>"><i class="video-fh"></i><span>返回课程主页&nbsp;&nbsp;&nbsp;|</span></a>
                <?php else: ?>
                 <a href="<?php echo U('classroom/Album/view','id='.$aid);?>"><i class="video-fh"></i><span>返回专辑主页&nbsp;&nbsp;&nbsp;|</span></a><?php endif; ?>
                </div>
                <div class="video-top-con">
                    <a class="cl-pre" id="j-prev" href="#"></a>
                    <h2><?php echo ($video_title); ?></h2>
                    <a class="cl-next" id="j-next" href="#"></a>
                </div>
                <div class="video-top-r">
                <?php if(($is_free)  ==  "0"): ?><a id="buyNowTop" href="javascript:;" class="fl">购买课程</a><?php endif; ?>
                <?php if( $is_colle == 0): ?><a class="wenda-gz fr" href="javascript:;" onClick="collectVideo(this,<?php echo ($vid); ?>)" title="收藏课程"></a>
                 <?php else: ?>
                  <a class="wenda-gz-Toggle"  href="#" title="已收藏此课程"></a><?php endif; ?>
                </div>
            </div>
            <!--end-->
            <!-- zhangr - start - video -->
            <div class="learn-box" id="video_stop"></div>
            <!---视屏提示-->
            <div class="vedioPlay-msg" style="display: none">
                <div class="vedioPlay-msgbox">
                    <p>需要继续观看视频，<a id="buyNow" href="javascrpt:;">立即购买！</a></p>
                </div>
            </div>
            <!--视屏提结束示-->
            <div id="video_play" class="learn-box"></div>
            <!-- zhangr - end - video -->
            <div class="cl-info f-cb">
               <!--  <div class="cli-intro"><i></i><a href="#">资源下载</a></div>
                <div class="cli-phon"><i></i><a href="#">手机观看</a></div> -->
                <div style="" title="分享" class="cli-share j-sharebox auto-1390289261253-parent" id="auto-id-Wgv0KyQS2q5GtCJz">
                    <span class="fl">分享到：</span>
                    <!-- <div class="clearfix">
                         <p class="fl">分享</p>
                         <a class="share1 fl mt5" href="javascript:;">人人</a>
                         <a class="share2 fl mt5" href="javascript:;">星</a>
                         <a class="share3 fl mt5" href="javascript:;">新浪</a>
                         <a class="share4 fl mt5" href="javascript:;">腾讯</a>
                         <a class="share5 fl mt5" href="javascript:;">豆瓣</a>
                         <a class="share6 fl mt5" href="javascript:;">tou</a>
                     </div>-->
                    <div data-bd-bind="1411956524693" class="bdsharebuttonbox bdshare-button-style1-16">
                        <a data-cmd="more" class="bds_more " href="#"></a>
                        <a title="分享到微信" data-cmd="weixin" class="bds_weixin" href="#"></a>
                        <a title="分享到QQ好友" data-cmd="sqq" class="bds_sqq" href="#"></a>
                        <a title="分享到QQ空间" data-cmd="qzone" class="bds_qzone" href="#"></a>
                        <a title="分享到新浪微博" data-cmd="tsina" class="bds_tsina" href="#"></a>
                        <a title="分享到腾讯微博" data-cmd="tqq" class="bds_tqq" href="#"></a>
                        <a title="分享到人人网" data-cmd="renren" class="bds_renren" href="#">
                        </a><a title="分享到开心网" data-cmd="kaixin001" class="bds_kaixin001" href="#">
                    </a><a title="分享到豆瓣网" data-cmd="douban" class="bds_douban" href="#">
                    </a>
                    </div>
                    <script>
                        window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","sqq","qzone","tsina","tqq","renren","kaixin001","douban"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                    </script>
                </div>
            </div>
            <!--底部加分享系列-->
            <div id="j-hideRightBtn" class="u-hideleftbtn" title="隐藏课程目录"></div>
        </div>
        
    </div>
    

<!------------右边------------>
<div id="course-toolbar-box" class="g-sd2">
    <div class="m-ctb">
        <!--右边上面第一部分-->
        <div class="courseintro">
            <h2><?php echo ($video_title); ?></h2>
            <div class="video_rinfo">
                <img src="<?php echo getCover($cover,147,95);?>" />
                <div class="video_rinfo-con">
                    <ul class=" fl">
                        <span>评分：</span>
                        <li class="<?php if($score > 0 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
			            <li class="<?php if($score > 1 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
			            <li class="<?php if($score > 2 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
			            <li class="<?php if($score > 3 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
			            <li class="<?php if($score > 4 ): ?>grade-back-set<?php else: ?>grade-back-default<?php endif; ?>"></li>
                    </ul>
                    <p>购买人数:<?php echo ($video_order_count); ?>人</p>
                    <p>上架时间:<?php echo (date('Y-m-d',$listingtime)); ?></p>
                    <p>更新时间:<?php echo (date('Y-m-d',$utime)); ?></p>
                </div>
            </div>
        </div>
        <!--右边teb-->
        <ul class="tabs" id="tags">
            <li class="current"><a style="color:#FFF;" href="javascript:;" onClick="muluBang(this)" class=""><i class="tabs-ml"></i>目录</a></li>
            <li><a href="javascript:;" id="note" onClick="noteBang(this,<?php echo ($aid); ?>,<?php echo ($type); ?>)"><i class="tabs-bj"></i>笔记</a></li>
            <!-- <li><a href="javascript:;" ><i class="tabs-dp"></i>点评</a> </li> -->
            <li><a href="javascript:;" id="question" onClick="questionBang(this,<?php echo ($aid); ?>,<?php echo ($type); ?>)"><i class="tabs-tw"></i>提问</a></li>
        </ul>
    </div>
    <!--teb内容切换盒子-->
    <div id="tagcontent_box">
        <!--课程-->
        <div class="m-chapterList" id="tagcontent0" style="display: block;">
        
        <?php $videonum=0; ?>
         <?php if(isset($data)): ?><?php foreach($data as $key=>$l): ?><?php $videonum+=1; ?>
             <div <?php if( $vid == $l['id']): ?>class="section-cur section" <?php else: ?>class="section"<?php endif; ?> >
              <div class="section_bj"> </div>
	              <span class="fl f-thide ks">课程
                      <?php if($_GET['type']!=1){ ?>
                      <?php echo ($videonum); ?>
                      <?php }else if($_GET['vsum']!=0){ ?>
                      <?php echo ($_GET['vsum']); ?>
                      <?php } ?>
                  </span>
	              <span class="fl ksicon-30-mark ksicon-0-mark"></span> 
	              <a class="fl ksname" id="videosrc" <?php if( $vid != $l['id']): ?>href="<?php echo U('classroom/Album/synvideo',array('vid'=>$l['id'],'type'=>2,'aid'=>$aid));?>"<?php endif; ?> ><?php echo limitNumber($l['video_title'], 25);?></a>
              </div><?php endforeach; ?><?php endif; ?>
               
        
        </div>
        <!--笔记-->
        <div class="p10 tagcontent txt_l" id="tagcontent1" style="display: none">
            <form>
                <input type="hidden" value="1" name="kztype">
                <input type="hidden" value="0" class="kzid" name="kzid">
                <div class="tips1 l5">我的笔记</div>
                <div class="editwrap_tittle mt22">
               	 <div class="tips r5">标题限<span>45</span>字符内</div>
                    <textarea name="tittle" class="j-edittxt edittxt" maxlength="50" id="notetittle" placeholder="在此输入笔记标题... "></textarea>
                    <label for="edittxt" class="j-hint hint" id="auto-id-drt6TisVISpRhnQa"></label>
                </div>
				<div class="editwrap mt22">
               	 <div class="tips r5">内容限<span>300</span>字符内</div>
                    <textarea name="content" class="j-edittxt edittxt" maxlength="100" id="notecont" placeholder="在此记录你的想法... "></textarea>
                    <label for="edittxt" class="j-hint hint" id="auto-id-drt6TisVISpRhnQa"></label>
                </div>
                <div class="mt5 clearfix">
                    <label class="checklabel fl">
                        <input type="checkbox" class="j-privatecheck" hidefocus="true" id="note_isopen" checked="checked" value="1" name="is_open">
                        &nbsp;公开</label>
                    <input type="button" onClick="noteaddBang(this,<?php echo ($aid); ?>,<?php echo ($type); ?>)" class="bg_btn_gray Secrecy fr" style="cursor:pointer" value="保存">
                </div>
            </form>
              <ul class="video-list"></ul>
              <div style="margin-top:28px;" class="wie" id="txtmydianbonote">
		        <div style="text-align:center;height:auto;overflow:hidden; color:#999999; font-size:12px">暂无数据</div>
		      </div>
        </div>
        <div class="p10 tagcontent txt_r" id="tagcontent3" style="display: none;">
            <form >
                <input type="hidden" value="1" name="kztype">
                <input type="hidden" value="0" class="kzid" name="kzid">
                <div class="tips1 l5">我的提问</div>
                <div class="editwrap_tittle mt22">
               	 <div class="tips r5">标题限<span>45</span>字符内</div>
                    <textarea name="tittle" class="j-edittxt edittxt" maxlength="50" id="questiontitle" placeholder="请键入问题标题... "></textarea>
                    <label for="edittxt" class="j-hint hint" id="auto-id-drt6TisVISpRhnQa"></label>
                </div>
				<div class="editwrap mt22">
               	 <div class="tips r5">内容限<span>450</span>字符内</div>
                    <textarea name="content" class="j-edittxt edittxt" maxlength="100" id="questioncont" placeholder="请添加问题描述... "></textarea>
                    <label for="edittxt" class="j-hint hint" id="auto-id-drt6TisVISpRhnQa"></label>
                </div>
                <div class="mt5 clearfix">
                    <input type="button" onClick="addquestionBang(this,<?php echo ($aid); ?>,<?php echo ($type); ?>)" style="border:none;cursor:pointer;" class="bg_btn_gray Secrecy fr" value="保存">
                </div>
            </form>
             <ul class="video-list">
		       
      			</ul>
            <div style="margin-top:28px;" class="wie" id="txtmydianboqst">
                <div style="text-align:center;height:auto;overflow:hidden; color:#999999; font-size:12px">暂无数据</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    var flashvars={
        f:"<?php echo $album_address ? $album_address : $data[0]['video_address']; ?>",
        c:'0',
        p:1,
        loaded:'loadedHandler'
    };
    <?php if($is_free==0 && $isBuyVideo==0){ ?>
    function loadedHandler(){
        if(CKobject.getObjectById('ckvideo').getType()){
        //说明使用html5播放器
            CKobject.getObjectById('ckvideo').addListener('time',timeHandler);
        }else{
            CKobject.getObjectById('ckvideo').addListener('time','timeHandler');
        }

    }
    var ispause=false;
    var test_time=<?php echo ($test_time); ?>;
    function timeHandler(t){
        if (!ispause && t>test_time){
            ispause=true;
            CKobject.getObjectById('ckvideo').videoPause();
            $("#video_play").remove();

            $(".vedioPlay-msg").css("display","block");

        }
    }
    <?php } ?>
    var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:"transparent"};
    var video=["<?php echo $album_address ? $album_address : $data[0]['video_address']; ?>"];
    CKobject.embed('__ROOT__/player/ckplayer/ckplayer.swf','video_play','ckvideo','100%','100%',false,flashvars,video,params);
    //收藏课程
    function collectVideo(cate,vid){
    	if(UID=='0'){
    		reg_login();
    		return;
    	}
    	$.ajax({
			type: 'POST',
			url:"<?php echo U('classroom/Public/collect');?>",
			data:{type:1,sctype:2,source_id:vid},
			dataType:"json",
			cache: false,
			success: function(data){
				if(data.status == '0'){
					notes(data.info,'failure');
				} else {
					$(cate).removeClass().addClass("wenda-gz-Toggle");
				}
				
			},
			
		});
    }
    
    $(function(){
    	$('#myxuebinum').html(parseFloat(<?php echo $price;?>)); 
    	//获取上一个兄弟节点的href
    	var prevhref=$('.section-cur').prev().children('a').attr("href");
    	$("#j-prev").attr("href",prevhref);
    	//获取下一个兄弟节点href
    	var nexthref=$('.section-cur').next().children('a').attr("href");
    	$("#j-next").attr("href",nexthref);
    	//立即购买
    	$("#buyNow,#buyNowTop").live('click',function(){
    	    var mid = "<?php echo ($mid); ?>";
    	    if(mid <= 0){
    	    	reg_login();
    	    	return false;
        	}
            $('.buyOperating').show();
            var mask_height = $(document).height();
            $('.mask').height(mask_height).show();
            return false;
        });
        //暂不购买
        $('.w-close a,.buy-btn .cancel').live('click',function(){
            $('.buyOperating,.mask').hide();
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
    }); 
	var status=1;//1为展开  0为收缩
	var width=$("#course-toolbar-box").width();
	var vwidth=$(".m-courselearn").width();
    $("#j-hideRightBtn").click(function(){
      if(status==1){
    	  var cont=width+vwidth;
          $(this).removeClass().addClass("u-hiderightbtn");

    	  $("#course-toolbar-box").animate({width:"0px"});
    	  $(".m-courselearn").animate({width:cont});
    	  status=0;
      }else{
    	  var csum=vwidth-width;
          $(this).removeClass().addClass("u-hideleftbtn");
    	  $("#course-toolbar-box").animate({width:width});
    	  $(".m-courselearn").animate({width:vwidth});
    	  status=1;
      }
    });
  
    //目录点击
    function muluBang(cate){
    	$("#tagcontent_box").children().css("display","none");
    	$("#tags").children().removeClass("current");
    	$("#tagcontent0").css("display","block");
    	$(cate).parent().addClass("current");
    	
    }
    //笔记点击
    function noteBang(cate,aid,type){
    	$("#tagcontent_box").children().css("display","none");
    	$("#tags").children().removeClass("current");
    	$("#tagcontent1").css("display","block");
    	$(cate).parent().addClass("current");
    	$.ajax({
			type: 'POST',
			url:"<?php echo U('classroom/Album/getnotelist');?>",
			data:{type:type,oid:aid},
			dataType:"json",
			cache: false,
			success: function(data){
				if(data.data!=""){
					$(".video-list").html("");
					$(".video-list").append(data.data);
					$("#txtmydianbonote").css("display","none");
				}
				
			},
			
		});
    }
    //提问点击
    function questionBang(cate,aid,type){
    	$("#tagcontent_box").children().css("display","none");
    	$("#tags").children().removeClass("current");
    	$("#tagcontent3").css("display","block");
    	$(cate).parent().addClass("current");
    	$.ajax({
			type: 'POST',
			url:"<?php echo U('classroom/Album/getquestionlist');?>",
			data:{type:type,oid:aid},
			dataType:"json",
			cache: false,
			success: function(data){
				if(data.data!=""){
					$(".video-list").html("");
					$(".video-list").append(data.data);
					$("#txtmydianbonote").css("display","none");
				}
				
			},
			
		});
    }
    //添加笔记
    function noteaddBang(cate,aid,type){
    	 if(MID=='0'){
             reg_login();
             return;
         }
   	    var cont=$("#notecont").val();
	    var tittle=$("#notetittle").val();
  	     var isopen=0;
  	  if($("#note_isopen").attr("checked")){
  		isopen=1;
  	  }
  	  $(cate).val("保存中..");
  	  $(cate).attr("disabled",true); 
  	 $.ajax({
		type: 'POST',
		url:"<?php echo U('classroom/Note/add');?>",
		data:{kztype:type,kzid:aid,is_open:isopen,title:tittle,content:cont},
		dataType:"json",
		cache: false,
		success: function(data){
			if(data.status == '0'){
				$(cate).val("保存");
				$(cate).attr("disabled",false); 
				notes(data.info,'failure');
			} else {
				$("#notecont").val("");
				$(cate).val("保存");
				$(cate).attr("disabled",false); 
				noteBang("#note",aid,type);
			}
			  
			
		},
		
	   });
    }
    
    //添加提问
    function addquestionBang(cate,aid,type){
    	 if(MID=='0'){
             reg_login();
             return;
         }

  	  var cont = $("#questioncont").val();
	  var title= $("#questiontitle").val();

  	  $(cate).val("保存中..");
  	  $(cate).attr("disabled",true); 
  	 $.ajax({
		type: 'POST',
		url:"<?php echo U('classroom/Question/add');?>",
		data:{kztype:type,kzid:aid,title:title,content:cont},
		dataType:"json",
		cache: false,
		success: function(data){
			if(data.status == '0'){
				$(cate).val("保存");
				$(cate).attr("disabled",false); 
				notes(data.info,'failure');
			} else {
				$("#questioncont").val("");
				$(cate).val("保存");
				$(cate).attr("disabled",false); 
				questionBang("#question",aid,type);
			}
			  
			
		},
		
	});
    }
    //购买操作
    var buyOperat = function(id){
        if(!id){
            notes('该课程不存在','failure');
            return;
        }
        if($(".agree").size() < 1){
            notes("购买专辑必须同意《收费课程服务协议》",'failure');
            return;
        }
       // var id = '<?php echo $_GET["aid"]; ?>';
        $.post(U('classroom/Video/buyOperating'),{id:id},function(txt){
            if(txt.status == '0'){
                $(".buyOperating").hide();
                $(".mask").hide();
                notes(txt.info,'failure');
            } else {
                $(".buyOperating").hide();
                $(".mask").hide();
                notes(txt.info,'success');
                window.location.href = window.location.href;
            }
        },'json');
} 
    
    
    
    
    
    
</script>