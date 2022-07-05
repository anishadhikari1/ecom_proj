@extends('admin.master')

@section('content')

<div class="container-fluid">
<div class="row">

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
<li class="nav-item">
    <a class="nav-link" href="">Reports</a>
    
</li>
<li class="nav-item">
    <a class="nav-link" href="">Anslythi</a>  
</li>
<li class="nav-item">
    <a class="nav-link" href="">Reports</a>
</li>
    </ul>

    <ul class="nav nav-pills flex-column">
    <li class="nav-item">
    <a class="nav-link" href="">Anslythi</a>  
</li>
<li class="nav-item">
    <a class="nav-link" href="">Reports</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="">Reports</a>
</li>
    </ul>

    <ul class="nav nav-pills flex-column">
    <li class="nav-item">
    <a class="nav-link" href="">Anslythi</a>  
</li>
<li class="nav-item">
    <a class="nav-link" href="">Reports</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="">Reports</a>
</li>
    </ul>
          </div>
</nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" role="main">
    <h1>Dashboard</h1>
    <div class="col-md-6">
        <h1>BMW</h1>
        <h1>Add NEw</h1>
        <div class="panel-body">
            <form method="post" action="{{route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                    <label for="exampleFormControlInput1">Product Name</label>
                    <input type="text" name="pro_name" class="form-control" placeholder="Product Name">
                </div>
                 

            <div class="form-group">
                    <label for="exampleFormControlInput1">Code</label>
                    <input type="text" name="pro_code" class="form-control" placeholder="Product Name">
                </div>
                 
                <div class="form-group">
                    <label for="exampleFormControlInput1">Stock</label>
                    <input type="text" name="stock" class="form-control" placeholder="Product Name">
                </div>
                 

                <div class="form-group">
                    <label for="exampleFormControlInput1">Price</label>
                    <input type="text" name="pro_price" class="form-control" placeholder="Product Name">
                </div>
                 
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"> Description</label>
                    <textarea class="form-control" name="pro_info" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Categories_Id</label>
                    <input type="text" name="category_id" class="form-control" placeholder="Product Name">
                </div>
                 
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image</label>
                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Sales Price</label>
                    <input type="text" name="spl_price" class="form-control" placeholder="Product Name">
                </div>

           
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>        
        </div>
    </div>
         

</div>


</div>
@endsection