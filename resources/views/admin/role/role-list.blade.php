@extends('layouts.home')
@section('content')
<?php dump($aaa) ?>
    <div class="content-body">
        <!-- container starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title">Nhóm Quyền</h4>
                            <p class="m-0 subtitle">Add <code>accordion-with-icon</code> class with <code>accordion</code></p>
                        </div>
                        <div class="card-body">
                            <div id="accordion-six" class="accordion accordion-with-icon">
                                <div class="accordion__item">
                                    <div class="accordion__header" data-toggle="collapse" data-target="#with-icon_collapseOne">
                                        <span class="accordion__header--icon"></span>
                                        <span class="accordion__header--text">Trưởng Phòng</span>   
                                        <a href="" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        <span class="accordion__header--indicator indicator_bordered"></span>
                                    </div>  
                                    @foreach ($aaa as $item)
                                        @dump(
                                            $item->permissions
                                        )
                                    @endforeach
                                    <div id="with-icon_collapseOne" class="collapse accordion__body show" data-parent="#accordion-six">
                                        <div class="accordion__body--text">
                                            <div class="basic-form">
                                                <form action="roles.store" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="Created" value="Option 1">Created
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="Post" value="">Edit
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="Delete"  value="">Delete
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="view" value="">View
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="excel" value="">Excel
                                                            </label>
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
                </div>
            </div>
        </div>
    </div>
@endsection