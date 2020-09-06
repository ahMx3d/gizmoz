<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Admin\Utilities;
use App\Http\Controllers\Controller;
use App\Http\Requests\MainCateRequest;
use App\Models\Cate;
use App\Traits\Admin\DBHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainCatesController extends Controller
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
            $cates = Cate::parentCate()->orderBy(
                'id',
                'DESC'
            )->paginate(PAGINATION_COUNT);

            return view(
                'admin.cates.index',
                compact('cates')
            );
        } catch (\Throwable $th) {

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
        return view('admin.cates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainCateRequest $request)
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
                'status'    => $request->input('cate_stat')
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

            return Utilities::redirectWithMSG(
                'main-categories.index',
                'success',
                'store_mess'
            );
        } catch (\Throwable $th) {

            /**
             * Rollback database transactions.
             */
            DB::rollback();

            return Utilities::redirectWithMSG(
                'main-categories.create',
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
             * @param \App\Models\Cate
             * @param int $id
             * @param string $redirectionRoute
             * 
             * @var object || @return \Illuminate\Http\Response
             */
            $cate = $this->getRowByID(
                Cate::class,
                $id,
                'main-categories.index'
            );

            return view(
                'admin.cates.show',
                compact('cate')
            );
        } catch (\Throwable $th) {

            return Utilities::redirectWithMSG(
                'main-categories.index',
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
             * @param \App\Models\Cate
             * @param int $id
             * @param string $redirectionRoute
             * 
             * @var object || @return \Illuminate\Http\Response
             */
            $cate = $this->getRowByID(
                Cate::class,
                $id,
                'main-categories.index'
            );

            return view(
                'admin.cates.edit',
                compact('cate')
            );
        } catch (\Throwable $th) {

            return Utilities::redirectWithMSG(
                'main-categories.index',
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
    public function update(MainCateRequest $request, $id)
    {
        try {

            /**
             * The database category.
             * 
             * @param \App\Models\Cate
             * @param int $id
             * @param string $redirectionRoute
             *
             * @var object || @return \Illuminate\Http\Response
             */
            $cate = $this->getRowByID(
                Cate::class,
                $id,
                'main-categories.index'
            );

            /**
             * Check whether any value is changed.
             */
            if (
                $cate->name != $request->input('cate_name')
                ||
                $cate->slug != $request->input('cate_slug')
                ||
                $cate->status != $request->input('cate_stat')
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
                    'status'    => $request->input('cate_stat')
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

            return Utilities::redirectWithMSG(
                'main-categories.index',
                'success',
                'update_mess'
            );
        } catch (\Throwable $th) {

            /**
             * Rollback database transactions.
             */
            DB::rollback();

            return Utilities::redirectWithMSG(
                'main-categories.edit',
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
             * 
             * @param \App\Models\Cate
             * @param int $id
             * @param string $redirectionRoute
             *
             * @var object || @return \Illuminate\Http\Response
             */
            $cate = $this->getRowByID(
                Cate::class,
                $id,
                'main-categories.index'
            );

            /**
             * Delete Category row from database table.
             * 
             */
            $cate->delete();

            return Utilities::redirectWithMSG(
                'main-categories.index',
                'success',
                'delete_mess'
            );
        } catch (\Throwable $th) {

            return Utilities::redirectWithMSG(
                'main-categories.index',
                'error',
                'catch_error'
            );
        }
    }
}
