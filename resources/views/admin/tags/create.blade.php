@extends('layouts.admin')
@section('title', __("admin/tags.create_title"))

@section('content')

<div class="app-content content">
        <div class="content-wrapper" style="padding-top: 0">
            @include('admin.tags.partials.card_header')
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4
                                        class="card-title"
                                        id="basic-layout-form">{{ __('admin/tags.create_header_title') }}</h4>
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
                                            action="{{route('tags.store')}}"
                                            method="POST"
                                            enctype="multipart/form-data">

                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="ft-home"></i>
                                                    <span>{{ __('admin/tags.tag_details') }}</span>
                                                </h4>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tag_name">{{ __('admin/tags.tag_name') }}</label>
                                                            <input
                                                                type="text"
                                                                value="{{old('tag_name')}}"
                                                                id="tag_name"
                                                                name="tag_name"
                                                                class="form-control"
                                                                placeholder="{{ __('admin/tags.tag_name_placeholder') }}" />

                                                            @error('tag_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tag_slug">{{ __('admin/tags.tag_slug') }}</label>
                                                            <input
                                                                type="text"
                                                                value="{{old('tag_slug')}}"
                                                                id="tag_slug"
                                                                name="tag_slug"
                                                                class="form-control"
                                                                placeholder="{{ __('admin/tags.tag_slug_placeholder') }}" />

                                                            @error('tag_slug')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div> --}}
                                                </div>

                                            </div>

                                            <div class="form-actions">
                                                <button
                                                    type="button"
                                                    class="btn btn-warning mr-1"
                                                    onclick="history.back();">

                                                    <i class="ft-x"></i>
                                                    <span>{{ __('admin/tags.tag_cancel_action') }}</span>
                                                </button>

                                                <button
                                                    type="submit"
                                                    class="btn btn-primary">

                                                    <i class="la la-check-square-o"></i>
                                                    <span>{{ __('admin/tags.tag_save_action') }}</span>
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
