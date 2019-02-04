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

use Tygh\Registry;

require_once Registry::get('config.dir.addons') . 'lite_checkout/schemas/lite_checkout/shipping_recalculation.functions.php';

$schema = [
    'session' => [
        'cart' => 'fn_lite_checkout_is_shipping_recalculation_required_by_cart',
    ],
    'request' => [
        // rus_pickup
        'select_store'      => true,
        'drop_select_store' => true,
    ],
];

return $schema;