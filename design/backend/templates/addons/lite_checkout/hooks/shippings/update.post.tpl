<div class="control-group">
    <label class="control-label" for="elm_lite_checkout_is_address_required"
    >{__("lite_checkout.is_address_required")}:</label>
    <div class="controls">
        <input type="hidden"
               name="shipping_data[is_address_required]"
               value="N"
        />
        <input type="checkbox"
               name="shipping_data[is_address_required]"
               id="free_shipping"
               {if $shipping.is_address_required|default:"Y" == "Y"}checked="checked"{/if}
               value="Y"
        />
    </div>
</div>