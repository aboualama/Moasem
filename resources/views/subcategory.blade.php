@extends('layouts.app')

@section('keywords')
 {{$subcategory->name}}
@endsection

@section('description')
 {{$subcategory->name}}
@endsection

@section('title')
 {{$subcategory->name}}
@endsection

@section('content')


 
<!-- banner -->
    <div class="banner4" style="background-image:url({{asset('uploads/subcategory')}}/{{$subcategory->img }}); " id="home1">
        <div class="container">
            <h2>Women {{$subcategory->name}}<span>up to</span> Flat 40% <i>Discount</i></h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>{{$subcategory->name}}</li>
            </ul>
        </div>
    </div>
<!-- //breadcrumbs -->

<!-- dresses -->
    <div class="dresses">
        <div class="container">
            <div class="w3ls_dresses_grids"> 


             @include('layouts.inc.sidebar')  


  
                <div class="col-md-8 w3ls_dresses_grid_right">
                    <div class="col-md-6 w3ls_dresses_grid_right_left">
                        <div class="w3ls_dresses_grid_right_grid1">
                            <img src="{{asset('uploads/subcategory')}}/{{$subcategory->l_img }}" alt=" " class="img-responsive" />
                            <div class="w3ls_dresses_grid_right_grid1_pos1">
                                <h3>{!!$subcategory->l_title !!}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 w3ls_dresses_grid_right_left">
                        <div class="w3ls_dresses_grid_right_grid1">
                            <img src="{{asset('uploads/subcategory')}}/{{$subcategory->r_img }}" alt=" " class="img-responsive" />
                            <div class="w3ls_dresses_grid_right_grid1_pos">
                                <h3>{!!$subcategory->r_title !!}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

 

                    <div class="w3ls_dresses_grid_right_grid2">
                        <div class="w3ls_dresses_grid_right_grid2_left">
                        <h3>Showing Results: {{ !empty($results->lastItem()) ? $results->lastItem() : 0 }}-{{$products->count()}}</h3> 
                        </div>
                        <div class="w3ls_dresses_grid_right_grid2_right">  
                            <ul style= "position: relative; margin-right: 15px; float: left;" >
                                <li class="dropdown" style= " border: 1px solid #eee; padding: 10px;  list-style: none;">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre style= " color: #ff9b05; text-decoration: none">
                                       Default sorting<span class="caret"></span>
                                    </a> 
                                    <ul class="dropdown-menu" style= "position: absolute; top: 40px; left: -1px; box-shadow: none; border: 1px solid #eee; border-radius: inherit; ">

                                <li><a href="{{url('/category')}}/{{slug($subcategory->name)}}/1">Sort by popularity </a></li>
                                <li><a href="{{url('/category')}}/{{slug($subcategory->name)}}/2">Sort by average rating </a></li>
                                <li><a href="{{url('/category')}}/{{slug($subcategory->name)}}/3">Sort by newness</a></li>
                                <li><a href="{{url('/category')}}/{{slug($subcategory->name)}}/4">Sort by price: low to high</a></li>
                                <li><a href="{{url('/category')}}/{{slug($subcategory->name)}}/5">Sort by price: high to low</a></li> 
                                    </ul>
                                </li> 
                            </ul>  
                        </div>
                        <div class="clearfix"> </div>
                    </div>
 
                    <div class="w3ls_dresses_grid_right_grid3"> 



{{-- subcategory products --}}

                    @foreach($products as $product)

                    <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses" id="product{{$product->id}}">
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

                                    {{-- @if( in_array($product->id, session()->get('id')) ) 
                                        <p class="item_added{{$product->id}} alert-success" > Done ... Added to cart  </p> 
                                    @else   --}}
                                        <p><a class="item_add{{$product->id}}" href="#" >Add to cart</a></p>
                                    {{-- @endif   --}}
                                    <input type="hidden" id="productId{{$product->id}}" name="" value="{{$product->id}}">
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
            </div>
        </div>
    </div>   

    <script> 
        $(document).ready(function() {  
        $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });  
            @foreach($products as $product)    
                $('.item_add{{$product->id}}').on( 'click' , (function(event) {  
                    event.preventDefault()  ; 
                    var Id = $("#productId{{$product->id}}").val();  
                    $.ajax({
                        url:  '{{url('cart/add')}}/{{$product->id}}',
                        type: 'GET', 
                        data:  { id: Id }, 
                        success: function(response)
                            {  
                                $("#product{{$product->id}}").fadeOut(400);  
                            },  
                        })  
                }));    
            @endforeach 
        }); 
    </script>
 

{{-- modal for subcategory products --}}

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
