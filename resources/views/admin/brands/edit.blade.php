@extends('layouts.admin')
@section('title', __("admin/brands.edit_title"))

@section('content')

<div class="app-content content">
        <div class="content-wrapper" style="padding-top: 0">
            @include('admin.brands.partials.card_header')
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4
                                        class="card-title"
                                        id="basic-layout-form">{{ __('admin/brands.edit_header_title') }}</h4>

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
                                    <div class="card-body" style="padding: 0 1.5rem">
                                        <form
                                            class="form"
                                            action="{{route('brands.update', $brand->id)}}"
                                            method="POST"
                                            enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')

                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="ft-home"></i>
                                                    <span>{{ __('admin/brands.brand_details') }}</span>
                                                </h4>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="text-center">
                                                                <img
                                                                    style="width: 100%; height:450px; border-radius:50px"
                                                                    class="{{--rounded-circle--}} {{--height-200--}}"
                                                                    src="{{old('photo', $brand->image)}}"
                                                                    alt="{{$brand->name}} Photo" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label for="brand_name">{{ __('admin/brands.brand_name') }}</label>
                                                            <input
                                                                type="text"
                                                                value="{{old('brand_name', $brand->name)}}"
                                                                id="brand_name"
                                                                name="brand_name"
                                                                class="form-control"
                                                                placeholder="{{ __('admin/brands.brand_name_placeholder') }}" />

                                                            @error('brand_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group offset-md-4">
                                                            <label
                                                                style="display: block; margin-bottom: 13px;"
                                                                for="switcheryColor4"
                                                                class="card-title">{{ __('admin/brands.brand_stat') }}</label>
                                                            <input
                                                                type="checkbox"
                                                                name="brand_stat"
                                                                value="1"
                                                                id="switcheryColor4"
                                                                class="switchery"
                                                                data-color="success"
                                                                {{(old('brand_stat', $brand->status) == true)? 'checked': ''}} />

                                                            @error('brand_stat')
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
                                                            <label for="brand_imag">{{ __('admin/brands.brand_imag') }}</label>
                                                            <input
                                                                type="file"
                                                                class="form-control form-control-lg form-control-file"
                                                                name="brand_imag"
                                                                value="{{ old('brand_imag') }}"
                                                                id="brand_imag" />

                                                            @error('brand_imag')
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
                                                    <span>{{ __('admin/brands.brand_cancel_action') }}</span>
                                                </button>

                                                <button
                                                    type="submit"
                                                    class="btn btn-primary">

                                                    <i class="la la-check-square-o"></i>
                                                    <span>{{ __('admin/brands.brand_update_action') }}</span>
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
