<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>编辑培训师资与环境</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>

<script type="text/javascript" src="lgHttp.js"></script>
<script>

function szset(){//index-teacher
	
	if(document.tecform.sz_name.value==0){
	document.getElementById("tname").innerHTML="<font color=red>&times;请填写名称!</font>";
	document.tecform.sz_name.focus();
	return false;
	}else{
		  document.getElementById("tname").innerHTML="<font color=green><b>√</b></font>";
		  }
	
	   	
	if(document.tecform.sz_pic.value==""){
	document.getElementById("tpic").innerHTML="<font color=red>&times;请上传图片!</font>";
	document.tecform.sz_pic.focus();
	return false;
	}else{
	document.getElementById("tpic").innerHTML="<font color=green><b>√</b></font>";
	}
		  
}
</script>
<body>
<?php 
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (isset($_POST["sz_name"])){

$sql="update szfencai set sz_name='".$_POST["sz_name"]."',pxs_name='".$_SESSION["pxmbsname"]."',sz_class='".$_POST["sz_class"]."',sz_info='".$_POST["sz_info"]."',sz_pic='".$_POST["sz_pic"]."',sz_date='".$_POST["sz_date"]."' where sz_id=".$_POST["sz_id"];
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('更新成功!!');location.href='pxmb_tslist.php';</script>";
			}else{
			exit("更新出现错误，错误信息为：".mysql_error());
			}
		//mysql_free_result($rs);//释放资源
}	

    $sql="select * from szfencai where sz_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }
	  	
include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('sz_info');
$oFCK->BasePath   = $sBasePath ;
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_righsz_box_title_01" style="text-align:left;color:white;">师生风采：编辑，修改介绍相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="pxmb_tsadd.php">添加师资与环境</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="pxmb_tslist.php" >查看师资与环境</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" height="259" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="tecform" method="post" onSubmit="return szset()" action="">
  <tr>
    <td colspan="5" class="mian_righsz_box_title_01">【编辑师资培训与环境】</td>
	</tr>
	<tr>
	  <td height="26" align="right" bgcolor="#FFFFFF">类　　别：</td>
	  <td width="917" bgcolor="#FFFFFF">
	  <input name="sz_class" type="radio" value="师资介绍" <?php if ($row["sz_class"]=="师资介绍"){echo "checked";}?>>
	  师资介绍
	  <input type="radio" name="sz_class" value="学校环境" <?php if ($row["sz_class"]=="学校环境"){echo "checked";}?>>学校环境</td>
      </tr>
	   <tr>
	  <td align="right" bgcolor="#FFFFFF">名　　称：</td>
	  <td width="917" bgcolor="#FFFFFF"><input type="hidden" name="sz_id" id="sz_id" value="<?php echo $_GET["id"]?>"/><input type="text" name="sz_name" id="sz_name" value="<?php echo $row["sz_name"]?>" maxlength="40" style="width:300px;"/><span id="tname">*</span></td>
      </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">图　　片：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="sz_pic" value="<?php echo $row["sz_pic"]?>" style="width:210px;" readonly/>
<input type="button" class="go" onClick="window.open('up2.php?formname=tecform&editname=sz_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />
                                <span id="tpic">*</span><span style="color:#999"> 尺寸(px)：150x150</span></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">介　　绍：</td>
                               <td bgcolor="#FFFFFF">
							   <?php 
							   $oFCK->Value  = $row["sz_info"];
							   $oFCK->Create();
							   ?></td></tr>
							 <tr>
                              <td align="right" bgcolor="#FFFFFF">更新时间：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="sz_date" value="<?php echo date("Y-m-d H:i:s");?>" style="width:210px;" readonly/></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存师生风采设置" />
					           <input type="reset" name="redel" value="重填" /></td>
						    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
