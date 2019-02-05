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

use Tygh\Settings;
use Tygh\Registry;
use Tygh\Addons\Sendpulse\HttpSendPulse;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_sendpulse_setting_info_handler()
{
    return __('settings_info');
}

function fn_sendpulse_info_text_handler()
{
    return __('info_text');
}

function fn_get_book_list()
{
    $send_pulse_client = new HttpSendPulse();

    if (!$send_pulse_client->checkConnect()) {
        return $lists['error'] = __('sp.error.message.1');
    }

    $book_list = $send_pulse_client ->getBookList();
    return $book_list;
}

function fn_get_fields_list()
{
    $field_list = array_flip(array_keys(db_get_row ("SELECT * FROM ?:users")));
    $exclude_list = array(
        'user_id',
        'user_login',
        'timestamp',
        'tax_exempt',
        'is_root',
        'last_login',
        'password',
        'salt',
        'referer',
        'company_id',
        'last_passwords',
        'password_change_timestamp',
        'api_key',
        'responsible_email',
        'purchase_timestamp_from',
        'purchase_timestamp_to',
    );

    foreach ($exclude_list as $exclude) { unset($field_list[$exclude]); }
    return $field_list;
}

function fn_get_result_for_export($data, $is_one_name)
{
    if($is_one_name) {
        $variables['Имя']= $data['firstname'].' '.$data['lastname'];

        unset($data['firstname']);
        unset($data['lastname']);
    }

    $mail = $data['email'];
    unset($data['email']);

    foreach ($data as $key => $value) { $variables[$key] = $value; }

    $result_list =
        [
            'email'     => $mail,
            'variables' => $variables,
        ];
    return $result_list;
}

function fn_autoexport_from_sendpulse($auto_export_tools_value, $one_name_tools_value, $book_id_tools_value)
{
    if($auto_export_tools_value !== 'N') {
        $is_one_name = false;

        if ($one_name_tools_value !== 'N') { $is_one_name = true; }

        $user_id = Tygh::$app['session']['auth']['user_id'];
        $export_fields = fn_get_fields_list();

        $selected_field = implode(', ', array_flip($export_fields));

        if(!empty($_REQUEST['order_id']))
        {
            $user_id=db_get_field("SELECT user_id FROM ?:orders WHERE order_id=?i",$_REQUEST['order_id']);
        }

        $sql = sprintf('SELECT %s FROM ?:users WHERE user_id=?i', $selected_field);
        $data = db_get_row($sql, $user_id);

        $result_list[] = fn_get_result_for_export($data, $is_one_name);

        $sendpulse_client = new HttpSendPulse();

        if ($sendpulse_client->checkConnect()) {
            $sendpulse_client->exportClients(serialize($result_list), $book_id_tools_value);
        }
    }
}

function fn_sendpulse_push()
{

    $push_js = Settings::instance()->getValue('sp_push_js','sendpulse');
    if($push_js == null)
    {
        return __('sp.push.btn.add');
    }
    return __('sp.push.btn.off');
}

