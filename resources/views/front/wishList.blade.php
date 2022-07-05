@extends('front.master')

@section('content')

<br><br><br><br>
<section id="advertisement">
    <div class="container">
        <img src="{{asset('dist/images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">

                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"> <?php if (isset($msg)) { echo $msg; } else { ?> WishList Item <?php } ?> </h2>

                    <?php if ($Products->isEmpty()) { ?>
                        sorry, products not found
<?php } else { ?>

                        @foreach($Products as $product)

                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('/product_details')}}">
                                           <img src="{{url('images',$product->image)}}" alt="product image" />
                                        </a>
                                        <h2>रू{{$product->pro_price}}</h2>

                                        <p><a href="{{url('/product_details')}}">{{$product->pro_name}}</a></p>
                                        <a href="{{url('/cart/addItem')}}/{{$product->id}}" class="btn btn-primary add-to-cart"><i class="fa fa-shopping-cart"></i>Move to cart</a>
                                    </div>
                                    
                                </div>
                               

                              
                            <a href="{{url('/')}}/removeWishList/{{$product->id}}" style="color:red" class="btn btn-primary btn-block"><i class="fa fa-minus-square"></i>Remove from wishlist</a></li>

                                 
                            </div>
                        </div>
                        @endforeach
<?php } ?>


                </div>
                <ul class="pagination">
                
                </ul>
        
        </div>


</section>



@endsection

