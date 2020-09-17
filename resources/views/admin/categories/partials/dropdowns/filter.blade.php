<div class="dropdown {{LaravelLocalization::getCurrentLocaleDirection() == 'ltr'? 'pull-right': 'pull-left' }}">
    <button
        class="btn btn-info dropdown-toggle"
        type="button"
        id="cates-index-header-filter"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false">
        {{ __('admin/cates.index_card_filter_by') }}
    </button>
    <div class="dropdown-menu" aria-labelledby="cates-index-header-filter">
        <a
            href="{{ route('categories.index'). '?name=asc' }}"
            class="dropdown-item">
            <i class="la la-sort-alpha-asc"></i>
            {{ __('admin/cates.index_card_filter_by_name_asc') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('categories.index'). '?name=desc' }}"
            class="dropdown-item">
            <i class="la la-sort-alpha-desc"></i>
            {{ __('admin/cates.index_card_filter_by_name_desc') }}</a>
        <div class="dropdown-divider"></div>
        {{-- <a
            href="#"
            class="dropdown-item">
            <i class="la la-tag"></i>
            {{ __('admin/cates.index_card_filter_by_type') }}</a>
        <div class="dropdown-divider"></div> --}}
        <a
            href="{{ route('categories.index'). '?order=asc' }}"
            class="dropdown-item">
            <i class="la la-sort-amount-asc"></i>
            {{ __('admin/cates.index_card_filter_by_oldest') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('categories.index'). '?order=desc' }}"
            class="dropdown-item">
            <i class="la la-sort-amount-desc"></i>
            {{ __('admin/cates.index_card_filter_by_newest') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('categories.index'). '?status=active' }}"
            class="dropdown-item">
            <i class="la la-hourglass-start"></i>
            {{ __('admin/cates.index_card_filter_by_active') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('categories.index'). '?status=pending' }}"
            class="dropdown-item">
            <i class="la la-hourglass-end"></i>
            {{ __('admin/cates.index_card_filter_by_pending') }}</a>
    </div>
</div>