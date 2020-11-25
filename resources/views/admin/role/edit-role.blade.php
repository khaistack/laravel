@extends('layouts.home')
@section('content')
    <div class="content-body">
        <!-- container starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sửa quyền</h4>
                            |
                            <h4 class="card-title" style="color: red">Chức năng  hỏng  update sau nhé!</h4>
                            @if ($message = Session::get('err'))
                                <strong class="edit-strong">{{ $message }}</strong>
                            @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div>
                                    <div class="form-row ">
                                        <form action="{{ route('update-role', $data[0]->role_id) }}"
                                            enctype="multipart/form-data" method="POST" class="col-md-12">
                                            @csrf
                                            <div class="form-group ml-0 pl-0 col-md-12">
                                                <label>Tên Quyền</label>
                                                <input type="text" class="form-control" readonly
                                                    style="background-color:#e6e6e6" value="{!!  $roleCurrent->name !!}"
                                                    name="role">
                                                <span class="text-red">
                                                    {{ $errors->first('role') }}
                                                </span>
                                            </div>
                                            <div class="form-group ml-0 pl-0  col-md-12">
                                                <div class="">
                                                    <label>Các quyền được cấp</label>
                                                </div>
                                                <div class="per">
                                                    @foreach ($permission as $item)
                                                        | {!! $item !!} |
                                                    @endforeach
                                                </div>
                                                <div class="pt-2">
                                                    <label>Sét lại Quyền</label>
                                                </div>
                                                <select id="multi-value-select" name="ary[]"  multiple="multiple">
                                                    <option value="Thêm">Thêm</option>
                                                    <option value="Sửa">Sửa</option>
                                                    <option value="Xoá">Xoá</option>
                                                    <option value="Lưu">Lưu</option>
                                                    <option value="View">View</option>
                                                </select>
                                                <span class="text-red">
                                                    {{ $errors->first('ary') }}
                                                </span>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tạo</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
