<div style="display: inline-block" class="dropdown dropright">
    <button
        class="btn btn-link dropdown-toggle p-0"
        type="button"
        id="breadcrumb-dropdown-menu"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false">
        {{ __('admin/cates.breadcrumb_index_add_new') }}
    </button>
    <div class="dropdown-menu text-center" aria-labelledby="breadcrumb-dropdown-menu">
        <a
            href="{{ route('categories.create'). '?create=main' }}"
            class="dropdown-item">{{ __('admin/cates.breadcrumb_index_dropdown_main') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('categories.create'). '?create=sub' }}"
            class="dropdown-item">{{ __('admin/cates.breadcrumb_index_dropdown_sub') }}</a>
    </div>
</div>