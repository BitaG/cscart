{if $payment_methods|count >= 1}
    <div class="litecheckout__fields-row litecheckout__fields-row--wrapped shipping-method--wrapper">
        {foreach $lite_checkout_payment_methods as $payment}
            <div class="litecheckout__shipping-method shipping-method">

                <input type="radio"
                       name="selected_payment_method"
                       id="radio_{$payment.payment_id}"
                       data-ca-target-form="litechekout_payments_form"
                       data-ca-url="checkout.checkout"
                       data-ca-result-ids="litecheckout_step_payment_methods"
                       class="shipping-method__radio cm-select-payment hidden"
                       value="{$payment.payment_id}"
                       {if $payment.payment_id == $cart.payment_id}checked{/if}
                />

                <div class="shipping-method__container">

                    <label id="payments_{$payment.payment_id}"
                           class="shipping-method__wrapper js-litecheckout-toggle"
                           for="radio_{$payment.payment_id}"
                           data-ca-toggling="payments_form_wrapper_{$payment.payment_id}"
                           data-ca-hide-all-in=".litecheckout__payment-methods"
                    >
                        {if $payment.image}
                            <div class="shipping-method__logo">
                                {include file="common/image.tpl" obj_id=$payment.payment_id images=$payment.image class="shipping-method__logo-image"}
                            </div>
                        {/if}
                        <p class="shipping-method__title">{$payment.payment}</p>
                        <p class="shipping-method__delivery-time">{$payment.description}</p>
                    </label>

                </div>
            </div>
        {/foreach}
    </div>
    <form name="litechekout_payments_form"
          id="litechekout_payments_form"
          action="{""|fn_url}"
          method="post"
          data-ca-lite-checkout-element="payments-form"
          data-ca-lite-checkout-ready-for-checkout="false"
    >
        <div class="litecheckout__fields-row" id="litecheckout_fields_row">
            <div class="litecheckout__payment-methods">
                {foreach $lite_checkout_payment_methods as $payment}
                    {if $payment.payment_id != $cart.payment_id}
                        {continue}
                    {/if}
                    <div class="litecheckout__payment-method"
                         data-ca-toggling-by="payments_form_wrapper_{$payment.payment_id}"
                         data-ca-hideble="true"
                    >
                        <input type="hidden" name="payment_id" value="{$payment_id}"/>
                        <input type="hidden" name="result_ids" value="{$result_ids}"/>
                        <input type="hidden" name="dispatch" value="checkout.place_order"/>
                        <input type="hidden" name="customer_notes" value=""/>

                        {if $order_id}
                            <input type="hidden" name="order_id" value="{$order_id}"/>
                        {/if}

                        <input type="hidden" name="payment_id" value="{$payment.payment_id}"/>

                        {if $payment.template}
                            {capture name="payment_template"}
                                {include file=$payment.template card_id=$payment.payment_id}
                            {/capture}
                        {/if}

                        {if $payment.template && $smarty.capture.payment_template|trim != ""}
                            <div class="clearfix">
                                <div class="ty-payments-list__instruction">{$payment.instructions nofilter}</div>
                                {$smarty.capture.payment_template nofilter}
                            </div>
                        {else}
                            {include file="views/checkout/components/payments/payments_list.tpl" payments=[$payment]}
                        {/if}

                        {if $auth.act_as_user}
                            <div class="ty-control-group">
                                <label>
                                    <input type="checkbox" id="skip_payment" name="skip_payment" value="Y"
                                           class="checkbox"
                                    />
                                    {__("skip_payment")}
                                </label>
                            </div>
                        {/if}
                    </div>
                    {if $iframe_mode}
                        <div class="ty-payment-method-iframe__box">
                            <iframe width="100%" height="700" id="order_iframe_{$smarty.const.TIME}"
                                    src="{"checkout.process_payment"|fn_checkout_url:$smarty.const.AREA}"
                                    style="border: 0px" frameBorder="0"
                            ></iframe>
                            {if $cart_agreements || $settings.Checkout.agree_terms_conditions == "Y"}
                                <div id="payment_method_iframe_{$payment.payment_id}"
                                     class="ty-payment-method-iframe"
                                >
                                    <div class="ty-payment-method-iframe__label">
                                        <div class="ty-payment-method-iframe__text">{__("checkout_terms_n_conditions_alert")}</div>
                                    </div>
                                </div>
                            {/if}
                        </div>
                    {/if}
                {/foreach}
            </div>
            <!--litecheckout_fields_row--></div>

        <div class="litecheckout__fields-row">
            {include file="common/image_verification.tpl" option="checkout"}
        </div>

        <div class="litecheckout__fields-row">
            <div id="litecheckout_final_section" class="litecheckout__submit-order">
                {include file="addons/lite_checkout/components/final_section.tpl"
                is_payment_step=true
                suffix=$payment.payment_id
                }
            </div>
        </div>
        <!--litechekout_payments_form--></form>
{/if}