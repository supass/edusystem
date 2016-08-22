<?php if (!defined('THINK_PATH')) exit();?><?php if(isset($data)): ?><?php foreach($data as $key=>$l): ?><li>
        <div class="position-rt">
            <div class="Operation-list" >
                <a href="javascript:;" onclick="delalbum(this,<?php echo ($l["oid"]); ?>)">删除<span></span></a>
            </div>
            <a href="<?php echo U('classroom/Video/view',array('id'=>$l['id']));?>" class="img"><img src="<?php echo getCover($l['cover'] , 222,144);?>"> </a> </div>
        <h2><a href="<?php echo U('classroom/Video/view',array('id'=>$l['id']));?>"><?php echo ($l["video_title"]); ?></a></h2>
        <div class="user-imglistbt"><span><?php echo ($l["video_order_count"]); ?>人购买</span></div>
    </li><?php endforeach; ?><?php endif; ?>