{if $cart.chosen_shipping.$group_key == $shipping.shipping_id && $shipping.module == "pickup"}

    {script src="js/addons/lite_checkout/pickup_selector.js"}

    {$store_count = $shipping.data.stores|count}
    {$shipping_id = $shipping.shipping_id}
    {$old_store_id = $select_store.$group_key.$shipping_id}

    {if $shipping.service_params.display}
        {$display_type = $shipping.service_params.display}
    {else}
        {$display_type = "ML"}
    {/if}

    {$store_locations = $shipping.data.stores}

    {if $display_type != "L"}
        {$map_container = "map_canvas_$group_key"}
        {include file="addons/rus_pickup/components/yandex.tpl"}
    {/if}

    <h1>{__("addons.litecheckout.select_pickup_item")}</h1>

    {include file="addons/lite_checkout/components/shippings/map_and_list_pickup.tpl"}
{/if}