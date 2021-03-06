<?php

namespace App\Helpers\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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

    /**
     * Upload file name to the specified server folder.
     * then return the hashed name to be used while storing into database.
     *
     * @param string $folder
     * @param object $file
     * @return string
     */
    public static function uploadFileGetName($folder, $file)
    {
        if ($file != null) {
            $file->store('/', $folder);
            $fileName = $file->hashName();
            return $fileName;
        } else {
            return null;
        }
    }

    /**
     * Delete file name from the specified server folder.
     *
     * @param string $folder
     * @param string $image
     * @return void
     */
    public static function deleteServerFile($folder, $image)
    {
        $imageName = Str::afterLast($image, '/');

        $filePath = public_path('assets\images\\' . $folder . '\\' . $imageName);

        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    }
}
