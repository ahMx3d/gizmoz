<?php

namespace App\Helpers\Admin;

/*
|--------------------------------------------------------------------------
| Utilities helpers
|--------------------------------------------------------------------------
|
| Here is where you can register utilities helpers for your application. These
| helpers are loaded by the composer.json within an array which
| contains the "utilities" methods group. Now create something great!
|
*/

class Utilities
{


    /**
     * Redirect with session message to the specified route.
     *
     * @param  string  $routeName
     * @param  string  $msgType
     * @param  string  $msg
     * @param  int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    public static function redirectWithMSG($routeName, $msgType, $msg, $id = null)
    {
        if ($id === null) {

            return redirect(
                route(
                    $routeName
                )
            )->with([
                $msgType => __('admin/alerts.' . $msg . '')
            ]);
        }

        return redirect(
            route(
                $routeName,
                $id
            )
        )->with([
            $msgType => __('admin/alerts.' . $msg . '')
        ]);
    }
}
