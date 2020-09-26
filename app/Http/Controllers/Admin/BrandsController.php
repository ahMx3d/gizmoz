<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Helpers\Admin\Utilities;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Repositories\Brands\BrandRepositoryInterface;

class BrandsController extends Controller
{
    /**
     * Brands Repository.
     *
     * @var object
     */
    private $brandRepository;

    /**
     * Construct list of brands methods.
     *
     * @param \App\Repositories\Brands\BrandRepositoryInterface $brandRepository
     */
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
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
             * All filtered brand pipelines in a descending order.
             *
             * @var object
             */
            $brands = $this->brandRepository->allBrandsDescWithFilters();

            return view(
                'admin.brands.index',
                compact('brands')
            );
        } catch (\Throwable $th) {
            // redirect to dashboard with error message.
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
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        try {
            //Store brands into database.
            $this->brandRepository->brandStore($request);

            // Redirect to brands index table with success message.
            return Utilities::redirectWithMSG(
                'brands.index',
                'success',
                'store_mess'
            );
        } catch (\Throwable $th) {
            // Redirect to brands create view with error message.
            return Utilities::redirectWithMSG(
                'brands.create',
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
             * Brand row.
             *
             * @var object
             */
            $brand = $this->brandRepository->findBrandRowById($id);

            // Redirect with error message to the brands index table.
            if (!$brand) return Utilities::redirectWithMSG(
                'brands.index',
                'error',
                'db_error'
            );

            return view(
                'admin.brands.edit',
                compact('brand')
            );
        } catch (\Throwable $th) {
            // Redirect with error message to the brands index table.
            return Utilities::redirectWithMSG(
                'brands.index',
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
    public function update(BrandRequest $request, $id)
    {
        try {
            /**
             * Brand row.
             *
             * @var object
             */
            $brand = $this->brandRepository->findBrandRowById($id);

            // Redirect with error message to the brands index table.
            if (!$brand) return Utilities::redirectWithMSG(
                'brands.index',
                'error',
                'db_error'
            );

            // Update brands into the database.
            $this->brandRepository->brandUpdate(
                $brand,
                $request
            );

            // Redirect with success message to the brands index table.
            return Utilities::redirectWithMSG(
                'brands.index',
                'success',
                'update_mess'
            );
        } catch (\Throwable $th) {
            // Redirect with error message to the brands edit view.
            return Utilities::redirectWithMSG(
                'brands.edit',
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
        //
    }
}
