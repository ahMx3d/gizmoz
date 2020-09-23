<div style="display: inline-block" class="dropdown dropright">
    <button
        class="btn btn-link dropdown-toggle p-0 btn-min-width"
        type="button"
        id="breadcrumb-dropdown-menu"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false">
        {{ __('admin/cates.breadcrumb_index_title') }}
    </button>
    <div class="dropdown-menu text-center" aria-labelledby="breadcrumb-dropdown-menu">
        <a
            href="{{ route('categories.index'). '?type=main' }}"
            class="dropdown-item">{{ __('admin/cates.breadcrumb_index_dropdown_all_main') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('categories.index'). '?type=sub' }}"
            class="dropdown-item">{{ __('admin/cates.breadcrumb_index_dropdown_all_sub') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('categories.index') }}"
            class="dropdown-item">{{ __('admin/cates.breadcrumb_index_dropdown_all') }}</a>
    </div>
</div>