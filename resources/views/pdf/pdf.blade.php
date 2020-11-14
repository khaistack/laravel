<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Create PDF</title>
    <link rel="stylesheet" href="{{ public_path('health/css/bootstrap.min.css') }}">
    <style>
        * {
            font-family: DejaVu Sans !important;
            font-size: 12px;
        }

        .edit-fild {
            width: 300px;
        }

        .table {
            border: 1px solid black;
        }

        .thead {
            border-bottom: 1px solid black;
        }

        .tr {
            border-right: 1px solid black;
        }
        .text-center{
            text-align: center
        }

    </style>
</head>

<body>
    <div class="content-body">
        <!-- container starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh Sách Sản Phẩm</h4>
                        </div>
                        <div class="col-lg-12 row mt-2">
                            <div class="col-lg-6">
                                <input class="form-control float-right max-width: 150px" type="search"
                                    placeholder="Search Here" aria-label="Search">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead">
                                        <tr class="tr">
                                            <th class="tr"><strong>Stt.</strong></th>
                                            <th class="tr"><strong>Mã Sản Phẩm</strong></th>
                                            <th class="tr"><strong>Mô Tả</strong></th>
                                            <th class="tr"><strong>Giá</strong></th>
                                            <th ><strong>Số Lượng</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($data as $item)
                                            <tr class="text-center tr">
                                                <td class="id text-center tr "><strong>{{ $item->id }}</strong></td>
                                                <td class="text-center tr"> {{ $item->code }} </td>
                                                <td class="text-center tr  edit-fild">{{ $item->describe }}</td>
                                                <td class="text-center tr">{{ $item->price }} đ</td>
                                                <td class="text-center ">{{ $item->quantity }}</td>
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
</body>

</html>
