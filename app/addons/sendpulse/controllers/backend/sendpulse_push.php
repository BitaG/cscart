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
use Tygh\Ajax;

use Tygh\Addons\Sendpulse\HttpSendPulse;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($mode == 'init'){
    if (defined('AJAX_REQUEST'))
    {

        $sendpulse_client = new HttpSendPulse();
        if( !$sendpulse_client->checkConnect())
        {
            fn_set_notification('K', __('sp.name'), $sendpulse_client->getError());
            exit();
        }

        fn_set_notification('N',  __('sp.name'), $push_js_url);
        exit();

        $push_js_url = $sendpulse_client->getPushJsUrl( fn_url('') );
        if(empty($push_js_url))
        {
            fn_set_notification('N',  __('sp.name'), $sendpulse_client->getError() );
            exit();
        }


        Registry::set('addons.sendpulse.sp_push_js', $push_js_url);

        $file_name_list = array('sp-push-manifest.json', 'sp-push-worker.js');

        //add js core files
        foreach ( $file_name_list as $file_name)
        {
            if(!file_exists(DIR_ROOT.'/'.$file_name))
            {
                copy ('app/addons/sendpulse/resource/'.$file_name, DIR_ROOT.'/'.$file_name);
            }
        }

        $msg = Registry::get('addons.sendpulse.sp_push_js');
        fn_set_notification('N',  __('sp.name'), __('sp.push.success'));
        exit();
    }

}

if ($mode == 'delete'){
    if (defined('AJAX_REQUEST'))
    {

        Registry::set('addons.sendpulse.sp_push_js', null);

        $file_name_list = array(
            'sp-push-manifest.json',
            'sp-push-worker.js'
        );

        foreach ( $file_name_list as $file_name)
        {
            if(file_exists(DIR_ROOT.'/'.$file_name))
            {
               if( unlink ( DIR_ROOT.'/'.$file_name ) )
               {
                   fn_set_notification('N', 'SendPulse', __('sp.push.off'));
               }
            }
        }

        exit();
    }

}
