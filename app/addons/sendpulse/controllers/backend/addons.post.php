<?php
///***************************************************************************
// *                                                                          *
// *   (c) 2019 SendPulse                                                     *
// *                                                                          *
// * This  is  commercial  software,  only  users  who have purchased a valid *
// * license  and  accept  to the terms of the  License Agreement can install *
// * and use this program.                                                    *
// *                                                                          *
// ****************************************************************************
// * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
// * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
// ****************************************************************************/
//
//use Tygh\Registry;
//
//if ($mode == 'update') {
//
//    $file_name_list = array(
//        'sp-push-manifest.json',
//        'sp-push-worker.js'
//    );
//    $push_checkbox = Registry::get('addons.sendpulse.push_checkbox');
//
//    if($push_checkbox == 'Y')
//    {
//
//        foreach ( $file_name_list as $file_name)
//        {
//            if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$file_name))
//            {
////                copy('app/addons/sendpulse/resource/'.$file_name, $_SERVER['DOCUMENT_ROOT'].'/'.$file_name);
//                echo $file_name.'-dont find in root <br>';
//                copy ('app/addons/sendpulse/resource/'.$file_name, $_SERVER['DOCUMENT_ROOT'].'/'.$file_name);
//            }
//
//
//            if(file_exists('app/addons/sendpulse/resource/'.$file_name)){echo'CATCH '.$file_name.'<br>';}
//        }
//
//
//
//    }
//
//}
