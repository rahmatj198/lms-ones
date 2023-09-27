@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">

        {{-- breadecrumb Area S t a r t --}}
        @include('backend.ui-components.breadcrumb', [
            'title' => @$data['title'],
            'routes' => [
                route('dashboard') => ___('common.Dashboard'),
                '#' => @$data['title'],
            ],

            'buttons' => 1,
        ])
        {{-- breadecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic ecommerce-components product-list">
            <div class="card">
                <div class="card-body">


                    <!--  toolbar table start  -->
                    <div
                        class="table-toolbar d-flex flex-wrap gap-2 flex-column flex-xl-row justify-content-center justify-content-xxl-between align-content-center pb-3">
                        <form action="" method="get">
                            <div class="align-self-center">
                                <div
                                    class="d-flex flex-wrap gap-2 flex-column flex-lg-row justify-content-center align-content-center">
                                    <!-- show per page -->
                                    @include('backend.ui-components.per-page')
                                    <!-- show per page end -->

                                    <div class="align-self-center d-flex gap-2">
                                        <!-- search start -->
                                        <div class="align-self-center">
                                            <div class="search-box d-flex">
                                                <input class="form-control" placeholder="{{ ___('common.search') }}"
                                                    name="search" value="{{ @$_GET['search'] }}" />
                                                <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                            </div>
                                        </div>
                                        <!-- search end -->

                                        <!-- dropdown action -->
                                        <div class="align-self-center">
                                            <div class="dropdown dropdown-action" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Filter">
                                                <button type="submit" class="btn-add">
                                                    <span class="icon">{{ ___('common.Filter') }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--toolbar table end -->
                    <!--  table start -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead">
                                <tr>
                                    <th>{{ ___('instructor.ID') }}</th>
                                    <th>{{ ___('student.Courses Title') }}</th>
                                    <th>{{ ___('student.Total Points') }}</th>
                                    <th>{{ ___('student.Points') }}</th>
                                    <th>{{ ___('student.Status') }}</th>
                                    <th>{{ ___('student.Progress') }}</th>
                                    <th>{{ ___('common.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($data['enrolls'] as $enroll)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <a target="_blank"
                                                href="{{ route('frontend.courseDetails', @$enroll->course->slug) }}">
                                                {{ Str::limit(@$enroll->course->title, 30) }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ @$enroll->course->point }}
                                        </td>
                                        <td>
                                            {{ @$enroll->lesson_point + @$enroll->quiz_point + @$enroll->assignment_point }}
                                        </td>
                                        <td class="porgress-td">
                                            @if (@$enroll->is_completed)
                                                <span class="badge-basic-success-text">
                                                    {{ ___('student.Completed') }}
                                                </span>
                                            @else
                                                <span class="badge-basic-warning-text">
                                                    {{ ___('student.Pending') }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    aria-label="Example with label"
                                                    style="width: {{ @$enroll->progress }}%"
                                                    aria-valuenow="{{ @$enroll->progress }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    {{ @$enroll->progress }}%
                                                </div>
                                            </div>
                                        </td>
                                        <td class="action">
                                            <div class="dropdown dropdown-action">
                                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (@$enroll->is_completed)
                                                        @if (hasPermission('certificate_view'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.certificate.view', encryptFunction($enroll->id)) }}"><span
                                                                        class="icon mr-12">
                                                                        <i class="fa-solid fa-eye"></i>
                                                                    </span>
                                                                    {{ ___('common.View') }}</a>
                                                            </li>
                                                        @endif
                                                        @if (hasPermission('certificate_download'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.certificate.download', encryptFunction($enroll->id)) }}"><span
                                                                        class="icon mr-12">
                                                                        <i class="fa-solid fa-download"></i>
                                                                    </span>
                                                                    {{ ___('common.Download') }}</a>
                                                            </li>
                                                        @endif
                                                    @else
                                                        <li>
                                                            <span class="dropdown-item text-danger">
                                                                {{ ___('student.Not Completed') }}
                                                            </span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <!-- empty table -->
                                    @include('backend.ui-components.empty_table', [
                                        'colspan' => '7',
                                        'message' => ___(
                                            'message.Please add a new entity or manage the data table to see the content here'),
                                    ])
                                    <!-- empty table -->
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <!--  table end -->
                    <!--  pagination start -->
                    @include('backend.ui-components.pagination', ['data' => $data['enrolls']])
                    <!--  pagination end -->
                </div>
            </div>
        </div>
        <!--  table content end -->
    </div>
@endsection
@push('script')
    @include('backend.partials.delete-ajax')
@endpush
