<?php
$mer_id = $_POST['mer_id'];
$enc_key = $_POST['enc_key'];
$od_sob = $_POST['od_sob'];
$amt = $_POST['price'];
$ok_url = $_POST['ok_url'];
$payment_type = $_POST['payment_type'];
$prd_desc = $_POST['prd_desc'];
$nvpStr ='mer_id='.$mer_id.
	'&payment_type='.$payment_type.
	'&enc_key='.$enc_key.
	'&od_sob='.$od_sob.
	'&amt='.intval($amt).
	'&ok_url='.rawurlencode($ok_url).
	'&prd_desc='.$prd_desc;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://ecbank.com.tw/gateway.php');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpStr);
$strAuth = curl_exec($ch);
if (curl_errno($ch)) {
	$strAuth = false;
}
curl_close($ch);
$res_str = "<center><div style='background-color:white'>";
if($strAuth) {
	parse_str($strAuth, $res);
	if(!isset($res['error']) || $res['error'] != '0'){
		$res_str.= "<FONT COLOR='red'>�������~".$res['error'];
	}else {
	  $res_str.="<FONT COLOR='green'>[�Τ@�W��7-Eleven]�W��ú�O�N�X:(<font color=blue size=+2>".$res['payno']."</font>)<br><br>";
		$res_str.="<a href=http://www.ecbank.com.tw/expenses-ibon.htm target=_blank>�Τ@�W��7-Eleven ibon �����ާ@�B�J</a><br>";
		$res_str.="�аO�U�W�C�W��ú�O�N�X,�̪ܳ񤧲Τ@�W��7-Eleven�K�Q�ө�,�ާ@�N�Xú�O���x, ��C�L�X�����X��ú�ڳ��,���d�x��I,<br>�K�i����ú�O,ú�O�����ڽЯd�s�H�ѳƮ�,ú�O����~�⧹���ʪ��y�{";
		$res_str.="<br><br>���u�W���y����ĥ�&lt; <a href=http://www.ecbank.com.tw target=_blank>��ɬ�� ECBank �u�W��I���x</a> &gt;";
		$res_str.="<br>��� ECBank����渹:".$res['tsr'];
		include_once 'order_yes.php';
	}
} else {
	$res_str.= "<FONT COLOR='red'>��������";
}
$res_str .= "</FONT></div></center>";
echo $res_str;
?>