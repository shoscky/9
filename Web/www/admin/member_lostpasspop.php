<?
$Dir="../";
include_once($Dir."lib/init.php");
include_once($Dir."lib/lib.php");

$id=$_POST["id"];
$mode=$_POST["mode"];

if(strlen($_ShopInfo->getId())==0 || strlen($id)==0){
	echo "<script>window.close();</script>";
	exit;
}

if($mode=="create") {
	$passwd=substr(md5(rand(0,9999999)),0,8);
	$sql = "UPDATE tblmember SET passwd='".md5($passwd)."' WHERE id='".$id."' ";
	mysql_query($sql,get_db_conn());
	
	echo "</head><body onload=\"alert('[".$id."] 회원님의 임시비밀번호는 ".$passwd."입니다.');parent.window.close();\"></body></html>";exit;
}
?>

<html>
<head>
<meta http-equiv='Content-Type' content='text/html;charset=euc-kr'>
<title>임시 비밀번호 생성</title>
<link rel="stylesheet" href="style.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!--
document.onkeydown = CheckKeyPress;
document.onkeyup = CheckKeyPress;
function CheckKeyPress() {
	ekey = event.keyCode;

	if(ekey == 38 || ekey == 40 || ekey == 112 || ekey ==17 || ekey == 18 || ekey == 25 || ekey == 122 || ekey == 116) {
		event.keyCode = 0;
		return false;
	}
}

function PageResize() {
	var oWidth = document.all.table_body.clientWidth + 10;
	var oHeight = document.all.table_body.clientHeight + 80;

	window.resizeTo(oWidth,oHeight);
}

function CheckForm() {
	if(confirm("임시 비밀번호를 생성하시겠습니까?")) {
		document.form1.mode.value="create";
		document.form1.submit();
	}
}
//-->
</SCRIPT>
</head>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 oncontextmenu="return false" style="overflow-x:hidden;overflow-y:hidden;" ondragstart="return false" onselectstart="return false" oncontextmenu="return false" onLoad="PageResize();">
<TABLE WIDTH="350" BORDER=0 CELLPADDING=0 CELLSPACING=0 style="table-layout:fixed;" id=table_body>
	<TR>
		<TD>
			<table cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
				<tr>
					<td><img src="images/member_list_info_pass.gif" border="0" width="212" height="31"></td>
					<td width="100%" background="images/member_mailallsend_imgbg.gif"></td>
					<td align=right><img src="images/member_mailallsend_img2.gif" width="20" height="31" border="0"></td>
				</tr>
			</table>
		</TD>
	</TR>
	<tr>
		<TD style="padding-top:10pt; padding-right:10pt; padding-bottom:5pt; padding-left:10pt;">
			<table cellpadding="0" cellspacing="0" width="320" align="center" style="table-layout:fixed">
				<tr>
					<td width="100%">회원비밀번호는 <b><span class="font_orange">정보통신부의 개인정보 보호권고사항</span></b>에의해 노출되지 않습니다!<br><br>회원이 비밀번호를 잊어 문의하신 경우, 임시 비밀번호를 발급해 주시길 바랍니다.<br><br></td>
				</tr>
				<tr>
					<td width="100%" align=center><a href="javascript:CheckForm();"><img src="images/btn_member_list_pass.gif" width="148" height="19" border="0" vspace="6"></a></td>
				</tr>
			</table>
		</TD>
	</tr>
	<TR>
		<TD height="20"><hr align="center" size="1" color="#EBEBEB"></TD>
	</TR>
	<TR>
		<TD align=center><a href="javascript:window.close()"><img src="images/btn_close.gif" width="36" height="18" border="0" vspace="0" border=0 hspace="2"></a></TD>
	</TR>
	<form name=form1 method=post action="<?=$_SERVER[PHP_SELF]?>" target="HiddenFrame">
	<input type=hidden name=mode>
	<input type=hidden name=id value="<?=$id?>">
	</form>
</TABLE>
<IFRAME name="HiddenFrame" width=0 height=0 frameborder=0 scrolling="no" marginheight="0" marginwidth="0"></IFRAME>
</body>
</html>