<?php
/*

   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(german.php,v 1.119 2003/05/19); www.oscommerce.com 
   (c) 2003	 nextcommerce (german.php,v 1.25 2003/08/25); www.nextcommerce.org
   (c) 2003	 xtcommerce  www.xt-commerce.com   
   Released under the GNU General Public License 
*/

  define('MODULE_PAYMENT_ECPAY12B_TEXT_TITLE', '綠界科技 線上刷卡機制<br>[聯信 12 期分期付款]');
  define('MODULE_PAYMENT_ECPAY12B_TEXT_DESCRIPTION', '綠界科技 線上刷卡機制<br><a href=http://www.ecpay.com.tw target=_blank>http://www.ecpay.com.tw</a>');
  define('MODULE_PAYMENT_ECPAY12B_STATUS_TITLE','綠界科技 線上刷卡模組啟動');
  define('MODULE_PAYMENT_ECPAY12B_STATUS_DESC','綠界科技 線上刷卡機制是否啟動?');

  define('MODULE_PAYMENT_ECPAY12B_ZONE_TITLE','綠界科技 付款結帳地區設定');
  define('MODULE_PAYMENT_ECPAY12B_ZONE_DESC','如果設定地區，則只有該地區的使用者能使用 綠界科技 付款模組.');

  define('MODULE_PAYMENT_ECPAY12B_SORT_ORDER_TITLE','綠界GWPAY 顯示順序');
  define('MODULE_PAYMENT_ECPAY12B_SORT_ORDER_DESC','顯示順序，數字越小順序在前');

  define('MODULE_PAYMENT_ECPAY12B_ORDER_STATUS_ID_TITLE','付款結帳完成時預設訂單狀態');
  define('MODULE_PAYMENT_ECPAY12B_ORDER_STATUS_ID_DESC','使用 綠界GWPAY 付款結帳完成時,TWE 內訂單的預設狀態');
  define('MODULE_PAYMENT_ECPAY12B_MID_TITLE','綠界科技 商家編號');
  define('MODULE_PAYMENT_ECPAY12B_MID_DESC','設定 綠界科技 商店編號,<br>如果還沒申請請電 02-89763899 分機:388李小姐<a target=_blank href=http://www.ecpay.com.tw>http://www.ecpay.com.tw</a>');
  define('MODULE_PAYMENT_ECPAY12B_RETUREURL_TITLE',"設定授權結果回傳網址");
  define('MODULE_PAYMENT_ECPAY12B_TEXT_CONFIRMATION','本網站採用(<a href="http://www.ecpay.com.tw" target="_BLANK"><font color=green>綠界科技</font> 綠界科技 線上金流付款機制</a>)</font>。在您按下"確認訂單"鈕後,網頁將導向本公司專屬的 SSL 加密網頁中進行，請放心使用！</span>');
  define('MODULE_PAYMENT_ECPAY12B_CHECKCODE_TITLE','綠界科技 回傳檢查設定');
  define('MODULE_PAYMENT_ECPAY12B_CHECKCODE_DESC','設定綠界ECPAY金流<b>[商家檢查碼]</b>,<br>可避免偽冒封包回傳');
  define('MODULE_PAYMENT_ECPAY12B_ALLOWED_TITLE','綠界線上金流 轉帳國家'); 
  define('MODULE_PAYMENT_ECPAY12B_ALLOWED_DESC','輸入國家代碼，則只有列出國家可以使用這個付款方式 (例如 AT,DE (留白表示不設限))');  
  define('MODULE_PAYMENT_ECPAY12B_TEXT_ERROR_1', '中國信託信用卡分期付款結帳，每筆結帳金額不得低於新台幣300元');
  define('MODULE_PAYMENT_ECPAY12B_TEXT_ERROR_2', '線上付款授權失敗，請確認所輸入相關資訊正確無誤,或換張信用卡');
  define('MODULE_PAYMENT_ECPAY12B_TEXT_ERROR_3', '授權回傳驗證失敗, 本網站只接受由(綠界科技)所回傳的授權結果,閒雜人等不用試了');
    define('MODULE_PAYMENT_ECPAY12B_INSTALLSWITCH_TITLE','分期利率內含或外加');
  define('MODULE_PAYMENT_ECPAY12B_INSTALLSWITCH_DESC','內含表示消費者支付總金額即時網站售價,反之則因期數不同而外加分期利息,Enable 為內含, Disable 為外加');
  define('MODULE_PAYMENT_ECPAY12B_INSTALLMENT_TITLE','12期分期手續費率');
  define('MODULE_PAYMENT_ECPAY12B_INSTALLMENT_DESC','例如您跟銀行間的費率是 3% , 請填 0.03');
  //define('MODULE_PAYMENT_ECPAY12B_FORM_ACTION_URL', 'https://gwpay.com.tw/form_Sc_to5.php');  //如果是使用綠界 gwpay 的話就把這個起用
  define('MODULE_PAYMENT_ECPAY12B_FORM_ACTION_URL', 'https://ecpay.com.tw/form_Sc_to5_fn.php');
  //define('MODULE_PAYMENT_ECPAY12B_FORM_ACTION_URL', 'https://ecay.com.tw/form_Sc_to5e.php');  //英文表單
?>
