<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
   
<style>

    .title-deg
    {
        text-align:center;
        font-size:25px;
        font-weight:bold; 
        padding-bottom:40px; 
    }
    .table-deg
    {
        border: 1px solid white;
        width:100%;
        margin:auto;
        /* padding-top:50px; */
        text-align:center;

    }
    .th-deg
    {
        background-color:skyblue;

    }
    .img-size
    {
        width:150px;
        height:150px;

    }

</style>


  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
    
      <div class="main-panel">
          <div class="content-wrapper">
             
             <h1 class="title-deg">All Orders</h1>


                <div style="margin:auto; padding-bottom:30px;" class="float-right" > 

                   <form action="{{url('search')}}" method="get">

                   @csrf
                            
                       <input style="color:black;" type="text" name="search" placeholder="Search for something"/>

                       <input type="submit" value="Search" class="btn btn-outline-primary"/>

                   </form>

                </diV>


             <table class="table-deg table-responsive">

                <tr  class="th-deg">

                    <th  style="padding:5px;">Name</th>
                    <th  style="padding:5px;">Email</th>
                    <th  style="padding:5px;">Address</th>
                    <th  style="padding:5px;">Phone</th>
                    <th  style="padding:5px;">Product Title</th>
                    <th  style="padding:5px;">Quantity</th>
                    <th  style="padding:5px;">Price</th>
                    <th  style="padding:5px;">Paymet Status</th>
                    <th  style="padding:5px;">Delivery Status </th>
                    <th  style="padding:5px;">Image</th>
                    <th  style="padding:5px;">Delivered</th>
                    <th  style="padding:5px;">Print PDF</th>
                    <th  style="padding:5px;">Send Email</th>

                </tr>

                @forelse($order as $order)

                <tr>

                  <td>{{$order->name}}</td>
                  <td>{{$order->email}}</td>
                  <td>{{$order->address}}</td>
                  <td>{{$order->phone}}</td>
                  <td>{{$order->product_title}}</td>
                  <td>{{$order->quantity}}</td>
                  <td>{{$order->price}}</td>
                  <td>{{$order->payment_status}}</td>
                  <td>{{$order->delivery_status}}</td>
                  <td>
                    <img class="img-size" src="/product/{{$order->image}}">
                  </td>

                  <td>

                  @if($order->delivery_status=='processing')
               

                    <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are You Sure This Product is Delivered')" class="btn btn-primary">Delivered</a>
                 
                 @else

                 <p style="color:green;">Delivered</p>

                 @endif   
               
                  </td>

                  <td>

                   <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>

                  </td>

                  <td>
                            
                      <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Mail</a>

                  </td>


                </tr>


                @empty
                <tr>

                  <td colspan="16">
                 
                  <p>No Data Found</p>

                  </td>

                </tr>

                @endforelse

             </table>
             
          </div>
    </div>
        
    <!-- container-scroller -->
    @include('admin.script')
   
  </body>
</html>