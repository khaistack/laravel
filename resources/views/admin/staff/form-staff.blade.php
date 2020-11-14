@extends('layouts.home')
@section('content')
    <div class="content-body">
        <!-- container starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông Tin</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('users.edit', $data->id) }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tên</label>
                                            <input type="text"  name={{$data->name}}  value={{$data->name}} class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tên</label>
                                            <input type="text"  name={{$data->name}}  value={{$data->name}} class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" name={{$data->email}}  value={{$data->email}}  class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mật Khẩu</label>
                                            <input type="password" name={{$data->password}}  value={{$data->password}} class="form-control"     >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Thành Phố</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Chọn Nhóm Quyền</label>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <select id="inputState" class="form-control">
                                                        <option selected>Choose...</option>
                                                        <option>Nhóm Trưởng Phòng</option>
                                                        <option>Nhóm Nhân Viên</option>
                                                        <option>Nhóm Cộng Tác Viên</option>
                                                    </select>
                                                </label>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
