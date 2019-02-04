<button class="{$but_meta} litecheckout__submit-btn"
        type="submit"
        name="{$but_name}"
        {if $but_onclick}onclick="{$but_onclick nofilter}"{/if}
        {if $but_id}id="{$but_id}"{/if}
>
    {capture name="order_total"}
        {include file="common/price.tpl" value=$_total|default:$cart.total}
    {/capture}

    {__("lite_checkout.place_an_order_for", ["[amount]" => $smarty.capture.order_total])}
{if $but_id}<!--{$but_id}-->{/if}</button>