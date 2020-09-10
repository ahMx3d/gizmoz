<?php

namespace App\Traits\Admin;

trait DBHelpers
{

    /**
     * Get the specified row from database.
     *
     * @param  \App\Models\Model  $modelName
     * @param  int  $id
     * 
     * @return object
     */
    private function getRowByID($modelName, $id)
    {
        /**
         * The database row.
         * 
         * @var object
         */
        return $modelName::find($id);
    }
}
