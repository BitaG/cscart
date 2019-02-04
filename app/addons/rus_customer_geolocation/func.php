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

use Tygh\Addons\RusCustomerGeolocation\RusCustomerGeolocation;

defined('BOOTSTRAP') or die('Access denied');

/**
 * Hook handler: removes stored location from session.
 */
function fn_rus_customer_geolocation_user_logout_after()
{
    fn_delete_session_data(RusCustomerGeolocation::SESSION_STORAGE_KEY);
}
