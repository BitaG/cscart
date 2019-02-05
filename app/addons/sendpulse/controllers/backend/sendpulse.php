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
use Tygh\Addons\Sendpulse\HttpSendPulse;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if($mode=='manage') {

        $user_id_list = $_REQUEST['user_ids'];
        $sendpulse_client = new HttpSendPulse();

        if(!$sendpulse_client ->checkConnect()) {
            fn_set_notification('K', __('sp.name'), $sendpulse_client->getError());
            return array(CONTROLLER_STATUS_OK);
        }

        Tygh::$app['session']['sendpulse_book_list'] = $sendpulse_client->getBookList() ;
        Tygh::$app['session']['sendpulse_export_users'] = array('user_ids' => $_REQUEST['user_ids']);

        unset($_REQUEST['redirect_url']);
        return array(CONTROLLER_STATUS_REDIRECT, 'sendpulse.export') ;
    }

    if($mode=='export') {

        $user_id_list = Tygh::$app['session']['sendpulse_export_users']['user_ids'];
        $book_id = $_REQUEST['sendpulse_book_id'];
        $select_field_list = $_REQUEST['selected_field']; // get selected fields from export
        $is_one_name = false;

        if(!in_array('email', $select_field_list)) {
            fn_set_notification('K', __('sp.name'), __('sp.error.email'));
            return array(CONTROLLER_STATUS_REDIRECT, 'sendpulse.export');
        }

        if(!empty($_REQUEST['one_name'])) { $is_one_name = true; }

        $selected_field = implode(', ',$select_field_list);//collect selected field
        //collect $sql
        $sql = sprintf("SELECT %s FROM ?:users WHERE user_id=?i", $selected_field);
        foreach ($user_id_list as $user_id) {
            $data = db_get_row($sql,$user_id);
            $result_list[] = fn_get_result_for_export($data, $is_one_name);
        }

        $sendpulse_client = new HttpSendPulse();

        if(!$sendpulse_client ->checkConnect()) {
            fn_set_notification('K', __('sp.name'), $sendpulse_client->getError());
            return array( CONTROLLER_STATUS_OK, 'profiles.manage');
        }

        $export_list = array_chunk($result_list, 1000 );

        foreach ($export_list as $export) {
            $sendpulse_client->exportClients( serialize($export), $book_id );//export into SendPulse
        }

        fn_set_notification('S',  __('sp.name'), __('sp.success.message') );
        return array(CONTROLLER_STATUS_OK, 'profiles.manage');
    }
}

if ($mode == 'export'){

    $book_list = Tygh::$app['session']['sendpulse_book_list'];
    $export_fields = fn_get_fields_list();
    $assigned_ids = array('firstname','lastname','email','phone'); // set selected fields by default

    Tygh::$app['view']
        ->assign('book_list', $book_list)
        ->assign('export_fields', $export_fields)
        ->assign('assigned_ids', $assigned_ids);
}
