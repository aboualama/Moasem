

{{-- New products --}}

<div class="w3l_related_products">
    <div class="container">
        <h3>New Products</h3>
        <ul id="flexiselDemo2">  

            @foreach($new_products as $newproduct) 

            <li id="newproduct{{$newproduct->id}}">
                <div class="w3l_related_products_grid">
                    <div class="agile_ecommerce_tab_left dresses_grid">
                        <div class="hs-wrapper3" style="position: relative;  margin: 0 auto; overflow: hidden;"> 
                            <img src="{{ asset('uploads/product') }}/{{$newproduct->photo}}" alt=" " class="img-responsive" />
                            <div class="w3_hs_bottom">
                                <div class="flex_ecommerce">
                                    <a href="{{$newproduct->name}}" data-toggle="modal" data-target="#newModal{{$newproduct->id}}">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h5><a href="{{url('product')}}/{{$newproduct->id}}">{{$newproduct->name}}</a></h5>
                        <div class="simpleCart_shelfItem">
                            <p class="flexisel_ecommerce_cart"><span>$312</span> <i class="item_price">${{$newproduct->price}}</i></p>
                            <p><a class="newitem_add{{$newproduct->id}}" href="{{url('cart/add')}}/{{$newproduct->id}}">Add to cart</a></p>
                        </div>
                    </div>      
                </div>
            </li> 
            @endforeach
        </ul>
            <script type="text/javascript">
                $(window).load(function() {
                    $("#flexiselDemo2").flexisel({
                        visibleItems:4,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,            
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: { 
                            portrait: { 
                                changePoint:480,
                                visibleItems: 1
                            }, 
                            landscape: { 
                                changePoint:640,
                                visibleItems:2
                            },
                            tablet: { 
                                changePoint:768,
                                visibleItems: 3
                            }
                        }
                    });
                    
                });
            </script>
            <script type="text/javascript" src="{{ asset('web') }}/js/jquery.flexisel.js"></script>
            
            <script> 
                $(document).ready(function() {  
                $.ajaxSetup({
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                    });  
                    @foreach($new_products as $newproduct)    
                        $('.newitem_add{{$newproduct->id}}').on( 'click' , (function(event) {  
                            event.preventDefault()  ; 
                            var Id = $("#newproduct{{$newproduct->id}}").val();  
                            $.ajax({
                                url:  '{{url('cart/add')}}/{{$newproduct->id}}',
                                type: 'GET', 
                                data:  { id: Id }, 
                                success: function(response)
                                    {  
                                        $("#newproduct{{$newproduct->id}}").fadeOut(400);  
                                        $("#product{{$newproduct->id}}").fadeOut(400);   
                                        $num = parseInt($('#cartcountitem').text(),10);
                                        $('#cartcountitem').text($num + 1) ;  
                                    },  
                                })  
                        }));    
                    @endforeach 
                }); 
            </script>
    </div>
</div>  

{{-- modal for new products --}}

@foreach($new_products as $newproduct) 
<div class="modal video-modal fade" id="newModal{{$newproduct->id}}" tabindex="-1" role="dialog" aria-labelledby="newModal{{$newproduct->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
            </div>
            <section>
                <div class="modal-body">
                    <div class="col-md-5 modal_body_left">
                        <img src="{{ asset('uploads/product') }}/{{$newproduct->photo}}" alt=" " class="img-responsive" />
                    </div>
                    <div class="col-md-7 modal_body_right">
                        <h4> {{$newproduct->name}}</h4>
                        <p>{{$newproduct->description}}. </p>

                        <div class="modal_body_right_cart simpleCart_shelfItem">
                            <p><span>$3110</span> <i class="item_price">${{$newproduct->price}}</i></p>
                            <p><a class="newmodalitem_add{{$newproduct->id}}" href="{{url('cart/add')}}/{{$newproduct->id}}">Add to cart </a></p>
                        </div> 
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </section>
            
            <script> 
                $(document).ready(function() {  
                $.ajaxSetup({
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                    });   
                        $('.newmodalitem_add{{$newproduct->id}}').on( 'click' , (function(event) {  
                            event.preventDefault()  ; 
                            var Id = $("#productId{{$newproduct->id}}").val();  
                            $.ajax({
                                url:  '{{url('cart/add')}}/{{$newproduct->id}}',
                                type: 'GET', 
                                data:  { id: Id }, 
                                success: function(response)
                                    {  
                                        $(".modalitem_add{{$newproduct->id}}").text('Success Added');  
                                        $("#newModal{{$newproduct->id}}").modal('toggle');
                                        $("#newproduct{{$newproduct->id}}").fadeOut(400);   
                                        $("#product{{$newproduct->id}}").fadeOut(400);   
                                        $num = parseInt($('#cartcountitem').text(),10) + 1;
                                        $('#cartcountitem').text($num) ;  
                                    },  
                                })  
                        }));     
                }); 
            </script>
        </div>
    </div>
</div>
@endforeach

