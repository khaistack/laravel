@extends('layouts.home')
@section('content')
    <div class="content-body">
        <!-- container starts -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Đăng
                                        Sản Phẩm</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div id="profile-settings pt-3 ">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <form action="create-product" enctype="multipart/form-data"  method="post">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Tên Sản Phẩm</label>
                                                            <input name="name" type="text" class="form-control">
                                                            <span class="text-red"> {{ $errors->first('name') }}</span>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Mô Tả Sản Phẩm</label>
                                                            <input name="describe" type="text" class="form-control">
                                                            <span class="text-red"> {{ $errors->first('describe') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group p-0 col-md-6">
                                                        <label>Upload ảnh</label>
                                                        <div class="input-group">
                                                            <div class="">
                                                                <input type="file" name="fileToUpload" id="fileToUpload">
                                                            </div>
                                                            <span class="text-red">
                                                                {{ $errors->first('fileToUpload') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group  p-0 col-md-4">
                                                            <label>Số Lượng</label>
                                                            <input type="number" name="quantity" class="form-control">
                                                            <span class="text-red"> {{ $errors->first('quantity') }}</span>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Giá</label>
                                                            <input type="text" name="price" class="form-control">
                                                            <span class="text-red"> {{ $errors->first('price') }}</span>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label>Mã Hàng</label>
                                                            <input type="text" name="code" class="form-control">
                                                            <span class="text-red"> {{ $errors->first('code') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group p-0 col-md-12">
                                                        <div>
                                                            <label>Danh Mục</label>
                                                        </div>
                                                        <select name="ary" multiple="multiple">
                                                            <option name='option' value="op1">
                                                                Sam sung
                                                            </option>
                                                            <option name='option' value="op2">
                                                                Iphone
                                                            </option>
                                                            <option name='option' value="op3">
                                                                Ipad
                                                            </option>
                                                        </select>
                                                        <span class="text-red"> {{ $errors->first('ary') }}</span>
                                                    </div>
                                            </div>
                                            <button class="btn btn-primary" value="Upload Image" type="submit">Đăng</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
