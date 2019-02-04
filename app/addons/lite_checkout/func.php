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

use Tygh\Addons\RusCustomerGeolocation\Location;
use Tygh\Addons\RusCustomerGeolocation\RusCustomerGeolocation;
use Tygh\Registry;
use Tygh\Settings;
use Tygh\Tygh;

/**
 * Hook handler: adds searching by state name for cities search.
 *
 * @param array    $params         City search parameters
 * @param string   $lang_code      Two-letter language code
 * @param int      $items_per_page Amount of cities to fetch
 * @param string   $search         City search criterion
 * @param string[] $fields         Fields to fetch from the database
 * @param string[] $join           JOIN part of SQL query
 * @param string[] $condition      Filter conditions
 */
function fn_lite_checkout_rus_cities_find_cities(
    $params,
    $lang_code,
    $items_per_page,
    $search,
    $fields,
    $join,
    &$condition
) {
    $condition['search'] = db_quote(
        'AND (rcd.city LIKE ?l OR sd.state LIKE ?l)',
        $search,
        $search
    );
}

/**
 * Hook handler: adds is_address_required into the list of fetched shipping fields.
 */
function fn_lite_checkout_shippings_get_shippings_list_conditions(
    $group,
    $shippings,
    &$fields,
    $join,
    $condition,
    $order_by
) {
    $fields[] = '?:shippings.is_address_required';
}

/**
 * Installs add-on demo data.
 * Is executed only when installing add-on on the inital store installation.
 */
