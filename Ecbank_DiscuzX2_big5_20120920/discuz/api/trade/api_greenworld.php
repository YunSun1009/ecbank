<?php
define('IN_DISCUZ', true);
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$q = strrpos($_SERVER['REQUEST_URI'],'?');
$cur_url = substr($_SERVER['REQUEST_URI'],0,$q-8);
$query = DB::query("SELECT pluginid,available FROM ".DB::table('common_plugin')." WHERE identifier = 'greenworld' ");
while($setting = DB::fetch($query)) {
	$available = $setting['available'];
	$pluginid = $setting['pluginid'];
}
$vars = array();
$query = DB::query("SELECT * FROM ".DB::table('common_pluginvar')." WHERE pluginid=$pluginid ");
while($plugin = DB::fetch($query)) {
	$vars[$plugin['variable']] = $plugin['value'];
}
$mid = $vars['ecbank_id'];
$pkey = $vars['ecbank_pkey'];
$pid = $vars['ecpay_id'];
$pchk = $vars['ecpay_chk'];
$pid2 = $vars['ecpay_id2'];
$pchk2 = $vars['ecpay_chk2'];
$num3 = $vars['ecpay_3num'];
$num6 = $vars['ecpay_6num'];
$num12 = $vars['ecpay_12num'];
$imer_id = $vars['imer_id'];
$i_invoice = $vars['i_invoice']; //�q�l�o�� 
$discuz_uid = $_G['uid'];
$discuz_user = $_G['username'];
$email = $_G['member']['email'];
$ip = $_G['clientip'];
$order_id = $discuz_uid."_".time();
$prd_desc = $_G['setting']['bbname'];
//$param_str = "?uid=".$discuz_uid."&buyer=".$discuz_user."&price=".$price."&amount=".$amount."&orderid=".$order_id."&submitdate=".time()."&email=".$email."&ip=".$ip;
$param_str = "?uid=".$discuz_uid."&buyer=".$discuz_user."&price=".$price."&amount=".$amount."&orderid=".$order_id."&submitdate=".time()."&ip=".$ip."&email=".$email;
$ecbank_reply = "http://".$_SERVER['HTTP_HOST'].$cur_url."api/trade/ecbank_reply.php".$param_str;
$ecpay_reply = "http://".$_SERVER['HTTP_HOST'].$cur_url."api/trade/ecpay_reply.php".$param_str;
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<style>
	body {
		font-size: 16px;
		color: green;
	}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <HEAD>
  <TITLE> ��ɪ��y </TITLE>
  <META NAME="Generator" CONTENT="greenworld Inc.">
  <META NAME="Author" CONTENT="greenworld Inc. kenny">
  <META NAME="Keywords" CONTENT="greenworld Inc.">
  <META NAME="Description" CONTENT="greenworld Inc.">
 </HEAD>
 <BODY>
	<div id="header">
		<div class="wrap s_clear">
			<h2><center><a href="http://www.ecbank.com.tw/"><img src="static/image/common/greenworld_banner.png" alt="���ECBANK" border="0" /></a></center></h2>
			</div>
	</div>
	<CENTER>
	<div id="radio_options" style="background-color:white;width:500px;">
