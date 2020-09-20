<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        {{-- <h3 class="content-header-title">{{ __('admin/cates.index_main_heading') }}</h3> --}}
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol style="margin-top: 5px" class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a
                            class="btn btn-link p-0"
                            href="{{ route('admin.dashboard') }}">
                            <span>{{ __('admin/cates.dashboard') }}</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{-- <a
                            class="btn btn-link p-0"
                            href="{{ route('categories.index') }}">
                            <span>{{ __('admin/cates.breadcrumb_index_title') }}</span>
                        </a> --}}
                        @include('admin.categories.partials.dropdowns.all')
                    </li>
                    <li class="breadcrumb-item active">
                        @if (Route::currentRouteName() == 'categories.edit')
                            <span>{{ __('admin/cates.breadcrumb_index_edit') }}</span>
                        @else
                        @include('admin.categories.partials.dropdowns.add')
                        @endif
                    </li>
                </ol>
            </div>
        </div>
        {{-- <h3 class="content-header-title">{{ __('admin/cates.index_main_heading') }}</h3> --}}
    </div>
    @if (Route::currentRouteName() == 'categories.index')
    <div class="content-header-left col-md-6 col-12 mb-2">
        @include('admin.categories.partials.dropdowns.filter')
    </div>
    @endif
</div>
