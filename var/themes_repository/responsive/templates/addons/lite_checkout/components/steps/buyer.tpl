<div class="litecheckout__step cm-processing-personal-data" data-ca-processing-personal-data-without-click="true" id="litecheckout_step_buyer">
    <h3 class="litecheckout__step-title">{__("lite_checkout.customer_information")}
        {if !$auth.user_id}
        {$return_current_url = $config.current_url|escape:url}
        <a 
            href="{if $runtime.controller == "auth" && $runtime.mode == "login_form"}{$config.current_url|fn_url}{else}{"auth.login_form?return_url=`$return_current_url`"|fn_url}{/if}"
            class="cm-dialog-opener cm-dialog-auto-size litecheckout__step-title--right"
            data-ca-dialog-title="{__("authorization")}"
            rel="nofollow"
        >{__("lite_checkout.login_to_autocomplete_address")}</a>{/if}
    </h3>
    
    <div class="litecheckout__fields-row hidden" data-ca-lite-checkout-element="address_group">

        <div class="litecheckout__field litecheckout__field--full">
            <input
                placeholder=" "
                class="litecheckout__input"
                id="litecheckout_street"
                type="text"
                name="user_data[s_address]"
                value="{$lite_checkout_user_data.s_address}"
                data-ca-lite-checkout-element="address"
                autocomplete="shipping street-address"
                aria-label="{__("address")}"
                title="{__("address")}"
                required
            />
            <label class="litecheckout__label cm-required" for="litecheckout_street">{__("address")} </label>
        </div>

        <div class="litecheckout__field">
            <input
                placeholder=" "
                class="litecheckout__input"
                id="litecheckout_zipcode"
                type="text"
                value="{$lite_checkout_user_data.s_zipcode}"
                name="user_data[s_zipcode]"
                data-ca-lite-checkout-element="zipcode"
                autocomplete="shipping postal-code"
                aria-label="{__("zip_postal_code")}"
                title="{__("zip_postal_code")}"
                required
            />
            <label class="litecheckout__label cm-required" for="litecheckout_zipcode">{__("zip_postal_code")} </label>
        </div>

    </div>

    <div class="litecheckout__fields-row">

        <div class="litecheckout__field litecheckout__field--full">
            <input class="litecheckout__input"
                placeholder=" "
                id="litecheckout_name"
                type="text"
                name="user_data[name]"
                value="{$lite_checkout_user_data.name}"
                data-ca-lite-checkout-element="name"
                autocomplete="name"
                aria-label="{__("lite_checkout.personal_name")}"
                title="{__("lite_checkout.personal_name")}"
                required
            />
            <label class="litecheckout__label cm-required" for="litecheckout_name">{__("lite_checkout.personal_name")}</label>
        </div>

        <div class="litecheckout__field litecheckout__field--full">
            <input class="litecheckout__input"
                placeholder=" "
                id="litecheckout_phone"
                type="tel"
                name="user_data[phone]"
                value="{$lite_checkout_user_data.phone|default:($lite_checkout_user_data.s_phone|default:$lite_checkout_user_data.b_phone)}"
                data-ca-lite-checkout-element="phone"
                autocomplete="tel"
                aria-label="{__("phone")}"
                title="{__("phone")}"
                required
            />
            <label class="litecheckout__label cm-required cm-phone" for="litecheckout_phone">{__("phone")}</label>
        </div>

        <div class="litecheckout__field litecheckout__field--full">
            <input class="litecheckout__input"
                placeholder=" "
                id="litecheckout_email"
                type="email"
                name="user_data[email]"
                value="{$lite_checkout_user_data.email}"
                data-ca-lite-checkout-element="email"
                autocomplete="off"
                aria-label="{__("email")}"
                title="{__("email")}"
                required
            />
            <label class="litecheckout__label cm-required cm-email" for="litecheckout_email">{__("email")}</label>
        </div>

    </div>

    <div class="litecheckout__fields-row">
        <div class="litecheckout__field litecheckout__field--full">
            <textarea
                class="litecheckout__input litecheckout__input--textarea"
                id="litecheckout_comment_to_shipping"
                autocomplete="disabled"
                name="customer_notes"
                placeholder=" "
                data-ca-lite-checkout-element="notes"
                aria-label="{__("lite_checkout.delivery_note")}"
                title="{__("lite_checkout.delivery_note")}"
            >{$cart.notes}</textarea>
            <label class="litecheckout__label" for="litecheckout_comment_to_shipping">{__("lite_checkout.delivery_note")} </label>
        </div>
    </div>

    {hook name="checkout:extra_payment_info"}
    {/hook}

    <!--litecheckout_step_buyer--></div>
