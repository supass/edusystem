<?php if (!defined('THINK_PATH')) exit();?><?php if(isset($data)): ?><?php foreach($data as $k=>$l): ?><?php if(empty($l['wenti'])){ ?>
<li class="li" <?php if($k == 0) echo "style='padding:0 0 20px;'" ?>>
    <div class="discusslist"> <a target="_blank" title="<?php echo getUserName($l['uid']);?>" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['uid']));?>" class="otherHead" ><img width="40" height="40" src="<?php echo getUserFace($l['uid'],'m');?>"></a>
        <div class="detailmeg">
            <div class="mynote"><a title="<?php echo getUserName($l['uid']);?>" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['uid']));?>"><?php echo getUserName($l['uid']);?></a> <em>提问:</em> <a title="<?php echo getUserName($l['uid']);?>" href="<?php echo U('classroom/Video/view',array('id'=>$l['oid']));?>" target="_blank"><?php echo ($l["qst_title"]); ?></a></div>
            <p class="mynote"><a target="_blank" href="<?php echo U('classroom/Video/view',array('id'=>$l['oid']));?>">
                <?php echo limitNumber($l['qst_description'],150);?> </a> </p>
            <div class="fbtime">时间：
                <span><?php echo (date("Y/m/d H:i",$l["ctime"])); ?></span>
                <span class="js-qa-comment-support qa-comment-support  js-qacom-supported-user fr"><i class="qa-icon"></i><span>同问(<?php echo ($l["qst_help_count"]); ?>)</span></span>
                <span class="qa-total-reply fr"><i class="qa-icon"></i><span><?php echo ($l["qcount"]); ?>条回答</span></span>
            </div>
        </div>
    </div>
</li>
<?php }else{ ?>
    <li  class="li" <?php if($k == 0) echo "style='padding:0 0 20px;'" ?>>
        <div class="discusslist"> <a target="_blank" title="<?php echo getUserName($l['wenti']['uid']);?>" class="otherHead" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['wenti']['uid']));?>"><img width="40" height="40" src="<?php echo getUserFace($l['wenti']['uid'],'m');?>"></a>
            <div class="detailmeg">
                <div class="report">
                    <div class="mynote"><a title="<?php echo getUserName($l['wenti']['uid']);?>" href="<?php echo U('classroom/UserShow/index',array('uid'=>$l['wenti']['uid']));?>"><?php echo getUserName($l['wenti']['uid']);?></a> <em>提问:</em> <a title="<?php echo getUserName($l['wenti']['uid']);?>" href="<?php echo U('classroom/Video/view',array('id'=>$l['wenti']['oid']));?>" target="_blank"><?php echo ($l["wenti"]["qst_title"]); ?></a></div>
                    <p class="mynote"><a target="_blank" href="<?php echo U('classroom/Video/view',array('id'=>$l['wenti']['oid']));?>" > <?php echo limitNumber($l['wenti']['qst_description'],120);?> </a> </p>
                </div>
                <div class="firendreply"> <a  title="<?php echo getUserName($l['uid']);?>" class="firendHead" ><img src="<?php echo getUserFace($l['uid'],'s');?>"></a>
                    <div class="lzreply"> <span><a title="<?php echo getUserName($l['uid']);?>"><?php echo getUserName($l['uid']);?></a> 回答:</span> <em><?php echo limitNumber($l['qst_description'],150);?></em> </div>
                </div>
                <div class="fbtime">时间：<span><?php echo (date("Y/m/d H:i",$l["wenti"]["ctime"])); ?></span>
                    <span class="js-qa-comment-support qa-comment-support  js-qacom-supported-user fr"><i class="qa-icon"></i><span>同问(<?php echo ($l["wenti"]["qst_help_count"]); ?>)</span></span>
                    <span class="qa-total-reply fr"><i class="qa-icon"></i><span><?php echo ($l["wenti"]["qcount"]); ?>条回答</span></span>
                </div>
            </div>
        </div>
    </li>
<?php } ?><?php endforeach; ?><?php endif; ?>