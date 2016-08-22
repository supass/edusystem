<?php if (!defined('THINK_PATH')) exit();?><!-- 笔记开始 -->
<div class="title back"><a type="note" href="javascript:;" class="fr edit">记笔记</a></div>
<div class="video-biji back margin-bt">
    <!--我的笔记 默认隐藏-->
    <div id="note-comments" class="qa-comment-input clearfix" style="display:none;">
        <div class="qa-ci-wrap">
            <form id="bj_form" onsubmit="return false;">
            	<input name="note_title" class="w333 video_insearch" maxlength="100" type="text" placeholder="笔记标题" rel="笔记标题">
                <textarea id="note_content" placeholder="笔记可以是你的作业、资料、学习经验和心得，以及你想要记录和分享的与本课程有关的内容。.." class="qa-ci-iarea js-reply-ipt-default"   name=""></textarea>
                <div class="qa-reply-footright fr"> <span class="qa-tips"></span>
                    <button type="note" class="btn-mc-light js-ipt-cancel">取消</button>
                    <button onClick="doBiji()" class="btn-mc btn-mini btn-mc-green">确认</button>
                </div>
            </form>
        </div>
    </div>
    <!--笔记循环-->
    
</div>
<script type="text/javascript">
var note_kztype = '<?php echo ($kztype); ?>';//数据分类 1:课程;2:专辑;
var note_kzid   = '<?php echo ($kzid); ?>';//课程或者专辑ID
var note_type   = '<?php echo ($type); ?>';//分类类型 1:提问,2:点评,3:笔记
var note_ispage = '<?php echo ($ispage); ?>';  //是否分页
var note_uid = '<?php echo ($mid); ?>';
var wentiPageObj = null;
var note_limit = 10;
var note_page = 0 ;  //当前分页    
    $(function(){
        getBj(note_page);
      //分页操作
        $('.notePage a').live('click',function(){
            var p = $(this).attr('p');
            if(typeof(p) == 'undefined') return false;
            getBj(p);
            return false;
        });
    });


  //写笔记
    function doBiji(id){
        if(note_uid <=0){
            reg_login();
            return false;
        }
        var title = $('input[name="note_title"]').val();
        title = title.replace(/[ ]/g,"");
        title = title.replace(/&nbsp;/ig, "");
        title = title.replace(/[ ]/g,"");//去除空格
        title = title.replace(/<[^>].*?>/g,"");//去html标签
     
        if(title == ""){
            notes('请输入笔记标题!','failure');
            return false;
        }
        if($('#enter_bar h4:first').text().indexOf('超')>-1){
            notes('您输入的内容太长了!','failure');
            return false;
        }
        for(var i=0; i<arr.length; i++)
        {
            if(title.indexOf(arr[i])>-1)
            {
                notes('笔记标题不得包含敏感词!','failure');

                return false;
            }
        }
        var content = $('#note_content').val();
        content=content.replace(/&nbsp;/ig, "");
        content = content.replace(/[ ]/g,"");//去除空格
        content = content.replace(/<[^>].*?>/g,"");//去html标签
        
        if(content == ""){
            //ui.error('请输入笔记内容!');
            notes('请输入笔记内容!','failure');
            return false;
        }
        for(var i=0; i<arr.length; i++)
        {
            if(content.indexOf(arr[i])>-1)
            {
                notes('笔记内容不得包含敏感词!','failure');

                return false;
            }
        }
        ajaxBiji(title,content);
    }

    //提交笔记
    function ajaxBiji(title,content){
        //异步获取笔记
        $.ajax({
            url : U('classroom/Note/add'),
            type : 'POST',
            data : {kztype:note_kztype,kzid:note_kzid,title:title,content:content,is_open:1},
            timeout: 5000,
            dataType : 'json',
            success:function(xMLHttpRequest, textStatus, errorThrown){
                if(xMLHttpRequest.status == 1){
                    $("#bj_form")[0].reset();
                    $("#bj-comment").hide();
                    $("#notenullts").remove();
                    getBj(1);
                }else{
                    notes(xMLHttpRequest.info,'failure');
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                notes(xhr.info,'failure');
            }
        });
    }
    //获取笔记内容
    function getBj(page){
    	var url = "<?php echo U('widget/Resource/getList');?>";
        var html = '';
        $.post(url,{limit:note_limit,kztype:note_kztype,kzid:note_kzid,type:note_type,p:page},function(data){
            if(data.data==""){
                html+='<span id="notenullts">对不起，暂时没有笔记，快来坐沙发！</span>';
            }else{
            $.each(data.data,function(i,k){
                html += '<div class="note_con wenda-listcon clearfix">';
                html += '<div class="headslider fl">';
                html += '<a href="'+k.user_src+'" class="wenda-head" target="_blank" event-node="face_card" uid="'+k.uid+'" show="no" title="'+k.username+'"><img width="60" height="60" src="'+k.userface+'"></a>';
                html += '<a href="'+k.user_src+'" target="_blank" event-node="face_card" uid="'+k.uid+'" show="no" title="'+k.username+'" class="wenda-nickname">'+k.username+'</a>';
                html += '</div>';
                html += '<div class="wendaslider fl position-rt">';
                html += '<h2 class="wendaquetitle">'+k.note_title+'</h2>';
                html += '<div class="replycont clearfix">'+k.note_description+'</div>';
                html += '<div class="replymegfooter">';
                html += '<div class="wenda-time"> <em>提问时间：'+k.strtime+'</em> </div>';
                html += '<div class="qa-comment-addon-r fr">';
                html += '<span class="qa-total-reply">';
                html += '<span show_id="'+k.id+'" type="note" class="js-qa-tr-num note"><i class="qa-icon"></i><span class="com_num">'+k.note_comment_count+'</span> 条评论</span>';
                html += '<span cancel_id="'+k.id+'" type="note" class="qa-tr-up ">收起评论<b><i></i></b></span>';
                html += '</span>';
                html += '<span t_id="'+k.id+'" type="note" class="js-qa-comment-support qa-comment-support  js-qacom-supported-user tongwen"><i class="note-icon"></i><span>(<span class="t_num">'+k.note_help_count+'</span>)</span></span>';
                html += '</div></div></div></div>';
              //回复部分
                html +='<div id="note_'+k.id+'" style=" display:none" class="qa-replies width-wd fl">';
                html +='<div class="qa-reply-c"></div>';
                html +='<div  class=" qa-reply-ibox clearfix">';
                html +='<div class="qa-reply-iavator fl"> <a href="'+data.user_src+'" title="'+data.username+'"> <img width="40" height="40" src="'+(data.userface)+'"> </a> </div>';
                html +='<div class="qa-reply-iwrap">';
                html +='<div class="qa-reply-iarea">';
                html +='<input type="hidden" class="reply_uid" checktxt="" value="0"/>';
                html +='<textarea name="note_comment" id="notef_'+k.id+'" class="js-reply-ipt-default" placeholder="写下你的评论..."></textarea>';
                html +='</div>';
                html +='<div class="qa-reply-footright fr"> <span class="qa-tips"></span>';
                html +='<button class="btn-mc-light js-ipt-cancel note_cancel">取消</button>';
                html +='<button sub_id="'+k.id+'" type="note" class="btn-mc btn-mini btn-mc-green  js-ipt-submit note_sub">提交</button>';
                html +='</div>';
                html +='</div>';
                html +='</div>';
                html +='</div>';//note_con结束
            }); //each
            }
          //分页  if(data.totalPages > 1) 
            if(data.totalPages > 1) html += '<div class="notePage sabrosus">'+data.html+'</div>';
            if($(".video-biji .note_con").size()<= 0 ){
                $(".video-biji").append(html);
            }else{
                //提交问题之后删除除了表单外的其他元素
                $(".video-biji").children().not("#note-comments").remove();
                $(".video-biji").append(html);
                $("#note-comments").hide();
            }
        },'json'); //post
    }
  
</script>
<!-- 笔记结束 -->