<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训版信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.js" type="text/javascript"></script>
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
$mid=$_GET['mid'];
if ($mid==""){
	exit;
}
  if (isset($_POST["ntitle"])){ 
  
      $sql="update ennews set ntitle='".$_POST["ntitle"]."',npic='".$_POST["npic"]."',nclass=".$_POST["nclass"].",ncon='".$_POST["ncon"]."',nbool=".$_POST["nbool"]." where nid=".$_POST["nid"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='exl_nlist.php?id=".$_POST["mid"]."';</script>";
	  }else{
	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from ennews where nid=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }

include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('ncon');
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">培训版信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="formnews" method="post" onSubmit="return newsset()" action="">
      <tr>
        <td colspan="5" class="mian_right_box_title_01">【编辑培训版新闻信息】</td>
      </tr>
      <tr>
        <td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">选择新闻分类：</td>
        <td width="919" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input name="nid" value="<?php echo $_GET["id"]?>" type="hidden"><select name="nclass">
      
     <?php 
      $sql="select * from enclass where n_type='$mid'";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($rw=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
            <option value="<?php echo $rw["n_id"]?>" <?php if($rw["n_id"]==$row["nclass"]){?> selected <?php }?>><?php echo $rw["n_class"]?></option>
      <?php }}?>
          </select>
        <span id="ncl">*</span> </td>
      </tr>
      <tr>
        <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
        <td width="919" bgcolor="#FFFFFF" class="title"><input type="text" name="ntitle" id="ntitle" value="<?php echo $row["ntitle"]?>" maxlength="40" style="width:300px;"/><input type="hidden" name="mid" value="<?php echo $mid;?>">
            <span id="ntil">*</span></td>
      </tr>
      <tr>
        <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">图片上传：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input type="text" name="npic" size="50" value="<?php echo $row["npic"];?>"><input type="button" value="浏览" onClick="window.open('up2.php?formname=formnews&editname=npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"><input type="button" value="预览" onMouseOver="document.getElementById('showpic').style.display=''" onMouseOut="document.getElementById('showpic').style.display='none'"><div id="showpic" style=" width:50px; height:50px; position:absolute; display:none;"><img src="<?=$row['npic']?>"></div></td>
      </tr>
      <tr>
        <td height="56" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息内容：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["ncon"];
		$oFCK->Create();
		?></td>
      </tr>
      <tr>
        <td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="radio" name="nbool" value="1" <?php if($row["nbool"]==1){?> checked <?php }?>>
          是
          <input type="radio" name="nbool" value="0" <?php if($row["nbool"]==0){?> checked <?php }?>>
          否</td>
      </tr>
      <tr>
        <td height="28" colspan="4" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="text" name="ndate" id="ndate" value="<?php echo date("Y-m-d H:i:s");?>" maxlength="40" style="width:300px;"/></td>
      </tr>
      <tr>
        <td height="29" colspan="4" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>
