@extends('front.master')

@section('content')
<style>
  .review-details{
    color: white !important;
  }

</style>



<script>
$(document).ready(function(){
  $('#size').change(function(){
    var size = $('#size').val();
    var proDum = $('#proDum').val();
    


    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/selectSize');?>',
        data: "size=" + size + "& proDum=" + proDum,
        success: function (response) {
            console.log(response);
           $('#price').html(response);
        }
    });

  });
});

</script>


<h1>Details page</h1>

<br>
<br>

<section id="index-amazon">

 
<div class="amazon">
<div class="container">

<div class="row">
<div class="col-md-12">
<div class="product">
<div class="row">
<div class="col-md-6 col-xs-12">


@foreach($Products as $product)


<div class="thumbnail">
             <img src="{{url('images',$product->image)}}" class="card-img">
                                <br>



</div>




<!-- ALT IMAGE  -->


</div>




<div class="col-md-5 col-md-offset-1">

<div class="product-details">

<h2 class="product-title">
 <h2><?php



 echo ucwords($product->pro_name);?></h2>
 <h5>{{$product->pro_info}}</h5>






 <form action="{{url('/cart/addItem')}}/{{$product->id}}">


 @if($product->spl_price ==0)

 <span id="price">${{$product->pro_price}}
  
  <input type="hidden" value="{{$product->pro_price}}" name="newPrice"/>


  @else


  <div class="d-flex justify-content-between align-items-center">

          <input type="hidden" value="<?php echo $product->spl_price;?>" name="newPrice"/>
            <p class="" style="text-decoration:line-through; color:#333">${{$product->spl_price}}</p>
             <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
             <p class="">${{$product->pro_price}}</p>  
           </div>


  @endif
  <!-- <input type="text" value="{{$product->pro_price}}" name="newPrice"> -->


 </span>
 </h2>
 <p><b>Availability:</b>{{$product->stock}} In Stock</p>


 
 <?php 
 $sizes = DB::table('products_properties')->where('pro_id',$product->id)->get(); 
 ?>

 <select name="size" id='size'>

    @foreach ($sizes as $size)
     <option>{{$size->size}}</option> 

   @endforeach
  
  </select>
  <input type="hidden" value="{{$product->id}}" id="proDum">


   @if($product->new_arrival==1)
   <img src="{{URL::asset('dist/images/product-details/new.jpg')}}" alt="...">
    @endif

  
  
 
<button class="btn btn-fefault cart" id="addToCart">
   <i class="fa fa-shopping-cart"></i>
   Add to cart
</button>


<input type="hidden" value="{{$product->id}}" id="proDum"/>


</form>

<?php
 $wishData = DB::table('wishlist')->rightJoin('products','wishlist.pro_id', '=', 'products.id')->where('wishlist.pro_id', '=', $product->id)->get();
 $count = App\Models\wishlist::where(['pro_id' => $product->id])->count();
  ?>

 @if($count=="0")
<form action="addToWishList" method="post">
@csrf
  
    <input type="hidden" value="{{$product->id}}" name="pro_id"/>
    <input type="submit" value="Add to Wishlist" class="btn btn-primary"/>


    </form>
  
   @else
     <h3 style="color:green">Already Added to Wishlist <button class="btn btn-primary"> <a href="{{url('/WishList')}}">wishlist</a></button></h3>
@endif
<p class=""></p>
</div>
</div>
</div>

 <!-- Start Review -->







 <div class="navbar navbar-expand-lg navbar-light bg-dark"><!--category-tab-->
            <div class="navbar-nav">


              <?php $reviews = DB::table('reviews')->get();
                         $count_reviews = count($reviews);?>
                         
                <div class="collapse navbar-collapse" id="navbarNav">         
              <ul class="navbar-nav">
                <li class="nav-item" ><a href="#details" data-toggle="tab">Details</a></li>
                <li class="nav-item"><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                <li class="nav-item"><a href="#tag" data-toggle="tab">Tag</a></li>
                <li class="nav-item"><a href="#reviews" data-toggle="tab">Reviews ({{$count_reviews}})</a></li>
              </ul>
              </div>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade" id="details" >
                  {{$product->pro_info}}
              </div>
              
              <div class="tab-pane fade" id="companyprofile" >
  
              </div>
              
              <div class="" id="reviews" >
                <div class="col-sm-12">

               <?php $reviews = DB::table('reviews')->get(); ?>


                 @foreach($reviews as $review)
                  <ul>
                    <li><a href=""><i class="fa fa-user"></i>{{$review->person_name}}</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>{{date('H: i', strtotime($review->created_at))}}</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>{{date('F j, Y', strtotime($review->created_at))}}</a></li>
                  </ul>

                  <p>{{$review->review_content}}</p>



                  @endforeach
                  <p><b>Write Your Review</b></p>
                  
                  <form action="{{url('/addReview')}}" method="post">

                  @csrf
                       <span>
                          <input type="text" name="person_name" placeholder="Your Name"/>
                          <input type="email", name="person_email" placeholder="Email Address"/>
                      </span>
                      <textarea name="review_content" ></textarea>
                      <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                      <button type="submit" class="btn btn-default pull-right">
                          Submit
                      </button>
                   </form>
                </div>
              </div>
              
            </div>
          </div><!--/category-tab-->

  <!-- End of Review -->


@endforeach
</div>
</div>
</div>
</div><!-- /.row -->

        </div>
        </div>
</div>
      </section>
      <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

@include('front.recommends')
</div>
                    
                </div>
@endsection