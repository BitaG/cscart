{$_max_desktop_items = $max_desktop_items|default:5}

<div class="ty-checkout-select-store__map-full-div pickup pickup--map-list">

    {* Map *}
    <div class="ty-checkout-select-store__map pickup__map-wrapper">
        <div id="{$map_container}" class="pickup__map-container"></div>
        <div class="pickup__map-container--mobile-hint">{__("addons.litecheckout.use_two_fingers_for_move_map")}</div>
    </div>



    {* For mobiles; List wrapper with selected pickup item *}
    {foreach from=$shipping.data.stores item=store}
        {if $old_store_id == $store.store_location_id}
        <div class="ty-checkout-select-store pickup__offices-wrapper visible-phone pickup__offices-wrapper--near-map">
            {* List *}
            <div class="litecheckout__fields-row litecheckout__fields-row--wrapped pickup__offices pickup__offices--list pickup__offices--list-no-height">
                {include file="addons/lite_checkout/components/shippings/items/pickup.tpl" store=$store}
            </div>
            {* End of List *}
        </div>
        {/if}
    {/foreach}
    {* For mobiles; List wrapper with selected pickup item *}

    {* For mobiles; button for popup with pickup points *}
    <button class="ty-btn ty-btn__secondary cm-open-pickups pickup__open-pickupups-btn visible-phone"
        data-ca-title="{__('addons.litecheckout.choose_from_list')}"
        data-ca-target=".pickup__offices-wrapper-open"
        type="button"
    >{__('addons.litecheckout.choose_from_list')}</button>
    {* For mobiles; button for popup with pickup points *}



    {* List wrapper *}
    <div class="ty-checkout-select-store pickup__offices-wrapper pickup__offices-wrapper-open hidden-phone">

        {* Search *}
        {if $shipping.data.stores|count >= $_max_desktop_items}
        <div class="pickup__search">
            <div class="pickup__search-field litecheckout__field">
                <input type="text" id="pickup-search" class="litecheckout__input js-pickup-search-input" placeholder=" "
                    value />
                <label class="litecheckout__label" for="pickup-search">{__("search")}</label>
            </div>
        </div>
        {/if}
        {* End of Search *}

        {* List *}
        <div class="litecheckout__fields-row litecheckout__fields-row--wrapped pickup__offices pickup__offices--list">
            {foreach from=$shipping.data.stores item=store}
                {include file="addons/lite_checkout/components/shippings/items/pickup.tpl" store=$store}
            {/foreach}
        </div>
        {* End of List *}

    </div>
    {* End of List wrapper *}

</div>
