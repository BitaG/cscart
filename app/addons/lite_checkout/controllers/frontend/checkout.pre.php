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

use Tygh\Tygh;

/** @var string $mode */

$cart = &Tygh::$app['session']['cart'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($mode == 'update_steps' || $mode == 'customer_info') {
        $name = isset($_REQUEST['user_data']['name'])
            ? $_REQUEST['user_data']['name']
            : '';

        fn_lite_checkout_set_name($name, $cart);
        unset($_REQUEST['user_data']['name']);

        if (empty(Tygh::$app['session']['auth']['user_id'])) {
            $cart['guest_checkout'] = $_REQUEST['guest_checkout'] = true;
        }

        if (isset($_REQUEST['customer_notes'])) {
            $cart['notes'] = $_REQUEST['customer_notes'];
        }
    } elseif ($mode == 'add') {
        fn_lite_checkout_backup_chosen_shipping($cart);
    }

    return [CONTROLLER_STATUS_OK];
}

if ($mode == 'delete') {
    fn_lite_checkout_backup_chosen_shipping($cart);
} elseif ($mode == 'checkout') {

    list($cart['user_data']) = fn_lite_checkout_fill_user_data_from_location($cart['user_data']);

    $cart['calculate_shipping'] = fn_lite_checkout_is_shipping_recalculation_required($_REQUEST, Tygh::$app['session'], $_SERVER);
}

return [CONTROLLER_STATUS_OK];
