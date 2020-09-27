@extends('layouts.admin')
@section('title', __("admin/tags.index_title"))

@section('content')
<div class="app-content content">
    <div class="content-wrapper" style="padding-top: 0">
        @include('admin.tags.partials.card_header')
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('admin/tags.index_header_title') }}</h4>
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
                                            <th class="text-center">{{ __('admin/tags.th_name') }}</th>
                                            <th class="text-center">{{ __('admin/tags.th_slug') }}</th>
                                            <th class="text-center">{{ __('admin/tags.th_actions') }}</th>
                                            <th class="text-center">{{ __('admin/tags.th_updated_at') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($tags)
                                            @foreach($tags as $tag)

                                                <tr>
                                                    <td class="text-center">{{ $tag->id }}</td>
                                                    <td class="text-center">{{ $tag->name }}</td>
                                                    <td class="text-center">{{ $tag->slug }}</td>
                                                    <td class="text-center">
                                                        <div
                                                            class="btn-group"
                                                            role="group"
                                                            aria-label="Basic example">

                                                            <a
                                                                href="{{ route('tags.edit', $tag->id) }}"
                                                                class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">

                                                                <span>{{ __('admin/tags.td_edit') }}</span>
                                                            </a>
                                                            {{-- <a
                                                                href="{{ route('tags.show', $tag->id) }}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">

                                                                <span>{{ __('admin/tags.td_show') }}</span>
                                                            </a> --}}
                                                            <form
                                                                action="{{ route('tags.destroy', $tag->id) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    <span>{{ __('admin/tags.td_destroy') }}</span>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                    <td>{{ $tag->updated_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">
                                        {{-- {!! $tags->links() !!} --}}
                                        {!! $tags->appends(request()->input())->links() !!}
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
