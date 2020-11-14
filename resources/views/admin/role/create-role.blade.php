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
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div>
                                    <div class="form-row ">
                                        <form action="{{route('roles.store')}}" method="POST" class="col-md-12">
                                          @csrf
                                            <div class="form-group col-md-12">
                                                <label>Tên Quyền</label>
                                                <input type="text" class="form-control" name="role">
                                                <span class="text-red">
                                                    {{ $errors->first('role') }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <select name="ary[]" multiple="multiple">
                                                <option name='option' value="{{$isPermission[0]->name}}" >{{$isPermission[0]->name}}</option>
                                                    <option value="{{$isPermission[1]->name}}" >{{$isPermission[1]->name}}</option>
                                                    <option value="{{$isPermission[2]->name}}" >{{$isPermission[2]->name}}</option>
                                                    <option value="{{$isPermission[3]->name}}" >{{$isPermission[3]->name}}</option>
                                                    <option value="{{$isPermission[4]->name}}" >{{$isPermission[4]->name}}</option>
                                                  </select>
                                                  <span class="text-red">
                                                    {{ $errors->first('option') }}
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
