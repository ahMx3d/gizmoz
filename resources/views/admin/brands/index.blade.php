@extends('layouts.admin')
@section('title', __("admin/brands.index_title"))

@section('content')
<div class="app-content content">
    <div class="content-wrapper" style="padding-top: 0">
        @include('admin.brands.partials.card_header')
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('admin/brands.index_header_title') }}</h4>
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
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ __('admin/brands.th_name') }}</th>
                                            <th class="text-center">{{ __('admin/brands.th_image') }}</th>
                                            <th class="text-center">{{ __('admin/brands.th_status') }}</th>
                                            <th class="text-center">{{ __('admin/brands.th_actions') }}</th>
                                            <th class="text-center">{{ __('admin/brands.th_updated_at') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($brands)
                                            @foreach($brands as $brand)

                                                <tr>
                                                    <td class="text-center">{{ $brand->id }}</td>
                                                    <td class="text-center">{{ $brand->name }}</td>
                                                    <td class="text-center">
                                                        <img
                                                            style="width: 100%;"
                                                            src="{{ $brand->image }}"
                                                            alt="{{ __('admin/brands.td_img_alt') }}" />
                                                    </td>
                                                    <td class="text-center">{{ $brand->getStatus() }}</td>
                                                    <td class="text-center">
                                                        <div
                                                            class="btn-group"
                                                            role="group"
                                                            aria-label="Basic example">

                                                            <a
                                                                href="{{ route('brands.edit', $brand->id) }}"
                                                                class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">

                                                                <span>{{ __('admin/brands.td_edit') }}</span>
                                                            </a>
                                                            <a
                                                                href="{{ route('brands.show', $brand->id) }}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">

                                                                <span>{{ __('admin/brands.td_show') }}</span>
                                                            </a>
                                                            <form
                                                                action="{{ route('brands.destroy', $brand->id) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    <span>{{ __('admin/brands.td_destroy') }}</span>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                    <td>{{ $brand->updated_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">
                                        {{-- {!! $cates->links() !!} --}}
                                        {!! $brands->appends(request()->input())->links() !!}
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
