<p class="payment_module">
	<a href="{$link->getModuleLink('greenworld_barcode', 'payment', [], true)}" title="{l s='Pay by CVS.' mod='greenworld_barcode'}">
		{l s='使用超商條碼付款.' mod='greenworld_barcode'}
	</a>
</p>
<!--
<a href="javascript:$('#greenworld_barcode').submit();" title="{$payment}">
<p class="payment_module">{$payment}</p></a>
<form action="{$link->getModuleLink('linkGreenWorld', 'payment')}" method="post" id="greenworld_cvs" class="hidden">
<input type="hidden" name="hiddenlink" id="hiddenlink" value="{$link_pay}"/>
</form>
<p class="payment_module">
	<a href="{$link->getModuleLink('greenworld_barcode', 'validation', [], true)}" title="{l s='Pay by check.' mod='cheque'}">
		<img src="{$this_path}cheque.jpg" alt="{l s='Pay by check.' mod='cheque'}" width="86" height="49" />
		{l s='Pay by check (order processing will take more time).' mod='cheque'}
	</a>
</p>
                -->
                