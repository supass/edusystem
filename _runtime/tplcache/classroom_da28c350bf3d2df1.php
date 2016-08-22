<?php if (!defined('THINK_PATH')) exit();?><?php if(is_array($list)): ?><?php $i = 0;?><?php $__LIST__ = $list?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li class="li" <?php if($key == 0) echo "style='padding:0 0 20px;'" ?> >
   <div class="discusslist"> <a target="_blank" title="<?php echo getUserName($vo['uid']);?>" href="<?php echo U('classroom/UserShow/index',array('uid'=>$vo['uid']));?>" class="otherHead" ><img width="40" height="40" src="<?php echo getUserFace($vo['uid'],'m');?>"></a>
      <div class="detailmeg">
          <div class="mynote"><a title="<?php echo getUserName($vo['uid']);?>" href="<?php echo U('classroom/UserShow/index',array('uid'=>$vo['uid']));?>"><?php echo getUserName($vo['uid']);?></a> <em> 提问</em></div>
          <div class="Operation-wd">
              <?php if($wenda!="meque"){ ?>

              <a href="javascript:;" onclick="ui.confirm(this,'确定要删除该问答吗？');return false;" callback="delWenda(<?php echo ($vo['id']); ?>)" ><i></i><span>删除</span></a>
              <?php } ?>
          </div>
          <p class="mynote"><a target="_blank" href="<?php echo U('wenda/Index/detail',array('id'=>$vo['id']));?>"><?php echo ($vo['wd_title']); ?></a> </p>
          <?php if(!empty($vo['duid'])){ ?>
          <div class="firendreply"> <a  title="Sunflower" class="firendHead" ><img src="<?php echo getUserFace($vo['duid'],'s');?>"></a>
              <div class="lzreply"> <span><a title="<?php echo getUserName($vo['duid']);?>"><?php echo getUserName($vo['duid']);?></a> 回答:</span> <em><?php echo limitNumber($vo['description'],150);?></em> </div>
          </div>
          <?php } ?>
          <div class="fbtime">时间：<span><?php echo (friendlydate($vo['ctime'])); ?></span>
              <?php if($wenda!="meque"){ ?>
              <a href="<?php echo U('wenda/Index/editWenda',array('wid'=>$vo['id']));?>" class="fr"><i class="bianji-ico"></i>编辑</a>
              <?php } ?>
          </div>
      </div>
   </div>
</li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>