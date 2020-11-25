@extends('layouts.home')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông Tin</h4>
                        </div>
                        {{-- <?php dump($data); ?>
                        --}}
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('set-role-u', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tên</label>
                                            <input type="text" name="{{ isset($data->name) ? $data->name : 'name' }}"
                                                readonly style="background-color:#e6e6e6"
                                                value="{{ isset($data->name) ? $data->name : '' }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" name="{{ isset($data->email) ? $data->email : 'email' }}"
                                                readonly style="background-color:#e6e6e6"
                                                value="{{ isset($data->email) ? $data->email : '' }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Trạng Thái</label>
                                            <select id="multi-value-select" name="aryStatus" multiple="multiple">
                                                @if ($data->status === 'Hoạt Động')

                                                    <option selected value="Hoạt Động">Hoạt Động</option>
                                                    <option value="Không Hoạt Động">Không Hoạt Động</option>

                                                @elseif ($data->status === "Không Hoạt Động")

                                                    <option selected value="Không Hoạt Động">Không Hoạt Động</option>
                                                    <option value="Hoạt Động"> Hoạt Động</option>

                                                @endif
                                            </select>
                                            <span class="text-red">
                                                {{ $errors->first('aryStatus') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Chọn Nhóm Quyền</label>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <select id="inputState" name='ary' class="form-control">
                                                        <option selected>Choose...</option>
                                                        @foreach ($role as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                        @endforeach
                                                        <option value="Xoá quyền">Xoá quyền</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <span class="text-red">
                                                {{ $errors->first('ary') }}
                                            </span>
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
