<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<?php 
		$web=WebStep::model()->findByPk(0);
		?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="/js/common/common.css" rel="stylesheet" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script src="/js/jquery.js" type="text/javascript"></script>
		<script src="/js/common/common.js" type="text/javascript"></script>
		<link href="/css/research/yxcss.css" rel="stylesheet" type="text/css" />
		<link href="/css/research/yxtop.css" rel="stylesheet" type="text/css" />
		<link href="/css/research/yxmain.css" rel="stylesheet" type="text/css" />
		<link href="/css/research/yxbottom.css" rel="stylesheet" type="text/css" />
		<link href="/css/research/bottom.css" rel="stylesheet" type="text/css" />
		<link href="/css/research/style.css" type="text/css" rel="stylesheet">
		<link href="/css/research/home.css" rel="stylesheet">
		<link href="/css/research/css.css" rel="stylesheet">
		<!--[if gte IE 6]>
		<script language="javascript" src="/js/research/ie6png.js" type="text/javascript" ></script>
		<![endif]-->
		<script language="javascript" src="/js/research/yx_nav.js" type="text/javascript" ></script>
		<!------------ zgn.htm css js-------------->
		
		<!--[if ie]><link href="/css/research/ie.css" rel=stylesheet><![endif]-->
		<script src="/js/research/jquery.cycle.all.min.js" type="text/javascript"></script>
		<!--[if lte IE 6]>
		<script src="js/ie6png.js"></script>
		<![endif]-->
	</head>
    <body>
		<div class="wrapper" >
			<div class="top">
				<div class="top_dl">
					<div class="top_dl_01">
						<ul>
							<li><label>用户名：</label><input type="text" class="srk" /></li>
							<li><label>密&nbsp;码：</label><input type="password" class="srk" /></li>
							<li><input name="" type="image" src="/Research/images/yxdl.jpg" class="anniu" /></li>
							<li><a href="/vip_login.php"><input name="" type="image" src="/Research/images/yxzc.jpg" class="anniu" /></a></li>
						</ul>
					</div>
					<div class="top_dl_02">
						<ul>
							<li><input type="text" class="srk02" /></li>
							<li>
								<select name="">
								  <option>--请选择--</option>
								  <option>MBA/EMBA</option>
								  <option>工程硕士</option>
								  <option>在职研究生</option>
								  <option>总裁总监研修</option>
								  <option>简章大全</option>
								</select>
							</li>
							<li><input name="" type="image" src="/Research/images/yxsyx.jpg" class="anniu" /></li>
						</ul>
					</div>
					<div class="top_dl_03">
						<span><a href="#">上海站</a>--</span><a href="#">选择城市</a>
					</div>
				</div>
				<div class="top_link">
					<strong>研修在线:</strong>
					<a href="/Research/mba/">MBA/EMBA</a><span>|</span>
					<a href="/Research/master/">工程硕士</a><span>|</span>
					<a href="/Research/graduate/">在职研究生</a><span>|</span> 
					<a href="/Research/president/">总裁总监研修</a><span>|</span>
					<a href="/Research/yx_daquan.php">简章大全</a><span>|</span>
					<a href="/Research/yx_seach.php">简章搜索</a><span>|</span>
					<a href="javascript:void(null);">更多>></a>
				</div>
				<div class="top_nav">
					<div class="top_nav_01">
						<div class="top_nav_01_left"><a href=""><img src="/Research/images/yx_logo.png" /></a></div>
						<div class="top_nav_01_right">
							<div class="top_nav_01_right_gg">
							网站公告： 欢迎光临一休教育网，研修频道。本网站将为您提供215家知名培训机构，8256门培训课程的咨询报名服务...
							</div>
							<div class="top_nav_01_right_nav">
								<ul>
								<li><a href="/">首页</a></li>
								<li><a href="/Education/index" onmouseover="myopen('yx01','yxnav01')" id="yx01">学历</a></li>
								<li><a href="/Training/index" onmouseover="myopen('yx02','yxnav02')" id="yx02">培训</a></li>
								<li><a href="/Research/index" onmouseover="myopen('yx03','yxnav03')" id="yx03" class="yx_bg">研修</a></li>
								<li><a href="/Abroad/index">留学</a></li>
								<li><a href="/Enterprise/index" >企培</a></li>
								<li><a href="/news.php">资讯</a></li>
								<li><a href="/bbs" id="yx07">社区</a></li>
								<!--<li><a href="#" id="yx08">人才</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="top_nav_02">
						<div class="top_nav_02_text">
							<div class="top_nav_sub01" id="yxnav01">
								<a href="/Education/">学历教育</a>
								<a href="/Education/zxks/">自学考试</a>
								<a href="/Education/wlys/">网络院校</a>
								<a href="/Education/crgk/">成人高考</a>
								<a href="/Education/gjbx/">国际办学</a>
								<a href="/Education/xl_gxjz.php">高校简章</a>
								<a href="/Education/xl_pro_search.php">简章搜索</a>
								<a href="/Education/gfb/">高复班</a>
							</div>
							<div class="top_nav_sub02" id="yxnav02">
					 <?php
						$rsp=Pxbclass::model()->findAll();
						foreach($rsp as $v){
							if ($v["pb_pindao"]=="外语频道"){
							echo"<a href='/Training/px_pd01.php'>".$v["pb_title"]."</a>";
							}
							if ($v["pb_pindao"]=="高考频道"){
							echo"<a href='/Training/px_pd02.php'>".$v["pb_title"]."</a>";
							}
							if ($v["pb_pindao"]=="中学生辅导"){
							echo"<a href='/Training/px_pd03.php'>".$v["pb_title"]."</a>";
							}  
							if ($v["pb_pindao"]=="职业频道"){
							echo"<a href='/Training/px_pd05.php'>".$v["pb_title"]."</a>";
							}
							if ($v["pb_pindao"]=="早教频道"){
							echo"<a href='/Training/px_pd04.php'>".$v["pb_title"]."</a>";
							}
							if ($v["pb_pindao"]=="艺术体育"){
							echo"<a href='/Training/px_pd06.php'>".$v["pb_title"]."</a>";
							}
							if ($v["pb_pindao"]=="少儿频道"){
							echo"<a href='/Training/px_pd07.php'>".$v["pb_title"]."</a>";
							}
						}?>            
						<a href="/Training/px_shcool.php">培训学校</a>
						<a href="/Training/px_shop.php">培训超市</a>
							</div>
							<div class="top_nav_sub03" id="yxnav03">
								<a href="/Research/mba/">MBA/EMBA</a>
								<a href="/Research/master/">工程硕士</a>
								<a href="/Research/graduate/">在职研究生</a>
								<a href="/Research/president/">总裁总监研修</a>
								<a href="/Research/yx_daquan.php">简章大全</a>
								<a href="/Research/yx_seach.php">简章搜索</a>
							</div>
						</div>
						<div class="top_nav_02_bottombg"><img src="/Research/images/yx_nav_bottombg.jpg" /></div>
					</div>
				</div>
			</div>
        <div class="main">
            <?php  echo $content; ?>
        </div>
        <?=$this->renderPartial('/layouts/yx_footer',array("web"=>$web));?>
        </div>
    </body>
</html>
