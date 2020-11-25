@extends('layouts.home')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh Sách Nhân Viên</h4>
                            @if ($message = Session::get('err'))
                                <strong class="edit-strong">{{ $message }}</strong>
                            @endif
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
                                            <th><strong>Sét Quyền</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr class="tr">
                                                <td><strong>{!! $item['id'] !!}</strong></td>
                                                <td>
                                                    <div class="d-flex align-items-center"><img
                                                            src="{!!  $item['avatar'] !!}" class="rounded-lg mr-2"
                                                            width="24" alt="" /> <span class="w-space-no">{!! $item['name']
                                                            !!}</span></div>
                                                </td>
                                                <td>{!! $item['email'] !!} </td>
                                                <td>{!! $item['created_at'] !!}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($item['status'] == '' || $item['status'] == 'Không Hoạt Động')
                                                            <i class="fa fa-circle text-err mr-1"></i>Không Hoạt Động
                                                        @else
                                                            <i class="fa fa-circle text-success mr-1"></i>{!!
                                                            $item['status'] !!}
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($item['roles_id'] == 0)
                                                            <i class="fa fa-circle text-err mr-1"></i>Chưa có quyền
                                                        @else
                                                            @foreach ($role as $values)
                                                                {!! $item['roles_id'] == $values->id ? ' <i
                                                                    class="fa fa-circle text-success mr-1"></i>' .
                                                                $values->name : ($item['roles_id'] == '' ? 'Chưa có quyền' :
                                                                '') !!}
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form method="post" enctype="multipart/form-data"
                                                            action="{{ route('set-role', $item['id']) }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-primary shadow btn-xs sharp mr-1">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                                            <a onclick="deleted(this)" href="javascript:;"
                                                                data-id="{{ $item['id'] }}"
                                                                class="btn deleteProduct btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
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
@section('script')

    <script type="text/javascript">
        function deleted(i) {
            alert('bạn chắn chắn xoá chứ ?')
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            var box = $(i).closest('.tr');
            var del_id = $(i).attr('data-id');
            let token = $('meta[name=csrf-token]').attr('content');
            $.ajax({
                type: 'POST',
                url: '/admin/user/destroyUser/',
                data: {
                    'id': del_id,
                    '_token': token
                },
                success: function(data) {
                    if (data) {
                        $(box).remove();
                        toastr.success(data, 'Xoá Thành Công');
                    }
                }
            });
        }
    </script>
@endsection
