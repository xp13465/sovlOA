<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>下载资料列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  if (isset($_POST["w_title"])){ 
  
      $sql="update mb_download set w_dclass='".$_POST["w_dclass"]."',w_title='".$_POST["w_title"]."',w_con='".$_POST["w_con"]."' where w_id=".$_POST["w_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='mb_down_list.php';</script>";
	  }else{
	  
	  exit("更新失败! 错误资料为:".mysql_error());
	  }
  }
  
      $sql="select * from mb_download where w_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误资料为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }

include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('w_con');
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">下载资料：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="mb_download_add.php">添加下载资料</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="mb_download_list.php" >查看下载资料</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="askform" method="post" onSubmit="if(document.askform.w_title.value==''){alert('标题为空');document.askform.w_title.focus();return false;}" action="">
      <tr>
        <td colspan="2" class="mian_right_box_title_01">【编辑下载资料】</td>
      </tr>
      <tr>
        <td height="18" align="right" bgcolor="#FFFFFF" class="title">资料类别：</td>
        <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="w_dclass" type="radio" value="模拟题下载" <?php if($row["w_dclass"]=="模拟题下载"){echo "checked";}?>>
模拟题下载
  <input type="radio" name="w_dclass" value="表格资料下载" <?php if($row["w_dclass"]=="表格资料下载"){echo "checked";}?>>
表格资料下载</td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#FFFFFF" class="title">资料标题：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input name="w_id" value="<?php echo $_GET["id"];?>"type="hidden">
          <input type="text" name="w_title" id="w_title" value="<?php echo $row["w_title"]?>" maxlength="40" style="width:300px;"/>
          <span id="ntil">*</span></td>
      </tr>
      <tr>
        <td height="56" align="right" bgcolor="#FFFFFF" class="title">资料内容：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["w_con"];
		$oFCK->Create();
		?></td>
      </tr>
      <tr>
        <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存资料"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>
