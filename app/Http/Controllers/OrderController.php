<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use DB;
use DateTime;
use Carbon\Carbon;
use Form;
use Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orderBy('id','asc')->paginate(5);
        return view('orders.order_index',compact('orders'));
    }

    public function order_product_fetch(Request $request){

        $query = $request->get('term','');
       
        $products = Product::orderBy('id','desc');
        if($request->type=='product_code'){
                      $products->where('product_code','LIKE','%'. $query.'%');
                      }   
        if($request->type=='product_category_name'){
                      $products->where('product_category_name','LIKE','%'. $query.'%');
                      }   
        if($request->type=='product_name'){
                      $products->where('product_name','LIKE','%'. $query.'%');
                      } 
        if($request->type=='product_price'){
                      $products->where('product_price','LIKE','%'. $query.'%');
                      }  
       
        $products=$products->get();

         $data=array();

          foreach ($products as $product) {
                $data[]=array(
                        'product_code'  => $product->product_code,
                        'product_category_name'  => $product->product_category_name,
                              'product_name'  => $product->product_name,
                              'product_price' => $product->product_price
                        );
        }
        if(count($data)){
             return $data;
             }
        else{
            return ['product_code'=>'','product_category_name'=>'','product_name'=>'','product_price'=>''];
        }
    }

    public function insert(Request $request){
      $order = new Order();   

       $rules = [];

        foreach($request->input('order_product_code') as $key => $value) {
            $rules["order_product_code.{$key}"] = 'required';
        }

        foreach($request->input('order_product_name') as $key => $value) {
            $rules["order_product_name.{$key}"] = 'required';
        }

        foreach($request->input('order_quantity') as $key => $value) {
            $rules["order_quantity.{$key}"] = 'required';
        }

        foreach($request->input('order_product_price') as $key => $value) {
            $rules["order_product_price.{$key}"] = 'required';
        }

        foreach($request->input('order_product_amount') as $key => $value) {
            $rules["order_product_amount.{$key}"] = 'required';
        }

        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
         return response()->json(['error'  => $error->errors()->all()]);
        } 

        $form_data = array(
                         'order_date'                 => date('Y-m-d', strtotime($request->order_date)),
                         'order_product_code'     => $request->order_product_code,
                         'order_product_category_name'     => $request->order_product_category_name,
                         'order_product_name'     => $request->order_product_name,
                         'order_quantity'         => $request->order_quantity,
                         'order_product_price'    => $request->order_product_price,
                         'order_product_amount'   => $request->order_product_amount,
                         'order_sub_total'        => $request->order_sub_total
                        );

        Order::create($form_data);
        
        return response()->json(['success' => 'Data Inserted Successfully.']);

    }

    public function edit($id){
    if(request()->ajax()){
        $data = Order::findOrFail($id);       
        return response()->json(['data' => $data]);
      }
   }

   public function update(Request $request){
     $rules = [];
       
      /* foreach($request->input('order_product_code') as $key => $value) {
            $rules["order_product_code.{$key}"] = 'required';
        }

        foreach($request->input('order_product_name') as $key => $value) {
            $rules["order_product_name.{$key}"] = 'required';
        }

        foreach($request->input('order_quantity') as $key => $value) {
            $rules["order_quantity.{$key}"] = 'required';
        }

        foreach($request->input('order_product_price') as $key => $value) {
            $rules["order_product_price.{$key}"] = 'required';
        }

        foreach($request->input('order_product_amount') as $key => $value) {
            $rules["order_product_amount.{$key}"] = 'required';
        }*/

      //$error = Validator::make($request->all(), $rules);
     /* if($error->fails())
      {
       return response()->json(['error'  => $error->errors()->all()]);
      }  */   

      $form_data = array(
                         
                       /*   'order_product_code'     => $request->order_product_code,
                         'order_product_category_name'     => $request->order_product_category_name,
                        'order_product_name'     => $request->order_product_name,
                         'order_quantity'         => $request->order_quantity,
                         'order_product_price'    => $request->order_product_price,
                         'order_product_amount'   => $request->order_product_amount,*/
                         
        'order_date'             => date('Y-m-d', strtotime($request->order_date)),
        'order_product_code'     => implode(',',$request->order_product_code),
        'order_product_category_name'=> implode(',',$request->order_product_category_name),
        'order_product_name'     => implode(',',$request->order_product_name),
        'order_quantity'         => implode(',',$request->order_quantity),
        'order_product_price'    => implode(',',$request->order_product_price),
        'order_product_amount'   => implode(',',$request->order_product_amount),
        'order_sub_total'        => $request->order_sub_total
                        );
      
      Order::whereId($request->hidden_id)->update($form_data);
      return response()->json(['success' => 'Data Updated Success.']);
   }


}
