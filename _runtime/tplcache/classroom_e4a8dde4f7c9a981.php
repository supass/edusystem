<?php if (!defined('THINK_PATH')) exit();?><?php if($data): ?><?php if(isset($data)): ?><?php foreach($data as $key=>$l): ?><li style="height:200px;">
        <h2><a href="<?php echo U('classroom/Video/view',array('id'=>$l['id']));?>"><?php echo ($l["course_name"]); ?></a></h2>
        <div class="position-rt">
            <div class="Operation-list" >
                <a href="javascript:;" onclick="delcourse(this,<?php echo ($l["id"]); ?>)">删除<span></span></a>
            </div>
            <div class="user-imglistbt">
                老师 <?php echo ($l["teacher_info"]["name"]); ?><br/>
                电话号码：<font color="#2388c0"><?php echo ($l["teacher_info"]["phone"]); ?></font><br/>
                授课方式：
                <?php if($l["teach_way"] == 1): ?>线上授课
                <?php elseif($l["teach_way"] == 2): ?>线下授课
                <?php else: ?>线上线下均可<?php endif; ?><br/>
                价格：<font color="#2388c0"><?php echo ($l["course_info"]["course_price"]); ?></font>/小时&nbsp;&nbsp;共<font color="#2388c0"><?php echo ($l["teacher_info"]["reservation_count"]); ?></font>人购买<br/>
                <p>课程介绍：<?php echo (getshort($l["course_info"]["course_inro"],'40','...')); ?></p>
            </div>
        </div>
    </li><?php endforeach; ?><?php endif; ?>
<?php else: ?>
你还没有完成的约课<?php endif; ?>