@extends('layouts.app-web')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('submit-paypal') }}" method="post" class="col">
                @csrf
                <div class="col" style="display:flex !important">
                    <div class="col-md-8">
                        <article class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Review cart</h4>
                                <div class="row">
                                    @if (Session::has('cart') != null)
                                        @foreach (Session::get('cart')->products as $item)
                                            <div class="col-md-6">
                                                <figure class="itemside  mb-4">
                                                    <div class="aside" style="height: 180px"><img style="height: 100%"
                                                            src="{{ $item['productInfo']->image }}" class="border img-sm">
                                                    </div>
                                                    <figcaption class="info">
                                                        <p>{{ $item['productInfo']->name }} </p>
                                                        <span class="text-muted">Tiền : {{ number_format($item['productInfo']->price) }} |
                                                        </span>
                                                        <span class="text-muted">So luong : {{ $item['quantity'] }}</span>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </article>
                        <article class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Contact info</h4>
                                <form action="">
                                    <div class="row">
                                        {{-- <div class="form-group col-sm-6">
                                            <label>Frst name</label>
                                            <input type="text" name="Frst_name" placeholder="Type here"
                                                class="form-control">
                                        </div> --}}
                                        <div class="form-group col-sm-6">
                                            <label>Tên đầy đủ:</label>
                                            <input type="text" name="name" placeholder="Type here"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Phone</label>
                                            <input type="number" name="phone" class="form-control">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="example@gmail.com"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Địa chỉ gửi </label>
                                            <input type="text" name="addr_1" placeholder="abc" class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <h4 class="mb-3">Overview</h4>
                                <dl class="dlist-align">
                                    <dt>Total:</dt>
                                    <dd class="h5">${{ number_format(Session::get('cart')->totalPrice) }}</dd>
                                </dl>
                                <hr>
                                <p class="small mb-3 text-muted">By clicking you are agree with terms of condition </p>
                                <button type="submit" class="btn btn-primary btn-block"> Thanh Toán </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
