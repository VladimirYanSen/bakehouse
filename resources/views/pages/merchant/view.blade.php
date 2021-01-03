@extends('layouts.app', ['page' => __('Merchant'), 'pageSlug' => 'merchant'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Merchant Table</h4>
                </div>
                <div>
                    <a href="{{ route('add_merchant') }}" class="btn btn-success">add merchant</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Merchant Action</th>
                                <th>Product Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>
                                        <button class="btn btn-fill btn-primary" data-toggle="modal"
                                                data-target="#merchantModal{{ $data->id }}">update
                                        </button>
                                        <div id="merchantModal{{$data->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    {{--modal header--}}
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Merchant</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>
                                                    {{--modal body--}}
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('put')
                                                        <form method="post" action="" enctype="multipart/form-data">
                                                            <table class="table table-borderless">
                                                                <tr>
                                                                    <td>id</td>
                                                                    <td>{{ $data->id }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>name</td>
                                                                    <td><input type="text" name="name"
                                                                               class="form-control"
                                                                               value="{{ $data->name }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>address</td>
                                                                    <td><input type="text" name="address"
                                                                               class="form-control"
                                                                               value="{{ $data->address }}"></td>
                                                                </tr>
                                                                {{--<tr>--}}
                                                                {{--<td>TYPE</td>--}}
                                                                {{--<td>{{ $data->type }}</td>--}}
                                                                {{--</tr>--}}
                                                            </table>
                                                            <button type="submit" class="btn btn-primary">update
                                                            </button>
                                                        </form>
                                                    </div>
                                                    {{--modal footer--}}
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-fill btn-danger">delete</button>
                                    </td>
                                    @php
                                        $merchantId = $data->id;
                                    @endphp
                                    <td>
                                        {{--<button class="btn btn-fill btn-info">view</button>--}}
                                        <a class="btn btn-fill btn-info"
                                           href="{{ route('price.getMerchantProduct', 'merchant_id => $merchantId') }}">view</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
