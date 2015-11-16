<?
$Dir="../";
include_once($Dir."lib/init.php");
include_once($Dir."lib/lib.php");
include_once($Dir."lib/shopdata.php");
include_once($Dir."lib/cfg.php");

$ordercode=$_POST["ordercode"];
$member=$_POST["member"];
$popup=$_POST["popup"];
if($member =="guest"){
	$memid = $ordercode;
}else{
	if(strlen($_ShopInfo->getMemid())==0) {
		echo "<html><head><title></title></head><body onload=\"alert('ȸ�� ���̵� �������� �ʽ��ϴ�.');\"></body></html>";exit;
		exit;
	}
	$memid = $_ShopInfo->getMemid();
}

$SBinfo = new Shop_Billinfo();
$SBinfo->baseinfo($memid);

//  hiworks bill ��ü ����
$HB = new Hiworks_Bill( $SBinfo->domain, $SBinfo->license_id, $SBinfo->license_no, $SBinfo->partner_id );

//  Type �Է�
$HB->set_type( HB_DOCUMENTTYPE_TAX , HB_TAXTYPE_TAX, HB_SENDTYPE_SEND );

//  ���� ����� ���� �⺻���� �Է� $name, $email, $hp='', $memo='', $book_no='', $serial=''
//book_no :
$book_no = $SBinfo->get_serial($ordercode);
$HB->set_basic_info( $SBinfo->c_name, $SBinfo->c_email, $SBinfo->c_cell, '', $book_no, '' );

//  ������ ������ ���޹޴��� ����
$HB->set_company_info( $SBinfo->s_number, $SBinfo->s_name, $SBinfo->s_master, $SBinfo->s_address, $SBinfo->s_condition, $SBinfo->s_item, HB_COMPANYPREFIX_SUPPLIER );
$HB->set_company_info( $SBinfo->r_number, $SBinfo->r_name, $SBinfo->r_master, $SBinfo->r_address, $SBinfo->r_condition, $SBinfo->r_item, HB_COMPANYPREFIX_CONSUMER );

//�⺻��������
$SBinfo->set_taxrate(TAXRATE);
$SBinfo->order_info($ordercode);

//������ - �ֹ���
$bill_date = substr($ordercode, 0, 4)."-".substr($ordercode, 4, 2)."-".substr($ordercode, 6, 2);
$bill_mm= substr($ordercode, 4, 2);
$bill_dd= substr($ordercode, 6, 2);

$HB->set_document_info($bill_date, $SBinfo->supplyprice, $SBinfo->tax, HB_PTYPE_RECEIPT, '', '', '', '', '');

//  ��������Է�
for($i =0; $i<sizeof($SBinfo->productname);$i++){
	//echo $bill_mm."===".$bill_dd."===".$SBinfo->productname[$i]."===".$SBinfo->quantity[$i]."===".$SBinfo->taxsum[$i]."===". $SBinfo->taxsumquantity[$i]."===".$SBinfo->taxsumsale[$i]."===".($SBinfo->taxsumquantity[$i]+$SBinfo->taxsumsale[$i]);
	//echo "<br>";
	$HB->set_work_info( $bill_mm, $bill_dd, $SBinfo->productname[$i], 'EA', $SBinfo->quantity[$i], $SBinfo->taxsum[$i], $SBinfo->taxsumquantity[$i], $SBinfo->taxsumsale[$i], '', $SBinfo->taxsumquantity[$i]+$SBinfo->taxsumsale[$i] );
}


$rs = $HB->send_document( HB_SOAPSERVER_URL );


if (!$rs) {
	$HB->showError();
	exit;
}

$bill_price = "�հ�:".number_format($SBinfo->supplyprice+$SBinfo->tax)."\n���ް�:".number_format($SBinfo->supplyprice)."\n�ΰ���:".number_format($SBinfo->tax);
if (!$rs) {
	$sql = "INSERT tblorderbillerror SET ";
	$sql.= "ordercode	= '".$ordercode."', ";
	$sql.= "error		= '".iconv("utf-8","euc-kr",$HB->showError2())."', ";
	$sql.= "regidate	= ".time()." ";
	mysql_query($sql,get_db_conn());
	echo "<html></head><body onload=\"alert('���ڼ��ݰ�꼭 ��û ���� �߻�.');\"></body></html>";exit;
}else{
	$sql = "INSERT tblorderbill SET ";
	$sql.= "serial		= '".$book_no."', ";
	$sql.= "memid		= '".$memid."', ";
	$sql.= "memname		= '".(strlen($_ShopInfo->getMemid() == 0)? $SBinfo->guest_name:$_ShopInfo->getMemname())."', ";
	$sql.= "ordercode	= '".$ordercode."', ";
	$sql.= "document_id	= '".$HB->get_document_id()."', ";
	$sql.= "bill_price	= '".$bill_price."', ";
	$sql.= "companyname	= '".$SBinfo->r_name."', ";
	$sql.= "companynum	= '".$SBinfo->r_number."', ";
	$sql.= "companytnum	= '".$SBinfo->r_tnumber."', ";
	$sql.= "companyowner= '".$SBinfo->r_master."', ";
	$sql.= "companyaddr	= '".$SBinfo->r_address."', ";
	$sql.= "companybiz	= '".$SBinfo->r_condition."', ";
	$sql.= "companyitem	= '".$SBinfo->r_item."', ";
	$sql.= "c_name	= '".$SBinfo->c_name."', ";
	$sql.= "c_email	= '".$SBinfo->c_email."', ";
	$sql.= "c_cell	= '".$SBinfo->c_cell."', ";
	$sql.= "regidate	= ".time()." ";
	if(mysql_query($sql,get_db_conn())){
		if($popup =="popup"){
			echo "<html></head><body onload=\"alert('���ڼ��ݰ�꼭�� ��û�Ǿ����ϴ�.');parent.opener.location.reload();\"></body></html>";exit;
		}else{
			echo "<html></head><body onload=\"alert('���ڼ��ݰ�꼭�� ��û�Ǿ����ϴ�.');parent.location.reload();\"></body></html>";exit;
		}
	}
}
unset($HB, $rs);

?>