{{-- @extends('layouts.app-web')
@section('cart') --}}
    @if (Session::has('cart'))
        <div class="select-items">
            <table>
                <tbody>
                    @foreach (Session::get('cart')->products as $item)
                        <tr>
                            <td style="height: 100px" class="si-pic"><img style="height:100%"
                                    src="{{ $item['productInfo']->image }}" alt=""></td>
                            <td class="si-text">
                                <div class="product-selected">
                                    <p>{{ $item['productInfo']->price }}₫ x {{ $item['quantity'] }} </p>
                                    <h6>{{ $item['productInfo']->name }}</h6>
                                </div>
                            </td>
                            <td class="si-close">
                                <i class="ti-close" data-id="{{ $item['productInfo']->id }}">de</i>
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
            <a href="" class="primary-btn view-card">VIEW CARD</a>
            <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
        </div>
    @endif
{{-- @endsection --}}
