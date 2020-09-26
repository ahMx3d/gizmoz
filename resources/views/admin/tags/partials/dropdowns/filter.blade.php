<div class="dropdown {{LaravelLocalization::getCurrentLocaleDirection() == 'ltr'? 'pull-right': 'pull-left' }}">
    <button
        class="btn btn-info dropdown-toggle"
        type="button"
        id="tags-index-header-filter"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false">
        {{ __('admin/tags.index_card_filter_by') }}
    </button>
    <div class="dropdown-menu" aria-labelledby="tags-index-header-filter">
        <a
            href="{{ route('tags.index'). '?name=asc' }}"
            class="dropdown-item">
            <i class="la la-sort-alpha-asc"></i>
            {{ __('admin/tags.index_card_filter_by_name_asc') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('tags.index'). '?name=desc' }}"
            class="dropdown-item">
            <i class="la la-sort-alpha-desc"></i>
            {{ __('admin/tags.index_card_filter_by_name_desc') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('tags.index'). '?order=asc' }}"
            class="dropdown-item">
            <i class="la la-sort-amount-asc"></i>
            {{ __('admin/tags.index_card_filter_by_oldest') }}</a>
        <div class="dropdown-divider"></div>
        <a
            href="{{ route('tags.index'). '?order=desc' }}"
            class="dropdown-item">
            <i class="la la-sort-amount-desc"></i>
            {{ __('admin/tags.index_card_filter_by_newest') }}</a>
    </div>
</div>
