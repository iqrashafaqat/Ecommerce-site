<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category;

use App\Models\product;

use App\Models\order;

use Illuminate\Support\Facades\Auth;

use PDF;

use Notification;

use App\Notifications\SendEmailNotification;




class AdminController extends Controller
{

    // function for fetching data
    public function view_category()
    {
      
        if(Auth::id())
        {

            $data =category::all();

            return view('admin.category',compact('data'));          

        }
        else
        {

          return redirect('login');

        }
    
    }


    // function for posting data
    public function add_category(Request $request)
    {
      
        $data=new category;

        $data->category_name=$request->category;

        $data->save();
        
        return redirect()->back()->with('message','Category Added Successfully');
    }


    // delete function to delete category
    public function delete_category($id)
    {
        $data=category::find($id);

        $data->delete();

        return redirect()->back()->with('message','Category Deleted Successfully');
    }



    // function to fetch all categories in from db form  to insert data
    public function view_product()
    {
        $category=category::all();

        return view('admin.product',compact('category'));
    }



    // function to add/post/insert  products in db
    public function add_product(Request $request)
    {

        $product=new product;

        $product->title=$request->title;

        $product->description=$request->description;

        $product->price=$request->price;

        $product->quantity=$request->quantity;

        $product->discount_price=$request->discount_price;

        $product->category=$request->category;


        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);  

        $product->image=$imagename;


        $product->save();

        return redirect()->back()->with('message','Product added successfully');
    }


    // function to show product data from db
     public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }
    

// function to delete product data from db
    public function delete_product($id)
    {
        $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');
    }



    // function to update data from db
    public function update_product($id)
    {
        $product=product::find($id);

        $category=category::all();

        return view('admin.update_product',compact('product','category'));
    }


// function for stripe
    public function update_product_confirm(Request $request,$id)


    {

        if(Auth::id())
        {

            

        $product=product::find($id);

        $product->title=$request->title;

        $product->description=$request->description;

        $product->price=$request->price;
        
        $product->discount_price=$request->discount_price;

        $product->category=$request->category;

        $product->quantity=$request->quantity;



        $image=$request->image;

        if($image)
        {

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);  
    
            $product->image=$imagename;

        }
    
        $product->save();

        return redirect()->back()->with('message','Product Updated Successfully');

        }
        else
        {

            return redirect('login');

        }

    }



    // functio to show orders to the admin
    public function order()

    {
        $order=order::all();

       return  view('admin.order',compact('order'));
    }




    //function for delivered
    public function delivered($id)
    {
       $order=order::find($id);

       $order->delivery_status="delivered";

       $order->payment_status="paid";

       $order->save();

       return redirect()->back();
    } 





    // function for printing pdf
    public function print_pdf($id)
    {
         $order=order::find($id);

         $pdf=PDF::loadView('admin.pdf',compact('order'));

         return $pdf->download('order_details.pdf');

    }




    // function for sending mail to the specific user
    public function send_email($id)
    {
        $order=order::find($id);
        return view('admin.email_info',compact('order'));
    }




    // function for send_user_email 
    public function send_user_email(Request $request,$id)
    {
        $order=order::find($id);

        $details = [

           'greeting' => $request->greeting,

           'firstline' => $request->firstline,

           'body' => $request->body,

           'button' => $request->button,

           'url' => $request->url,

           'lastline' => $request->lastline,


        ];

        Notification::send($order,new SendEmailNotification($details));

        return redirect()->back();
    }






    // function for admin serach
    public function searchdata(Request $request)
    {
        
        $searchText=$request->search;

        $order=order::where('name','LIKE',"%$searchText%")->orwhere('phone','LIKE',"%$searchText%")->orwhere('product_title','LIKE',"%$searchText%")->get();

        return view('admin.order',compact('order'));
    }



}
