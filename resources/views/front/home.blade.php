
@extends('front.master')

@section('content')
 

<!-- <link href="{{asset('dist/js/slick.js')}}"> -->
<br>
<br>
<br>
   
  
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

   
    

      

      <section>
        <div class="album text-muted">

        <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <?php $cats = DB::table('products')->get(); ?>
            @foreach($cats as $product)

   
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="images/{{$product->image}}" alt="card-img-top">
              
              
                  <p class="card-text"><b>{{$product->pro_name}}</b></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-secondary"><a href="{{url('/product_details')}}/{{$product->id}}">View Product</a> </button>
                      <button type="button" class="btn btn-sm btn-secondary"><a href="{{url('/cart/addItem')}}/{{$product->id}}">Add To Cart</a></button>
                    </div>
                   
                
              
              </div>
            </div>
      
            @endforeach
          </div>
        </div>
      </div>

        </div>
      </section>
      



    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Recommended items</h2>
@include('front.recommends')
                    

    </div>

  
@endsection

