@extends('layouts.admin')
@section('title', __("admin/cates.edit_title"))

@section('content')

<div class="app-content content">
        <div class="content-wrapper">
            @include('admin.categories.partials.card_header')
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    @if (request('edit') == 'main')
                                    <h4
                                        class="card-title"
                                        id="basic-layout-form">{{ __('admin/cates.main_cate_edit_header_title') }}</h4>
                                    @else
                                    <h4
                                        class="card-title"
                                        id="basic-layout-form">{{ __('admin/cates.subcate_edit_header_title') }}</h4>
                                    @endif
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
                                            action="{{route('categories.update', $cate->id)}}"
                                            method="POST"
                                            enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')

                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="ft-home"></i>
                                                    <span>{{ __('admin/cates.create_details') }}</span>
                                                </h4>

                                                <div class="row">

                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="cate_name">{{ __('admin/cates.cate_name') }}</label>
                                                            <input
                                                                type="text"
                                                                value="{{old('cate_name', $cate->name)}}"
                                                                id="cate_name"
                                                                name="cate_name"
                                                                class="form-control"
                                                                placeholder="{{ __('admin/cates.cate_name_placeholder') }}" />

                                                            @error('cate_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                    {{-- <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cate_slug">{{ __('admin/cates.cate_slug') }}</label>
                                                            <input
                                                                type="text"
                                                                value="{{old('cate_slug')}}"
                                                                id="cate_slug"
                                                                name="cate_slug"
                                                                class="form-control"
                                                                placeholder="{{ __('admin/cates.cate_slug_placeholder') }}" />

                                                            @error('cate_slug')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div> --}}

                                                    <div class="col-md-4">
                                                        <div class="form-group offset-md-4">
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
                                                                {{(old('cate_stat', $cate->status) == true)? 'checked': ''}} />

                                                            @error('cate_stat')
                                                                <div>
                                                                    <span class="text-danger">{{$message}}</span>
                                                                </div>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                </div>

                                                {{-- <div class="row">

                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label for="cate_imag">{{ __('admin/cates.cate_imag') }}</label>
                                                            <input
                                                                type="file"
                                                                class="form-control form-control-lg form-control-file"
                                                                name="cate_imag"
                                                                value="{{ old('cate_img') }}"
                                                                id="cate_imag" />

                                                            @error('cate_imag')
                                                                <div>
                                                                    <span class="text-danger">{{$message}}</span>
                                                                </div>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group text-center">
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
                                                                checked />

                                                            @error('cate_stat')
                                                                <div>
                                                                    <span class="text-danger">{{$message}}</span>
                                                                </div>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                </div> --}}

                                                {{-- @if ($cate->parent_id !=null) --}}
                                                @if (request('edit') == 'sub')
                                                <input
                                                    type="hidden"
                                                    name="sub"
                                                    value="" />
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group jq-va">
                                                                <label for="cate_plug">
                                                                    {{ __('admin/cates.cate_main') }}
                                                                </label>
                                                                <input
                                                                    type="text"
                                                                    value="{{old('cate_plug')}}"
                                                                    id="cate_plug"
                                                                    name="cate_plug"
                                                                    data-id=""
                                                                    class="form-control"
                                                                    placeholder="{{ __('admin/cates.cate_main_placeholder') }}" />
                                                                <input
                                                                    type="hidden"
                                                                    value="{{old('cate_main', $cate->parent_id)}}"
                                                                    id="cate_main"
                                                                    name="cate_main"
                                                                    class="form-control" />

                                                                {{-- <select
                                                                    id="cate_main"
                                                                    name="cate_main"
                                                                    class="custom-select custom-select-lg">

                                                                    <option
                                                                        label="{{ __('admin/cates.cate_main_placeholder') }}"
                                                                        selected
                                                                        value="0">
                                                                        {{ __('admin/cates.cate_main_placeholder') }}
                                                                    </option>
                                                                            @foreach ($mainCatesForSub as $mainCate)
                                                                                <option value="{{$mainCate->id}}">
                                                                                    {{$mainCate->name}}
                                                                                </option>
                                                                            @endforeach
                                                                </select> --}}
                                                                <!-- SELECT OPTIONS GROUP -->
                                                                    {{-- <optgroup disabled
                                                                    label="{{ __('admin/cates.cate_main_placeholder') }}"> --}}
                                                                    {{-- </optgroup> --}}
                                                                <!-- /SELECT OPTIONS GROUP -->

                                                                @error('cate_main')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
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
                                                    <span>{{ __('admin/cates.cate_create_action') }}</span>
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

@section('script')
<script type="text/javascript">
        // Database all categories.
        cates = JSON.parse('<?php echo $mainCatesForSub; ?>');
        // cateOfAction = '<?php echo $cate->id; ?>';

        jQuery(document).ready(function($) {

            if (cates.length != 0) {
                // CombTree Nested Selection Plugin
                singleSelection = $('#cate_plug').comboTree({
                    source    : cates,
                    isMultiple: false,
                    collapse  : true,
                    selected: [$('#cate_main').val()]
                });

                $(document).on('change', '#cate_plug', function() {
                    selectedIds = singleSelection.getSelectedIds();
                    $('#cate_main').val(selectedIds);
                });
            
                //####################################
                // $('.comboTreeItemTitle').on(
                //     'mouseenter',
                //     function () {
                //         parentCateToBeAssigned = $(this).attr('data-id');
                //         if (cateOfAction == parentCateToBeAssigned) {
                //             $(this).css({
                //                 'pointer-events': 'none',
                //                 'background-color': 'red',
                //                 'color': 'white',
                //                 'font-weight': 'bold',
                //                 'opacity': '0.7',
                //             });
                //         }
                //     }
                // );
                // $(":submit").on(
                //     'click',
                //     function (e) {
                //         parentCateToBeAssigned = $('#cate_main').val();
                //         if (cateOfAction == parentCateToBeAssigned) {
                //             $('.comboTreeInputWrapper').css({
                //                 'border-radius': '5px',
                //                 'border': '1px solid red',
                //             });
                //             e.preventDefault();
                //         }
                //     }
                // );
                //####################################
            }
        });

</script>
@endsection
