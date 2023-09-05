<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
   

  <style>

    .div_center
    {
        text-align:center;
            padding-top:40px;
    }
    .font-size{
        font-size:40px;
            padding-bottom:40px;
    }
    .text-color{
        color:black;
        padding-bottom:20px;
    }
    label{
        display:inline-block;
        width:200px
    }
    .div_design{
        padding-bottom:15px;
    }

  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
    
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <!--  showing alert -->
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close"  data-dismiss="alert" aria-hidden="true">x</button>
                   {{session()->get('message')}}
                </div>
            @endif
            <!-- alert end -->



                <div class="div_center">


                    <h1 class="font-size">Add Product</h1>
                    <!-- form start -->

                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    
                    <div class="div_design">
                       <label>Product Title:</label>
                       <input class="text-color" type="text" name="title" placeholder="Write a title"  required=""/>                   
                    </div>

                    <div class="div_design">
                       <label>Product Description:</label>
                       <input class="text-color" type="text" name="description" placeholder="Write a description" required=""/>                   
                    </div>

                    <div class="div_design">
                       <label>Product Price:</label>
                       <input class="text-color" type="number" name="price" placeholder="Write a price" required=""/>                   
                    </div>

                    <div class="div_design">
                       <label>Discount_Price:</label>
                       <input class="text-color" type="number" name="discount_price" placeholder="Write a discount"/>                   
                    </div>

                    <div class="div_design">
                       <label>Product Quantity:</label>
                       <input class="text-color" type="number" mimn="0" name="quantity" placeholder="Write a quantity" required=""/>                   
                    </div>

                    <!-- <div class="div_design">
                       <label>Product category:</label>
                       <input class="text-color" type="text" mimn="0" name="category" placeholder="Write a quantity" required=""/>                   
                    </div> -->

                    <div class="div_design">
                       <label>Product Category:</label>
                    <select class="text-color" name="category" required="">
                        <option value="" selected="">Add  category here</option>

                        @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                        @endforeach
                    </select>
                    </div>

                    <div class="div_design" required="">
                       <label>Product Image Here:</label>
                       <input type="file" name="image"/>                   
                    </div>

                    
                    <div class="div_design">
                     
                       <input type="submit" name="submit" value="Add Product" class="btn btn-primary"/>                   
                    </div>

               </form>
                </div>
           </div> 
        </div>
        
    <!-- container-scroller -->
    @include('admin.script')
   
  </body>
</html>