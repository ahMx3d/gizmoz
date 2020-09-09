<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\shippingMethodsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SettingsController extends Controller
{
    /**
     * Show shipping methods view.
     * 
     * @param static $type
     * type = free || local || rate
     * 
     * @return view
     */
    public function editShippingMethods($type)
    {
        try {

            // SETTING TYPES CHECKING LIST
            if ($type === 'free') {
                $shippingMethod = Setting::where(
                    'key',
                    '=',
                    'free_shipping_label'
                )->first();
            } else if ($type === 'local') {
                $shippingMethod = Setting::where(
                    'key',
                    '=',
                    'local_pickup_label'
                )->first();
            } else if ($type === 'rate') {
                $shippingMethod = Setting::where(
                    'key',
                    '=',
                    'flat_rate_label'
                )->first();
            } else {
                $shippingMethod = Setting::where(
                    'key',
                    '=',
                    'free_shipping_label'
                )->first();
            }

            return view(
                'admin.settings.shipping_methods.edit',
                compact('shippingMethod')
            );
        } catch (\Throwable $th) {
            return redirect()->route('admin.dashboard')->with([
                'error' => __('admin/alerts.catch_error')
            ]);
        }
    }

    /**
     * Update shipping methods in database.
     * 
     * @param shippingMethodsRequest $request
     * @param integer $id
     * 
     * @return view
     */
    public function updateShippingMethods(shippingMethodsRequest $request, $id)
    {
        try {

            // DATABASE SETTING OF AN ID
            $shippingMethod = Setting::find($id);

            // DATABASE SETTING EXISTANCE CHECK
            if (!$shippingMethod) {
                return redirect()->route(
                    'edit.shipping.methods',
                    $request->type
                )->with([
                    'error' => __('admin/alerts.db_error')
                ]);
            }

            // START DATABASE TRANSACTIONS
            DB::beginTransaction();

            // SAVE DEFAULT SETTING VALUE
            $shippingMethod->update([
                'plain_value' => $request->input('ship_val')
            ]);

            // SAVE SETTING TRANSLATIONS
            $shippingMethod->value = $request->input('ship_name');
            $shippingMethod->save();

            // COMMIT DATABASE TRANSACTIONS
            DB::commit();

            return redirect()->route(
                'edit.shipping.methods',
                $request->type
            )->with([
                'success' => __('admin/alerts.update_mess')
            ]);
        } catch (\Throwable $th) {

            // ROLLBACK DATABASE TRANSACTIONS
            DB::rollback();

            return redirect()->route(
                'edit.shipping.methods',
                $request->type
            )->with([
                'error' => __('admin/alerts.catch_error')
            ]);
        }
    }
}
