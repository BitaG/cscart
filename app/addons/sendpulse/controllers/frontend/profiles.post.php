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

if ($mode == 'success_add' || $mode == 'update') {

    $auto_export_tools_value = Registry::get('addons.sendpulse.auto_export_new_status');
    $one_name_tools_value = Registry::get('addons.sendpulse.one_name_auto_export_new_status');
    $book_id_tools_value = Registry::get('addons.sendpulse.select_auto_export_new_status');

    fn_autoexport_from_sendpulse($auto_export_tools_value, $one_name_tools_value, $book_id_tools_value);
}
