<?php
include_once("../../conn.php");

include_once("gf_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>高复课程列表-<?=$gf_title?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../../js/style.js"></script>
<link href="../../css/main2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrapper">  
  <!-- top -->
  <div class="top">
    <?php 
	include("../../top/top_1.html");
	include("../../top/xl_top.html");
	?>
  </div>
  <!-- top End --> 
  
  <!-- main -->
  <div class="main">
    <div class="main_xl_pro">
      <div class="main_xl_pro_box01">
        <div class="main_xl_pro_box01_left">
          <?php
		$sql="select * from xl_s_h limit 4";
        $rs=mysql_query($sql);
        //$row=mysql_fetch_assoc($rs);
		?>
          <div class="right_box01">
            <div class="main_xl_pro_box01_left_pic">
              <?php
				$i=0;
				while ($row=mysql_fetch_assoc($rs)){
				$i=$i+1;
				?>
              <div id="tbc_0<?php echo $i;?>" class=""><a href="<?php echo $row["s_h_http"];?>"><img src="<?=$z_website?>admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
              <?php }	?>
            </div>
            <div class="main_xl_pro_box01_left_text">
              <ul>
                <?php
				$sql="select * from xl_s_h limit 4";
                $rs=mysql_query($sql); 
				$j=0;
				while ($row=mysql_fetch_assoc($rs)){
				$j=$j+1;
				?>
                <li id="tb_<?php echo $j;?>" <?php if($j!=1){echo "class='normaltab1'";}else{echo "class='hovertab1'";}?> onmouseover="HoverLi(3);OvHoverLi(<?php echo $j;?>);">·<a href="<?php echo $row["s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
                <?php }?>
              </ul>
            </div>
            <script type="text/javascript">
function g(o){return document.getElementById(o);}
function HoverLi(n){
for(var i=1;i<=3;i++){g('tb_'+i).className='normaltab1';g('tbc_0'+i).className='undis';}g('tbc_0'+n).className='dis';g('tb_'+n).className='hovertab1';
}
function OvHoverLi(n){
for(var i=1;i<=3;i++){g('tb_'+i).className='normaltab1';g('tbc_0'+i).className='undis';}g('tbc_0'+n).className='dis';g('tb_'+n).className='hovertab1';
}
</script> 
          </div>
        </div>
        <div class="main_xl_pro_box01_right">
          <ul>
            <?php 
	  $sql="select * from luqu order by lq_date desc limit 5 ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	     $rs1=mysql_query("select s_name from school where s_id=".$row["s_id"],$conn); 
		  $row1=mysql_fetch_assoc($rs1);
		  				
           $rs2=mysql_query("select * from kkinfo where s_id=".$row["s_id"]." limit 1");
			$row2=mysql_fetch_assoc($rs2);
	  ?>
            <li>·<a href="<?=$z_website?>Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
            <?php }}?>
          </ul>
        </div>
      </div>
      <div class="main_xl_pro_box02">
        <div class="main_xl_pro_box02_title">
          <dl>
            <dt><a href="<?=$z_website?>Education/gfb/">高复班</a></dt>
            <dd><a href="<?=$z_website?>Education/wlys/">网络院校</a></dd>
            <dd><a href="<?=$z_website?>Education/">学历教育</a></dd>
            <dd><a href="<?=$z_website?>Education/zxks/">自学考试</a></dd>
            <dd><a href="<?=$z_website?>Education/gjbx/">国际办学</a></dd>
            <dd><a href="<?=$z_website?>Education/crgk/">成人高考</a></dd>            
            <dd><a href="<?=$z_website?>Education/xl_gxjz.php">高校简章</a></dd>
            <dd><a href="<?=$z_website?>Education/xl_pro_search.php">简章搜索</a></dd>
          </dl>
        </div>
        <div class="main_xl_pro_box02_list">
          <div class="main_xl_pro_box02_list00">
            <?php 
if(isset($_POST["xl_skey"])){	
	$skey=@$_POST["xl_skey"];
	echo "<script>location.href='".$z_website."Education/xl_pro_search.php?skey=".$skey."';</script>";	
}
				?>
            <form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
              <ul>
                <li>
                 <!-- <select name="xl_scl" style="width:120px;">
                    <option value=0>--请选择--</option>
                    <option value="学历教育">学历教育</option>
                    <option value="自学考试">自学考试</option>
                    <option value="网络院校">网络院校</option>
                    <option value="成人高考">成人高考</option>
                    <option value="国际办学">国际办学</option>
                    <option value="高校简章">高校简章</option>
                    <option value="简章搜索">简章搜索</option>
                    <option value="高复班">高复班</option>
                  </select>-->
                  填写搜索关键词：
                </li>
                <li>
                  <input name="xl_skey" type="text" style="width:220px;" />
                </li>
                <li>
                  <input  type="image" src="<?=$z_website?>images/ss_pro.jpg" style="cursor:pointer; width:60px; height:24px;"/>
                </li>
              </ul>
            </form>
            <div class="pro_search_key"> <span>搜索关键词：</span> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("高起专")?>">高起专</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("高起本")?>">高起本</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("成人高复")?>">成人高复</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("自学考试")?>">自学考试</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("专升本")?>">专升本</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("财务管理")?>">财务管理</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("培训")?>">培训</a></div>
          </div>
        </div>
      </div>
      <div class="main_xllb">
<?php
$pagesize=6;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
//echo $url;


