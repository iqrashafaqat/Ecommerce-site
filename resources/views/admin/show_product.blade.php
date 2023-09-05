<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
   
        <style type="text/css">

            .center
            {

                margin:auto;
                width:70%;
                border:2px solid white;

            }
            .font_size
            {
                text-align:center;
                font-size:30px;
                padding:30px
            }
            .img_size
            {
                width:100px;
                height:100px
            }
            .th-color
            {
                background-color:#00d25b;
            }
            .th-deg
            {
                padding:30px
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
            
          <h2 class="font_size">All Products</h2>   

          <!-- table starts here -->
          <table class="center">
            <tr class="th-color">
                <th class="th-deg">Product Title</th>
                <th class="th-deg">Description</th>
                <th class="th-deg">Quantity</th>
                <th class="th-deg">Category</th>
                <th class="th-deg">Price</th>
                <th class="th-deg">Discount Price</th>
                <th class="th-deg">Product Image</th>
                <th class="th-deg">Delete</th>
                <th class="th-deg">Edit</th>
            </tr>

            @foreach ($product as $product)
            <tr class="text-center">
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->discount_price}}</td>
                <td>
                    <img class="img_size" src="/product/{{$product->image}}">
                </td>

                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are u sure to delete this')" href="{{url('/delete_product',$product->id)}}">Delete</a>
                </td>

                <td>
                    <a class="btn btn-success" href="{{url('/update_product',$product->id)}}">Edit</a>
                </td>
            </tr>
            @endforeach



          </table>
          <!-- table end here -->
    

          
            </div>
        </div>
        
    <!-- container-scroller -->
    @include('admin.script')
   
  </body>
</html>