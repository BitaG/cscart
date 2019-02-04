<div class="litecheckout__step" id="litecheckout_step_shipping_methods">
    <div class="litecheckout__location--wrapper">
        <h3 class="litecheckout__step-title">{__('block_shipping_methods')}</h3>

        <div class="litecheckout__location">

            <div class="litecheckout__location--city">
                <input  class="litecheckout__input litecheckout__input--selectable litecheckout__input--selectable--like-link cm-city-state"
                        id="litecheckout_city_state"
                        type="text"
                        value="{if $lite_checkout_user_data.s_city}{$lite_checkout_user_data.s_city} ({$lite_checkout_user_data.s_state_descr}){/if}"
                        required
                        data-ca-lite-checkout-element="city-state"
                        data-ca-lite-checkout-auto-select="true"
                        placeholder="{__("rus_customer_geolocation.select_your_city")}"
                        {if $lite_checkout_user_data.s_city}autofocus{/if}
                />
                <label class="litecheckout__label" for="litecheckout_city_state">{__("lite_checkout.city_and_state")}: </label>
                <span class="cm-clear-field litecheckout--clear-field" data-target=".litecheckout__location--city>.litecheckout__input--selectable--like-link.cm-city-state"></span>
            </div>

            <div class="litecheckout__field">
                <select name="user_data[s_country]"
                        class="litecheckout__input litecheckout__input--selectable litecheckout__input--selectable--select"
                        data-ca-lite-checkout-element="country"
                        required
                        id="litecheckout_country"
                >
                    <option disabled>{__("select_country")}</option>
                    {foreach $countries as $code => $country}
                        <option value="{$code}"
                            {if $lite_checkout_user_data.s_country == $code}selected="selected"{/if}
                        >{$country}</option>
                    {/foreach}
                </select>
                <label class="litecheckout__label" for="litecheckout_country">{__("country")}: </label>
            </div>

            <input  type="hidden"
                    name="user_data[s_state]"
                    id="litecheckout_state"
                    data-ca-lite-checkout-element="state"
                    value="{$lite_checkout_user_data.s_state}"
            />

            <input  type="hidden"
                    name="user_data[s_city]"
                    id="litecheckout_city"
                    data-ca-lite-checkout-element="city"
                    value="{$lite_checkout_user_data.s_city}"
            />
        </div>
    </div>

    <div class="litecheckout__fields-row">
        {include file="addons/lite_checkout/components/shipping_rates.tpl" no_form=true}
    </div>

    <div id="litecheckout_autocomplete_dropdown" class="litecheckout__autocomplete-dropdown"></div>
<!--litecheckout_step_shipping_methods--></div>
