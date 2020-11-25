@extends('layouts.home')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#my-posts" data-toggle="tab"
                                                class="nav-link active show">Setting</a>
                                        </li>
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">About
                                                Me</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="my-posts" class="tab-pane fade active show">
                                            <div id="profile-settings pt-3 ">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>
                                                        <form enctype="multipart/form-data"
                                                            action="{{ route('upInfo-user', $data->id) }}" method="post">
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Email</label>
                                                                    <input value={{ $data->email }} name="email"
                                                                        type="email" placeholder="Email"
                                                                        class="form-control">
                                                                        <span class="text-red">
                                                                            {{ $errors->first('Email') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Password</label>
                                                                    <input value={{ $data->password }} name="password"
                                                                        type="text" placeholder="Password"
                                                                        class="form-control">
                                                                        <span class="text-red">
                                                                            {{ $errors->first('Password') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Name</label>
                                                                    <input type="text"
                                                                        value={{ $data->Name == '' ? 'Không có thông tin' : $data->Name }}
                                                                        name="Name" placeholder="1234 Main St"
                                                                        class="form-control">
                                                                        <span class="text-red">
                                                                            {{ $errors->first('Name') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Address</label>
                                                                    <input type="text"
                                                                        value={{ $data->Address == '' ? 'Không có thông tin' : $data->Address }}
                                                                        name="Address" placeholder="1234 Main St"
                                                                        class="form-control">  <span class="text-red">
                                                                            {{ $errors->first('Address') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>City</label>
                                                                    <input type="text"
                                                                        value={{ $data->City == '' ? 'Không có thông tin' : $data->City }}
                                                                        name="City" class="form-control">
                                                                        <span class="text-red">
                                                                            {{ $errors->first('City') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>State</label>
                                                                    <input type="text"
                                                                        value={{ $data->State == '' ? 'Không có thông tin' : $data->State }}
                                                                        name="State" class="form-control">
                                                                        <span class="text-red">
                                                                            {{ $errors->first('State') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Zip</label>
                                                                    <input type="text"
                                                                        value={{ $data->Zip == '' ? 'Không có thông tin' : $data->Zip }}
                                                                        name="Zip" class="form-control">
                                                                        <span class="text-red">
                                                                            {{ $errors->first('Zip') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>Upload ảnh</label>
                                                                    <div class="input-group">
                                                                        <div class="">
                                                                            <input type="file" name="fileToUpload"
                                                                                id="fileToUpload">
                                                                        </div>
                                                                        <span class="text-red">
                                                                            {{ $errors->first('fileToUpload') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Up Date</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="about-me" class="tab-pane fade">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-3">
                                                    <h4 class="text-primary">About Me</h4>
                                                    <p class="mb-2">{{ $data->AboutMe }}.</p>
                                                </div>
                                            </div>
                                            <div class="profile-skills mb-5">
                                                <h4 class="text-primary mb-2">Skills</h4>
                                                <a href="javascript:void()"
                                                    class="btn btn-primary light btn-xs mb-1">{{ $data->Skills }}</a>
                                            </div>
                                            <div class="profile-lang  mb-5">
                                                <h4 class="text-primary mb-2">Language</h4>
                                                <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i
                                                        class="flag-icon flag-icon-us"></i> {{ $data->Language }}</a>
                                            </div>
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $data->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $data->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Availability <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $data->Availability }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $data->age }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $data->City }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Year Experience <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9"><span>07 Year Experiences</span>
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
        </div>
    </div>
@endsection
