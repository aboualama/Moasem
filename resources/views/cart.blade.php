@extends('layouts.app')

@section('keywords')
 {{-- {{ $page->keywords }}  --}}
@endsection

@section('description')
 {{-- {{ $page->description }} --}}
@endsection

@section('title')
  Shopping Cart
@endsection

@section('content')


 
<!-- banner -->
    <div class="banner10" id="home1">
        <div class="container">
            <h2> Shopping Cart</h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li> Shopping Cart</li>
            </ul>
        </div>
    </div>
<!-- //breadcrumbs -->
<!-- checkout -->

@if(cart::count() == 0 ) 
<h1 class="empty text-center" style="margin-top: 70px "> Cart Shopping Is Empty</h1>
@else
    <div class="checkout">
        <div class="container">
            <h3>Your shopping cart contains: <span>{{cart::count()}} Products</span></h3>
            <div class="alret">
                
                <div class="alert" style="display: none;" id ="masg" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Title!</strong> Alert body ...
                </div>
            </div>
            <div class="checkout-right">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th> 
                            <th style="width: 40%;">Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Service Charges</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                @foreach($cart_item as $cartItem)
                    <tr  class="tr{{$cartItem->id}}">
                        <td class="invert">{{$cartItem->id * 6241}}</td> 
                        <td class="invert-image">
                            <a href="{{url('product')}}/{{$cartItem->id}}">
                                <img src="{{ asset('uploads/product') }}/{{$cartItem->options->photo}}" alt=" " class="img-responsive" />
                            </a>
                        </td>
                        <td class="invert">
                             <div class="quantity"> 
                                <div class="quantity-select">                           
                                    <div class="entry qty{{$cartItem->id}} value-minus" >&nbsp;</div>
                                    <div class="entry value"" id="qty{{$cartItem->id}}"><span>{{$cartItem->qty}}</span></div>
                                    <div class="entry qty{{$cartItem->id}} value-plus active" >&nbsp;</div>
                                </div>
                            </div>
                        </td> 

                        <input type="hidden" id="rowId{{$cartItem->id}}" value="{{$cartItem->rowId }}">

                        <td class="invert">{{$cartItem->name}}</td>
                        <td class="invert" id="to{{$cartItem->id}}">{{$cartItem->qty}}</td>
                        <td class="invert" id="price{{$cartItem->id}}">${{$cartItem->price}}</td>
                        <td class="invert">
                              <form id="deleteform{{$cartItem->id}}" >
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                 
                <!--quantity-->
                    <script>
                    $('.value-plus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                        divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                        if(newVal>=1) divUpd.text(newVal);
                    });

                    </script>


                    <script>

                    $(document).ready(function() {  
                      $.ajaxSetup({
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                          }); 

                        @foreach($cart_item as $cartItem)  
                            $('.qty{{$cartItem->id}}').on( 'click' , (function() { 
                                var qty   = $('#qty{{$cartItem->id}}').text();
                                var rowId = $("#rowId{{$cartItem->id}}").val();
                                var price = $("#price{{$cartItem->id}}").text();  
                                $.ajax({
                                    url:  '{{url('/cart/update')}}',
                                    type: 'put', 
                                    data:  { qty: qty, rowId: rowId, }, 
                                    success: function(response)
                                        { 
                                            $('#to{{$cartItem->id}}').text(qty);
                                            $('#to1{{$cartItem->id}}').text(qty); 
                                        },  
                                    })  
                            }));   

                            $('#deleteform{{$cartItem->id}}').submit(function(event){
                                var rowId = $("#rowId{{$cartItem->id}}").val();
                                $.ajax({
                                    url:  '{{url('cart/delete') }}/{{$cartItem->rowId }}',
                                    type: 'delete', 
                                    data:  { rowId: rowId, },

                                    success: function(response)
                                        { 
                                            $(".tr{{$cartItem->id}}").fadeOut(2000); 
                                        }, 
  
                                    }) 
                                event.preventDefault() 
                            });  
                        @endforeach 
                    });

                    </script>
                <!--quantity-->
                </table>   
 

            </div>
            <div class="checkout-left"> 
                <div class="checkout-left-basket">
                    <h4>Continue to basket</h4>
                    <ul>
                        @foreach($cart_item as $cartItem)
                        <li class="tr{{$cartItem->id}}"><span style="width: 45%; float: left;">{{$cartItem->name}}</span> 
                            <i id="to1{{$cartItem->id}}">-( {{$cartItem->qty}} )-</i> 
                            <span> ${{$cartItem->price * $cartItem->qty }} </span> 
                        </li> 
                        @endforeach
                        <li class="cart-li-total" >Total Service Charges <i>-</i> <span>$ {{$charge}}</span></li>
                        <li>Total <i>-</i> <span>${!!Cart::subtotal(0, '','') + $charge !!}</span></li> 
                            {{-- Cart::subtotal(0, '','') or you can edit it from config cart --}}
                    </ul>       


                    @if($registration_setting == 'active')
                        @guest
                            You Must <a href="#" data-toggle="modal" data-target="#myModallogin"> Sign in </a> to Buy Now  
                        @else  
        
                        {{-- <form action="{{url('/checkout')}}"> 
                            <button class="paypal-button" type="submit">Checkout</button>
                        </form>  --}}
                    
                        <div class="checkout-div"> 
                            <a href="{{url('/checkout')}}">
                                Checkout 
                            </a>
                        </div>
                    @endguest 
                    @endif    

                </div> 

@endif

                <div class="checkout-right-basket">
                    <a href="{{url('/all-products')}}">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping
                    </a>
                </div>


                
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>



                        <div class="clearfix"> </div>



 
 {{-- New products --}}


 
 @include('newprod') 
  
 @endsection
 