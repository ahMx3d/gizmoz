<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helpers\Admin\Utilities;
use App\Http\Controllers\Controller;
use App\Repositories\Tags\TagRepositoryInterface;

class TagsController extends Controller
{
    /**
     * Tags Repository.
     *
     * @var object
     */
    private $tagRepository;

    /**
     * Construct list of tags methods.
     *
     * @param \App\Repositories\Tags\TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
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
             * All filtered tag pipelines in a descending order.
             *
             * @var object
             */
            $tags = $this->tagRepository->allTagsDescWithFilters();

            return view(
                'admin.tags.index',
                compact('tags')
            );
        } catch (\Throwable $th) {
            return $th;
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
