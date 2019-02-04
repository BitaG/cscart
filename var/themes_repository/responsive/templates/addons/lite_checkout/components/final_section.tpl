{$show_place_order = false}

{if $cart|fn_allow_place_order:$auth}
    {$show_place_order = true}
{/if}

{if $recalculate && !$cart.amount_failed}
    {$show_place_order = true}
{/if}

{if $show_place_order}

    <div class="clearfix {if !$is_payment_step} checkout__block ty-checkout-block-terms{/if}">
        {hook name="checkout:final_section_customer_notes"}
            {* include file="views/checkout/components/customer_notes.tpl" *}
        {/hook}
        
        {if !$suffix}
            {assign var="suffix" value=""|uniqid}
        {/if}
        {include file="views/checkout/components/terms_and_conditions.tpl" suffix=$suffix}
    </div>

    <input type="hidden" name="update_steps" value="1" />
    
    {if !$iframe_mode}
        <div class="litecheckout__submit-order">
            {include 
                file="addons/lite_checkout/components/buttons/place_order.tpl" 
                but_text=__("submit_my_order") 
                but_name="dispatch[checkout.place_order]" 
                but_role="big"
                but_id="litecheckout_place_order"
            }
        </div>
    {/if}

{else}

    {if $cart.amount_failed}
        <div class="checkout__block">
            <p class="ty-error-text">{__("text_min_order_amount_required")}&nbsp;<strong>{include file="common/price.tpl" value=$settings.General.min_order_amount}</strong></p>
        </div>
    {/if}

    <div class="litecheckout__submit-order text-center">
        {include file="buttons/continue_shopping.tpl" but_href=$continue_url|fn_url but_role="action"}
    </div>
    
{/if}