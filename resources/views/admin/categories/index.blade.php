@extends('layouts.admin')
@section('title', __("admin/cates.index_title"))

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        @include('admin.categories.partials.card_header')
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('admin/cates.index_card_title') }}</h4>
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
                                            {{-- <th class="text-center">#</th> --}}
                                            <th class="text-center">{{ __('admin/cates.th_name') }}</th>
                                            <th class="text-center">{{ __('admin/cates.th_seo') }}</th>
                                            {{-- <th class="text-center">{{ __('admin/cates.th_image') }}</th> --}}
                                            <th class="text-center">{{ __('admin/cates.th_status') }}</th>
                                            <th class="text-center">{{ __('admin/cates.th_type') }}</th>
                                            <th class="text-center">{{ __('admin/cates.th_actions') }}</th>
                                            <th class="text-center">{{ __('admin/cates.th_updated_at') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($cates)
                                            @foreach($cates as $cate)

                                                <tr>
                                                    {{-- <td class="text-center">{{ $cate->id }}</td> --}}
                                                    <td class="text-center">{{ $cate->name }}</td>
                                                    <td class="text-center">{{ $cate->slug }}</td>
                                                    {{-- <td class="text-center">
                                                        <img
                                                            style="width: 100%;"
                                                            src=""
                                                            alt="{{ __('admin/cates.td_img_alt') }}" />
                                                    </td> --}}
                                                    <td class="text-center">{{ $cate->getStatus() }}</td>
                                                    <td class="text-center">
                                                        @if ($cate->parent_id == null)
                                                            <span>{{ __('admin/cates.model_type_main') }}</span>
                                                        @else
                                                        <span>{{ __('admin/cates.model_type_sub') }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">

                                                        <div
                                                            class="btn-group"
                                                            role="group"
                                                            aria-label="Basic example">

                                                            @if ($cate->parent_id === null)
                                                            <a
                                                                href="{{ route('categories.edit', $cate->id). '?edit=main' }}"
                                                                class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">

                                                                <span>{{ __('admin/cates.td_edit') }}</span>
                                                            </a>
                                                            @else
                                                            <a
                                                                href="{{ route('categories.edit', $cate->id). '?edit=sub' }}"
                                                                class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">

                                                                <span>{{ __('admin/cates.td_edit') }}</span>
                                                            </a>
                                                            @endif

                                                            @if ($cate->parent_id === null)
                                                            <div class="dropdown">
                                                                <button
                                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1 dropdown-toggle"
                                                                    type="button"
                                                                    id="subcates-dropdown-menu"
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ __('admin/cates.show_sub_cate') }}
                                                                </button>
                                                                <div class="dropdown-menu text-center" aria-labelledby="subcates-dropdown-menu">
                                                                    @forelse ($cate->subcates as $subcate)
                                                                    <a
                                                                        href="{{ route('categories.edit', $subcate->id). '?edit=sub' }}"
                                                                        class="dropdown-item">{{ $subcate->name }}</a>
                                                                        @if (!$loop->last)
                                                                        <div class="dropdown-divider"></div>
                                                                        @endif
                                                                    @empty
                                                                        <span>{{ __('admin/cates.td_no_sub') }}</span>
                                                                    @endforelse
                                                                </div>
                                                            </div>
                                                            @else
                                                            <div class="dropdown">
                                                                <button
                                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1 dropdown-toggle"
                                                                    type="button"
                                                                    id="mainCate-dropdown-menu"
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ __('admin/cates.show_main_cate') }}
                                                                </button>
                                                                <div class="dropdown-menu text-center" aria-labelledby="mainCate-dropdown-menu">
                                                                    @if ($cate->mainCate != null)
                                                                    <a
                                                                        href="{{ route('categories.edit', $cate->mainCate->id). '?edit=main' }}"
                                                                        class="dropdown-item">{{ $cate->mainCate->name }}</a>
                                                                    @else
                                                                    <span>{{ __('admin/cates.td_no_main') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @endif

                                                            <form
                                                                action="{{ route('categories.destroy', $cate->id) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    <span>{{ __('admin/cates.td_destroy') }}</span>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                    <td>{{ $cate->updated_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">
                                        {{-- {!! $cates->links() !!} --}}
                                        {!! $cates->appends(request()->input())->links() !!}
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
