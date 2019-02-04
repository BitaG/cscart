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
    if ($mode == 'add') {
        fn_lite_checkout_restore_chosen_shipping($cart);
    }

    return [CONTROLLER_STATUS_OK];
}

if ($mode == 'checkout') {

    /** @var \Tygh\SmartyEngine\Core $view */
    $view = Tygh::$app['view'];

    /** @var array $profile_fields */
    $profile_fields = $view->getTemplateVars('profile_fields');

    /** @var array $user_data */
    $user_data = $view->getTemplateVars('user_data');

    foreach ($profile_fields as $section) {
        foreach ($section as $field) {
            $user_data[$field['field_name']] = $field['is_default'] == 'Y'
                ? $user_data[$field['field_name']]
                : $user_data['fields'][$field['field_name']];
        }
    }

    // is required again as fn_calculate_cart_content() rewrites user data with the empty one from profile
    list($user_data) = fn_lite_checkout_fill_user_data_from_location($user_data);

    fn_add_user_data_descriptions($user_data);

    $user_data['name'] = trim($user_data['firstname'] . ' ' . $user_data['lastname']);

    /** @var array $payment_methods */
    $payment_methods = $view->getTemplateVars('payment_methods');
    $payment_methods = fn_lite_checkout_flatten_payments_list($payment_methods);

    $view->assign([
        'lite_checkout_user_data'       => $user_data,
        'lite_checkout_payment_methods' => $payment_methods,
        'completed_steps'               => [
            'step_one' => true,
            'step_two' => true,
        ],
    ]);
} elseif ($mode == 'delete') {
    fn_lite_checkout_restore_chosen_shipping($cart);
}

return [CONTROLLER_STATUS_OK];