function fn_lite_checkout_install_demo()
{
    $addons = array('store_locator', 'rus_pickup', 'rus_payments', 'rus_sberbank', 'rus_russianpost');
    foreach ($addons as $addon) {
        fn_install_addon($addon, false, true);
    }

    // disable all the shippings
    db_query('UPDATE ?:shippings SET status = ?s', 'D');
    // disable all the payments
    db_query('UPDATE ?:payments SET status = ?s', 'D');

    $id = fn_update_payment(array(
        'payment'          => __('lite_checkout.demo.payments.cod'),
        'company_id'       => '1',
        'processor_id'     => '',
        'template'         => 'views/orders/components/payments/cod.tpl',
        'payment_category' => 'tab3',
        'usergroup_ids'    => '0',
        'description'      => '',
        'p_surcharge'      => '',
        'a_surcharge'      => '',
        'surcharge_title'  => '',
        'instructions'     => '',
        'status'           => 'A',
        'position'         => 10,
    ), 0);
    fn_ult_update_share_object($id, 'payments', 1);

    $id = fn_update_payment(array(
        'payment'          => __('lite_checkout.demo.payments.phone_ordering'),
        'company_id'       => '1',
        'processor_id'     => '',
        'template'         => 'views/orders/components/payments/phone.tpl',
        'payment_category' => 'tab3',
        'usergroup_ids'    => '0',
        'description'      => '',
        'p_surcharge'      => '',
        'a_surcharge'      => '',
        'surcharge_title'  => '',
        'instructions'     => '',
        'status'           => 'A',
        'position'         => 20,
    ), 0);
    fn_ult_update_share_object($id, 'payments', 1);

    // FIXME: find a better way to attach images
    $_REQUEST['payment_image_image_data'] = $_REQUEST['shipping_image_data'] = array(
        array(
            'detailed_alt' => '',
            'type'         => 'M',
            'object_id'    => 0,
            'position'     => 0,

        ),
    );

    $current_allow_external_uploads = Registry::ifGet('runtime.allow_upload_external_paths', false);
    Registry::set('runtime.allow_upload_external_paths', true, true);

    $_REQUEST['file_payment_image_image_icon'] = array(
        fn_get_theme_path('[themes]/[theme]/media/images/addons/lite_checkout/card.png'),
    );
    $_REQUEST['type_payment_image_image_icon'] = array(
        'server',
    );

    $id = fn_update_payment(array(
        'payment'          => __('lite_checkout.demo.payments.cc'),
        'company_id'       => '1',
        'processor_id'     => '',
        'template'         => 'views/orders/components/payments/cc.tpl',
        'payment_category' => 'tab1',
        'usergroup_ids'    => '0',
        'description'      => '',
        'p_surcharge'      => '',
        'a_surcharge'      => '',
        'surcharge_title'  => '',
        'instructions'     => '',
        'status'           => 'A',
        'position'         => 30,
    ), 0);
    fn_ult_update_share_object($id, 'payments', 1);

    $_REQUEST['file_payment_image_image_icon'] = array(
        fn_get_theme_path('[themes]/[theme]/media/images/addons/lite_checkout/sbrf.png'),
    );

    $id = fn_update_payment(array(
        'payment'          => __('lite_checkout.demo.payments.sberbank'),
        'company_id'       => '1',
        'processor_id'     =>
            db_get_field('SELECT processor_id FROM ?:payment_processors WHERE processor_script = ?s', 'sberbank.php'),
        'payment_category' => 'tab2',
        'usergroup_ids'    => '0',
        'description'      => '',
        'p_surcharge'      => '',
        'a_surcharge'      => '',
        'surcharge_title'  => '',
        'instructions'     => '',
        'status'           => 'A',
        'processor_params' => array(
            'login'    => '',
            'password' => '',
            'mode'     => 'test',
        ),
        'position'         => 40,
    ), 0);
    fn_ult_update_share_object($id, 'payments', 1);

    $pickup_id = db_get_field(
        'SELECT shipping_id FROM ?:shippings AS s'
        . ' LEFT JOIN ?:shipping_services AS ss ON ss.service_id = s.service_id'
        . ' WHERE ss.module = ?s',
        'pickup'
    );
    if ($pickup_id) {
        db_query('UPDATE ?:shippings SET status = ?s, position = ?i, is_address_required = ?s WHERE shipping_id = ?i',
            'A',
            10,
            'N',
            $pickup_id
        );
    }

    $manual_id = db_get_field(
        'SELECT shipping_id FROM ?:shippings AS s WHERE service_id = ?i', 0
    );
    if ($manual_id) {
        db_query('UPDATE ?:shippings SET status = ?s, position = ?i WHERE shipping_id = ?i',
            'A',
            20,
            $manual_id
        );
        db_query('UPDATE ?:shipping_descriptions SET shipping = ?s WHERE shipping_id = ?i', 'Доставка курьером',
            $manual_id);
    }

    $_REQUEST['file_shipping_image_icon'] = array(
        fn_get_theme_path('[themes]/[theme]/media/images/addons/lite_checkout/sdek.png'),
    );
    $_REQUEST['type_shipping_image_icon'] = array(
        'server',
    );

    $id = fn_update_shipping(array(
        'shipping'            => __('lite_checkout.demo.shippings.sdek'),
        'description'         => '',
        'rate_calculation'    => 'R',
        'carrier'             => 'СДЭК',
        'service_id'          => db_get_field('SELECT service_id FROM ?:shipping_services WHERE module = ?s', 'sdek'),
        'test_weight'         => '0',
        'delivery_time'       => '',
        'min_weight'          => '0.000',
        'max_weight'          => '',
        'company_id'          => '1',
        'status'              => 'A',
        'is_address_required' => 'Y',
        'usergroup_ids'       => '0',
        'free_shipping'       => 'N',
        'service_params'      => array(
            'authlogin'          => '',
            'authpassword'       => '',
            'dateexecute'        => '0',
            'country'            => '',
            'state'              => '',
            'sendercityid'       => '',
            'from_city_id'       => '',
            'sendercitypostcode' => '',
            'tariffid'           => '136',
            'width'              => '',
            'height'             => '',
            'length'             => '',
        ),
    ), 0);
    fn_ult_update_share_object($id, 'shippings', 1);

    $_REQUEST['file_shipping_image_icon'] = array(
        fn_get_theme_path('[themes]/[theme]/media/images/addons/lite_checkout/pochta-ru.png'),
    );

    $pochta_ru_id = db_get_field(
        'SELECT shipping_id FROM ?:shippings AS s'
        . ' LEFT JOIN ?:shipping_services AS ss ON ss.service_id = s.service_id'
        . ' WHERE ss.module = ?s',
        'russian_post'
    );
    if ($pochta_ru_id) {
        db_query(
            'UPDATE ?:shippings SET status = ?s, position = ?i WHERE shipping_id = ?i',
            'A',
            40,
            $pochta_ru_id
        );
        db_query(
            'UPDATE ?:shipping_descriptions SET shipping = ?s WHERE shipping_id = ?i',
            __('lite_checkout.demo.shippings.pochta_ru'),
            $pochta_ru_id
        );
        fn_attach_image_pairs('shipping', 'shipping', $pochta_ru_id);
    }

    Registry::set('runtime.allow_upload_external_paths', $current_allow_external_uploads, true);

    // Disable "Contacts" link
    db_query('UPDATE ?:static_data SET status = ?s WHERE class = ?s', 'D', 'ty-quick-menu__contacts');

    // Disable "Pickup" link
    db_query('UPDATE ?:static_data SET status = ?s WHERE class = ?s', 'D', 'ty-quick-menu__pickup');

    // Disable sidebar on checkout
    db_query('UPDATE ?:bm_grids SET status = ?s WHERE user_class = ?s', 'D', 'side-grid');

    // Enable checkout from cart page
    $settings = Settings::instance();
    $settings->updateValue('checkout_redirect', 'Y');

    fn_clear_cache();
}