$numq=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where zyclass like'%高复%'");

$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
?> 
        <div class="gf_zx_left">
          <div class="zx_zx_fd_001">
            <div class="zx_zx_lj">
              <dl>
                <dd><span><a href="#">首页</a></span></dd>
                <dt><img src="<?=$z_website?>images/bx_hw_03.jpg" width="17" height="30" /></dt>
                <dd><a href="<?=$z_website?>Education/gfb/">高复班</a></dd>
                <dt><img src="<?=$z_website?>images/bx_hw_03.jpg" width="17" height="30" /></dt>
                <dd><a href="Education/gfb/gf_bm_lb.php">高复课程列表</a></dd>
                <dt><img src="<?=$z_website?>images/bx_hw_03.jpg" width="17" height="30" /></dt>
              </dl>
            </div>
          </div>
          <div class="zx_wzgg_001">
            <div class="zx_gg_lm_002">
              <div class="zx_gg_zl">高复课程列表</div>
            </div>
            <div class="zx_lm_dian"><img src="<?=$z_website?>images/wl-gg_06.jpg" /></div>
           
                   <?php 
					$rs1=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where zyclass like'%高复%' order by kkdate desc limit $page $pagesize",$conn);		 
					if (mysql_num_rows($rs1)>=1){						
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){					  
					?>
           <div class="gf_xx_kuang_001_01">
            	<div class="gf_xx_tu"><a href="<?=$z_website?>Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><img src="<?=$z_website?>admin_root/<?=$row1["k_pic"]?>" width="120" height="55" /></a></div>
                <div class="gf_xx_mc">
                	<dl>
                    	<dd><span>班级名称：</span><?=$row1["ktitle"]?></dd><dt><span>开班时间：</span><?=$row1["kdate"]?></dt>
                        <dd><span>上课地点：</span><?=$row1["k_adderss"]?></dd><dt><span>班制：</span><?=$row1["kcal"]?></dt>
                    </dl>
                </div>
                <div class="gf_xx_js">课程介绍：</div>
                <div class="gf_xx_js_001"><?=utf_substr($row1["zycon"],300)?><span>   <a href="<?=$z_website?>Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row1["kid"]?>">>>查看专业介绍</a></span></div>
                <div class="gf_xx_zy_001">
                	<ul>
                    	<li><span>专业类别：</span><?=$row1["zyclass"]?></li>
                        <li><span>课程时间：</span><?=$row1["ktime"]?></li>
                        <li><span>学    费：</span><?=$row1["yhui"]?>/总学费</li>
                    </ul>
                </div>
                <div class="gf_xx_zy_002"><a href="<?=$z_website?>Education/gfb/gf_bm_lb_wd.php?gid=<?=$row1["kid"]?>">我要咨询>></a>　　<a href="<?=$z_website?>Education/gfb/gf_zx_wsbm.php?gid=<?=$row1["kid"]?>">网上报名>></a></div>
            </div>
                    <?php }}?>
            <div style=" text-align:right; clear:both; margin-top:15px; margin-right:10px; wdith:500px;height:30px;">
               <?php
echo "共 $num 条信息";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " ".$i." ";
		 }else{
	     echo " <a href=$url?page=".$i.">[".$i."]</a> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}

} 
?>
              </div>
          </div>
        </div>
        <div class="gf_zx_right">
        	<div class="gf_kc_kuang">
            	<div class="gf_kc_bj">
                	<div class="gf_kc_bt">高复推荐课程</div>
                </div>
                <div class="gf_kc_mc"><span>课程名称</span>报名</div>
                <div class="gf_kc_bt_001">
                	<dl>
                    <?php 
					$rs1=mysql_query("select * from school join kkinfo on kkinfo.s_id=school.s_id where zyclass like'%高复%' order by kkdate desc limit 6",$conn);		 
					if (mysql_num_rows($rs1)>=1){
					   while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
					?>
                    <dd><a href="<?=$z_website?>Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row1["kid"]?>" title="<?=$row1["ktitle"]?>"><?=$row1["ktitle"]?></a></dd>
                    <dt><a href="<?=$z_website?>Education/gfb/gf_zx_wsbm.php?gid=<?=$row1["kid"]?>">立即报名</a></dt>
                    <?php }}?>  
                    </dl>
                </div>
                <div style="clear:both; height:12px;"></div>
            </div>
            <div style="clear:both; height:12px;"></div>
            <div class="gf_kc_kuang">
            	<div class="gf_kc_bj">
                	<div class="gf_kc_bt">推荐资讯</div>
                </div>
                <div class="gf_zx_tu"><a href="<?=$z_bottom5_link?>"><img src="<?=$z_website?>admin_root/<?=$z_bottom5?>" width="222" height="120" /></a></div>
                <div class="gf_zx_bt_001">
                	<ul>
                  <?php
					$sql="select * from ennews  where nclass=39 or nclass=40 and nbool=1 order by ndate desc limit 7";
					$rs=mysql_query($sql);
					if (mysql_num_rows($rs)>=1){
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
					?>
				  <li><a href="<?=$z_website?>Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo msubstr($row["ntitle"],70)?></a></li>
                <?php
					}}
					?>
                    </ul>
                </div>
                <div style="clear:both; height:12px;"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- main End --> 
  
  <!-- bottom -->
  <?php include("../../bottom/bottom.html");?>
  <!-- bottom End --> 
</div>
</body>
</html>