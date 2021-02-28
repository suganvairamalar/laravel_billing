<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Validator;
use Session;
use Input;
use DB;


class ProductController extends Controller
{
    public function index(Request $request){
        //$products = Product::orderBy('id','desc')->paginate(5);
        $categories = Category::all(['id', 'category_name']);
        if($request->search==""){
            /*$products = Product::select('products.*','categories.category_name')
                  ->leftJoin('categories', 'products.product_category_name', '=', 'categories.category_name')
                  ->orderBy('products.id', '=', 'desc')
                  ->paginate(5);*/
             $products = DB::table('products')
                 ->leftJoin('categories', 'products.product_category_name', '=', 'categories.category_name')
                  ->select('products.*', 'categories.category_name')
                  //->orderBy('products.id', '=', 'desc')
                  ->orderBy('id','desc')
                  ->paginate(5);
           
           return view('products.product_index',compact('products'),compact('categories'));
        }
        else{
            /*$products = Product::select('products.*','categories.category_name')
                  ->leftJoin('categories', 'products.product_category_name', '=', 'categories.category_name');
                   if ($request->get('search_dropdown')=='category') {
                      $products->where('category_name','LIKE','%'.$request->get('search').'%');
                      }   
                      if ($request->get('search_dropdown')=='product') {
                      $products->where('product_name','LIKE','%'.$request->get('search').'%');
                      }  
                      $products=$products->orderBy('products.id', '=', 'desc');
                      $products=$products->paginate(5);
                      $products->appends($request->only('search'));*/

             $products = DB::table('products')
                 ->leftJoin('categories', 'products.product_category_name', '=', 'categories.category_name')
                  ->select('products.*', 'categories.category_name')
                  ->orderBy('id','desc');
                   if ($request->get('search_dropdown')=='category') {
                      $products->where('category_name','LIKE','%'.$request->get('search').'%');
                      }  
                   if ($request->get('search_dropdown')=='code') {
                      $products->where('product_code','LIKE','%'.$request->get('search').'%');
                      }  
                      if ($request->get('search_dropdown')=='product') {
                      $products->where('product_name','LIKE','%'.$request->get('search').'%');
                      }  
                      $products=$products->paginate(5);
                      $products->appends($request->only('search'));

            return view('products.product_index',compact('products'),compact('categories'));
        }
    }

   /* public function find_category_name(Request $request){
       $data = Category::select('id','category_name')->where('id',$request->cate_id)->get();
            return response()->json($data);
    }*/

    public function find_category_name(Request $request){

    $term = Input::get('term');

    $results = array();

    //$queries = Category::select('id','category_name')
      $queries = DB::table('categories')
                ->select('categories.*')
                ->where('category_name', 'LIKE', '%'.$term.'%')
                ->orderBy('id','desc')
                ->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->category_name ];
        }

            //dd($queries);
        return response()->json($results);


    }

    public function insert(Request $request){
       $rules = array(   'product_code'             => 'required',
                           'product_category_name'    => 'required',
                         'product_name'                 => 'required|unique:products',
                         'product_price'                => 'required', 
                         'product_instock'                        => 'required' );
        
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $form_data = array(  'product_code'           => $request->product_code,
                           'product_category_name'  => $request->product_category_name,
                            'product_name'            => $request->product_name,
                            'product_price'           => $request->product_price,
                            'product_instock'                   => $request->product_instock
                             );
        //dd($form_data);
        Product::create($form_data);
        return response()->json(['success' => 'Data Inserted Successfully.']);
    }


    public function edit($id){
        if(request()->ajax()){
            $data = Product::findOrFail($id);
            return response()->json(['data'=> $data]);
        }

    }

    public function update(Request $request){
        $rules = array(  'product_code'             => 'required',
                         'product_category_name'    => 'required',
                         'product_name'             => 'required',
                         'product_price'            => 'required', 
                         'product_instock'          => 'required' );
        
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $form_data = array( 'product_code'   => $request->product_code,
                            'product_category_name' => $request->product_category_name,
                            'product_name'          => $request->product_name,
                            'product_price'         => $request->product_price,
                            'product_instock'               => $request->product_instock
                             );
        //dd($form_data);
        Product::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Data Inserted Successfully.']);

    }

    public function delete($id){
        $data = Product::findOrFail($id);
        $data->delete();
    }

}