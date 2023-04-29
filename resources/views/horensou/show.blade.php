@extends('app.app')

@section('content')
<div class="row">
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <div class="float-right d-none d-sm-block">
                    <a href="{{ route('horensou.request.index') }}">Back</a>
                </div>
                <h3 class="card-title">Horensou - Detail</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h5 class="font-weight-bolder">{{ ucwords($horensou->point_problem) }} ({{ $horensou->part_name }})</h5>
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{ asset('plugin/gna/img/default.png') }}" alt="user image">
                                <span class="username">
                                    <a href="#">{{ $horensou->requestBy->name }}</a>
                                </span>
                                <span class="description">{{ $horensou->section->name }} ({{ $horensou->shop->name }}) - {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,$horensou->created_at)->format('H:i d-M-Y') }}</span>
                            </div>
                            
                            {!! $horensou->detail_problem !!}
                            
                            <p>
                                <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> No File Attached </a>
                            </p>
                            <p>
                                Request Status: <span class="text-{{ $horensou->shop_status == 'Submitted' ? 'danger' : 'success' }} font-weight-bolder">{{ $horensou->shop_status}}</span>
                            </p>
                        </div>
                        <div class="post clearfix">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{ asset('plugin/gna/img/default.png') }}" alt="User Image">
                                <span class="username">
                                    <a href="#">{{ $horensou->approveBy->name }}</a>
                                </span>
                                <span class="description">Delegated request - {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,$horensou->created_at)->format('H:i d-M-Y') }}</span>
                            </div>
                            {{ $horensou->shop_status == 'Submitted' ? 'Not Approved by General Foreman yet' : 'Loading...'}}
                            
                        </div>
                        <div class="post clearfix">
                            <p>
                                Horensou Status: <span class="text-danger font-weight-bolder">Opened</span> 
                            </p>
                        </div>    
                    </div>
                    <!-- col-12 -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Histories</h3>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="time-label badge badge-secondary">
                        <span class="bg-secondary py-1">Request</span>
                    </div>
                    <div>
                        <i class="fas fa-user bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,$horensou->created_at)->format('d-m-Y') }}</span>
                            <h3 class="timeline-header no-border"><a href="#">{{ $horensou->requestBy->name }}</a> submitted request</h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-user bg-info"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,$horensou->created_at)->format('d-m-Y') }}</span>
                            <h3 class="timeline-header no-border"><a href="#">{{ $horensou->approveBy->name }}</a> accepted this request</h3>
                        </div>
                    </div>
                    <div class="time-label badge badge-primary">
                        <span class="bg-primary py-1">Response</span>
                    </div>
                    <div>
                        <i class="fas fa-user bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,$horensou->created_at)->format('d-m-Y') }}</span>
                            <h3 class="timeline-header no-border"><a href="#">{{ $horensou->requestBy->name }}</a> delegated request</h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-user bg-info"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,$horensou->created_at)->format('d-m-Y') }}</span>
                            <h3 class="timeline-header no-border"><a href="#">{{ $horensou->approveBy->name }}</a> received this request</h3>
                        </div>
                    </div>
                    <div class="time-label badge badge-success">
                        <span class="bg-success py-1">Progress</span>
                    </div>
                    <div>
                        <i class="fas fa-calendar bg-warning"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,now())->format('d-m-Y') }}</span>
                            <h3 class="timeline-header no-border font-weight-bolder">Not Finish Yet</h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-calendar-check bg-green"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa-regular fa-calendar-check"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,$horensou->created_at)->format('d-m-Y') }}</span>
                            <h3 class="timeline-header no-border text-primary font-weight-bolder">Finish</h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-arrow-rotate-left bg-danger"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa-solid fa-arrow-rotate-left"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' ,now())->format('d-m-Y') }}</span>
                            <h3 class="timeline-header no-border"><a class="font-weight-bolder text-danger" href="#">Returned by User</a> - belum tuntas</h3>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection