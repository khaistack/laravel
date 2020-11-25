@extends('layouts.home')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title">Nhóm Quyền</h4>
                            <p class="m-0 subtitle"> <code>Tất cả quyền</code> ở <code>đây !!!</code>
                            </p>
                        </div>
                        <div class="card-body">
                            @foreach ($data as $key => $value)
                                <div id="accordion-six" class="accordion accordion-with-icon">
                                    <div class="accordion__item">
                                        <div class="accordion__header row" >
                                            <div class="col-md-6">
                                                <span class="accordion__header--icon"></span>
                                                <span class="accordion__header--text">{!! $value->name !!}</span>
                                            </div>
                                            <div class="col-md-6">
                                            <a href="{{route('edit-role',$value->id )}}" class="btn btn-primary edi shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <a href="javascript:;" class="deleted btn  edi deleteProduct btn-danger shadow btn-xs sharp" data-id='{!!  $value->id !!}'>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <span class="accordion__header--indicator indicator_bordered" data-toggle="collapse"
                                            data-target="#with-icon_collapseOne{!!$key!!}"></span>
                                        </div>
                                    <div id="with-icon_collapseOne{!!$key!!}" class="collapse accordion__body show"
                                            data-parent="#accordion-six">
                                            <div class="accordion__body--text">
                                                <div class="basic-forms">
                                                    <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                @foreach ($value->getRole as $item)
                                                                    <input type="checkbox" checked class="form-check-input"
                                                                        name="Created" value="Option 1">{!! $item['action']
                                                                    !!}
                                                                @endforeach
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
