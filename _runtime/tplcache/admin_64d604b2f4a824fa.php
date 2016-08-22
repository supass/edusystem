<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
#show_icon img {width:100px;height:100px;}
</style>

<dl class="pop-area">
  <dt class="mb10" style="overflow:hidden;*zoom:1;"><div class="l">分类名称：</div><div class="r"><input type="text" id="category_title" value="<?php echo ($category['title']); ?>" class="s-txt" style="width:245px;"></div></dt>
  <!-- 
  <?php if(isset($stable) && $stable=='zy_video_category'): ?><div class="l">下级分类名称：</div><div class="r"><input type="text" id="category_next_name" value="<?php echo ($category['next_name']); ?>" class="s-txt" style="width:245px;"></div><?php endif; ?>
   -->
  <dd>
    <?php if(isset($category)): ?>
    <input type="button" class="btn_b" onclick="upTreeCategory()" value="确定" />
    <?php else: ?>
    <input type="button" class="btn_b" onclick="addTreeCategory()" value="确定" />
    <?php endif; ?>
    <input type="button" class="btn_w ml10" onclick="ui.box.close()" value="取消" />
  </dd>
  <div class="clear"></div>
</dl>

<script type="text/javascript">
/**
 * 添加分类操作
 * @return void
 */
var addTreeCategory = function()
{
  var title = $.trim($('#category_title').val());
  var attachId = parseInt($('#form_icon').val());
  var pid = "<?php echo ($pid); ?>";
  var stable = "<?php echo ($stable); ?>";
  var limit = "<?php echo ($limit); ?>";
  //分类所属类型 云课堂专用
  var type = "<?php echo ($type); ?>";
  // 判断是否输入内容
  if(title === '') {
    ui.error('请输入分类名称');
    return false;
  }
  
  if(limit>0 && getLength(title)>limit){
    ui.error('分类名称不能超过'+limit+'个字');
    return false;
  }
	var data = {title:title, pid:pid, stable:stable, attach_id:attachId, type:type};
  // 提交添加
  $.post(U('admin/Public/doAddTreeCategory'), data, function(msg) {
    if(msg.status == 1) {
      ui.success('添加分类成功');
      setTimeout(function() {
        location.href = location.href;
      }, 1500);
      ui.box.close();
    } else {
      ui.error('添加分类失败');
      return false;
    }
  }, 'json');
};
/**
 * 编辑分类操作
 * @return void
 */
var upTreeCategory = function()
{
  var title = $.trim($('#category_title').val());
  var attachId = parseInt($('#form_icon').val());
  var cid = "<?php echo ($category['id']); ?>";
  var stable = "<?php echo ($stable); ?>";
  var limit = "<?php echo ($limit); ?>";
  //分类所属类型 云课堂专用
  var type = "<?php echo ($type); ?>";
  // 判断是否输入内容
  if(title === '') {
    ui.error('请输入分类名称');
    return false;
  }
  if(limit>0 && getLength(title)>limit){
    ui.error('分类名称不能超过'+limit+'个字');
    return false;
  }
  // 判断分类名称是否有变化
/*  if(title == "<?php echo ($category['title']); ?>") {
    ui.error('分类名称无变化，未提交修改');
    ui.box.close();
    return false;
  }*/
	var data = {cid:cid, title:title, stable:stable, attach_id:attachId, type:type};
  
  // 提交添加
  $.post(U('admin/Public/doUpTreeCategory'), data, function(msg) {
    if(msg.status == 1) {
      ui.success('编辑分类成功');
      setTimeout(function() {
        location.href = location.href;
      }, 1500);
      ui.box.close();
      return false;
    } else {
      ui.error('编辑分类失败');
      return false;
    }
  }, 'json');
};
</script>