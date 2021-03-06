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

include_once(__DIR__ . '/blocks.functions.php');

$schema['banners'] = array(
    'function' => 'fn_ult_clone_layout_block_configured_by_filling',
    'config' => array(
        'fillings_handlers' => array(
            'manually' => array('fn_ult_clone_layout_block_banners_filling_by_manually')
        )
    )
);

return $schema;