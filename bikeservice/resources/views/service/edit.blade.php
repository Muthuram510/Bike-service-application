@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Blog</h1>
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
                            <div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 10px;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('service.update', $service->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Model</label>
                                <input type="text" name="model" class="form-control" value="{{$service->model}}">
                                @if ($errors->has('model'))
                                    <div class="text-danger" style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('model') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Status</label><br>
                                <input type="radio" name="status" value="Ready for delivery" > Ready for delivery<br>
                                <input type="radio" name="status" value="Completed"> Completed<br>
                                @if ($errors->has('status'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('status') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Suggestions</label>
                                <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$service->body}}</textarea>
                                @if ($errors->has('body'))
                                    <div class="text-danger" style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('body') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control" value="{{ date('Y-m-d', strtotime($service->date)) }}">
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="{{ route('service.index') }}" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
