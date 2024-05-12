@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Welcome to John Bike service!</h1>
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
                    <div class="card-header">{{ __('Service Registration where we provide free pressure checkup') }}</div>
                    <div class="card-body">
                        <form action="/service" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Bike Model</label>
                                <input type="text" name="model" class="form-control" value="{{old('model')}}">
                                @if ($errors->has('model'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('model') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Service needed</label><br>
                                <input type="checkbox" name="option1" value="General service check-up" > General service check-up<br>
                                <input type="checkbox" name="option2" value="Oil change"> Oil change<br>
                                <input type="checkbox" name="option3" value="Water wash"> Water wash<br>
                                @if ($errors->has('option'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('option') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Any suggestions mention here</label>
                                <textarea name="body" id="" cols="10" rows="5" class="form-control" {{old('body')}}></textarea>
                                @if ($errors->has('body'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('body') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control" value="{{old('date')}}">
                                @if ($errors->has('date'))
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;">{{ $errors->first('date') }}</div>
                                @endif
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="{{ route('service.index') }}" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
