@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List of Service Booked</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('service.create') }}"><i
                                        class="fas fa-plus-circle" style="color:green;"></i></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="row justify-content-center">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Model</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        // get current page for Paginator
                        $currentPage = (\Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage() - 1) * 10;
                    @endphp
                    @foreach($services as $key => $service)
                        <tr>
                            <td>{{ $currentPage + $key + 1 }}</td>
                            <td>{{ $service->model }}</td>
                            <td>@if($service->option1!=null){{ $service->option1 }}<br>@endif
                                @if($service->option2!=null){{ $service->option2 }}<br>@endif
                                @if($service->option3!=null){{ $service->option3 }}<br>@endif
                            </td>
                            <td>{{ date('d-m-Y', strtotime($service->date)) }}</td>
                            <td>{{ $service->status }}</td>
                            <td>

                                <a href="{{ route('service.show', $service->id) }}" class="btn btn-primary">Show</a>
                                @canany(['users.read', 'users.write'])
                                <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('service.destroy', $service->id) }}" method="post" class="d-inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                @endcanany
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 10px;">
                    {{ $services->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
