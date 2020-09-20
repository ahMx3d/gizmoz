<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Admin\Utilities;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Cate;
use App\QueryFilters\Category\Create;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

            // Redirect with error message to the categories index table.
            return Utilities::redirectWithMSG(
                'categories.index',
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
        try {
            //Store categories into the database.
            $this->categoryRepository->cateStore($request);

            // Redirect to categories index table with success message.
            return Utilities::redirectWithMSG(
                'categories.index',
                'success',
                'store_mess'
            );
        } catch (\Throwable $th) {
            // Redirect to categories create view with error message.
            return Utilities::redirectWithMSG(
                'categories.create',
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
             * Category row.
             *
             * @var object
             */
            $cate = $this->categoryRepository->findCateRowById($id);

            // Redirect with error message to the categories index table.
            if (!$cate) return Utilities::redirectWithMSG(
                'categories.index',
                'error',
                'db_error'
            );

            return view(
                'admin.categories.show',
                compact('cate')
            );
        } catch (\Throwable $th) {
            // Redirect with error message to the categories index table.
            return Utilities::redirectWithMSG(
                'categories.index',
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
             * Category row.
             *
             * @var object
             */
            $cate = $this->categoryRepository->findCateRowById($id);

            // Redirect with error message to the categories index table.
            if (!$cate) return Utilities::redirectWithMSG(
                'categories.index',
                'error',
                'db_error'
            );

            /**
             * All filtered main categories pipeline in a descending order.
             *
             * @var object
             */
            $mainCatesForSub = $this->categoryRepository->mainCatesToEditSubcate();

            return view(
                'admin.categories.edit',
                compact(
                    'cate',
                    'mainCatesForSub'
                )
            );
        } catch (\Throwable $th) {
            // Redirect with error message to the categories index table.
            return Utilities::redirectWithMSG(
                'categories.index',
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
    public function update(CategoryRequest $request, $id)
    {
        try {
            /**
             * Category row.
             *
             * @var object
             */
            $cate = $this->categoryRepository->findCateRowById($id);

            // Redirect with error message to the categories index table.
            if (!$cate) return Utilities::redirectWithMSG(
                'categories.index',
                'error',
                'db_error'
            );

            // Update categories into the database.
            $this->categoryRepository->cateUpdate(
                $cate,
                $request
            );

            // Redirect with success message to the categories index table.
            return Utilities::redirectWithMSG(
                'categories.index',
                'success',
                'update_mess'
            );
        } catch (\Throwable $th) {
            // Redirect with error message to the categories edit view.
            return Utilities::redirectWithMSG(
                'categories.edit',
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
             * Category row.
             *
             * @var object
             */
            $cate = $this->categoryRepository->findCateRowById($id);

            // Redirect with error message to the categories index table.
            if (!$cate) return Utilities::redirectWithMSG(
                'categories.index',
                'error',
                'db_error'
            );

            // Delete categories from the database.
            $this->categoryRepository->cateDelete($cate);

            // Redirect with success message to the categories index table.
            return Utilities::redirectWithMSG(
                'categories.index',
                'success',
                'delete_mess'
            );
        } catch (\Throwable $th) {
            // Redirect with error message to the categories index table.
            return Utilities::redirectWithMSG(
                'categories.index',
                'error',
                'catch_error'
            );
        }
    }
}