/**
 * Hook handler: disables shipping recalculation on every single action on checkout.
 *
 * @param array  $cart              Cart content
 * @param bool[] $completed_steps   Checkout steps
 * @param bool   $needs_calculation Check result
 */
function fn_lite_checkout_checkout_step_needs_shipping_calculation_post($cart, $completed_steps, &$needs_calculation)
{
    $needs_calculation = $cart['recalculate'] || $cart['calculate_shipping'];
}

/**
 * Splits full customer name into first name and last name and stores them in the cart.
 *
 * @param string $name Customer full name
 * @param array  $cart Cart contents
 */
function fn_lite_checkout_set_name($name = '', &$cart = array())
{
    $name_parts = explode(' ', $name, 2);
    $firstname = array_shift($name_parts);
    $lastname = $name_parts ? reset($name_parts) : '';

    $cart['user_data']['firstname'] =
    $cart['user_data']['s_firstname'] =
    $cart['user_data']['b_firstname'] = $firstname;

    $cart['user_data']['lastname'] =
    $cart['user_data']['s_lastname'] =
    $cart['user_data']['b_lastname'] = $lastname;
}

/**
 * Backs the chosen shipping method up and removes it from the cart to prevent recalculation when adding a product
 * to the cart.
 *
 * @param array $cart Cart contents
 */
function fn_lite_checkout_backup_chosen_shipping(&$cart = array())
{
    if (!empty($cart['chosen_shipping'])) {
        $cart['stored_chosen_shipping'] = $cart['chosen_shipping'];
        unset($cart['chosen_shipping']);
    }
}

/**
 * Restores previously backed up chosen shipping method.
 *
 * @param array $cart Cart contents
 */
function fn_lite_checkout_restore_chosen_shipping(&$cart = array())
{
    if (!empty($cart['stored_chosen_shipping'])) {
        $cart['chosen_shipping'] = $cart['stored_chosen_shipping'];
        unset($cart['stored_chosen_shipping']);
    }
}

/**
 * Converts the tabbed payment methods list to a flat one.
 *
 * @param array $payment_methods_list Payment methods list
 *
 * @return array
 */
