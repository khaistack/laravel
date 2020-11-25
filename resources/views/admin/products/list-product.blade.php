@extends('layouts.home')
@section('content')
    <div class="content-body">
        <!-- container starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh Sách Sản Phẩm</h4>
                            @if ($message = Session::get('err'))
                                <strong class="edit-strong">{{ $message }}</strong>
                            @endif
                        </div>
                        <div class="col-lg-12 row mt-2">
                            <div class="col-lg-6">
                                <a href="{{ route('product-export') }}" class="btn light btn-primary">Excel</a>
                                <a href="{{ route('print_pdf') }}" type="button" class="btn light btn-secondary">PDF</a>
                            </div>
                            <div class="col-lg-6">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <input class="form-control float-right max-width: 150px" onkeyup="check(this)" key='keyword'
                                    name="search" id="keyword" aria-label="Search" type="search"
                                    placeholder="Nhập để tìm kiếm" aria-label="Search">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md" id="table-render">
                                    <thead class="text-center">
                                        <tr>
                                            <th><strong>Stt.</strong></th>
                                            <th><strong>Tên</strong></th>
                                            <th><strong>Ảnh</strong></th>
                                            <th><strong>Mã SP</strong></th>
                                            <th><strong>Mô Tả</strong></th>
                                            <th><strong>Giá</strong></th>
                                            {{-- <th><strong>Số Lượng</strong></th>
                                            --}}
                                            <th><strong>Chỉnh Sửa</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr class="text-center">
                                                <td class="id text-center"><strong>{{ $item->id }}</strong></td>
                                                <td class="text-center"> {{ $item->name }} </td>
                                                <td class="td-edit text-center"> <img class="im-edit"
                                                        src="{{ $item->image }}" alt="">
                                                </td>
                                                <td class="text-center"> {{ $item->code }} </td>
                                                <td class="text-justify edit-fild">
                                                    <p>{{ $item->describe }}</p>
                                                </td>
                                                <td class="text-center">{{ $item->price }} đ</td>
                                                {{-- <td class="text-center">
                                                    {{ $item->quantity }}</td> --}}
                                                <td>
                                                    <div class="d-center">

                                                        <a href="{{ route('edit-product', $item->id) }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>

                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                        <a onclick="deleted(this)" href="javascript:;"
                                                            data-id="{{ $item->id }}"
                                                            class="btn deleteProduct btn-danger shadow btn-xs sharp">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
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

            var del_id = $(i).attr('data-id');
            let token = '{!!  csrf_token() !!}';
            $.ajax({
                type: 'POST',
                url: '/admin/delete-product/',
                data: {
                    'id': del_id,
                    '_token': token
                },
                success: function(data) {
                    console.log(data.err);
                    if (data.sus) {
                        $(i).parent().parent().parent().remove();
                        toastr.success(data, 'Xoá Thành Công');
                    }
                    // toastr.success(data, 'Bạn không có quyền xoá');
                }
            });
        }

        $("#keyword").autocomplete({
            serviceUrl: '/admin/search',
            paramName: "keyword",

            transformResult: function(response) {
                return {
                    suggestions: $.map($.parseJSON(response), function(item) {
                        // console.log(item);
                        return {
                            data: item,
                            value: item.name,
                        };
                    })
                };
            },
            onSelect: function(suggestion) {
                $("#keyword").val(suggestion.value);
                renderItem(suggestion.data);
            },
        });

        const tbale = $('#table-render tbody').html();

        function check($i) {
            var valuInput = $($i).val();
            if (valuInput == '') {
                $('#table-render tbody').html(tbale);
            }
        }

        function renderItem($item) {
            var html = '<tr class="text-center">' +
                '<td class="id text-center"><strong>29</strong></td>' +
                '<td class="text-center">' + $item.name + ' </td>' +
                '<td class="text-center"> ' + $item.code + ' </td>' +
                '<td class="td-edit text-center"> <img class="im-edit" src="' + $item.image + '" alt=""></td>' +
                '<td class="text-justify edit-fild">' +
                '<p>' + $item.describe + '</p>' +
                '</td>' +
                '<td class="text-center">' + $item.price + ' đ</td>' +
                '<td class="text-center">' + $item.quantity + '</td>' +
                '<td>' +
                '<div class="d-center">' +
                '<form method="post" action="http://localhost:8000/admin/edit-product?29">' +
                '<input type = "hidden"  name = "_token" value = "TCYYh0TPW5MphKOYBMST3rvUO8t3SkC0dwfgGDxI" > <button button type = "submit" class = "btn btn-primary shadow btn-xs sharp mr-1" > ' +
                '<i class="fa fa-pencil"></i>' +
                '</button>' +
                '</form>' +
                '<meta name="csrf-token" content="TCYYh0TPW5MphKOYBMST3rvUO8t3SkC0dwfgGDxI">' +
                '<a onclick="deleted(this)" href="javascript:;" data-id="29" class="btn deleteProduct btn-danger shadow btn-xs sharp">' +
                '<i class="fa fa-trash"></i>' +
                '</a>' +
                '</div>' +
                '</td>' +
                '</tr>';

            $('#table-render tbody').html(html);
        }

    </script>
    <style>
        .autocomplete-suggestions {
            border: 1px solid #999;
            background: #FFF;
            overflow: auto;
        }

        .autocomplete-suggestion {
            padding: 2px 5px;
            white-space: nowrap;
            overflow: hidden;
        }

        .autocomplete-selected {
            background: #F0F0F0;
        }

        .autocomplete-group {
            padding: 2px 5px;
        }

        .autocomplete-group strong {
            display: block;
            border-bottom: 1px solid #000;
        }

    </style>
@endsection
