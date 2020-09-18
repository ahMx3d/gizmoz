<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Admin\Utilities;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Cate;
use App\QueryFilters\Category\Create;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class CategoriesController extends Controller
{
    /**
     * Categories repository methods.
     *
     * @var object
     */
    private $categoryRepository;

    /**
     * Construct a listing of categories methods.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            /**
             * All filtered categories pipelines in a descending order.
             *
             * @var object
             */
            $cates = $this->categoryRepository->allCatesDescWithFilters();

            return view(
                'admin.categories.index',
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
             * All filtered main categories pipeline in a descending order.
             *
             * @var object
             */
            $mainCatesForSub = $this->categoryRepository->mainCatesToCreateSubcate();

            return view(
                'admin.categories.create',
                compact('mainCatesForSub')
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // try {

        // } catch (\Throwable $th) {

        // }
        return $request;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