function fn_lite_checkout_flatten_payments_list($payment_methods_list = array())
{
    $payment_methods_list_flat = array();
    if ($payment_methods_list) {
        foreach ($payment_methods_list as $methods) {
            foreach($methods as $id => $method) {
                $payment_methods_list_flat[$id] = $method;
            }
        }
    }

    usort($payment_methods_list_flat, function($p1, $p2) {
        return (int) $p1['position'] > $p2['position'];
    });

    return $payment_methods_list_flat;
}

/**
 * Checks whether shipping recalculation is required based on the current request, session state and server variables.
 *
 * @param array                   $request Request variables
 * @param \Tygh\Web\Session|array $session Session
 * @param array                   $server  Server variables
 *
 * @return bool
 */
function fn_lite_checkout_is_shipping_recalculation_required(array $request, $session, array $server)
{
    $recalculation_schema = fn_get_schema('lite_checkout', 'shipping_recalculation');

    $storages_list = array('request' => $request, 'session' => $session, 'server' => $server);

    foreach ($storages_list as $storage_type => $storage) {
        if (!isset($recalculation_schema[$storage_type])) {
            continue;
        }

        $storage_recalculation_rules = $recalculation_schema[$storage_type];

        foreach ($storage_recalculation_rules as $field => $recalculation_rule) {
            if (!isset($storage[$field])) {
                continue;
            }

            if ($recalculation_rule === true) {
                return $recalculation_rule;
            }

            $rule_checker_function_name = null;
            $rule_checker_function_args = [
                $storage[$field],
                $storage,
                $field,
                $storage_recalculation_rules,
                $storages_list,
                $recalculation_schema,
            ];

            if (is_string($recalculation_rule)) {
                $rule_checker_function_name = $recalculation_rule;
            } elseif (is_array($recalculation_rule)) {
                $rule_checker_function_name = array_shift($recalculation_rule);
                $rule_checker_function_args = array_merge($rule_checker_function_args, $recalculation_rule);
            }

            if (is_callable($rule_checker_function_name)) {
                return call_user_func_array($rule_checker_function_name, $rule_checker_function_args);
            }
        }
    }

    return false;
}

/**
 * Populates missing location fields in $cart['user_data'] with the data from the specified location object.
 *
 * @param array                                                           $user_data User data to populate fields for
 * @param \Tygh\Addons\RusCustomerGeolocation\RusCustomerGeolocation|null $manager   Location manager
 * @param \Tygh\Addons\RusCustomerGeolocation\Location|null               $location  Location to populate fields from
 *
 * @return array Populated user data and flag indicating whether it was changed
 */
function fn_lite_checkout_fill_user_data_from_location(
    array $user_data,
    RusCustomerGeolocation $manager = null,
    Location $location = null
) {
    if ($manager === null) {
        $manager = Tygh::$app['rus_customer_geolocation'];
    }

    if ($location === null) {
        $location = Tygh::$app['rus_customer_geolocation.default_location'];
    }

    $country = $manager->getLocationField($user_data, 'country');
    $state = $manager->getLocationField($user_data, 'state');
    $city = $manager->getLocationField($user_data, 'city');
    $zipcode = $manager->getLocationField($user_data, 'zipcode');

    $is_default_country = $country === $location->getCountry();
    $is_default_state = $state === ($location->getState() ?: $location->getStateName());
    $is_default_city = $city === $location->getCity();
    $is_location_changed = false;

    if (!$country) {
        $user_data['country'] = $location->getCountry();
        $is_default_country = $is_location_changed = true;
    }

    if (!$state && $is_default_country) {
        $user_data['state'] = $location->getState() ?: $location->getStateName();
        $is_default_state = $is_location_changed = true;
    }

    if (!$city && $is_default_state) {
        $user_data['city'] = $location->getCity();
        $is_default_city = $is_location_changed = true;
    }

    if (!$zipcode && $is_default_city) {
        $user_data['zipcode'] = $location->getZipcode();
        $is_location_changed = true;
    }

    if ($is_location_changed) {
        $user_data = $manager
            ->setIsDetected(true)
            ->setLocationFromArray($user_data)
            ->storeLocation();
    }

    return [$user_data, $is_location_changed];
}
