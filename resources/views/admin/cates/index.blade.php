@extends('layouts.admin')
@section('title', __("admin/cates.page_title"))

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">{{ __('admin/cates.main_cates') }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    <span>{{ __('admin/cates.main_page') }}</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('main-categories.index') }}">{{ __('admin/cates.main_cates') }}</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('main-categories.create') }}">{{ __('admin/cates.add_new') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('admin/cates.index_header_title') }}</h4>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="ft-minus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="reload">
                                                <i class="ft-rotate-cw"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="expand">
                                                <i class="ft-maximize"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="close">
                                                <i class="ft-x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard" style="overflow-x: auto;">
                                <table class="table table-responsive display nowrap table-striped table-bordered{{--  scroll-horizontal --}}">
                                        <thead>
                                        <tr>
                                            <th class="text-center">{{ __('admin/cates.th_name') }}</th>
                                            <th class="text-center">{{ __('admin/cates.th_seo') }}</th>
                                            <th class="text-center">{{ __('admin/cates.th_image') }}</th>
                                            <th class="text-center">{{ __('admin/cates.th_status') }}</th>
                                            <th class="text-center">{{ __('admin/cates.th_actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        {{-- DB LANGUAGES --}}
                                        @isset($cates)
                                            @foreach($cates as $cate)
                                            
                                                <tr>
                                                    <td class="text-center">{{ $cate->name }}</td>
                                                    <td class="text-center">{{ $cate->slug }}</td>
                                                    <td class="text-center">
                                                        <img
                                                            style="width: 100%; {{--height:100%;--}}"
                                                            src=""
                                                            alt="{{ __('admin/cates.td_img_alt') }}" />
                                                    </td>
                                                    <td class="text-center">{{ $cate->getStatus() }}</td>
                                                    <td class="text-center">
                                                        <div
                                                            class="btn-group"
                                                            role="group"
                                                            aria-label="Basic example">
                                                            
                                                            <a
                                                                href="{{ route('main-categories.edit', $cate->id) }}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                                                
                                                                <span>{{ __('admin/cates.td_edit') }}</span>
                                                            </a>
                                                            
                                                            {{-- <a
                                                                href=""
                                                                class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                            
                                                                <span>
                                                                    @if ($cate->status === true)
                                                                    {{ __('admin/cates.td_deactivate') }}
                                                                    @else
                                                                    {{ __('admin/cates.td_activate') }}
                                                                    @endif
                                                                </span>
                                                            </a> --}}
                                                            
                                                            <form
                                                                action="{{ route('main-categories.destroy', $cate->id) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    <span>{{ __('admin/cates.td_destroy') }}</span>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {!! $cates->links() !!}

                                        @endisset
                                        
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection