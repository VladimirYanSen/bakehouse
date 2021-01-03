@extends('layouts.app', ['page' => __('Categories'), 'pageSlug' => 'category'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Category Table</h4>
                </div>
                <div>
                    <a href="{{ route('add_category') }}" class="btn btn-success">add category</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>

                                    <td>
                                        <button class="btn btn-fill btn-primary" data-toggle="modal"
                                                data-target="#updateCategoryModal{{ $data->id }}">update
                                        </button>
                                        <div id="updateCategoryModal{{$data->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    {{--modal header--}}
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Category</h4>
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
                                                                    <td><input readonly hidden type="text" name="id"
                                                                               class="form-control"
                                                                               value="{{ $data->id }}">{{ $data->id }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>name</td>
                                                                    <td><input type="text" name="name"
                                                                               class="form-control"
                                                                               value="{{ $data->name }}"></td>
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

                                        <button class="btn btn-fill btn-danger" data-toggle="modal"
                                                data-target="deleteCategoryModal{{ $data->id }}">delete
                                        </button>
                                        <div id="deleteCategoryModal{{$data->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    {{--modal header--}}
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Category</h4>
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
                                                                    <td>{{ $data->name }}</td>
                                                                </tr>
                                                            </table>
                                                            <button type="submit" class="btn btn-primary">delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                    {{--modal footer--}}
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
