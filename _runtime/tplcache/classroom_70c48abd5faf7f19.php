<?php if (!defined('THINK_PATH')) exit();?><div id="myAdminLevel"></div>

<script type="text/javascript" src = "__THEME__/js/plugins/core.mzVideoLevel.js"></script>
<script>
$('#myAdminLevel').mzVideoLevel({
	'isadmin':true,//是否是后台
	'defaultids':'<?php echo ($default); ?>',
	'type':'<?php echo ($type); ?>'
},function(fun){
	//alert('fdfd');
});
</script>
<a></a>