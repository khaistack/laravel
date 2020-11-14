@extends('layouts.home')
@section('content')
    <div class="content-body">
        <!-- container starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh Sách Nhân Viên</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th><strong>Stt.</strong></th>
                                            <th><strong>Tên</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Date</strong></th>
                                            <th><strong>Trạng Thái</strong></th>
                                            <th><strong>Nhóm Quyền</strong></th>
                                            <th><strong>Chỉnh Sửa</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td><strong>{{ $item->id }}</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center"><img src="{{ $item->avatar }}"
                                                        class="rounded-lg mr-2" width="24" alt="" /> <span
                                                        class="w-space-no">{{ $item->name }}</span></div>
                                            </td>
                                            <td>{{ $item->email }} </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <div class="d-flex align-items-center"><i
                                                        class="fa fa-circle text-success mr-1"></i> Họat Động</div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center"><i
                                                        class="fa fa-circle text-success mr-1"></i> Họat Động</div>
                                            </td>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <form method="get" action="{{route('users.edit', $item->id) }}">
                                                        @csrf
                                                        <button type="submit"class="btn btn-primary shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
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
        </div>
    </div>
@endsection
