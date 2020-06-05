@extends('shop.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($carts as $cart)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{ asset('storage/'.$cart->image) }}" alt="logo"
                                                style="height: 80px;"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $cart->nameProduct }}</a></h4>
                                <p>{{$cart->id }}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($cart->price)}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_down" href=""> - </a>
                                    <input class="cart_quantity_input" type="text" name="quantity"
                                           value=" {{$cart->number}}" autocomplete="off" size="2" readonly>
                                    <a class="cart_quantity_up" href=""> + </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{number_format($cart->price)}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{route('delete',['id'=>$cart->id_product])}}"><i
                                        class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Cart Empty</td>
                        </tr>
                    @endforelse

                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>{{ number_format($subTotal) }}</td>
                                </tr>
                                <tr>
                                    <td>Vat</td>
                                    <td>{{number_format($subTotal / 100 * 10)}}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>{{number_format($subTotal + ($subTotal / 100 * 10))}}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
                <span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
                <span>
						<label><input type="checkbox"> Paypal</label>
					</span>
            </div>
        </div>
    </section>
@endsection
