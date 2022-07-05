@extends('front.master')

@section('content')

<main role="main">


<div id="myCarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">

          <div class="carousel-item active">
            <img class="first-slide" src="{{URL::asset('dist/img/create-section1.jpg')}}" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="{{URL::asset('dist/img/explore-section1.jpg')}}" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="{{URL::asset('dist/img/rollsroysemain.jpg')}}" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>




  
      <div class="album text-muted">
         <div class="container">

<h3 class="test-center"><?php if(isset($msg)) {echo $msg; } else {  ?> Featured Item <?php } ?> </h3>

          <div class="row">

            @foreach($products as $product)
            <div class="card" style="width: 30rem height=20rem">
                <img class="card-img" src="images/{{($product->image) }}" alt="Card image cap">               
                <div class="card-body">            
                <p class="card-text">{{$product->pro_name}}</p>
                </div>
                <p class="">
                @if($product->splprice==0)
                <div class="d-flex justify-content-between align-items-center">
                  <p class="card-text">रू{{$product->pro_price}}</p>                 
                </div>
                @else
                <div class="d-flex justify-content-between align-items-center">
                  <p class="card-texttext-decoration:lin-through; color:#333">
                  रू{{$product->pro_price}}</p>
                    <img src="{{url::asset('dist/images/shop/sale.png')}}" alt="...." style="width: 60px;">
                </div>
                @endif
                </p>


                <button class="btn btn-primary addcart btn-sm">
                  <a href="{{url('/product_details')}}/{{$product->id}}" class="add-to-cart">View Product</a>
                </button>

                <button class="btn btn-primary btn-sm float-right">
                  <a href="{{url('/cart/addItem')}}/{{$product->id}}" class="add-to-cart">Add To Cart <i class="fa fa-shopping-cart"></i> </a>
                </button>
                </div>
            
            @endforeach
            
          
            </div>

           
          </div>
        </div>
      </div>

    </main>
    @endsection