<div class="bottom">
	<div class="bottom_box01">
		<div class="bottom_box01_top">
			<dl>
			<dt><a href="/">首页</a></dt>
			<dd>
            <?php
				$rowp=Cpinfo::model()->findAll("cp_id<>10");
			    foreach($rowp as $k=>$v){
			?>
			    <a href="/about.php?cid=<?=$v["cp_id"]?>"><?=$v["cp_title"]?></a>
			<?php if ($k!=count($rowp)-1){?><span>-</span>
            <?php }}?>
			</dd>
			</dl>
		</div><a id='db'></a>
		<div class="bottom_box01_list">
			<div class="bottom_box01_list_01">友情链接</div>
			<div class="bottom_box01_list_02">
				<?php
				foreach(Yqlj::model()->findAll() as $v){
				?>
				<a target="_blank" href="<?=$v["yq_link"]?>"><?=$v["yq_title"]?></a>
				<?php }?>
				<a onclick="jw.pop.alert('请发申请邮件到<?=$web['z_email']?>,谢谢配合！')" style="color:#ff7216;" href="#">申请友情链接</a>
			</div>
		</div>
		<div class="bottom_box01_bottom"><img src="/Research/images/yx_bottom_bbg.jpg" /></div>
	</div>				
	<div class="bottom_box02">Copyright <span>&copy;</span> 2010, 版权所有,<?php echo $web->z_name;?> <?php echo $web->z_icp;?>  地址：<?php echo $web->z_address;?></div>
</div>
