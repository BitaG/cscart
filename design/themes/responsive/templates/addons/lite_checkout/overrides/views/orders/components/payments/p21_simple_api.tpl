<div class="litecheckout__fields-row">
    <div class="ty-control-group litecheckout__field litecheckout__field--full">
        <label for="dateofbirth" class="ty-control-group__title cm-required">{__("date_of_birth")}</label>
        {include file="common/calendar.tpl" date_id="date_of_birth" date_name="payment_info[date_of_birth]" date_val=$cart.payment_info.date_of_birth|default:$user_data.birthday}
    </div>
    <div class="ty-control-group litecheckout__field litecheckout__field--full">
        <label for="last4ssn" class="ty-control-group__title cm-required">{__("last4ssn")}</label>
        <input id="last4ssn" maxlength="4" size="35" type="text" name="payment_info[last4ssn]" value="{$cart.payment_info.last4ssn}" class="ty-input-text-full cm-autocomplete-off cm-focus" />
    </div>
</div>
<div class="litecheckout__fields-row">
    <div class="ty-control-group litecheckout__field litecheckout__field--full">
        <input id="phone_number" size="35" type="text" name="payment_info[phone]" value="{$cart.payment_info.phone|default:$user_data.b_phone|default:$user_data.phone}" class="ty-input-text cm-autocomplete-off litecheckout__input" placeholder=" " />
        <label for="phone_number" class="ty-control-group__title cm-required cm-regexp litecheckout__label" data-ca-regexp="{literal}^([0-9]{3}[ ]{1}[0-9]{3}[ ]{1}[0-9]{4})${/literal}" data-ca-message="{__("error_validator_phone_number")}">{__("phone")}</label>
    </div>
    <div class="ty-control-group litecheckout__field litecheckout__field--full">
        <input id="passport_number" size="35" type="text" name="payment_info[passport_number]" value="{$cart.payment_info.passport_number}" class="ty-input-text cm-autocomplete-off litecheckout__input" placeholder=" " />
        <label for="passport_number" class="ty-control-group__title litecheckout__label">{__("passport_number")}</label>
    </div>
</div>
<div class="litecheckout__fields-row">
    <div class="ty-control-group litecheckout__field litecheckout__field--full">
        <input id="drlicense_number" size="35" type="text" name="payment_info[drlicense_number]" value="{$cart.payment_info.drlicense_number}" class="ty-input-text cm-autocomplete-off litecheckout__input" placeholder=" " />
        <label for="drlicense_number" class="ty-control-group__title litecheckout__label">{__("drlicense_number")}</label>
    </div>
    <div class="ty-control-group litecheckout__field litecheckout__field--full">
        <input id="routingcode" maxlength="9" size="35" type="text" name="payment_info[routing_code]" value="{$cart.payment_info.routing_code}" class="ty-input-text cm-autocomplete-off litecheckout__input" placeholder=" " />
        <label for="routingcode" class="ty-control-group__title cm-required litecheckout__label">{__("routing_code")}</label>
    </div>
</div>
<div class="litecheckout__fields-row">
    <div class="ty-control-group litecheckout__field litecheckout__field--full">
        <input id="accountnr" maxlength="20" size="35" type="text" name="payment_info[account_number]" value="{$cart.payment_info.account_number}" class="ty-input-text cm-autocomplete-off litecheckout__input" placeholder=" " />
        <label for="accountnr" class="ty-control-group__title cm-required litecheckout__label">{__("account_number")}</label>
    </div>
    <div class="ty-control-group litecheckout__field litecheckout__field--full">
        <input id="checknr" maxlength="10" size="35" type="text" name="payment_info[check_number]" value="{$cart.payment_info.check_number}" class="ty-input-text cm-autocomplete-off litecheckout__input" placeholder=" " />
        <label for="checknr" class="ty-control-group__title cm-required litecheckout__label">{__("check_number")}</label>
    </div>
</div>
<div class="ty-control-group">
    <label for="p21agree" class="ty-control-group__title cm-required">{__("p21agree")} (<a class="cm-tooltip" title="{__("p21agree_tooltip")}">?</a>)</label>
    <input id="p21agree" maxlength="8" size="35" type="text" name="payment_info[mm_agree]" value="{$cart.payment_info.mm_agree}" class="ty-input-text cm-autocomplete-off" />
</div>
