<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| General helpers
|--------------------------------------------------------------------------
|
| Here is where you can register General helpers for your application. These
| helpers are loaded by the composer.json within an array which
| contains the "general" functions group. Now create something great!
|
*/

/**
 * The pagination constant.
 *
*/
define('PAGINATION_COUNT', 15);

/**
 * Get css or css-rtl folder based on language direction.
 *
 * @return foldername
 */
function getCSSDirection()
{
    return LaravelLocalization::getCurrentLocaleDirection() == 'ltr'? 'css': 'css-rtl';

    // return app()->getLocale() === 'en'? 'css': 'css-rtl';
}

/**
 * Get style or style-rtl file based on language direction.
 *
 * @return filename
 */
function getStyleDirection()
{
    return LaravelLocalization::getCurrentLocaleDirection() == 'ltr'? 'style': 'style-rtl';

    // return app()->getLocale() === 'en'? 'style': 'style-rtl';
}

/**
 * Get Plugin or Plugin-rtl file based on language direction.
 *
 * @return filename
 */
function getPluginDirection()
{
    return LaravelLocalization::getCurrentLocaleDirection() == 'ltr'? 'plugin': 'plugin-rtl';

    // return app()->getLocale() === 'en'? 'plugin': 'plugin-rtl';
}
