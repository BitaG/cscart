{if $addons.paypal.status == "D"}
    <div class="alert alert-block">
	<p>{__("paypal.addon_is_disabled_notice")}</p>
    </div>
{else}

<div class="control-group">
    <label class="control-label" for="currency">{__("currency")}:</label>
    <div class="controls">
        <select name="payment_data[processor_params][currency]" id="currency">
            {foreach from=$paypal_currencies item="currency"}
                <option value="{$currency.code}"{if !$currency.active} disabled="disabled"{/if}{if $processor_params.currency == $currency.code} selected="selected"{/if}>{$currency.name}</option>
            {/foreach}
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="order_prefix">{__("order_prefix")}:</label>
    <div class="controls">
        <input type="text" name="payment_data[processor_params][order_prefix]" id="order_prefix" value="{$processor_params.order_prefix}" >
    </div>
</div>

{include file="common/subheader.tpl" title=__("addons.paypal.technical_details") target="#section_technical_details"}

<div id="section_technical_details">

    <div class="control-group">
        <label class="control-label" for="username">{__("username")}:</label>
        <div class="controls">
            <input type="text" name="payment_data[processor_params][username]" id="username" value="{$processor_params.username}" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="password">{__("password")}:</label>
        <div class="controls">
            <input type="text" name="payment_data[processor_params][password]" id="password" value="{$processor_params.password}" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">{__("paypal_authentication_method")}:</label>
        <div class="controls">
            <label class="radio inline" for="elm_payment_auth_method_cert">
                <input id="elm_payment_auth_method_cert" type="radio" value="cert" name="payment_data[processor_params][authentication_method]" {if $processor_params.authentication_method == "cert" || !$processor_params.authentication_method} checked="checked"{/if}>
                {__("certificate")}
            </label>
            <label class="radio inline" for="elm_payment_auth_method_signature">
                <input id="elm_payment_auth_method_signature" type="radio" value="signature" name="payment_data[processor_params][authentication_method]" {if $processor_params.authentication_method == "signature"} checked="checked"{/if}>
                {__("signature")}
            </label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="certificate_filename">{__("certificate_filename")}:</label>
        <div class="controls" id="certificate_file">
            {if $processor_params.certificate_filename}
                <div class="text-type-value pull-left">
                    {$processor_params.certificate_filename}
                    <a href="{'payments.delete_certificate?payment_id='|cat:$payment_id|fn_url}" class="cm-ajax cm-post" data-ca-target-id="certificate_file">
                        <i class="icon-remove-sign cm-tooltip hand" title="{__('remove')}"></i>
                    </a>
                </div>
            {/if}

            <div {if $processor_params.certificate_filename}class="clear"{/if}>{include file="common/fileuploader.tpl" var_name="payment_certificate[]"}</div>
        <!--certificate_file--></div>
    </div>

    <div class="control-group">
        <label class="control-label" for="api_signature">{__("signature")}:</label>
        <div class="controls">
            <input type="text" name="payment_data[processor_params][signature]" id="api_signature" value="{$processor_params.signature}" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="mode">{__("test_live_mode")}:</label>
        <div class="controls">
            <select name="payment_data[processor_params][mode]" id="mode">
                <option value="test" {if $processor_params.mode == "test"}selected="selected"{/if}>{__("test")}</option>
                <option value="live" {if $processor_params.mode == "live"}selected="selected"{/if}>{__("live")}</option>
            </select>
        </div>
    </div>

    <h3>{__("3d_secure")}</h3>

    <div class="select-field">
        <input type="hidden" value="" name="payment_data[processor_params][use_cardinal]">
        <input id="use_cardinal" class="hidden" type="checkbox" value="Y" name="payment_data[processor_params][use_cardinal]" {if $processor_params.use_cardinal == "Y"} checked="checked"{/if} onclick="Tygh.$('#use_cardinal_block').toggle();"/>

        <p id="on_use_cardinal_sw"{if $processor_params.use_cardinal == "Y"} class="hidden"{/if}>
        <a class="cm-combination dashed" onclick="Tygh.$('#use_cardinal').click();">{__("use_cardinal")}</a><br>
        </p>

        <p id="off_use_cardinal_sw"{if $processor_params.use_cardinal != "Y"} class="hidden"{/if}>
        <a class="cm-combination dashed" onclick="Tygh.$('#use_cardinal').click();">{__("dont_use_cardinal")}</a><br>
        </p>
    </div>

    <div id="use_cardinal_block"{if $processor_params.use_cardinal != "Y"} class="hidden"{/if}>
    <div class="control-group">
        <label class="control-label" for="merchant_id">{__("merchant_id")}:</label>
            <div class="controls">
                <input type="text" name="payment_data[processor_params][merchant_id]" id="merchant_id" value="{$processor_params.merchant_id}" >
            </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="processor_id">{__("processor_id")}:</label>
        <div class="controls">
            <input type="text" name="payment_data[processor_params][processor_id]" id="processor_id" value="{$processor_params.processor_id}" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="transaction_password">{__("transaction_password")}:</label>
        <div class="controls">
            <input type="text" name="payment_data[processor_params][transaction_password]" id="transaction_password" value="{$processor_params.transaction_password}" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="transaction_url">{__("transaction_url")}:</label>
        <div class="controls">
            <input type="text" name="payment_data[processor_params][transaction_url]" id="transaction_url" value="{$processor_params.transaction_url}" >
        </div>
    </div>
    </div>

    <p class="description"><a href="https://www.paypal-business.co.uk/3Dsecure.asp" target="_blank">{__("read_more_3d_secure")}</a></p>
</div>
{/if}
