@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Blog Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('service.index') }}"><i
                                            class="fas fa-home"></i></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h2>{{ $service->model }}</h2>
                        <p>Date {{ date('Y-m-d', strtotime($service->date)) }}</p>
                        <h2>Services</h2>
                            @if($service->option1!=null){{ $service->option1 }}<br>@endif
                            @if($service->option2!=null){{ $service->option2 }}<br>@endif
                            @if($service->option3!=null){{ $service->option3 }}<br>@endif
                        <div>
                            <h2>Suggestions</h2>
                            {{ $service->body }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
