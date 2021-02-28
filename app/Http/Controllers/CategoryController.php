<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class CategoryController extends Controller
{
    public function index(Request $request){
        //return view('categories.category_index');
         if($request->search==""){
             
                $categories = Category::orderBy('id','desc')->paginate(5);
                return view('categories.category_index',compact('categories'));
            }else{
            $categories = Category::where('category_name','LIKE','%'.$request->search.'%')                      
                       ->orderBy('id','asc')
                       ->paginate(5);

                $categories->appends($request->only('search')); //intha line code add pannathumthaan search correct ah work aachu..before without this line search first page work aaguthu more thaan one page data irukkum pothu second page filter aagama yella datavum 2nd page la show aachu...intha line command panni run panna u have to understand what is the problem in searching in 2nd page pagination problem... 
                          
            return view('categories.category_index',compact('categories'));
           
          } 
    }


     public function insert(Request $request){
        $rules = array('category_name' => 'required|unique:categories');
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $form_data = array('category_name' => $request->category_name);
        Category::create($form_data);
        return response()->json(['success' => 'Data Inserted Successfully.']);
    }

    public function update(Request $request){
        $rules = array('category_name' => 'required');
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);           
        }
        $form_data = array('category_name' => $request->category_name);
        Category::whereId($request->id)->update($form_data);
        return response()->json(['success' => 'Data Updated Successfully.']);
    }

    public function delete($id){
        $data = Category::findOrfail($id);
        $data->delete();
    }

}
