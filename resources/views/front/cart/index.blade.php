@extends('layout.master')

@section('css')
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
@stop


@section('content')
    <div class="section group">
        <div class="row">
            <!-- list item cart -->
            <div class="col-md-7 list_item_cart">
                <table class="table table-responsive">
                    <tbody>

                    @foreach($cartItems as $item)
                        <tr id="{{ $item->rowId }}">
                            <td class="image">
                                <img src="{{ asset('images/'. $item->options->img) }}" alt=""></td>
                            <td>
                                <h3 class="pro_title">{{ $item->name }}</h3>
                                <p class="pro_price">{{ $item->price }} VND</p>
                            </td>
                            <td>
                                <div class="pdt-40">
                                    <input class="cartItemEvent" data-productID="{{ $item->id }}" data-rowID="{{ $item->rowId }}" type="number" min="1" max="1000" value="{{ $item->qty }}"   />

                                    <br><br>
                                    <p class=""><a href="{{ route('removeItemCart', ['id'=> $item->rowId]) }}">Remove</a></p>

                                </div>

                            </td>
                            <td>
                                <div class="pdt-40">
                                    <span class="bold total_price_item">{{ $item->subtotal }} VND</span>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end list item cart -->

            <!-- sidebarcar -->
            <div class="col-md-5 sidebar_item_cart ">
                <div class="wapper_total">
                    <div class="row">

                        <div class="col-md-7">
                                                <span class="label bold">
                                                        Subtotal:
                                                </span>
                        </div>
                        <div class="col-md-5">
                                                <span class="price bold" id="subtotal">
                                                        {{ Cart::subtotal() }} VND
                                                </span>
                        </div>






                    </div>

                    <div class="row">
                        <div class="col-md-7">
                                            <span class="label bold">
                                                    Tax:
                                            </span>
                        </div>
                        <div class="col-md-5">

                                            <span class="price bold" id="tax">

                                                {{ Cart::tax() }} VND
                                            </span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-7">
                                            <span class="label bold" >
                                                    Total:
                                            </span>
                        </div>
                        <div class="col-md-5">

                                            <span class="price bold" id="total">

                                                {{ Cart::total() }} VND
                                            </span>
                        </div>
                    </div>
                </div>


                <div class="button_wapper mgt-20">
                    <button class="btn btn-warning">Checkout</button>
                </div>
            </div>
            <!-- end sidebarcar -->
        </div>
    </div>
@stop



@section('js')

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.cartItemEvent').change(function () {

                var value = $(this).val();
                if (value>0)
                {
                    var rowId = $(this).attr('data-rowID');
                    var proId = $(this).attr('data-productID');
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: '{{ route('updateItemCart') }}',

                        //data: "qty=" + value + "& rowId=" + rowId + "& proId=" + proId,
                        data: { qty: value, rowId:rowId,  proId: proId},
                        success: function (response) {
                            var data = response.data;
                            var totalItem = data['qty'] * data['price'];
                            var totalListItems = response.total;
                            var subtotal = response.subtotal;
                            var tax = response.tax;

                            $('#'+ data['rowId'] +' .total_price_item').text(totalItem + " VND");
                            $('#total').text(totalListItems + " VND");
                            $('#tax').text(tax + " VND");
                            $('#subtotal').text(subtotal + " VND");
                        }
                    });
                }
                else
                {
                    alert('Quantity > 0 ');
                }
            })
        });
    </script>

@stop