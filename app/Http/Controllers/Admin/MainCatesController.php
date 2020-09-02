<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCateRequest;
use App\Models\Cate;
use Illuminate\Http\Request;

class MainCatesController extends Controller
{
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

            return redirect(route('admin.dashboard'))->with([
                'error' => __('admin/alerts.catch_error')
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
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
            $cate = Cate::find($id);

            /**
             * Check category existance
             */
            if (!$cate) {
                return redirect(route('main-categories.index'))->with([
                    'error' => __('admin/alerts.db_error')
                ]);
            }

            return view(
                'admin.cates.edit',
                compact('cate')
            );
        } catch (\Throwable $th) {

            return redirect(route('main-categories.index'))->with([
                'error' => __('admin/alerts.catch_error')
            ]);
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
             * @var object
             */
            $cate = Cate::find($id);

            /**
             * Check category existance.
             */
            if (!$cate) {
                return redirect(route('main-categories.index'))->with([
                    'error' => __('admin/alerts.db_error')
                ]);
            }

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
            }

            return redirect(route('main-categories.index'))->with([
                'success' => __('admin/alerts.update_mess')
            ]);
        } catch (\Throwable $th) {

            return redirect(route('main-categories.edit', $id))->with([
                'error' => __('admin/alerts.catch_error')
            ]);
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
        //
    }
}
