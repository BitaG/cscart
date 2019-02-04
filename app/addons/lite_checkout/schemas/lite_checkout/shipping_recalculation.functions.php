<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

defined('BOOTSTRAP') or die('Access denied');

/**
 * Checks whether current cart state must lead to the shipping recalculation.
 *
 * @param array                   $cart                        Cart contents
 * @param array|\Tygh\Web\Session $session                     Session
 * @param string                  $field                       Always 'cart'
 * @param array                   $storage_recalculation_rules Session-specific recalculation rules
 * @param array                   $check_storages              All data storages
 * @param array                   $recalculation_schema        All recalculation rules
 *
 * @return bool
 */
function fn_lite_checkout_is_shipping_recalculation_required_by_cart(
    array $cart,
    $session,
    $field,
    array $storage_recalculation_rules,
    array $check_storages,
    array $recalculation_schema
) {
    return !empty($cart['calculate_shipping']) || empty($cart['chosen_shipping']);
}