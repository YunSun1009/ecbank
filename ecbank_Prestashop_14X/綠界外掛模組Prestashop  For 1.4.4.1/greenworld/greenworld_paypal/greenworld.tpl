<a href="javascript:$('#greenworld_paypal').submit();" title="{$payment}">
<p class="payment_module">{$payment}</p></a>
<form action="{$this_path}linkGreenWorld.php" method="post" id="greenworld_paypal" class="hidden">
<input type="hidden" name="hiddenlink" id="hiddenlink" value="{$link_pay}"/>
</form>