<?php
if(1 == $available){
	$options = explode(",",$vars['ec_option']);
	if(count($options) == 13){
		$total = 0;
?>
		�z�o���Ҥ�I�����B�O�GNT$ <?php echo $price ?><BR>
		<span id="ecpay_total"></span>
		<div>
			<span id="radio">
				<table>
				<tr>
					<td>
						�п�ܱz��ú�ڤ覡�G
					</td>
				</tr>
				<tr>
					<td align="left" style="font-size: 16px;">
						<?php if($options[0] == 1){ echo '<input type="radio" name="g" value="1" checked onchange="green_change(this);"/>�����b��ú��<BR>';} ?>
						<?php if($options[1] == 1){ echo '<input type="radio" name="g" value="2" onchange="green_change(this);"/>webATMú��<BR>';} ?>
						<?php if($options[2] == 1){ echo '<input type="radio" name="g" value="3" onchange="green_change(this);"/>�W�ӱ��Xú��<BR>';} ?>
						<?php if($options[3] == 1){ echo '<input type="radio" name="g" value="4" onchange="green_change(this);"/>�W�ӥN�Xú��(���a�B�ܺ��I�BOK)<BR>';} ?>
						<?php if($options[4] == 1){ echo '<input type="radio" name="g" value="5" onchange="green_change(this);"/>�W��ibonú��(�Τ@�W�� 7-11)<BR>';} ?>
						<?php if($options[5] == 1){ echo '<input type="radio" name="g" value="6" onchange="green_change(this);"/>PayPal&nbsp;&nbsp;ú��<BR>';} ?>
						<?php if($options[6] == 1){ echo '<input type="radio" name="g" value="7" onchange="green_change(this);"/>ECPay�u�W��dú��<BR>';} ?>
						<?php if($options[7] == 1){ echo '<input type="radio" name="g" value="8" onchange="green_change(this);"/>ECPay�u�W��d3��ú��<BR>';} ?>
						<?php if($options[8] == 1){ echo '<input type="radio" name="g" value="9" onchange="green_change(this);"/>ECPay�u�W��d6��ú��<BR>';} ?>
						<?php if($options[9] == 1){ echo '<input type="radio" name="g" value="10" onchange="green_change(this);"/>ECPay�u�W��d12��ú��<BR>';} ?>
                                                <?php if($options[10] == 1){ echo '<input type="radio" name="g" value="11" onchange="green_change(this);"/>��I�_Alipayú��<BR>';} ?>
                                                <?php if($options[11] == 1){ echo '<input type="radio" name="g" value="12" onchange="green_change(this);"/>�ڥI�_Allpayú��<BR>';} ?>
                                                <?php if($options[12] == 1){ echo '<input type="radio" name="g" value="13" onchange="green_change(this);"/>���p�dunionpayú��<BR>';} ?>
					</td>
				</tr>
				</table>
			</span>
		</div>
		<BR>
		<div id="vacc">
			<form id="vacc_form" name="vacc_form" method="post" action="api/trade/ecbank_vacc.php" target="show_div">
				<input type='hidden' name='mer_id' value='<?php echo $mid?>'>
				<input type='hidden' name='payment_type' value='vacc'>
				<input type='hidden' name='setbank' value='ESUN'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='price' value='<?php echo $price?>'>
				<input type='hidden' name='ok_url' value='<?php echo $ecbank_reply?>'>
				<input type='hidden' name='enc_key' value='<?php echo $pkey ?>'>
				<input type='hidden' name='expire_day' value='3'>
                                <input type='hidden' name='i_invoice' value='<?php echo $i_invoice ?>'>
                                <input type='hidden' name='imer_id' value='<?php echo $imer_id ?>'>
				<span>��� ECBank �����b��ú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('vacc');">
			</form>
		</div>
		<div id="webatm" style="display:none">
			<form id="webatm_form" name="webatm_form" method="post" action="api/trade/ecbank_realtime.php">
				<input type='hidden' name='mer_id' value='<?php echo $mid?>'>
				<input type='hidden' name='payment_type' value='web_atm'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='amt' value='<?php echo $price?>'>
				<input type='hidden' name='return_url' value='<?php echo $ecbank_reply?>'>
                                <input type='hidden' name='i_invoice' value='<?php echo $i_invoice ?>'>
                                <input type='hidden' name='imer_id' value='<?php echo $imer_id ?>'>
				<span>��� ECBank WebATM �u�Wú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('webatm');">
			</form>
		</div>
		<div id="barcode" style="display:none">
			<form id="barcode_form" name="barcode_form" method="post" action="api/trade/ecbank_barcode.php" target="show_div">
				<input type='hidden' name='mer_id' value='<?php echo $mid?>'>
				<input type='hidden' name='payment_type' value='barcode'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='price' value='<?php echo $price?>'>
				<input type='hidden' name='ok_url' value='<?php echo $ecbank_reply?>'>
				<input type='hidden' name='expire_day' value='3'>
				<input type='hidden' name='enc_key' value='<?php echo $pkey ?>'>
                                <input type='hidden' name='i_invoice' value='<?php echo $i_invoice ?>'>
                                <input type='hidden' name='imer_id' value='<?php echo $imer_id ?>'>
				<span>��� ECBank �W�ӱ��Xú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('barcode');">
			</form>
		</div>
		<div id="cvs" style="display:none">
			<form id="cvs_form" name="cvs_form" method="post" action="api/trade/ecbank_cvs.php" target="show_div">
				<input type='hidden' name='mer_id' value='<?php echo $mid?>'>
				<input type='hidden' name='payment_type' value='cvs'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='price' value='<?php echo $price?>'>
				<input type='hidden' name='ok_url' value='<?php echo $ecbank_reply?>'>
				<input type='hidden' name='enc_key' value='<?php echo $pkey ?>'>
				<input type='hidden' name='prd_desc' value='<?php echo $prd_desc?>'>
                                <input type='hidden' name='i_invoice' value='<?php echo $i_invoice ?>'>
                                <input type='hidden' name='imer_id' value='<?php echo $imer_id ?>'>
				<span>��� ECBank �W�ӥN�Xú��(���a family�B�ܺ��I hilife�BOK OKGO)</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('cvs');">
			</form>
		</div>
		<div id="ibon" style="display:none">
			<form id="ibon_form" name="ibon_form" method="post" action="api/trade/ecbank_ibon.php" target="show_div">
				<input type='hidden' name='mer_id' value='<?php echo $mid?>'>
				<input type='hidden' name='payment_type' value='ibon'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='price' value='<?php echo $price?>'>
				<input type='hidden' name='ok_url' value='<?php echo $ecbank_reply?>'>
				<input type='hidden' name='enc_key' value='<?php echo $pkey ?>'>
				<input type='hidden' name='prd_desc' value='<?php echo $prd_desc?>'>
                                <input type='hidden' name='i_invoice' value='<?php echo $i_invoice ?>'>
                                <input type='hidden' name='imer_id' value='<?php echo $imer_id ?>'>
				<span>��� ECBank �W�ӥN�Xú��(7-11 ibon)</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('ibon');">
			</form>
		</div>
		<div id="paypal" style="display:none">
			<form id="paypal_form" name="paypal_form" method="post" action="api/trade/ecbank_realtime.php">
				<input type='hidden' name='mer_id' value='<?php echo $mid?>'>
				<input type='hidden' name='payment_type' value='paypal'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='amt' value='<?php echo $price?>'>
				<input type='hidden' name='return_url' value='<?php echo $ecbank_reply?>'>
				<input type='hidden' name='enc_key' value='<?php echo $pkey ?>'>
				<input type='hidden' name='item_name' value='<?php echo $prd_desc?>'>
				<input type='hidden' name='cur_type' value='TWD'>
				<input type='hidden' name='cancel_url' value='http://<?php echo $_SERVER['HTTP_HOST'].$cur_url?>'>
                                <input type='hidden' name='i_invoice' value='<?php echo $i_invoice ?>'>
                                <input type='hidden' name='imer_id' value='<?php echo $imer_id ?>'>
				<span>��� ECBank PayPal�u�Wú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('paypal');">
			</form>
		</div>
		<div id="ecpay_0" style="display:none">
			<form id="ecpay_0_form" name="ecpay_0_form" method="post" action="https://ecpay.com.tw/form_Sc_to5.php" target="show_div">
				<input type='hidden' name='client' value='<?php echo $pid?>'>
				<input type='hidden' name='act' value='auth'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='amount' value='<?php echo $price?>'>
				<input type='hidden' name='roturl' value='<?php echo $ecpay_reply?>'>
                                <?php if($i_invoice == 'yes'){ ?>
                                    <input type='hidden' name='inv_active' value='1'>
                                    <input type='hidden' name='inv_mer_id' value='<?php echo $imer_id?>'>
                                    <input type='hidden' name='inv_amt' value='<?php echo $price?>'>
                                    <input type='hidden' name='inv_semail' value='<?php echo $email?>'>
                                    <input type='hidden' name='prd_name[]' value='������B'>
                                    <input type='hidden' name='prd_qry[]' value='1'>
                                    <input type='hidden' name='prd_price[]' value='<?php echo $price?>'>
                                <?php  }?>
				<span>��� ECPay�H�Υd�u�Wú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('ecpay_0');">
			</form>
		</div>
		<div id="ecpay_3" style="display:none">
			<form id="ecpay_3_form" name="ecpay_3_form" method="post" action="https://ecpay.com.tw/form_Sc_to5_fn.php" target="show_div">
				<input type='hidden' name='client' value='<?php echo $pid2?>'>
				<input type='hidden' name='act' value='auth'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='amount' value='<?php echo $total?>' class="amount">
				<input type='hidden' name='stage' value='3'>
				<input type='hidden' name='roturl' value='<?php echo $ecpay_reply?>'>
                                <?php if($i_invoice == 'yes'){ ?>
                                    <input type='hidden' name='inv_active' value='1'>
                                    <input type='hidden' name='inv_mer_id' value='<?php echo $imer_id?>'>
                                    <input type='hidden' name='inv_amt' value='<?php echo $price?>'>
                                    <input type='hidden' name='inv_semail' value='<?php echo $email?>'>
                                    <input type='hidden' name='prd_name[]' value='������B'>
                                    <input type='hidden' name='prd_qry[]' value='1'>
                                    <input type='hidden' name='prd_price[]' value='<?php echo $price?>'>
                                <?php  }?>
				<span>��� ECPay�H�Υd��3���u�Wú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('ecpay_3');">
			</form>
		</div>
		<div id="ecpay_6" style="display:none">
			<form id="ecpay_6_form" name="ecpay_6_form" method="post" action="https://ecpay.com.tw/form_Sc_to5_fn.php" target="show_div">
				<input type='hidden' name='client' value='<?php echo $pid2?>'>
				<input type='hidden' name='act' value='auth'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='amount' value='<?php echo $total?>' class="amount">
				<input type='hidden' name='stage' value='6'>
				<input type='hidden' name='roturl' value='<?php echo $ecpay_reply?>'>
                                <?php if($i_invoice == 'yes'){ ?>
                                    <input type='hidden' name='inv_active' value='1'>
                                    <input type='hidden' name='inv_mer_id' value='<?php echo $imer_id?>'>
                                    <input type='hidden' name='inv_amt' value='<?php echo $price?>'>
                                    <input type='hidden' name='inv_semail' value='<?php echo $email?>'>
                                    <input type='hidden' name='prd_name[]' value='������B'>
                                    <input type='hidden' name='prd_qry[]' value='1'>
                                    <input type='hidden' name='prd_price[]' value='<?php echo $price?>'>
                                <?php  }?>
				<span>��� ECPay�H�Υd��6���u�Wú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options(ecpay_6);">
			</form>
		</div>
		<div id="ecpay_12" style="display:none">
			<form id="ecpay_12_form" name="ecpay_12_form" method="post" action="https://ecpay.com.tw/form_Sc_to5_fn.php" target="show_div">
				<input type='hidden' name='client' value='<?php echo $pid2?>'>
				<input type='hidden' name='act' value='auth'>
				<input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
				<input type='hidden' name='amount' value='<?php echo $total?>' class="amount">
				<input type='hidden' name='stage' value='12'>
				<input type='hidden' name='roturl' value='<?php echo $ecpay_reply?>'>
                                <?php if($i_invoice == 'yes'){ ?>
                                    <input type='hidden' name='inv_active' value='1'>
                                    <input type='hidden' name='inv_mer_id' value='<?php echo $imer_id?>'>
                                    <input type='hidden' name='inv_amt' value='<?php echo $price?>'>
                                    <input type='hidden' name='inv_semail' value='<?php echo $email?>'>
                                    <input type='hidden' name='prd_name[]' value='������B'>
                                    <input type='hidden' name='prd_qry[]' value='1'>
                                    <input type='hidden' name='prd_price[]' value='<?php echo $price?>'>
                                <?php  }?>
				<span>��� ECPay�H�Υd��12���u�Wú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_all('ecpay_12');">
			</form>
		</div>
		<div id="alipay" style="display:none">
			<form id="alipay_form" name="alipay_form" method="post" action="api/trade/ecbank_alipay.php" target="show_div">
				<input type='hidden' name='mer_id' value='<?php echo $mid?>'>
                                <input type='hidden' name='payment_type' value='alipay'>
                                <input type='hidden' name='enc_key' value='<?php echo $pkey ?>'>
                                <input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
                                <input type='hidden' name='amt' value='<?php echo $price?>'>
                                <input type='hidden' name='ok_url' value='<?php echo $ecbank_reply?>'>
                                <input type='hidden' name='i_invoice' value='<?php echo $i_invoice ?>'>
                                <input type='hidden' name='imer_id' value='<?php echo $imer_id ?>'>
				<span>��� ECBank ��I�_ú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('alipay');">
			</form>
		</div>
		<div id="allpay" style="display:none">
			<form id="allpay_form" name="allpay_form" method="post" action="https://credit.allpay.com.tw/form_Sc_to5.php" target="show_div">
				<input type='hidden' name='client' value='<?php echo $pid?>'>
                                <input type='hidden' name='act' value='auth'>
                                <input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
                                <input type='hidden' name='email' value='<?php echo $email?>'>
                                <input type='hidden' name='amount' value='<?php echo $price?>'>
                                <input type='hidden' name='roturl' value='<?php echo $ecpay_reply?>'>
                                <?php if($i_invoice == 'yes'){ ?>
                                    <input type='hidden' name='inv_active' value='1'>
                                    <input type='hidden' name='inv_mer_id' value='<?php echo $imer_id?>'>
                                    <input type='hidden' name='inv_amt' value='<?php echo $price?>'>
                                    <input type='hidden' name='inv_semail' value='<?php echo $email?>'>
                                    <input type='hidden' name='prd_name[]' value='������B'>
                                    <input type='hidden' name='prd_qry[]' value='1'>
                                    <input type='hidden' name='prd_price[]' value='<?php echo $price?>'>
                                <?php  }?>
				<span>��� ECPay �ڥI�_ú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('allpay');">
			</form>
		</div>
		<div id="unionpay" style="display:none">
			<form id="unionpay_form" name="unionpay_form" method="post" action="https://ecpay.com.tw/form_Sc_to5.php">
				<input type='hidden' name='client' value='<?php echo $pid?>'>
                                <input type='hidden' name='act' value='auth'>
                                <input type='hidden' name='od_sob' value='<?php echo $order_id?>'>
                                <input type='hidden' name='email' value='<?php echo $email?>'>
                                <input type='hidden' name='amount' value='<?php echo $price?>'>
                                <input type='hidden' name='roturl' value='<?php echo $ecpay_reply?>'>
                                <input type='hidden' name='bk_posturl' value='<?php echo $ecpay_reply?>'>
                                <input type='hidden' name='mallurl' value='<?php echo $ecpay_reply?>'>
                                <?php if($i_invoice == 'yes'){ ?>
                                    <input type='hidden' name='inv_active' value='1'>
                                    <input type='hidden' name='inv_mer_id' value='<?php echo $imer_id?>'>
                                    <input type='hidden' name='inv_amt' value='<?php echo $price?>'>
                                    <input type='hidden' name='inv_semail' value='<?php echo $email?>'>
                                    <input type='hidden' name='prd_name[]' value='������B'>
                                    <input type='hidden' name='prd_qry[]' value='1'>
                                    <input type='hidden' name='prd_price[]' value='<?php echo $price?>'>
                                <?php  }?>
				<span>��� ECPay unionpay���p�d ú��</span>�@<input type='button' value='�ڽT�w�nú��' onclick="hide_options('unionpay');">
			</form>
		</div>                   
                
	</div>
	<div id="index" style="background-color:white;width:500px;">
		<a href="index.php">�^����</a>�@�@<img src="static/image/common/greenworld_logo.jpg" alt="��ɪ��y" border="0" />
	</div>
	</CENTER>
	<iframe id="show_div" name="show_div" width="100%" height="100%" scrolling="yes" frameborder="no"></iframe>
</BODY>
</HTML>
<SCRIPT type="text/javascript">
	google.load('ext-core', '3.1');
	green_change(Ext.get('radio').select('input:nth-child(1)', true).elements[0]);
	function green_change(t){
		hide_all();
		if(Ext.fly('err-div')){
			Ext.fly('err-div').remove();
		}
		var amt = <?php echo $price ?>,
			dom;
		switch(t.value){
			case "1":
				Ext.getDom('vacc').style.display = "inline";
				if(amt < 10 || amt > 2000000){
					Ext.getDom('vacc').style.display = "none";
					err('vacc','�̤p���B�� 10���A�̤j���B�̵o�d�Ȧ�өw�A������W�L 2,000,000��');
				}
				break;
			case "2":
				Ext.getDom('webatm').style.display = "inline";
				if(amt < 10 || amt > 2000000){
					Ext.getDom('webatm').style.display = "none";
					err('webatm','�C������̤p���B�� 10���A�̤j���B 2,000,000��');
				}
				break;
			case "3":
				Ext.getDom('barcode').style.display = "inline";
				if(amt < 10 || amt > 2000000){
					Ext.getDom('barcode').style.display = "none";
					err('barcode','�̤p���B�� 10���A�̤j���B�̵o�d�Ȧ�өw�A������W�L 2,000,000��');
				}
				break;
			case "4":
				Ext.getDom('cvs').style.display = "inline";
				if(amt < 30 || amt > 20000){
					Ext.getDom('cvs').style.display = "none";
					err('cvs','�̤p���B�� 30���Aú�O�W���� 20,000��');
				}
				break;
			case "5":
				Ext.getDom('ibon').style.display = "inline";
				if(amt < 30 || amt > 20000){
					Ext.getDom('ibon').style.display = "none";
					err('ibon','�̤p���B�� 30���Aú�O�W���� 20,000��');
				}
				break;
			case "6":
				Ext.getDom('paypal').style.display = "inline";
				if(amt < 1 || amt > 200000){
					Ext.getDom('paypal').style.display = "none";
					err('paypal','�̤p���B�� 1���Aú�O�W���� 200,000��');
				}
				break;
			case "7":
				Ext.getDom('ecpay_0').style.display = "inline";
				if(amt < 1 || amt > 200000){
					Ext.getDom('ecpay_0').style.display = "none";
					err('ecpay_0','�̤p���B�� 1���Aú�O�W���� 200,000��');
				}
				break;
			case "8":
				Ext.getDom('ecpay_3').style.display = "inline";
				if(amt < 1 || amt > 200000){
					Ext.getDom('ecpay_3').style.display = "none";
					err('ecpay_3','�̤p���B�� 1���Aú�O�W���� 200,000��');
					return;
				}
				<?php $total = round($price*(1+$num3)); ?>
				Ext.fly('ecpay_total').update("�z�������Q�v��<?php echo ($num3*100).'% �@�n��INT$ '.$total.'��'?><br>");
				Ext.fly('ecpay_3_form').select('input.amount').elements[0].value = <?php echo $total ?>;
				break;
			case "9":
				Ext.getDom('ecpay_6').style.display = "inline";
				if(amt < 1 || amt > 200000){
					Ext.getDom('ecpay_6').style.display = "none";
					err('ecpay_6','�̤p���B�� 1���Aú�O�W���� 200,000��');
					return;
				}
				<?php $total = round($price*(1+$num6)); ?>
				Ext.fly('ecpay_total').update("�z�������Q�v��<?php echo ($num6*100).'% �@�n��INT$ '.$total.'��'?><br>");
				Ext.fly('ecpay_6_form').select('input.amount').elements[0].value = <?php echo $total ?>;
				break;
			case "10":
				Ext.getDom('ecpay_12').style.display = "inline";
				if(amt < 1 || amt > 200000){
					Ext.getDom('ecpay_12').style.display = "none";
					err('ecpay_12','�̤p���B�� 1���Aú�O�W���� 200,000��');
					return;
				}
				<?php $total = round($price*(1+$num12)); ?>
				Ext.fly('ecpay_total').update("�z�������Q�v��<?php echo ($num12*100).'% �@�n��INT$ '.$total.'��'?><br>");
				Ext.fly('ecpay_12_form').select('input.amount').elements[0].value = <?php echo $total ?>;
				break;
			case "11":
				Ext.getDom('alipay').style.display = "inline";
				if(amt < 1 || amt > 200000){
					Ext.getDom('alipay').style.display = "none";
					err('alipay','�̤p���B�� 1���Aú�O�W���� 200,000��');
					return;
				}
				break;          
			case "12":
				Ext.getDom('allpay').style.display = "inline";
				if(amt < 1 || amt > 200000){
					Ext.getDom('allpay').style.display = "none";
					err('alipay','�̤p���B�� 1���Aú�O�W���� 200,000��');
					return;
				}
				break;       
			case "13":
				Ext.getDom('unionpay').style.display = "inline";
				if(amt < 1 || amt > 200000){
					Ext.getDom('unionpay').style.display = "none";
					err('alipay','�̤p���B�� 1���Aú�O�W���� 200,000��');
					return;
				}
				break;                                  
			default:
				break;
		}
	}
	function err(div,msg){
		Ext.DomHelper.append(Ext.fly('radio'), {
			id: 'err-div',
			cn: [{
				tag: 'span',
				style : 'background-color: white;color: red;',
				html: msg+"<br>�Ц^�W�@�����"
			}]
		});
	}
	function hide_all(){
		Ext.getDom('vacc').style.display = "none";
		Ext.getDom('webatm').style.display = "none";
		Ext.getDom('barcode').style.display = "none";
		Ext.getDom('cvs').style.display = "none";
		Ext.getDom('ibon').style.display = "none";
		Ext.getDom('paypal').style.display = "none";
		Ext.getDom('ecpay_0').style.display = "none";
		Ext.getDom('ecpay_3').style.display = "none";
		Ext.getDom('ecpay_6').style.display = "none";
		Ext.getDom('ecpay_12').style.display = "none";
                Ext.getDom('alipay').style.display = "none";
                Ext.getDom('allpay').style.display = "none";
                Ext.getDom('unionpay').style.display = "none";
		Ext.get('ecpay_total').update('');
	}
	function hide_options(f){
		var msg = "�ܩ�p�A�޲z�̳]�w�����󦳻~�A�й����p���޲z��-1-!!";
		switch (f){
		case 'vacc':
		case 'webatm':
		case 'barcode':
		case 'cvs':
		case 'ibon':
		case 'paypal':
                case 'alipay':    
<?php if($mid == "" && $pkey == ""){ ?>
			alert(msg);
			Ext.fly('radio_options').remove();
			return;
<?php } ?>
			break;
		case 'ecpay_0':
<?php if($pid == "" && $pchk == ""){ ?>
			alert(msg);
			Ext.fly('radio_options').remove();
			return;
<?php } ?>
			break;
		case 'ecpay_3':
		case 'ecpay_6':
		case 'ecpay_12':
<?php if($pid2 == "" && $pchk2 == ""){ ?>
			alert(msg);
			Ext.fly('radio_options').remove();
			return;
<?php } ?>
			break;
		default:
			break;
		}
		Ext.getDom(f+"_form").submit();
		Ext.fly('radio_options').remove();
	}


</SCRIPT>
<?php
	}else{
		echo "<div style='background-color:white;'>�ܩ�p�A�޲z�̳]�w�����󦳻~�A�й����p���޲z��-2-!!</div>";
	}
}else{
	echo "<div style='background-color:white;'>�ܩ�p�A�޲z�̩|���Ұʦ�����A�й����p���޲z��-3-!!</div>";
}
?>