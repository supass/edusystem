<?php if (!defined('THINK_PATH')) exit();?><div class="qd fl" style="cursor:pointer;<?php echo ($ischeck?'background:#999;':''); ?>"<?php echo ($ischeck?'':' onclick="checkIn()"'); ?>>
    <a  id="check_in_click" >
    <?php echo $ischeck ? '已连续签到' . $con_num . '天':'签到赚学分';?>
    </a>
</div>
<p class="qd-jf">连续领取，每天+5，最高+40封顶</p>
<script type="text/javascript">
function checkIn(){
	if($('#check_in_click').parent().attr('locked')){
		return false;
	}
	$.post(U('widget/CheckIn/check_in') , {} , function (res){
		if ( res ){
			$('#check_in_click')
			.text('已连续签到'+res+'天');
            $('#check_in_click').parent()
			.css({background:'#999'})
			.attr('locked', 'yes');
			setCreditScore && setCreditScore(parseInt(res)*5);
		}
	});
}
</script>