<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('csss/bootstrap.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('csss/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('csss/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('csss/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('csss/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('csss/style.css') }}" type="text/css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
</head>

<body>
    <header class="header-section">
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">

                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon"><a href="#">
                                    <span>Gio Hang</span>
                                </a>
                                <div class="cart-hover">
                                    {{-- <?php dump(Session::has('cart'));die;?> --}}
                                    <div id="chang-item-cart">
                                        @if (Session::has('cart') != null)
                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                        @foreach (Session::get('cart')->products as $item)
                                                            <tr>
                                                                <td style="height: 100px" class="si-pic"><img
                                                                        style="height:100%"
                                                                        src="{{ $item['productInfo']->image }}" alt="">
                                                                </td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <p>{{ $item['productInfo']->price }}₫ x
                                                                            {{ $item['quantity'] }}
                                                                        </p>
                                                                        <h6>{{ $item['productInfo']->name }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close">
                                                                    <i class="ti-close"
                                                                        data-id="{{ $item['productInfo']->id }}">de</i>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="select-total">
                                                <span>total:</span>
                                                <h5>{{ number_format(Session::get('cart')->totalPrice) }}₫</h5>
                                            </div>
                                            <div class="select-button">
                                            <a href="{{route('list-cart')}}" class="primary-btn view-card">VIEW CARD</a>
                                                <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </header>

    @yield('content')

    <script src="{{ asset('js2/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js2/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js2/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js2/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js2/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js2/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('js2/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js2/main.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        function renderItem(response) {
            $("#chang-item-cart").empty();
            $("#chang-item-cart").html(response);
        }

        function AddCart(id) {
            $.ajax({
                url: 'add-cart/' + id,
                type: 'GET'
            }).done(function(response) {
                renderItem(response)
                alertify.success('Them gio hang thanh cong');
            });
        }

        $("#chang-item-cart").on("click", ".si-close i", function() {
            $.ajax({
                url: 'delete-item-cart/' + $(this).data('id'),
                type: 'GET'
            }).done(function(response) {
                renderItem(response)
                alertify.success('Xoa gio hang thanh cong');
            });
        });

        function deleteListItem(id) {
            $.ajax({
                url: 'delete-List-item-cart/' + id,
                type: 'GET'
            }).done(function(response) {
                console.log(response);
                $("#list-cart").empty();
                $("#list-cart").html(response);
              
                alertify.success('Xoa gio hang thanh cong');
            });
        }

    </script>
</body>

</html>
