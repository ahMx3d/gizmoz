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
            class="dropdown-item"
            href="#">{{ __('admin/cates.breadcrumb_index_dropdown_main') }}</a>
        <div class="dropdown-divider"></div>
        <a
            class="dropdown-item"
            href="#">{{ __('admin/cates.breadcrumb_index_dropdown_sub') }}</a>
    </div>
</div>