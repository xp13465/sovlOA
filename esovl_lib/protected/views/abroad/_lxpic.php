<?php $web=WebStep::model()->findByPk(12);?>
<script type="text/javascript">
	<!-- 
	var interval_time=2 ;
	var focus_width=441;
	var focus_height=118;
	var text_height=0;
	var text_mtop = 0;
	var text_lm = 0;
	var textmargin = text_mtop+"|"+text_lm;
	var textcolor = "#005F00";
	var text_align= 'center'; 
	var swf_height = focus_height+text_height+text_mtop; 
	var text_size = 13;
	var borderStyle="0|0x000000|000";
	var pics='/admin_root/<?php echo $web->z_pic1;?>|/admin_root/<?php echo $web->z_pic2;?>|/admin_root/<?php echo $web->z_pic3;?>|/admin_root/<?php echo $web->z_pic4;?>|/admin_root/<?php echo $web->z_pic5;?>|/admin_root/<?php echo $web->z_pic6;?>'
	var links='<?php echo $web->z_link1;?>|<?php echo $web->z_link2;?>|<?php echo $web->z_link3;?>|<?php echo $web->z_link4;?>|<?php echo $web->z_link5;?>|<?php echo $web->z_link6;?>'
	var
	texts='|||||'
	document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash. cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
	document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="/images/hot_new.swf"> <param name="quality" value="high"><param name="Wmode" value="transparent">');
	document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
	document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'&textmargin='+textmargin+'&textcolor='+textcolor+'&borderstyle='+borderStyle+'&text_align='+text_align+'&interval_time='+interval_time+'&textsize='+text_size+'">');
	document.write('<embed src="/images/hot_new.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'&textmargin='+textmargin+'&textcolor='+textcolor+'&borderstyle='+borderStyle+'&text_align='+text_align+'&interval_time='+interval_time+'&textsize='+text_size+'" menu="false" bgcolor="#ffffff" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');	document.write('</object>');
	
	//-->
</script> 