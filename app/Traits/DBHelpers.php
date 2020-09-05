<?php

namespace App\Traits;

trait DBHelpers
{

    /**
     * Get the specified row from database.
     *
     * @param  \App\Models\Model  $modelName
     * @param  int  $id
     * @param  string  $redirectionRoute
     * 
     * @return \Illuminate\Http\Response || @return object $row
     */
    public function getRowByID($modelName,$id, $redirectionRoute)
    {
        /**
         * The database row.
         * 
         * @var object
         */
        $row = $modelName::find($id);

        /**
         * Check row existance
         */
        if (!$row) {
            return redirect(route($redirectionRoute))->with([
                'error' => __('admin/alerts.db_error')
            ]);
        }

        return $row;
    }
}
