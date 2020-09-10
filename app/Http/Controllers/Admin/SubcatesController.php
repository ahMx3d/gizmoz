<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Admin\Utilities;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CateRequest;
use App\Models\Cate;
use App\Traits\Admin\DBHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcatesController extends Controller
{

    /**
     * Inherit a listing of database helper methods.
     *
     */
    use DBHelpers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            /**
             * The database categories.
             * 
             * @var object
             */
            $cates = Cate::childCate()->orderBy(
                'id',
                'DESC'
            )->paginate(PAGINATION_COUNT);

            return view(
                'admin.subcates.index',
                compact('cates')
            );
        } catch (\Throwable $th) {

            // Redirect with error message to the admin dashboard.
            return Utilities::redirectWithMSG(
                'admin.dashboard',
                'error',
                'catch_error'
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {

            /**
             * The database categories.
             * 
             * @var object
             */
            $cates = Cate::parentCate()->get();

            return view(
                'admin.subcates.create',
                compact('cates')
            );
        } catch (\Throwable $th) {

            // Redirect with error message to the subcategories index.
            return Utilities::redirectWithMSG(
                'subcategories.index',
                'error',
                'catch_error'
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateRequest $request)
    {
        try {

            /**
             * Check whether request has status checked box.
             */
            if (!$request->has('cate_stat')) {

                /**
                 * Add request status value of zero.
                 */
                $request->request->add([
                    'cate_stat' => 0
                ]);
            } else {

                /**
                 * Add request status value of one.
                 */
                $request->request->add([
                    'cate_stat' => 1
                ]);
            }

            /**
             * Start database transactions.
             */
            DB::beginTransaction();

            /**
             * Update slug & status in cates table.
             */
            $cate = Cate::create([
                'slug'      => $request->input('cate_slug'),
                'status'    => $request->input('cate_stat'),
                'parent_id' => $request->input('cate_main')
            ]);

            /**
             * Update name in cate_translations table.
             */
            $cate->name = $request->input('cate_name');
            $cate->save();

            /**
             * Commit database transactions.
             */
            DB::commit();
            
            // Redirect with success message to the subcategories index.
            return Utilities::redirectWithMSG(
                'subcategories.index',
                'success',
                'store_mess'
            );
        } catch (\Throwable $th) {

            /**
             * Rollback database transactions.
             */
            DB::rollback();

            // Redirect with error message to the subcategories create.
            return Utilities::redirectWithMSG(
                'subcategories.create',
                'error',
                'catch_error'
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            /**
             * The database category.
             * 
             * @var object
             */
            $cate = $this->getRowByID(
                Cate::class,
                $id
            );

            if (!$cate) {
                // Redirect with error message to the subcategories index.
                return Utilities::redirectWithMSG(
                    'subcategories.index',
                    'error',
                    'db_error'
                );
            }

            return view(
                'admin.subcates.show',
                compact('cate')
            );
        } catch (\Throwable $th) {

            // Redirect with error message to the subcategories index.
            return Utilities::redirectWithMSG(
                'subcategories.index',
                'error',
                'catch_error'
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            /**
             * The database category.
             * 
             * @var object
             */
            $cate = $this->getRowByID(
                Cate::class,
                $id
            );

            if (!$cate) {
                // Redirect with error message to the subcategories index.
                return Utilities::redirectWithMSG(
                    'subcategories.index',
                    'error',
                    'db_error'
                );
            }

            /**
             * The database categories.
             * 
             * @var object
             */
            $mainCates = Cate::parentCate()->get();

            return view(
                'admin.subcates.edit',
                compact(
                    'cate',
                    'mainCates'
                )
            );
        } catch (\Throwable $th) {

            // Redirect with error message to the subcategories index.
            return Utilities::redirectWithMSG(
                'subcategories.index',
                'error',
                'catch_error'
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateRequest $request, $id)
    {
        try {

            /**
             * The database category.
             * 
             * @var object
             */
            $cate = $this->getRowByID(
                Cate::class,
                $id
            );

            if (!$cate) {
                // Redirect with error message to the subcategories index.
                return Utilities::redirectWithMSG(
                    'subcategories.index',
                    'error',
                    'db_error'
                );
            }

            // Check whether any value is changed.
            if (
                $cate->name != $request->input('cate_name')
                ||
                $cate->slug != $request->input('cate_slug')
                ||
                $cate->status != $request->input('cate_stat')
                ||
                $cate->parent_id != $request->input('cate_main')
            ) {

                /**
                 * Check whether request has status checked box.
                 */
                if (!$request->has('cate_stat')) {

                    /**
                     * Add request status value of zero.
                     */
                    $request->request->add([
                        'cate_stat' => 0
                    ]);
                } else {

                    /**
                     * Add request status value of one.
                     */
                    $request->request->add([
                        'cate_stat' => 1
                    ]);
                }

                /**
                 * Start database transactions.
                 */
                DB::beginTransaction();

                /**
                 * Update slug & status in cates table.
                 */
                $cate->update([
                    'slug'      => $request->input('cate_slug'),
                    'status'    => $request->input('cate_stat'),
                    'parent_id' => $request->input('cate_main')
                ]);

                /**
                 * Update name in cate_translations table.
                 */
                $cate->name = $request->input('cate_name');
                $cate->save();

                /**
                 * Commit database transactions.
                 */
                DB::commit();
            }

            // Redirect with success message to the subcategories index.
            return Utilities::redirectWithMSG(
                'subcategories.index',
                'success',
                'update_mess'
            );
        } catch (\Throwable $th) {

            /**
             * Rollback database transactions.
             */
            DB::rollback();

            // Redirect with error message to the subcategories edit.
            return Utilities::redirectWithMSG(
                'subcategories.edit',
                'error',
                'catch_error',
                $id
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            /**
             * The database category.
             * @var object
             */
            $cate = $this->getRowByID(
                Cate::class,
                $id
            );

            if (!$cate) {
                // Redirect with error message to the subcategories index.
                return Utilities::redirectWithMSG(
                    'subcategories.index',
                    'error',
                    'db_error'
                );
            }

            /**
             * Delete Category row from database table.
             * 
             */
            $cate->delete();

            // Redirect with success message to the subcategories index.
            return Utilities::redirectWithMSG(
                'subcategories.index',
                'success',
                'delete_mess'
            );
        } catch (\Throwable $th) {

            // Redirect with error message to the subcategories index.
            return Utilities::redirectWithMSG(
                'subcategories.index',
                'error',
                'catch_error'
            );
        }
    }
}
