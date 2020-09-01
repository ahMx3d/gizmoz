@extends('layouts.admin')

@section('title', __('admin/profile_edit.title'))

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">{{ __('admin/profile_edit.main_page') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin/profile_edit.page_name') }}</li>
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
                                        action="{{ route('update.admin.profile', $admin->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{ $admin->id }}" />

                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="ft-home"></i>
                                                <span>{{ __('admin/profile_edit.page_title') }}</span>
                                            </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="prof_name">
                                                            {{__('admin/profile_edit.label_name')}}
                                                        </label>
                                                        <input
                                                            type="text"
                                                            id="prof_name"
                                                            name="prof_name"
                                                            value="{{ old('name', $admin->name) }}"
                                                            class="form-control"
                                                            placeholder="{{__('admin/profile_edit.name_placeholder')}}" />

                                                        @error('prof_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="prof_mail">
                                                            {{__('admin/profile_edit.label_mail')}}
                                                        </label>
                                                        <input
                                                            type="email"
                                                            id="prof_mail"
                                                            name="prof_mail"
                                                            value="{{ old('email', $admin->email) }}"
                                                            class="form-control"
                                                            placeholder="{{__('admin/profile_edit.mail_placeholder')}}" />

                                                        @error('prof_mail')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="old_pass">
                                                            {{__('admin/profile_edit.label_old_pass')}}
                                                        </label>
                                                        <input
                                                            type="password"
                                                            id="old_pass"
                                                            name="old_pass"
                                                            value=""
                                                            class="form-control"
                                                            autocomplete="new-password"
                                                            placeholder="{{__('admin/profile_edit.old_pass_placeholder')}}" />

                                                        @error('old_pass')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="password">
                                                            {{__('admin/profile_edit.label_new_pass')}}
                                                        </label>
                                                        <input
                                                            type="password"
                                                            id="password"
                                                            name="password"
                                                            value=""
                                                            class="form-control"
                                                            autocomplete="new-password"
                                                            placeholder="{{__('admin/profile_edit.new_pass_placeholder')}}" />

                                                        @error('password')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="password_confirmation">
                                                            {{__('admin/profile_edit.label_conf_new_pass')}}
                                                        </label>
                                                        <input
                                                            type="password"
                                                            id="password_confirmation"
                                                            name="password_confirmation"
                                                            value=""
                                                            class="form-control"
                                                            autocomplete="new-password"
                                                            placeholder="{{__('admin/profile_edit.conf_new_pass_placeholder')}}" />

                                                        @error('password_confirmation')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-actions">
                                            {{-- <button
                                                type="button"
                                                class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                                
                                                <i class="ft-x"></i>
                                                <span>{{__('admin/shipping_methods_edit.cancel_action')}}</span>
                                            </button> --}}

                                            <button
                                                type="submit"
                                                class="btn btn-primary">

                                                <i class="la la-check-square-o"></i>
                                                <span>{{__('admin/profile_edit.update_action')}}</span>
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