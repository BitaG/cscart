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

namespace Tygh\Enum\Addons\Pickup;

/**
 * @package Tygh\Enum;
 */
class MapLanguages
{

    const EN = 'en';
    const RU = 'ru';
    const TR = 'tr';
    const UA = 'ua';

    /**
     * Gets list of language for maps localization.
     *
     * @return array
     */
    public static function getLanguages()
    {
        return array(
            self::EN,
            self::RU,
            self::TR,
            self::UA,
        );
    }
}
