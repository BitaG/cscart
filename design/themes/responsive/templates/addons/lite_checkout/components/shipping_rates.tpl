<div id="shipping_rates_list">
{hook name="checkout:shipping_rates"}

    <input type="hidden"
           name="additional_result_ids[]"
           value="litecheckout_place_order,litecheckout_step_payment_methods,checkout*"
    />

    <div class="litecheckout__fields-row litecheckout__fields-row--wrapped shipping-method--wrapper">

        {foreach from=$product_groups key="group_key" item=group name="spg"}
            {* Shippings list *}
            {if $group.shippings && !$group.all_edp_free_shipping && !$group.shipping_no_required}

                {foreach from=$group.shippings item="shipping"}

                    {if $cart.chosen_shipping.$group_key == $shipping.shipping_id}
                        {assign var="checked" value="checked=\"checked\""}
                        {assign var="strong_begin" value="<strong>"}
                        {assign var="strong_end" value="</strong>"}
                    {else}
                        {assign var="checked" value=""}
                        {assign var="strong_begin" value=""}
                        {assign var="strong_end" value=""}
                    {/if}

                    {if $shipping.delivery_time || $shipping.service_delivery_time}
                        {assign var="delivery_time" value="(`$shipping.service_delivery_time|default:$shipping.delivery_time`)"}
                    {else}
                        {assign var="delivery_time" value=""}
                    {/if}

                    {if $shipping.rate}
                        {capture assign="rate"}{include file="common/price.tpl" value=$shipping.rate}{/capture}
                        {if $shipping.inc_tax}
                            {assign var="rate" value="`$rate` ("}
                            {if $shipping.taxed_price && $shipping.taxed_price != $shipping.rate}
                                {capture assign="tax"}{include file="common/price.tpl" value=$shipping.taxed_price class="ty-nowrap"}{/capture}
                                {assign var="rate" value="`$rate``$tax` "}
                            {/if}
                            {assign var="inc_tax_lang" value=__('inc_tax')}
                            {assign var="rate" value="`$rate``$inc_tax_lang`)"}
                        {/if}
                    {elseif fn_is_lang_var_exists("free")}
                        {assign var="rate" value=__("free") }
                    {else}
                        {assign var="rate" value="" }
                    {/if}

                    
                    <div class="litecheckout__shipping-method shipping-method">
                        <input 
                            type="radio"
                            class="shipping-method__radio hidden"
                            id="sh_{$group_key}_{$shipping.shipping_id}"
                            name="shipping_ids[{$group_key}]"
                            value="{$shipping.shipping_id}"
                            onclick="fn_calculate_total_shipping_cost(); $.ceLiteCheckout('toggle_address', {if $shipping.is_address_required == "Y"}true{else}false{/if});"
                            data-ca-lite-checkout-element="shipping_method"
                            data-ca-lite-checkout-is-address-required="{if $shipping.is_address_required == "Y"}true{else}false{/if}"
                            {$checked} 
                        />
                    
                        <div class="shipping-method__container">
                            <label
                                for="sh_{$group_key}_{$shipping.shipping_id}"
                                class="shipping-method__wrapper js-litecheckout-activate"
                                data-ca-activate="sd_{$group_key}_{$shipping.shipping_id}"
                            >
                                {if $shipping.image}
                                <div class="shipping-method__logo">
                                    {include file="common/image.tpl" obj_id=$shipping_id images=$shipping.image class="shipping-method__logo-image"}
                                </div>
                                {/if}
                                <p class="shipping-method__title">{$shipping.shipping} — {$rate nofilter}</p>
                                <p class="shipping-method__delivery-time">{$delivery_time}</p>
                            </label>
                        </div>
                    </div>
                {/foreach}

            {else}
                {if $group.all_free_shipping}
                    <p>{__("free_shipping")}</p>
                {elseif $group.all_edp_free_shipping || $group.shipping_no_required }
                    <p>{__("no_shipping_required")}</p>
                {else}
                    <p class="ty-error-text">
                        {__("text_no_shipping_methods")}
                    </p>
                {/if}
            {/if}

        {foreachelse}
            <p>
                {if !$cart.shipping_required}
                    {__("no_shipping_required")}
                {elseif $cart.free_shipping}
                    {__("free_shipping")}
                {/if}
            </p>
        {/foreach}

    </div>

    <div class="litecheckout__fields-row litecheckout__fields-row--wrapped">
        {foreach from=$product_groups key="group_key" item=group name="spg"}
            {foreach from=$group.shippings item="shipping"}
                {hook name="checkout:shipping_method"}
                {/hook}
            {/foreach}
            <div class="shipping-method__description-container">
                {foreach from=$group.shippings item="shipping"}
                    {if $cart.chosen_shipping.$group_key == $shipping.shipping_id}
                        <p class="shipping-method__description">{$shipping.description nofilter}</p>
                    {/if}
                {/foreach}
            </div>
        {/foreach}
        
        <div class="shipping-method__description-container">            
            {$smarty.capture.shipping_method_additional_info nofilter}
        </div>
    </div>

{/hook}
<!--shipping_rates_list--></div>
