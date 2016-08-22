<?php if (!defined('THINK_PATH')) exit();?><!-- 点评开始 -->
<div class="title back"><a type="review" href="javascript:;" class="fr edit">写点评</a></div>
<div  class="video-review back review_con">
    <!--点评 默认隐藏-->
    <div id="review-comments" style="display:none;" class="qa-comment-input clearfix">
        <div class="qa-ci-wrap">
            <form id="review_form" onsubmit="return false;">
                <div class="reply-star clearfix">
                    <label class="form-label  fl f3" for="score">评分：</label>
                    <ul id="star_ul" class="star_ul fl">
                        <li class="grade-back-default"></li>
                        <li class="grade-back-default"></li>
                        <li class="grade-back-default"></li>
                        <li class="grade-back-default"></li>
                        <li class="grade-back-default"></li>
                    </ul>
                    <span class="color_hui" id="how-score"></span>
                    <p class="fl font12 f9">&nbsp;（请根据课程质量打分）</p>
                </div>
                <input type="hidden" name="score"  id="course_score"/>
                <textarea id="review_con" class="qa-ci-iarea js-reply-ipt-default" placeholder="点评可以是你对该课程质量和难度的感受、学习建议，以及可能内容是否符合自己的期望等。..."></textarea>
                <div class="qa-reply-footright fr"> <span class="qa-tips"></span>
                    <button type="review" class="btn-mc-light js-ipt-cancel">取消</button>
                    <button onclick="doDianpin()" class="btn-mc btn-mini btn-mc-green">确认</button>
                </div>
            </form>
        </div>
    </div>
    <!--点评循环-->
