@extends('layouts.app', ['page' => __('Add Category'), 'pageSlug' => 'addcategory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Add Category') }}</h5>
                </div>
                {{--<form method="post" action="{{ route('profile.update') }}" autocomplete="off">--}}
                <form method="post" action="{{ route('category.store') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        {{--@method('put')--}}

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            {{--<input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">--}}
                            <input type="text" name="name" class="form-control">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                    <div class="card-footer" style="text-align: right">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
