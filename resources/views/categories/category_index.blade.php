@extends('layouts.category_app')
@section('content')
<div class="row">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <div class="panel panel-default">
      <div class="panel-heading">CATEGORY DATA</div>
      <div class="panel-body">
         <span id="category_form_result"></span>
         <div class="table-responsive">
            <table class="table table-striped table-bordered">
               <thead>
                  <tr>
                     {{ csrf_field() }}
                     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                     <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><label class="control-label1 col-md-1 col-lg-1 col-xs-1 col-sm-1">CATEGORY</label></td>
                     <td class="col-md-6 col-lg-6 col-xs-6 col-sm-6"><input type="text" id="category_name" name="category_name" class="form-control" id="category_name" contenteditable></td>
                     <td class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                        <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">   
                        <button type="button" id="category_add" class="btn btn-success">ADD</button>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><label class="control-label1 col-md-1 col-lg-1 col-xs-1 col-sm-1">SEARCH</label></td>
                     <td class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                        <form id="category_search_form">
                           {{ csrf_field() }}
                           {{ method_field('GET') }}
                           <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                           <input type="text" class="form-control" name="search" id="search">
                     </td>
                     <td class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                     <button type="submit" class="btn btn-danger" id="category_search_submit" name="category_search_submit">
                     <span class="glyphicon glyphicon-search"></span></button> 
                     <a href="{{route('category.index')}}" class="btn btn-primary"><span class="reloadbtn glyphicon glyphicon-refresh"></span></a>
                     </td>
                     </form>
                  </tr>
                  <tr>
                     <th class="col-md-1 col-lg-1 col-xs-1 col-sm-1">S.NO</th>
                     <th class="col-md-6 col-lg-6 col-xs-6 col-sm-6">CATEGORY NAME</th>
                     <th class="col-md-5 col-lg-5 col-xs-5 col-sm-5">ACTION</th>
                  </tr>
               </thead>
               @if(!empty($categories))
               <tbody>
                  <?php $i=0; ?>
                  @foreach($categories as $category)
                  <?php $i++; ?>
                  <tr>
                     <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1">{{ $i }}</td>
                     <td id="{{ $category->id }}" class="categoryname col-md-6 col-lg-6 col-xs-6 col-sm-6" contenteditable>{{ $category->category_name }}</td>
                     <td class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                        <button type="button" name="edit" id="{{ $category->id }}" class="edit btn btn-warning glyphicon glyphicon-edit btn-md">
                           <!-- update -->
                        </button>
                        <!-- class="edit btn btn-warning btn-sm" -->
                        <button type="button" name="delete" id="{{ $category->id }}" class="delete btn btn-danger glyphicon glyphicon-trash btn-md">
                           <!-- delete -->
                        </button>
                        <!-- class="delete btn btn-danger btn-sm" -->
                     </td>
                  </tr>
                  @endforeach
               </tbody>
               @endif
            </table>
         </div>
      </div>
   </div>
</div>
{!!$categories->render()!!}
<div class="row">
   <div id="category_confirm_Modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">CONFIRMATION</label>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <p style="color:red;font-size:16px;font-weight: bold;font-style: italic;">Are you sure !! want to delete this record?</p>
            </div>
            <div class="modal-footer bg-danger">
               <button type="button" name="category_ok_button" id="category_ok_button" class="btn btn-danger">OK</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection