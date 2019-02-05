<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2019 SendPulse                                                     *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($mode == 'complete') {

    $auto_export_tools_value = Registry::get('addons.sendpulse.auto_export_new_order');
    $one_name_tools_value = Registry::get('addons.sendpulse.one_name_auto_export_new_order');
    $book_id_tools_value = Registry::get('addons.sendpulse.select_auto_export_new_order');

    fn_autoexport_from_sendpulse($auto_export_tools_value, $one_name_tools_value, $book_id_tools_value);
}
