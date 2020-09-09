<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    /**
     * Selects admin data from database to be edited.
     *
     * @return view
     * @return admin
     */
    public function edit()
    {
        // ADMIN DB DATA
        $admin = auth('admin')->user();

        return view(
            'admin.profile.edit',
            compact('admin')
        );
    }

    /**
     * Updates admin data into database.
     *
     * @param request
     * @param id
     * 
     * @return view
     */
    public function update(ProfileRequest $request, $id)
    {
        try {

            // ADMIN DB DATA
            $admin = Admin::find($id);

            // ADMIN DB EXISTANCE CHECK
            if (!$admin) {
                return redirect(route(
                    'admin.dashboard'
                ))->with([
                    'error' => __('admin/alerts.db_error')
                ]);
            }

            // ADMIN DATA CHANGED FROM DB DATA CHECK
            if (
                $admin->name != $request->input('prof_name')
                ||
                $admin->email != $request->input('prof_mail')
            ) {
                
                // UPDATE ADMIN DATA INTO DB
                $admin->update([
                    'name' => $request->input('prof_name'),
                    'email' => $request->input('prof_mail')
                ]);
            }

            // ADMIN PASSWORD CHANGED FROM DB DATA CHECK
            if (
                $request->filled('password')
            ) {
                
                // UPDATE ADMIN PASSWORD INTO DB
                $admin->update([
                    'password' => $request->input('password')
                ]);
            }

            return redirect(route(
                'edit.admin.profile'
            ))->with([
                'success' => __('admin/alerts.update_mess')
            ]);
        } catch (\Throwable $th) {
            return redirect(route(
                'admin.dashboard'
            ))->with([
                'error' => __('admin/alerts.catch_error')
            ]);
        }
    }

}
