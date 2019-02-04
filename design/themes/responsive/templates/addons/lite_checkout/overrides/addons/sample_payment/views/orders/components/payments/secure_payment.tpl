<div class="clearfix">
    <div class="ty-credit-card">
        <div class="ty-credit-card__control-group ty-control-group">
            <input size="35" type="text" id="credit_card_number_{$id_suffix}" name="payment_info[card_number]" value="" class="ty-credit-card__input cm-autocomplete-off litecheckout__input" placeholder=" "/>
            <label for="credit_card_number_{$id_suffix}" class="ty-control-group__title cm-cc-number cm-required litecheckout__label">{__("card_number")}</label>
            <ul class="ty-cc-icons cm-cc-icons">
                <li class="ty-cc-icons__item cc-default cm-cc-default"><span class="ty-cc-icons__icon default">&nbsp;</span></li>
                <li class="ty-cc-icons__item cm-cc-visa"><span class="ty-cc-icons__icon visa">&nbsp;</span></li>
                <li class="ty-cc-icons__item cm-cc-visa_electron"><span class="ty-cc-icons__icon visa-electron">&nbsp;</span></li>
                <li class="ty-cc-icons__item cm-cc-mastercard"><span class="ty-cc-icons__icon mastercard">&nbsp;</span></li>
                <li class="ty-cc-icons__item cm-cc-maestro"><span class="ty-cc-icons__icon maestro">&nbsp;</span></li>
                <li class="ty-cc-icons__item cm-cc-amex"><span class="ty-cc-icons__icon american-express">&nbsp;</span></li>
                <li class="ty-cc-icons__item cm-cc-discover"><span class="ty-cc-icons__icon discover">&nbsp;</span></li>
            </ul>
        </div>

        <div class="ty-credit-card__control-group ty-control-group">
            <input size="35" type="text" id="credit_card_name_{$id_suffix}" name="payment_info[cardholder_name]" value="" class="cm-cc-name ty-credit-card__input ty-uppercase litecheckout__input" placeholder=" "/>
            <label for="credit_card_name_{$id_suffix}" class="ty-control-group__title cm-required litecheckout__label">{__("cardholder_name")}</label>
        </div>
    </div>
</div>

<div class="ty-control-group">
    <label for="bank_routing_number" class="ty-control-group__title cm-required">{__("order_status")}</label>
    <select name="payment_info[final_order_status]" class="litecheckout__select">
    	<option value="P" selected="selected">{__("processed")}</option>
    	<option value="F">{__("failed")}</option>
    	<option value="O">{__("open")}</option>
    	<option value="D">{__("declined")}</option>
    </select>
</div>