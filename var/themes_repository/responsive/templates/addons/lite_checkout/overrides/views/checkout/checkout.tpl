{script src="js/tygh/checkout.js"}
{script src="js/addons/lite_checkout/script.js"}

<div class="litecheckout litecheckout__form" id="litecheckout_form">
    <h2 class="litecheckout__page-title">{__('checkout')}</h2>
    <div data-ca-lite-checkout-element="form">
        {include file="addons/lite_checkout/components/steps/shipping_methods.tpl"}

        {include file="addons/lite_checkout/components/steps/buyer.tpl"}

        {include file="addons/lite_checkout/components/steps/payment_methods.tpl"}
    </div>

<!--litecheckout_form--></div>