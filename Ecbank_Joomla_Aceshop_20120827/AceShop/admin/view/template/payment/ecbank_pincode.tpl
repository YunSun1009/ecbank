<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="box">
    <div class="heading">
      <h1><img src="view/image/payment.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
    </div>
  <div class="content">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <table class="form">
        <?php foreach ($languages as $language) { ?>
        <tr>
          <td><?php echo $entry_bank; ?></td>
          <td><textarea name="ecbank_pincode_description_<?php echo $language['language_id']; ?>" cols="80" rows="10"><?php echo ${'ecbank_pincode_description_' . $language['language_id']}; ?></textarea>
            <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" style="vertical-align: top;" /><br />
            </td>
        </tr>
        <?php } ?>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_account; ?></td>
          <td><input type="text" name="ecbank_pincode_account" value="<?php echo isset($ecbank_pincode_account) ? $ecbank_pincode_account : ''; ?>" size="80" /><br /><?php if (isset($error_warning2)) { ?><span class="error"><?php echo $error_warning2; ?></span><?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_checkcode; ?></td>
          <td><input type="text" name="ecbank_pincode_checkcode" value="<?php echo isset($ecbank_pincode_checkcode) ? $ecbank_pincode_checkcode : ''; ?>" size="80" /><br /><?php if (isset($error_warning3)) { ?><span class="error"><?php echo $error_warning3; ?></span><?php } ?></td>
        </tr>
     	<tr>
		<td><span class="required">*</span><?php echo $entry_i_invoice; ?></td>
		<td>
			<input type="radio" name="ecbank_pincode_i_invoice" value="yes" 
                               <?php echo isset($ecbank_pincode_i_invoice) && $ecbank_pincode_i_invoice == "yes" ? 'CHECKED' : '' ; ?> />
                               <?php echo $entry_i_invoice_yes; ?>
			<input type="radio" name="ecbank_pincode_i_invoice" value="no" 
                               <?php echo isset($ecbank_pincode_i_invoice) && $ecbank_pincode_i_invoice == "no" ? 'CHECKED' : '' ; ?> />
                               <?php echo $entry_i_invoice_no; ?>
		</td>
	</tr>  
        <tr>
          <td><span class="required"></span> <?php echo $entry_imer_id; ?></td>
          <td><input type="text" name="ecbank_pincode_imer_id" value="<?php echo isset($ecbank_pincode_imer_id) ? $ecbank_pincode_imer_id : ''; ?>" size="80" /></td>
        </tr>
        <tr>
          <td><span class="required"></span> <?php echo $entry_delay; ?></td>
          <td><input type="text" name="ecbank_pincode_delay" value="<?php echo isset($ecbank_pincode_delay) ? $ecbank_pincode_delay : ''; ?>" size="80" /></td>
        </tr>                   
        <tr>
          <td><?php echo $entry_order_status; ?></td>
          <td><select name="ecbank_pincode_order_status_id">
              <?php foreach ($order_statuses as $order_status) { ?>
              <?php if ($order_status['order_status_id'] == $ecbank_pincode_order_status_id) { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_geo_zone; ?></td>
          <td><select name="ecbank_pincode_geo_zone_id">
              <option value="0"><?php echo $text_all_zones; ?></option>
              <?php foreach ($geo_zones as $geo_zone) { ?>
              <?php if ($geo_zone['geo_zone_id'] == $ecbank_pincode_geo_zone_id) { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_status; ?></td>
          <td><select name="ecbank_pincode_status">
              <?php if ($ecbank_pincode_status) { ?>
              <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
              <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
              <option value="1"><?php echo $text_enabled; ?></option>
              <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_sort_order; ?></td>
          <td><input type="text" name="ecbank_pincode_sort_order" value="<?php echo $ecbank_pincode_sort_order; ?>" size="1" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php echo $footer; ?>