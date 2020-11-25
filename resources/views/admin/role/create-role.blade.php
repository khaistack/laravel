@extends('layouts.home')
@section('content')
    <div class="content-body">
        <!-- container starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tạo Nhóm Quyền</h4>
                            @if ($message = Session::get('err'))
                                <strong class="edit-strong">{{ $message }}</strong>
                            @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div>
                                    <div class="form-row ">
                                        <form action="create-store" enctype="multipart/form-data" method="POST"
                                            class="col-md-12">
                                            @csrf
                                            <div class="form-group ml-0 pl-0 col-md-12">
                                                <label>Tên Quyền</label>
                                                <input type="text" class="form-control" name="role">
                                                <span class="text-red">
                                                    {{ $errors->first('role') }}
                                                </span>
                                            </div>
                                            <div class="form-group ml-0 pl-0  col-md-12">
                                                <div class="">
                                                    <label>Thêm Quyền</label>
                                                </div>
                                                <select id="multi-value-select" name="ary[]" multiple="multiple">
                                                    <option value="Thêm">Thêm</option>
                                                    <option value="Sửa">Sửa</option>
                                                    <option value="Xoá">Xoá</option>
                                                    <option value="Lưu">Lưu</option>
                                                    <option value="View">View</option>
                                                    {{-- <option value="Không có quyền">Không có quyền</option> --}}
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
