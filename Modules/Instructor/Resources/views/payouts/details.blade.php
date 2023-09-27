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

        <div class="table-content table-basic ecommerce-components product-list order-details">
            <div class="card">
                <div class="card-header">
                    <!--  toolbar table start  -->
                    <div
                        class="table-toolbar d-flex flex-wrap gap-2 flex-column flex-xl-row justify-content-center justify-content-xxl-between align-content-center">
                        <div class="align-self-center">
                            <div class="d-flex flex-wrap gap-2 flex-column justify-content-center align-content-center">
                                <h3 class="mb-1">{{ date('D, M d, Y, g:iA', strtotime($data['payout']->created_at)) }}</h3>
                                <h6>{{ ___('common.ID') }} : <span>#{{ $data['payout']->id }}</span></h6>
                            </div>
                        </div>

                        <div class="align-self-center d-flex gap-2">
                            <!-- search -->
                            <!-- Status -->
                            <div class="align-self-center">
                                <div class="d-flex flex-wrap gap-2 flex-column justify-content-center align-content-center">
                                    {{ statusBackend($data['payout']->status->class, $data['payout']->status->name) }}
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--toolbar table end -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12  col-xl-8 mb-20">
                            <!--  table start -->
                            <div class="card d-flex justify-content-center align-items-center flex-column border p-4">

                                @foreach ($data['payout']->payoutLog as $log)
                                    <div class="notification-list d-flex w-100 mt-16">
                                        <a href="javascript:;">
                                            <div class="profile-photo user-card">
                                                <img src="{{ showImage(@$log->user->image->original, 'default-1.jpeg') }}"
                                                    alt="{{ @$log->user->name }}">
                                            </div>
                                        </a>
                                        <div class="notification-details w-100 ml-20">
                                            <div class="notification-line d-flex">
                                                <div class="d-flex justify-content-between w-100">
                                                    <div class="notification-subtitle d-flex ">
                                                        <strong>{{ @$log->user->name }} </strong>
                                                        <div class="notification-login ml-4"> -
                                                            {{ @$log->user->role->name }}</div>
                                                    </div>
                                                    <div class="ml-10 notification-time d-flex align-items-center">
                                                        <span>{{ showDateTime($log->created_at) }}</span>
                                                        <div class="ml-6 status-dot active"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-content">{{ ___('common.Status') }}
                                                <strong>{{ statusBackend(@$log->status->class, $log->status->name) }}</strong>
                                            </div>
                                            <div class="notification-comment mt-16 text-muted"><?= @$log->description ?>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!--  table end -->
                        </div>
                        <div class="col-12 col-xl-4 mb-20">
                            <div class="border ot-card shadow radius-10 mb-5">
                                <div>
                                    <div
                                        class="d-flex justify-content-between align-items-center mb-20 border-bottom border-gray-300">
                                        <div class="mb-10">
                                            <h5 class="mb-0">{{ ___('instructor.Instructor Info') }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div>
                                            <p class="mb-0">{{ ___('common.name') }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h5 class="mb-0">{{ $data['payout']->user->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div>
                                            <p class="mb-0">{{ ___('instructor.Date') }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h5 class="mb-0">{{ showDate($data['payout']->user->created_at) }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div>
                                            <p class="mb-0">{{ ___('common.Status') }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h5 class="mb-0">
                                                {{ statusBackend(@$data['payout']->user->userStatus->class, $data['payout']->user->userStatus->name) }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border ot-card shadow-none radius-10">
                                <div>
                                    <div
                                        class="d-flex justify-content-between align-items-center mb-20 border-bottom border-gray-300">
                                        <div class="mb-10">
                                            <h5 class="mb-0">{{ ___('instructor.Payout_summary') }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div>
                                            <p class="mb-0">{{ ___('instructor.Request Amount') }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h5 class="mb-0">{{ showPrice($data['payout']->amount) }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div>
                                            <p class="mb-0">{{ ___('instructor.Payment Method') }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h5 class="mb-0">
                                                {{ Str::ucfirst(@$data['payout']->instructorPaymentMethod->paymentMethod->name) }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div>
                                            <p class="mb-0">{{ ___('instructor.Payment Status') }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <h5 class="mb-0">
                                                {{ statusBackend(@$data['payout']->payment_status->class, $data['payout']->payment_status->name) }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
