<div class="content-header row">
    <div class="content-header-left col-md-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-md-12">
                <div class="row">
                    <div class="col-9">
                        <ol style="margin: 8px 0" class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    <span>{{ __('admin/brands.main_page') }}</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                            @if (Route::currentRouteName() == 'brands.index')
                                {{ __('admin/brands.brands') }}
                            @else
                                <a href="{{ route('brands.index') }}">
                                    {{ __('admin/brands.brands') }}
                                </a>
                            @endif
                            </li>
                            <li class="breadcrumb-item active">
                            @if (Route::currentRouteName() == 'brands.create')
                            {{ __('admin/brands.add_new') }}
                            @elseif(Route::currentRouteName() == 'brands.edit')
                            {{ __('admin/brands.edit_old') }}
                            @elseif(Route::currentRouteName() == 'brands.show')
                            {{ __('admin/brands.show_old') }}
                            @else
                            <a href="{{ route('brands.create') }}">{{ __('admin/brands.add_new') }}</a>
                            @endif
                            </li>
                        </ol>
                    </div>
                    @if (Route::currentRouteName() == 'brands.index')
                    <div class="col-3">
                        @include('admin.brands.partials.dropdowns.filter')
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
