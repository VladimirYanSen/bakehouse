@extends('layouts.app', ['page' => __('Product'), 'pageSlug' => 'product'])

@section('content')
    @php
        $merchantId = 1;
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Product Table of Merchant with ID</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>Product Id</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>99</td>
                                <td>category sample</td>
                                <td>name sample</td>
                                <td>price sample</td>
                                <td>
                                    <button class="btn btn-fill btn-primary">update</button>
                                    <button class="btn btn-fill btn-danger">delete</button>
                                </td>
                            </tr>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->category_name }}</td>
                                    <td>{{ $data->product_name }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>
                                        <button class="btn btn-fill btn-primary" data-toggle="modal"
                                                data-target="#productModal{{ $data->id }}">update
                                        </button>
                                        <div id="productModal{{$data->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    {{--modal header--}}
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Product</h4>
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
                                                                    <td>product id</td>
                                                                    <td class="form-control">{{ $data->id }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>category</td>
                                                                    {{--dropdown category--}}
                                                                    <td class="form-control">
                                                                        <select name="category[]" class="form-control">
                                                                            {{--@foreach($datas as $data)--}}
                                                                                {{--<option value="{{ route('category.index') }}"></option>--}}
                                                                            {{--@endforeach--}}
                                                                        </select>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>product name</td>
                                                                    <td><input type="text" name="name"
                                                                               class="form-control"
                                                                               value="{{ $data->product_name }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>price</td>
                                                                    <td><input type="text" name="address"
                                                                               class="form-control"
                                                                               value="{{ $data->price }}"></td>
                                                                </tr>
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