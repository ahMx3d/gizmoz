@extends('layouts.admin')

@section('title', $shippingMethod->value)

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">{{__('admin/shipping_methods_edit.main_page')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__('admin/shipping_methods_edit.shipping_methods')}}</li>
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
                                {{-- <h4 --}}
                                    {{-- class="card-title" --}}
                                    {{-- id="basic-layout-form">{{__('admin/shipping_methods_edit.edit_shipping_method')}}</h4> --}}
                                    {{-- id="basic-layout-form">{{$shippingMethod->value}}</h4> --}}
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
                                        action="{{route('update.shipping.methods', $shippingMethod->id)}}"
                                        method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        @if ($shippingMethod->key == 'free_shipping_label')
                                            <input
                                                type="hidden"
                                                name="type"
                                                value="free" />

                                        @elseif ($shippingMethod->key == 'local_pickup_label')
                                            <input
                                                type="hidden"
                                                name="type"
                                                value="local" />

                                        @elseif ($shippingMethod->key == 'flat_rate_label')
                                                <input
                                                    type="hidden"
                                                    name="type"
                                                    value="rate" />

                                        @endif
                                        
                                        <input
                                            type="hidden"
                                            name="id"
                                            value="{{$shippingMethod->id}}" />

                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="ft-home"></i>
                                                {{-- <span>{{__('admin/shipping_methods_edit.details')}}</span> --}}
                                                <span>{{$shippingMethod->value}}</span>
                                            </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ship_name">{{__('admin/shipping_methods_edit.label_name')}}</label>
                                                        <input
                                                            type="text"
                                                            id="ship_name"
                                                            name="ship_name"
                                                            value="{{old('value', $shippingMethod->value)}}"
                                                            class="form-control"
                                                            placeholder="{{__('admin/shipping_methods_edit.label_placeholder')}}" />

                                                        @error('ship_name')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ship_val">{{__('admin/shipping_methods_edit.label_cost')}}</label>
                                                        <input
                                                            type="number"
                                                            id="ship_val"
                                                            name="ship_val"
                                                            value="{{old('plain_value', $shippingMethod->plain_value)}}"
                                                            class="form-control"
                                                            placeholder="{{__('admin/shipping_methods_edit.cost_placeholder')}}" />

                                                        @error('ship_val')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        
                                                    </div>
                                                </div>

                                                {{--margin-top: 37px;--}}
                                                {{-- <div class="col-md-2">
                                                    <div class="form-group offset-xl-4" style="">
                                                        <label
                                                            style="display: block; margin-bottom: 13px;"
                                                            for="switcheryColor4"
                                                            class="card-title mr-1">{{__('admin/shipping_methods_edit.label_status')}}</label>
                                                        <input
                                                            type="checkbox"
                                                            name="vend-stat"
                                                            value="1"
                                                            id="switcheryColor4"
                                                            class="switchery"
                                                            data-color="success"
                                                            checked />

                                                        @error('vend-stat')
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
                                                <span>{{__('admin/shipping_methods_edit.cancel_action')}}</span>
                                            </button>

                                            <button
                                                type="submit"
                                                class="btn btn-primary">

                                                <i class="la la-check-square-o"></i>
                                                <span>{{__('admin/shipping_methods_edit.update_action')}}</span>
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