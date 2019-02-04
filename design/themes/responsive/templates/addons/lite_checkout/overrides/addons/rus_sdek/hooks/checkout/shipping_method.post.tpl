{if $cart.chosen_shipping.$group_key == $shipping.shipping_id && $shipping.module == 'sdek' && $shipping.data.offices|count >= 1}

    {script src="js/addons/lite_checkout/pickup_selector.js"}

    {$shipping_id = $shipping.shipping_id}
    {$old_office_id = $select_office.$group_key.$shipping_id}
    {$sdek_map_container = "sdek_map_$shipping_id"}

    {include file="addons/rus_sdek/views/sdek/yandex.tpl"}

    {$shipping.data.stores = $sdek_stores}
    {$store_count = $shipping.data.offices|count}

    <h1>{__("addons.litecheckout.select_pickup_item")}</h1>

    {include file="addons/lite_checkout/components/shippings/map_and_list_sdek.tpl"}
{/if}
