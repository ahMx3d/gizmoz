@extends('layouts.admin')
@section('title', __("admin/cates.edit_page_title"))

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    <span>{{ __('admin/cates.main_page') }}</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('main-categories.index') }}">
                                    <span>{{ __('admin/cates.main_cates') }}</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <span>{{ __('admin/cates.edit_cate') }}</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4
                                    class="card-title"
                                    id="basic-layout-form">{{ __('admin/cates.edit_header_title') }}</h4>
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
                                <div class="card-body">
                                    <form
                                        class="form"
                                        action="{{route('main-categories.update', $cate->id)}}"
                                        method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        {{-- HIDDEN INPUT TO DEACTIVATE REQUIRED VALIDATIONS --}}
                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{$cate->id}}" />
                                        
                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="ft-home"></i>
                                                <span>{{ __('admin/cates.edit_details') }}</span>
                                            </h4>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="text-center">
                                                            <img
                                                                style="width: 100%; height:450px;"
                                                                class="{{--rounded-circle--}} {{--height-200--}}"
                                                                src=""
                                                                alt="{{ __('admin/cates.td_img_alt') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="cate_name">{{ __('admin/cates.cate_name') }}</label>
                                                        <input
                                                            type="text"
                                                            value="{{old('name', $cate->name)}}"
                                                            id="cate_name"
                                                            name="cate_name"
                                                            class="form-control"
                                                            placeholder="{{ __('admin/cates.cate_name_placeholder') }}" />

                                                        @error('cate_name')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="cate_slug">{{ __('admin/cates.cate_slug') }}</label>
                                                        <input
                                                            type="text"
                                                            value="{{old('cate_slug', $cate->slug)}}"
                                                            id="cate_slug"
                                                            name="cate_slug"
                                                            class="form-control"
                                                            placeholder="{{ __('admin/cates.cate_slug_placeholder') }}" />

                                                        @error('cate_slug')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group text-center" style="{{--margin-top: 30px;--}}">
                                                        <label
                                                            style="display: block; margin-bottom: 13px;"
                                                            for="switcheryColor4"
                                                            class="card-title">{{ __('admin/cates.cate_stat') }}</label>
                                                        <input
                                                            type="checkbox"
                                                            name="cate_stat"
                                                            value="1"
                                                            id="switcheryColor4"
                                                            class="switchery"
                                                            data-color="success"
                                                            {{(old('status', $cate->status) == true)? 'checked': ''}} />

                                                        @error('cate_stat')
                                                            <div>
                                                                <span class="text-danger">{{$message}}</span>
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {{-- <label for="cate_imag">{{ __('admin/cates.cate_imag') }}</label> --}}
                                                        <input
                                                            type="file"
                                                            class="form-control form-control-lg form-control-file"
                                                            name="cate_imag"
                                                            id="cate_imag" />

                                                        @error('cate_imag')
                                                            <div>
                                                                <span class="text-danger">{{$message}}</span>
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-actions">
                                            <button
                                                type="button"
                                                class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                                
                                                <i class="ft-x"></i>
                                                <span>{{ __('admin/cates.cate_cancel_action') }}</span>
                                            </button>

                                            <button
                                                type="submit"
                                                class="btn btn-primary">

                                                <i class="la la-check-square-o"></i>
                                                <span>{{ __('admin/cates.cate_update_action') }}</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

@endsection