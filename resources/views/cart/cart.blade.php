@extends('layouts.app-web')
@section('content')
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table" id="list-cart">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Tên Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Total</th>
                                    <th>Xoá</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Session::has('cart'))
                                    @foreach (Session::get('cart')->products as $item)
                                        <tr>
                                            <td style="height:236px !important" class="cart-pic first-row"><img
                                                    src="{{ $item['productInfo']->image }}" style="height:100%" alt="">
                                            </td>
                                            <td class="cart-title first-row">
                                                <h5>{{ $item['productInfo']->name }}</h5>
                                            </td>
                                            <td class="p-price first-row">${{ number_format($item['productInfo']->price) }}</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $item['quantity'] }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row">${{ $item['price'] }}</td>
                                            <td onclick="deleteListItem('{{ $item['productInfo']->id }}')"
                                                class="close-td first-row"><i class="ti-close">de</i></td>
                                            <td class="close-td first-row"><i class=" ti-save">ed</i></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Số lượng <span>{{ Session::get('cart')->totalQuantity }}</span>
                                    </li>
                                    <li class="cart-total">Tổng Tiền <span>${{ Session::get('cart')->totalPrice }}</span>
                                    </li>
                                </ul>
                                <a href="{{ route('paypal-cart') }}" class="proceed-btn">Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
