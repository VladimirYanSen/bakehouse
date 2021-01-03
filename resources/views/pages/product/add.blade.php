@extends('layouts.app', ['page' => __('Add Produc'), 'pageSlug' => 'addproduct'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Add Product') }}</h5>
                </div>
                {{--<form method="post" action="{{ route('profile.update') }}" autocomplete="off">--}}

                <form method="post" action="" autocomplete="off" id="dynamic_form">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <table class="table table-bordered">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>category</th>
                                        <th>name</th>
                                        <th>Price</th>
                                        <th style="text-align: center"><a href="#" class="btn btn-info addRow">+</a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <select name="category[]" class="form-control">
                                                @foreach($datas as $data)
                                                    <option value="{{ $data->id }}"
                                                            style="color: black">{{ $data->name }}</option>
                                                @endforeach
                                                {{--<option>Sony</option>--}}
                                                {{--<option>Samsung</option>--}}
                                                {{--<option>Huawei</option>--}}
                                            </select>
                                        </td>
                                        <td><input type="text" name="name[]" class="form-control"></td>
                                        <td><input type="text" name="price[]" class="form-control"></td>
                                        <td style="text-align: center"><a href="#" class="btn btn-danger">-</a></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
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

@push('dynamicRow')
    <script>
        // untuk dynamic input
        $('.addRow').on('click', function () {
            addRow();
        });

        function addRow() {
            var tr = '<tr>' +
                '<td>' +
                '<select name="brandName[]" class="form-control">' +
                '@foreach($datas as $data)' +
                '<option value="{{$data->id }}" style="color: black">{{ $data->name }}</option>' +
                '@endforeach' +
                // '<option>Sony</option>' +
                // '<option>Samsung</option>' +
                // '<option>Huawei</option>' +
                '</select>' +
                '</td>' +
                '<td><input type="text" name="model[]" class="form-control"></td>' +
                '<td><input type="text" name="price[]" class="form-control"></td>' +
                '<td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>' +
                '</tr>';
            $('tbody').append(tr);
        };

        $('tbody').on('click', '.remove', function () {
            $(this).parent().parent().remove();
        });
        //untuk dynamic input
    </script>
@endpush