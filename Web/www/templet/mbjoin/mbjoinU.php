<?
if($newdesign=="Y") {
	$inputform="";
	$inputform.="<table border=0 cellpadding=0 cellspacing=0 width=100% style=\"table-layout:fixed\">\n";
	$inputform.="<tr>\n";
	$inputform.="	<td align=center style=\"padding:10\">\n";
	$inputform.="	<table border=0 cellpadding=0 cellspacing=0 width=100% style=\"table-layout:fixed\">\n";
	$inputform.="	<tr>\n";
	$inputform.="		<td align=center>\n";
	$inputform.="		<table border=0 cellpadding=0 cellspacing=0 width=100% style=\"table-layout:fixed\">\n";
	$inputform.="		<tr>\n";
	$inputform.="			<td bgcolor=#FFFFFF>\n";
	$inputform.="			<table border=0 cellpadding=3 cellspacing=1 width=100% bgcolor=#EFEFEF>\n";
	$inputform.="			<col width=150></col>\n";
	$inputform.="			<col width=></col>\n";
	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right valign=top bgcolor=#FFFFFF style=\"padding-top:5;padding-right:5\"><img width=0 height=3><br><FONT COLOR=\"red\">��</FONT>���̵�</td>\n";
	$inputform.="				<td style=\"padding-top:5;padding-left:5;color:#737373\">\n";

	$field_id="<input type=text name=id value=\"".$id."\" maxlength=12 style=\"width:120\">";
	$idcheck="javascript:idcheck();";

	$inputform.=$field_id;
	$inputform.="				<input type=button value=\"�ߺ�Ȯ��\" style=\"color:#FFFFFF;border-color:#666666;background-color:#666666;font-size:8pt;font-family:Tahoma;height:18px;\" onclick=\"".$idcheck."\">\n";

	$inputform.="				<br>(����, ���ڸ� �����Ͽ� 4~12�� �̳��� �Է��ϼ���)\n";
	$inputform.="				</td>\n";
	$inputform.="			</tr>\n";
	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right bgcolor=#FFFFFF style=\"padding-right:5\"><FONT COLOR=\"red\">��</FONT>��й�ȣ</td>\n";
	$inputform.="				<td style=\"padding-left:5\">\n";

	$field_pass1="<input type=password name=passwd1 value=\"".$passwd1."\" maxlength=20 style=\"width:120\">";
	$field_pass2="<input type=password name=passwd2 value=\"".$passwd2."\" maxlength=20 style=\"width:120\">";

	$inputform.="				".$field_pass1."<img width=10 height=0>Ȯ�� : ".$field_pass2."\n";
	$inputform.="				</td>\n";
	$inputform.="			</tr>\n";
	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right bgcolor=#FFFFFF style=\"padding-right:5\"><FONT COLOR=\"red\">��</FONT>�̸�</td>\n";

	$field_name="<input type=text name=name value=\"".$name."\" maxlength=15 style=\"width:120\">";

	$inputform.="				<td style=\"padding-left:5\">".$field_name."</td>\n";
	$inputform.="			</tr>\n";
	if ($_data->resno_type!="N"){
		$inputform.="		<tr height=25 bgcolor=#FFFFFF>\n";
		$inputform.="			<td align=right bgcolor=#FFFFFF style=\"padding-right:5\"><FONT COLOR=\"red\">��</FONT>�ֹε�Ϲ�ȣ</td>\n";

		$field_resno1="<input type=text name=resno1 value=\"".$resno1."\" maxlength=6 style=\"width:50\" onKeyUp=\"return strnumkeyup2(this);\">";
		$field_resno2="<input type=password name=resno2 value=\"".$resno2."\" maxlength=7 style=\"width:58\" onKeyUp=\"return strnumkeyup2(this);\">";

		$inputform.="			<td style=\"padding-left:5\">".$field_resno1." - ".$field_resno2."</td>\n";
		$inputform.="		</tr>\n";
	}


	if($extconf['reqgender'] == 'Y'){
		$inputform.="		<tr height=25 bgcolor=#FFFFFF>\n";
		$inputform.="			<td align=right bgcolor=#FFFFFF style=\"padding-right:5\"><FONT COLOR=\"red\">��</FONT>����</td>\n";

		$field_gender = '<INPUT type="radio" name="gender" value="1">���� / <INPUT type="radio" name="gender" value="2">����';

		$inputform.="			<td style=\"padding-left:5\">".$field_gender."</td>\n";
		$inputform.="		</tr>\n";
	}

	if($extconf['reqbirth'] == 'Y'){
		$inputform.="		<tr height=25 bgcolor=#FFFFFF>\n";
		$inputform.="			<td align=right bgcolor=#FFFFFF style=\"padding-right:5\"><FONT COLOR=\"red\">��</FONT>�������</td>\n";

		$field_birth = '<INPUT type="text" name="birth" value="" maxLength="10" style="WIDTH:50px;BACKGROUND-COLOR:#F7F7F7;" class="input"> ( ex : '.date('Y-m-d').' )';

		$inputform.="			<td style=\"padding-left:5\">".$field_birth."</td>\n";
		$inputform.="		</tr>\n";
	}


	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right bgcolor=#FFFFFF style=\"padding-right:5\"><FONT COLOR=\"red\">��</FONT>�̸���</td>\n";

	$field_email="<input type=text name=email value=\"".$email."\" maxlength=100 style=\"width:30%\"><A href=\"javascript:mailcheck();\"><img src=\"".$Dir."images/common/mbjoin/".$_data->design_mbjoin."/memberjoin_skin1_btnMail.gif\" border=\"0\" align=\"absmiddle\" hspace=\"3\" alt=\"���� �ߺ� �˻�\"></a>";

	$inputform.="				<td style=\"padding-left:5\">".$field_email."</td>\n";
	$inputform.="			</tr>\n";
	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right bgcolor=#FFFFFF style=\"padding-right:5\"><FONT COLOR=\"red\">��</FONT>�������� ���ſ���</td>\n";

	$field_newsmail="<input type=radio id=\"idx_news_mail_yn0\" name=news_mail_yn value=\"Y\" ";
	if($news_mail_yn=="Y")		$field_newsmail.="checked";
	$field_newsmail.=" style=\"border:none\"> <label style='cursor:hand;' onmouseover=\"style.textDecoration='underline'\" onmouseout=\"style.textDecoration='none'\" for=idx_news_mail_yn0>�޽��ϴ�.</label>&nbsp;";
	$field_newsmail.="<input type=radio id=\"idx_news_mail_yn1\" name=news_mail_yn value=\"N\" ";
	if($news_mail_yn=="N")		$field_newsmail.="checked";
	$field_newsmail.=" style=\"border:none\"> <label style='cursor:hand;' onmouseover=\"style.textDecoration='underline'\" onmouseout=\"style.textDecoration='none'\" for=idx_news_mail_yn1>���� �ʽ��ϴ�.</label>";

	$field_newssms="<input type=radio id=\"idx_news_sms_yn0\" name=news_sms_yn value=\"Y\" ";
	if($news_sms_yn=="Y")		$field_newssms.="checked";
	$field_newssms.=" style=\"border:none\"> <label style='cursor:hand;' onmouseover=\"style.textDecoration='underline'\" onmouseout=\"style.textDecoration='none'\" for=idx_news_sms_yn0>�޽��ϴ�.</label>&nbsp;";
	$field_newssms.="<input type=radio id=\"idx_news_sms_yn1\" name=news_sms_yn value=\"N\" ";
	if($news_sms_yn=="N")		$field_newssms.="checked";
	$field_newssms.=" style=\"border:none\"> <label style='cursor:hand;' onmouseover=\"style.textDecoration='underline'\" onmouseout=\"style.textDecoration='none'\" for=idx_news_sms_yn1>���� �ʽ��ϴ�.</label>";

	$inputform.="				<td style=\"padding-left:5\">\n";
	$inputform.=$field_newsmail;
	$inputform.="				</td>\n";
	$inputform.="			</tr>\n";
	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right bgcolor=#FFFFFF style=\"padding-right:5\"><FONT COLOR=\"red\">��</FONT>SMS���� ���ſ���</td>\n";
	$inputform.="				<td style=\"padding-left:5\">\n";
	$inputform.=$field_newssms;
	$inputform.="				</td>\n";
	$inputform.="			</tr>\n";
	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right bgcolor=#FFFFFF style=\"padding-right:5\"><FONT COLOR=\"red\">��</FONT>����ȭ</td>\n";

	$field_tel="<input type=text name=home_tel value=\"".$home_tel."\" maxlength=15 style=\"width:120\">";

	$inputform.="				<td style=\"padding-left:5\">".$field_tel."</td>\n";
	$inputform.="			</tr>\n";
	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right valign=top bgcolor=#FFFFFF style=\"padding-right:5\"><img width=0 height=3><br><FONT COLOR=\"red\">��</FONT>���ּ�</td>\n";
	$inputform.="				<td style=\"padding-left:5\">\n";

	$field_hpost1="<input type=text name=home_post1 value=\"".$home_post1."\" style=\"width:50\" readonly>";
	$field_hpost2="<input type=text name=home_post2 value=\"".$home_post2."\" style=\"width:30\" readonly>";
	$gethpost="javascript:f_addr_search('form1','home_post','home_addr1',2);";
	$field_haddr1="<input type=text name=home_addr1 value=\"".$home_addr1."\" maxlength=100 readonly style=\"width:320\">";
	$field_haddr2="<input type=text name=home_addr2 value=\"".$home_addr2."\" maxlength=100 style=\"width:320\">";

	//$inputform.="				".$field_hpost1." - ".$field_hpost2."\n";
	$inputform.="				".$field_hpost1."\n";
	$inputform.="				<input type=button value=\"������ȣ�˻�\" style=\"color:#FFFFFF;border-color:#666666;background-color:#666666;font-size:8pt;font-family:Tahoma;height:18px;width:90\" onclick=\"".$gethpost."\"><br><img width=0 height=3><br>\n";
	$inputform.="				".$field_haddr."\n";
	$inputform.="				</td>\n";
	$inputform.="			</tr>\n";
	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right bgcolor=#FFFFFF style=\"padding-right:5\">�����ȭ(�޴���)</td>\n";

	$field_mobile="<input type=text name=mobile value=\"".$mobile."\" maxlength=15 style=\"width:120\">";

	$inputform.="				<td style=\"padding-left:5\">".$field_mobile."</td>\n";
	$inputform.="			</tr>\n";
	$inputform.="			<tr height=25 bgcolor=#FFFFFF>\n";
	$inputform.="				<td align=right valign=top bgcolor=#FFFFFF style=\"padding-right:5\"><img width=0 height=3><br>ȸ���ּ�</td>\n";

	$field_opost1="<input type=text name=office_post1 value=\"".$office_post1."\" style=\"width:50\" readonly>";
	$field_opost2="<input type=text name=office_post2 value=\"".$office_post2."\" style=\"width:30\" readonly>";
	$getopost="javascript:f_addr_search('form1','office_post','office_addr1',2);";
	$field_oaddr1="<input type=text name=office_addr1 value=\"".$office_addr1."\" maxlength=100 readonly style=\"width:320\">";
	$field_oaddr2="<input type=text name=office_addr2 value=\"".$office_addr2."\" maxlength=100 style=\"width:320\">";

	$inputform.="				<td style=\"padding-left:5\">\n";
	///$inputform.="				".$field_opost1." - ".$field_opost2."\n";
	$inputform.="				".$field_opost1."\n";
	$inputform.="				<input type=button value=\"������ȣ�˻�\" style=\"color:#FFFFFF;border-color:#666666;background-color:#666666;font-size:8pt;font-family:Tahoma;height:18px;width:90\" onclick=\"".$getopost."\"><br><img width=0 height=3><br>\n";
	$inputform.="				".$field_oaddr."\n";
	$inputform.="				</td>\n";
	$inputform.="			</tr>\n";
	if($recom_ok=="Y") {
		if($recom_url_ok=="Y" && $_COOKIE['url_id'] != ""){
			if($_data->recom_addreserve >0){
				$inputform.="		<tr height=25 bgcolor=#FFFFFF>\n";
				$inputform.="			<td align=right bgcolor=#FFFFFF style=\"padding-right:5\">�߰�������</td>\n";

				$field_recid=$_COOKIE['url_name']."(".$_COOKIE['url_id'].")���� �ʴ�� <b>������ ".$_data->recom_addreserve."��</b>�� �߰������� �帳�ϴ�.<input type=hidden name=rec_id value=\"".$_COOKIE['url_id']."\">";

				$inputform.="			<td style=\"padding-left:5\">".$field_recid."</td>\n";
				$inputform.="		</tr>\n";
			}else{
				$inputform.="		<tr height=25 bgcolor=#FFFFFF>\n";
				$inputform.="			<td align=right bgcolor=#FFFFFF style=\"padding-right:5\">��õ�� ID</td>\n";

				$field_recid=$_COOKIE['url_name']."(".$_COOKIE['url_id'].")���� �ʴ븦 �޾ҽ��ϴ�.<input type=hidden name=rec_id value=\"".$_COOKIE['url_id']."\">";

				$inputform.="			<td style=\"padding-left:5\">".$field_recid."</td>\n";
				$inputform.="		</tr>\n";
			}
		}else{
				$inputform.="		<tr height=25 bgcolor=#FFFFFF>\n";
				$inputform.="			<td align=right bgcolor=#FFFFFF style=\"padding-right:5\">��õ�� ID</td>\n";

				$field_recid="<input type=text name=rec_id value=\"".$rec_id."\" maxlength=12 style=\"width:120\">";

				$inputform.="			<td style=\"padding-left:5\">".$field_recid."</td>\n";
				$inputform.="		</tr>\n";
		}
	}
	if(strlen($straddform)>0) {
		$inputform.=$straddform;
	}
	$inputform.="			</table>\n";
	$inputform.="			</td>\n";
	$inputform.="		</tr>\n";
	$inputform.="		</table>\n";
	$inputform.="		</td>\n";
	$inputform.="	</tr>\n";
	$inputform.="	</table>\n";
	$inputform.="	<table border=0 cellpadding=0 cellspacing=0 width=100%>\n";
	$inputform.="	<tr><td height=3></td></tr>\n";
	$inputform.="	<tr>\n";
	$inputform.="		<td style=\"color:red\">���⺻������� �Է��ϸ� ��ǰ���Ž� �ڵ����� �Էµ˴ϴ�.</td>\n";
	$inputform.="	</tr>\n";
	$inputform.="	</table>\n";
	$inputform.="	</td>\n";
	$inputform.="</tr>\n";
	$inputform.="</table>\n";

	$ok="javascript:CheckForm();";
	$cancel="javascript:history.go(-1);";
	$pattern=array("(\[INPUTFORM\])","(\[OK\])","(\[CANCEL\])","(\[ID\])","(\[IDCHECK\])","(\[PASS1\])","(\[PASS2\])","(\[NAME\])","(\[RESNO1\])","(\[RESNO2\])","(\[EMAIL\])","(\[NEWSMAIL\])","(\[NEWSSMS\])","(\[TEL\])","(\[HPOST1\])","(\[HPOST2\])","(\[GETHPOST\])","(\[HADDR1\])","(\[HADDR2\])","(\[MOBILE\])","(\[OPOST1\])","(\[OPOST2\])","(\[GETOPOST\])","(\[OADDR1\])","(\[OADDR2\])","(\[RECID\])","(\[ETC\])","(\[GENDER\])","(\[BIRTH\])","(\[ETCFIELD1\])","(\[ETCFIELD2\])","(\[ETCFIELD3\])","(\[ETCFIELD4\])","(\[ETCFIELD5\])","(\[ETCFIELD6\])","(\[ETCFIELD7\])","(\[ETCFIELD8\])","(\[ETCFIELD9\])","(\[ETCFIELD10\])");
	$replace=array($inputform,$ok,$cancel,$field_id,$idcheck,$field_pass1,$field_pass2,$field_name,$field_resno1,$field_resno2,$field_email,$field_newsmail,$field_newssms,$field_tel,$field_hpost1,$field_hpost2,$gethpost,$field_haddr1,$field_haddr2,$field_mobile,$field_opost1,$field_opost2,$getopost,$field_oaddr1,$field_oaddr2,$field_recid,$stretc,$field_gender,$field_birth,$etcfield[0],$etcfield[1],$etcfield[2],$etcfield[3],$etcfield[4],$etcfield[5],$etcfield[6],$etcfield[7],$etcfield[8],$etcfield[9]);
	$body=preg_replace($pattern,$replace,$body);
	echo $body;
}
?>