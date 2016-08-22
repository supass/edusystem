<?php if (!defined('THINK_PATH')) exit();?><!--提问板块mt35  -->
<div class="title back"><a type="qst" href="javascript:;" class="fr edit">我要提问</a></div>
<!--//提问板块  -->
  
<!--提问-->
<div class="video-wdcon margin-bt back">
    <!--我的提问 默认隐藏-->
    <div id="qst-comments" class="qa-comment-input clearfix" style="display:none;">
        <div class="qa-ci-wrap">
            <form id="q_form" onsubmit="return false;">
                <textarea id="wenti_content1" placeholder="可以详细描述所遇到的难题..." class="qa-ci-iarea js-reply-ipt-default"   name="wenti_content1"></textarea>
                <div class="qa-reply-footright fr"> <span class="qa-tips"></span>
                    <button type="qst" class="btn-mc-light js-ipt-cancel">取消</button>
                    <button class="btn-mc btn-mini btn-mc-green" onClick="doTiwen();">确定</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
var qst_kztype = '<?php echo ($kztype); ?>';//数据分类 1:课程;2:专辑;
var qst_kzid   = '<?php echo ($kzid); ?>';//课程或者专辑ID
var qst_type   = '<?php echo ($type); ?>';//分类类型 1:提问,2:点评,3:笔记
var qst_ispage = '<?php echo ($ispage); ?>';  //是否分页
var qst_uid = '<?php echo ($mid); ?>';     
var qst_limit = 10;             // 查询条数
var qst_page = 0;              //页数
    $(function(){
        getQuestion(qst_page);
      //分页操作
        $('.qstPage a').live('click',function(){
            var p = $(this).attr('p');
            if(typeof(p) == 'undefined') return false;
            getQuestion(p);
            return false;
        });
    });

    
    function doTiwen(){
        if(qst_uid <=0){
            reg_login();
            return false;
         }
        var content = $('#wenti_content1').val();   
        content = content.replace(/&nbsp;/ig, "");
        content = content.replace(/[ ]/g,"");//去除空格
        content = content.replace(/<[^>].*?>/g,"");//去html标签
        if(content == ""){
            //ui.error('请输入问题补充!')
            notes('请输入详细问题描述!','failure');
            return false;
        }
        for(var i=0; i<arr.length; i++) {
            if(content.indexOf(arr[i])>-1) {
                notes('详细问题描述不得包含敏感词!','failure');
                return false;
            }
        }
        ajaxTiwen(content);
    }

    //提交问题
    function ajaxTiwen(content){
        $.ajax({
            type: "POST",
            url:U('classroom/Question/add'),
            data: 'content='+content+'&kzid='+qst_kzid+'&kztype='+qst_kztype,
            async:false,
            dataType:"JSON",
            success: function(xMLHttpRequest, textStatus, errorThrown){
                if(xMLHttpRequest.status == 1){
                    $("#q_form")[0].reset();
                    $("#q-comment").hide();
                    $("#questionullms").remove();
                    getQuestion(qst_page);//重新加载
                }else{
                    notes(xMLHttpRequest.info,'failure');
                }
                return false;
            },
            error:function(xhr, ajaxOptions, thrownError){
                notes(xhr.info,'failure');
                return false;
            }
        });
        
    }
    //获取问题
    function getQuestion(page){
        var url = "<?php echo U('widget/Resource/getList');?>";
        var html = '';
        $.post(url,{limit:qst_limit,kztype:qst_kztype,kzid:qst_kzid,type:qst_type,p:page},function(data){
            if(data.data==""){
                html+='<span id="questionullms">对不起，暂时没有提问，快来坐沙发！</span>';
            }else{
                $.each(data.data,function(i,k){
                    html += '<div class="qst_con wenda-listcon clearfix">';
                    html += '<div class="headslider fl">';
                    html += '<a href="'+k.user_src+'" class="wenda-head" target="_blank" title="'+k.username+'"><img width="60" height="60" src="'+k.userface+'"></a>';
                    html += '<a href="'+k.user_src+'" target="_blank" title="'+k.username+'" class="wenda-nickname">'+k.username+'</a>';
                    html += '</div>';
                    html += '<div class="wendaslider fl position-rt">';
                    html += '<div class="replycont clearfix">'+k.qst_description+'</div>';
                    html += '<div class="replymegfooter">';
                    html += '<div class="wenda-time"> <em>提问时间：'+k.strtime+'</em> </div>';
                    html += '<div class="qa-comment-addon-r fr">';
                    html += '<span class="qa-total-reply">';
                    html += '<span show_id="'+k.id+'" type="qst" class="js-qa-tr-num qst"><i class="qa-icon"></i><span class="com_num">'+k.qst_comment_count+'</span> 条评论</span>';
                    html += '<span cancel_id="'+k.id+'" type="qst" class="qa-tr-up">收起评论<b><i></i></b></span>';
                    html += '</span>';
                    html += '<span t_id="'+k.id+'" type="qst"  class="js-qa-comment-support qa-comment-support  js-qacom-supported-user tongwen"><i class="zan-icon"></i><span><span class="t_num">'+k.qst_help_count+'</span> 同问</span></span>';
                    html += '</div></div></div></div>';
                    //回复部分
                    html +='<div id="qst_'+k.id+'" style=" display:none" class="qa-replies width-wd fl">';
                    html +='<div class="qa-reply-c"></div>';
                    html +='<div  class=" qa-reply-ibox clearfix">';
                    html +='<div class="qa-reply-iavator fl"> <a href="'+data.user_src+'" title="'+data.username+'"> <img width="40" height="40" src="'+data.userface+'"> </a> </div>';
                    html +='<div class="qa-reply-iwrap">';
                    html +='<div class="qa-reply-iarea">';
                    html +='<input type="hidden" class="reply_uid" checktxt="" value="0"/>';
                    html +='<textarea name="qst_comment" id="qstf_'+k.id+'" class="js-reply-ipt-default" placeholder="写下你的评论..."></textarea>';
                    html +='</div>';
                    html +='<div class="qa-reply-footright fr"> <span class="qa-tips"></span>';
                    html +='<button class="btn-mc-light js-ipt-cancel qst_cancel">取消</button>';
                    html +='<button sub_id="'+k.id+'" type="qst" class="btn-mc btn-mini btn-mc-green  js-ipt-submit">提交</button>';
                    html +='</div>';
                    html +='</div>';
                    html +='</div>';
                    html += '</div>';

                }); //each
            }

          //分页   
            if(data.totalPages > 1) html += '<div class="qstPage sabrosus">'+data.html+'</div>';
            if($(".video-wdcon .qst_con").size()<= 0 ){
                $(".video-wdcon").append(html);
            }else{
                //提交问题之后删除除了表单外的其他元素
                $(".video-wdcon").children().not("#qst-comments").remove();
                $(".video-wdcon").append(html);
                $("#qst-comments").hide();
            }
        },'json'); //post
    }

</script>
<!-- 问题结束 -->