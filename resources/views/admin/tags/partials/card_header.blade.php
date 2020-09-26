<div class="content-header row">
    <div class="content-header-left col-md-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-md-12">
                <div class="row">
                    <div class="col-9">
                        <ol style="margin: 8px 0" class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">
                                    <span>{{ __('admin/tags.main_page') }}</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                            @if (Route::currentRouteName() == 'tags.index')
                                {{ __('admin/tags.tags') }}
                            @else
                                <a href="{{ route('tags.index') }}">
                                    {{ __('admin/tags.tags') }}
                                </a>
                            @endif
                            </li>
                            <li class="breadcrumb-item active">
                            @if (Route::currentRouteName() == 'tags.create')
                            {{ __('admin/tags.add_new') }}
                            @elseif(Route::currentRouteName() == 'tags.edit')
                            {{ __('admin/tags.edit_old') }}
                            @elseif(Route::currentRouteName() == 'tags.show')
                            {{ __('admin/tags.show_old') }}
                            @else
                            <a href="{{ route('tags.create') }}">{{ __('admin/tags.add_new') }}</a>
                            @endif
                            </li>
                        </ol>
                    </div>
                    @if (Route::currentRouteName() == 'tags.index')
                    <div class="col-3">
                        @include('admin.tags.partials.dropdowns.filter')
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