</div>
<script type="text/javascript">
var review_kztype = '<?php echo ($kztype); ?>';//数据分类 1:课程;2:专辑;
var review_kzid   = '<?php echo ($kzid); ?>';//课程或者专辑ID
var review_type   = '<?php echo ($type); ?>';//分类类型 1:提问,2:点评,3:笔记
var review_page   = 0;       //当前分页
var review_uid    = '<?php echo ($mid); ?>';
var review_limit  = 10;    
    $(function(){
        getReview(review_page);
        //点赞
        $('.js-qa-comment-support .qa-icon').live('click',function(){
            var zan_this = $(this);
            var kzid = $(this).attr('kzid');
            $.post("<?php echo U('classroom/Public/doreviewvote');?>",{kztype:5,kzid:kzid,type:0},function(txt){
                if(txt.status==0){
                    notes(txt.info,'failure');
                    return false;
                }
                $(zan_this).addClass('zan');
                $(zan_this).removeClass('qa-icon');
                
            },'json');
        });
      //取消点赞
        $('.js-qa-comment-support .zan').live('click',function(){
            var zan_this = $(this);
            var kzid = $(this).attr('kzid');
            $.post("<?php echo U('classroom/Public/doreviewvote');?>",{kztype:5,kzid:kzid,type:1},function(txt){
                $(zan_this).addClass('qa-icon');
                $(zan_this).removeClass('zan');
            });
        });


      //星星评分
        score('star_ul');

      //分页操作
        $('.reviewPage a').live('click',function(){
            var p = $(this).attr('p');
            if(typeof(p) == 'undefined') return false;
            getReview(p);
            return false;
        });
    });

    
  //写点评
    function doDianpin(){
        if(review_uid <=0){
            reg_login();
            return false;
        }
        var score = $('#course_score').val();
        if(score == 0){
            //ui.error('请给课程打分!');
            notes('请给'+(review_kztype==1?'课程':'专辑')+'打分!','failure');
            return false;
        }
        var content = $('#review_con').val();
        content = content.replace(/&nbsp;/ig, "");
        content = content.replace(/[ ]/g,"");//去除空格
        content = content.replace(/<[^>].*?>/g,"");//去html标签
        if(content == ""){
            //ui.error('请输入评价内容!');
            notes('请输入评价内容!','failure');
            return false;
        }
        for(var i=0; i<arr.length; i++)
        {
            if(content.indexOf(arr[i])>-1)
            {
                notes('评价内容不得包含敏感词!','failure');

                return false;
            }
        }
        ajaxPinjia(score,content);
    }

    //提交点评
    function ajaxPinjia(score,content){
        $.ajax({
            type: "POST",
            url:U('classroom/Review/add'),
            data: "score="+score+'&content='+content+'&id='+review_kzid+'&kztype='+review_kztype,
            async:false,
            dataType:"JSON",
            success: function(xMLHttpRequest){
                if(xMLHttpRequest.status == 1){
                    //$('#course_score').val('0');
                    $('#review_form')[0].reset();
                    $('#review-comments').hide();
                    $("#dpmsg").remove();
                    getReview(1);
                }else{
                    notes(xMLHttpRequest.info,'failure');
                }
            },
            error:function(xhr){
                notes(xhr.info, 'failure');
            }
        });
        
    }
    //获取点评
    function getReview(page){
    	var url = "<?php echo U('widget/Resource/getList');?>";
        var html = '';
        $.post(url,{limit:review_limit,kztype:review_kztype,kzid:review_kzid,type:review_type,p:page},function(data){
            if(data.data==""){
                html+='<span id="dpmsg">对不起，暂时没有点评，快来坐沙发！</span>';
            }else{
            $.each(data.data,function(i,k){
                html += '<div class="review_con wenda-listcon clearfix">';
                html += '<div class="headslider fl">';
                html += '<a href="'+k.user_src+'" class="wenda-head" target="_blank" title="'+k.username+'"><img width="60" height="60" src="'+k.userface+'"></a>';
                html += '<a href="'+k.user_src+'" target="_blank" title="'+k.username+'" class="wenda-nickname">'+k.username+'</a>';
                html += '</div>';
                html += '<div class="wendaslider fl position-rt">';
                //星级点评
                html += '<div class="reply-star">';
                html += '<label class="form-label color_hui  fl" for="score">评分：</label>';
                html += '<ul class="star_ul fl">';
                html += '<li class="'+(k.star>=1?'grade-back-set':'grade-back-default')+'"></li>';
                html += '<li class="'+(k.star>=2?'grade-back-set':'grade-back-default')+'"></li>';
                html += '<li class="'+(k.star>=3?'grade-back-set':'grade-back-default')+'"></li>';
                html += '<li class="'+(k.star>=4?'grade-back-set':'grade-back-default')+'"></li>';
                html += '<li class="'+(k.star>=5?'grade-back-set':'grade-back-default')+'"></li>';
                html += '</ul>';
                html += '</div>';
                html += '<div class="replycont clearfix">'+k.review_description+'</div>';
                html += '<div class="replymegfooter">';
                html += '<div class="wenda-time"> <em>提问时间：'+k.strtime+'</em> </div>';
                html += '<div class="qa-comment-addon-r fr">';
                html += '<span class="qa-total-reply">';
                html += '<span show_id="'+k.id+'" type="review" class="js-qa-tr-num review"><i class="qa-icon"></i><span class="com_num">'+k.review_comment_count+'</span> 条评论</span>';
                html += '<span cancel_id="'+k.id+'" type="review" class="qa-tr-up ">收起评论<b><i></i></b></span>';
                html += '</span>';
                html += '<span  class="js-qa-comment-support qa-comment-support  js-qacom-supported-user">'
                html += '<i kzid="'+k.id+'" class="'+(k.isvote ?'zan':'qa-icon')+'"></i></span>';
                html += '</div></div></div></div>';
              //回复部分
                html +='<div id="review_'+k.id+'" style=" display:none" class="qa-replies width-wd fl">';
                html +='<div class="qa-reply-c"></div>';
                html +='<div  class=" qa-reply-ibox clearfix">';
                html +='<div class="qa-reply-iavator fl"> <a href="'+data.user_src+'" title="'+data.username+'"> <img width="40" height="40" src="'+data.userface+'"> </a> </div>';
                html +='<div class="qa-reply-iwrap">';
                html +='<div class="qa-reply-iarea">';
                html +='<input type="hidden" class="reply_uid" value="0"/>';
                html +='<textarea name="review_comment" id="reviewf_'+k.id+'" rid="'+k.id+'" class="js-reply-ipt-default" placeholder="写下你的评论..."></textarea>';
                html +='</div>';
                html +='<div class="qa-reply-footright fr"> <span class="qa-tips"></span>';
                html +='<button class="btn-mc-light js-ipt-cancel note_cancel">取消</button>';
                html +='<button sub_id="'+k.id+'" type="review" class="btn-mc btn-mini btn-mc-green  js-ipt-submit note_sub">提交</button>';
                html +='</div>';
                html +='</div>';
                html +='</div>';
                html +='</div>'; //内容结束
            }); //each
            }
          //分页  if(data.totalPages > 1) 
            if(data.totalPages > 1) html += '<div class="reviewPage sabrosus">'+data.html+'</div>';
            if($('.video-review .review_con').size() <=0){
                $('.video-review').append(html);
            }else{
                $(".review_con").children().not('#review-comments').remove();
                $(".review_con").append(html);
                $('#review-comments').hide();
            }
        },'json'); //post
    }

    
  //星星评分
    function score(id)
    {
        var oStarUl=document.getElementById(id);
        var aLi=oStarUl.children;
        for(var i=0; i<aLi.length; i++)
        {
            //aLi[i].style.backgroundPosition=i%2?'-12px 0':'0 0';
            aLi[i].index=i;
            //鼠标移入
            aLi[i].onmouseover=function ()
            {
                for (var i=0; i<aLi.length; i++)
                {
                    aLi[i].className="grade-back-default";
                }
                
                for (var i=0; i<this.index+1; i++)
                {
                    aLi[i].className="grade-back-set";
                }
            };
            aLi[i].onclick=function ()
            {
                $("#course_score").val(this.index+1);
                $('#how-score').text('评分:'+(this.index+1)+'分');
            };
        }
    }
</script>
<!-- 点评结束 -->