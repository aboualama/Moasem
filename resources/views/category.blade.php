@extends('layouts.app')

@section('keywords')
 {{$category->name}}
@endsection

@section('description')
 {{$category->name}}
@endsection

@section('title')
 {{$category->name}}
@endsection

@section('content')


 
<!-- banner -->
    <div class="banner4" style="background-image:url({{asset('uploads/category')}}/{{$category->img }}); " id="home1">
        <div class="container">
            <h2>Women {{$category->name}}<span>up to</span> Flat 40% <i>Discount</i></h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>{{$category->name}}</li>
            </ul>
        </div>
    </div>
<!-- //breadcrumbs -->
 
<!-- dresses -->
    <div class="dresses">
        <div class="container">
            <div class="w3ls_dresses_grids"> 
            @if(count($products) >= 1)

             @include('layouts.inc.sidebar')   
                

                <div class="col-md-8 w3ls_dresses_grid_right">
 

{{-- products products --}}
                    <div class="w3ls_dresses_grid_right_grid3">  
                        <h3 style="margin-bottom: 30px">Found:  {{$products->count()}} Results</h3> 

                    
                        @foreach($products as $product)

                            <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
                                <div class="agile_ecommerce_tab_left dresses_grid">
                                    <div class=" hs-wrapper2" style="position: relative;  margin: 0 auto; overflow: hidden;">
                                        <img src="{{ asset('uploads/product') }}/{{$product->photo}}" alt=" " class="img-responsive" /> 
                                        <div class="w3_hs_bottom w3_hs_bottom_sub1">
                                            <ul>
                                                <li>
                                                    <a href="{{$product->name}}" data-toggle="modal" data-target="#myModal{{$product->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h5><a href="{{url('product')}}/{{$product->id}}">{{$product->name}}</a></h5>
                                    <div class="simpleCart_shelfItem">
                                        <p><span>$420</span> <i class="item_price">{{$product->price}}</i></p>
                                        <p><a class="item_add" href="{{url('cart/add')}}/{{$product->id}}">Add to cart</a></p>
                                    </div>
                                @if($product->created_at > Carbon\Carbon::now()->subDays(7))
                                    <div class="dresses_grid_pos">
                                        <h6>New</h6>
                                    </div>
                                @endif
                                </div>
                            </div> 
                        @endforeach


                            <div class="clearfix"> </div>     


                    </div>   
                </div> 
                <div class="clearfix"> </div>

            @else
                
                <h1 style="text-transform: capitalize; text-align: center;">There is no product in Category
                    { <span style="color: #FF9B05"> {{$category->name}}</span> }
                </h1>      
                
            @endif
            </div>
        </div>
    </div> 
 

{{-- modal for category products --}}

    @foreach($products as $product)
    <div class="modal video-modal fade" id="myModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$product->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                </div>
                <section>
                    <div class="modal-body">
                        <div class="col-md-5 modal_body_left">
                            <img src="{{ asset('web/images') }}/{{$product->photo}}" alt=" " class="img-responsive" />
                        </div>
                        <div class="col-md-7 modal_body_right">
                            <h4>a good look black women's jeans  {{$product->name}}</h4>
                            <p>{{$product->description}} . vv Duis aute irure dolor in 
                                reprehenderit in voluptate velit esse cillum dolore 
                                eu fugiat nulla pariatur. Excepteur sint occaecat 
                                cupidatat non proident, sunt in culpa qui officia 
                                deserunt mollit anim id est laborum.</p>
                            <div class="rating">
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star-.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star-.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star-.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="rating-left">
                                    <img src="{{ asset('web') }}/images/star.png" alt=" " class="img-responsive" />
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="modal_body_right_cart simpleCart_shelfItem">
                                <p><span>$320</span> <i class="item_price">${{$product->price}}</i></p>
                                <p><a class="item_add" href="{{url('cart/add')}}/{{$product->id}}">Add to cart </a></p>
                            </div>
                            <h5>Color</h5>
                            <div class="color-quality">
                                <ul>
                                    <li><a href="#"><span></span>Red</a></li>
                                    <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                    <li><a href="#" class="purple"><span></span>Purple</a></li>
                                    <li><a href="#" class="gray"><span></span>Violet</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @endforeach




 
    @include('newprod') 
  
@endsection
