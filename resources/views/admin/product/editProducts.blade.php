
@extends('admin.master')


@section('content')






 <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
<h3>Products</h3>

<ul>
                
  <div class="row">

       
              <div class="col-md-4">



                <br>

<br>
<br>

<br>
                <form action="editProduct/{{$Products->id}}" method="post" enctype="multipart/form-data">
                    @csrf


                
                <Select class="form-control" name="cat_id">
                            @foreach($categories as $cat)
                            Category:  <option value="{{ $cat->id }}"  <?php 
                            if($Products->cat_id==$cat->id) {?> selected="selected"<?php }?>


                            >{{ ucwords($cat->name) }}</option>
                            @endforeach
                            </select>
                            <br>
               
                            
                <div class="form-group">
                  <label for="pro_name">Name:</label>
                  <input class="form-control" type="text" name="pro_name" value="{{$Products->pro_name}}">
                
               </div>


               <div class="form-group">
               <label for="pro_price">Pro Price:</label>
                  <input class="form-control" type="text" name="pro_price" value="{{$Products->pro_price}}">
                
           
               </div>
                

                <div class="form-group">
                <label for="pro_code">Pro Code:</label>
                  <input class="form-control" type="text" name="pro_code" value="{{$Products->pro_code}}">
                
               
               </div>


              


                <img class="card-img-top img-fluid" src="{{url('images',$Products->image)}}" style="width:50px" alt="Card image cap">

                
                <div class="form-group">
                <label for="spl_price">Spl Price: </label>
                  <input class="form-control" type="text" name="spl_price" value="{{$Products->spl_price}}">
            
               </div>


               <div class="form-group">
               <label for="pro_info">Pro Info:</label>
                  <input class="form-control" type="text" name="pro_info" value="{{$Products->pro_info}}">
                
                
               </div>


               <div class="form-group">
                 New Arrival: <p class="pull-right"><input type="checkbox" name="new_arrival" value="1"></p>
               </div>



                            
            <input type="submit" name="submit" value="update" id="">
    
  
    

   </form>

</div>



<div class="col-md-3">

  
   <br>
<br>
<br>
<br> 


 <!-- Update Attributes -->
   
<div class="content-box-large">

                <?php {?>
               
                  <div class="panel-heading">
                   


                
<?php 
  // @foreach($prots as $prot)
?>
             
              
           
                
                            <?php // @endforeach ?>
                      

                      </table>
                       <div>
                 <?php }?>

<!-- End Update Attributes -->
  <div align="center">  
  <a href="{{route('addProperty',$Products->id)}}" class="btn btn-sm btn-info" style="margin:5px">Add Property</a>
    
    
   <br>
  </div>


 <h1>Change Image</h1>
      <img class="card-img-top img-fluid" src="{{url('images',$Products->image)}}" style="width:200px" alt="Card image cap">

      <p><a href="{{route('ImageEditForm',$Products->id)}}"
       class="btn btn-info">Change Image</a>
        </p>
</div>

</div>



</div>

    
        
</main>
  
  

 @endsection
