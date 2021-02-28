@extends('layouts.order_app')
@section('content')
<div class="jumbotron">
   <div class="row">
      <div class="pull-left">
         <button type="button" name="order_create_record" id="order_create_record" class="btn btn-success btn-sm">ADD</button>
      </div>
      <div class="pull-right">
      </div>
   </div>
   <div class="row">
      @include('orders.order_list')   
   </div>
</div>
<div class="row">
   <div id="order_form_Modal" class="modal fade " role="dialog">
      <div class="modal-dialog modal-xl">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">ADD FORM</label>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes"><span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" id="order_form" class="form-horizontal">
               <div class="modal-body bg-primary">
                  <span id="order_form_result"></span>
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                  <table id="tbl_detail_order" border="0">
                     <thead >
                        <tr >
                           <th class="col-xs-1 col-sm-1 col-md-1"><input class='check_all' type='checkbox' onclick=""/></th>
                           <th class="col-xs-1 col-sm-1 col-md-1">S. No</th>
                           <th class="col-xs-2 col-sm-2 col-md-2">CODE</th>
                           <th class="col-xs-2 col-sm-2 col-md-2">PRODUCT</th>
                           <th class="col-xs-2 col-sm-2 col-md-2">PRICE</th>
                           <th class="col-xs-1 col-sm-1 col-md-1">QUANTITY</th>
                           <th class="col-xs-2 col-sm-2 col-md-2">AMOUNT</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><input type='checkbox' class='chkbox'/></td>
                           <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><span id='sn'>1.</span></td>
                           <td class="col-md-2 col-lg-2 col-xs-2 col-sm-2"><input class="form-control order_product_code" type="text"  data-type="product_code" id="order_product_code1"  name="order_product_code[]" placeholder="enter code" /></td>
                           
                           <td class="col-md-2 col-lg-2 col-xs-2 col-sm-2"><input class="form-control order_product_name" type="text" data-type="product_name" id="order_product_name1"  name="order_product_name[]" placeholder="" /></td>
                           <td class="col-md-2 col-lg-2 col-xs-2 col-sm-2"><input type="text" name="order_product_price[]" data-type="product_price" id="order_product_price1" class="form-control order_product_price"   placeholder="" />
                           </td>
                           <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><input type="text" name="order_quantity[]" data-type="order_quantity" id="order_quantity1" class="form-control order_quantity" placeholder="" />
                           </td>                          
                           <td class="col-md-2 col-lg-2 col-xs-2 col-sm-2"><input type="text" name="order_product_amount[]" data-type="order_product_amount" id="order_product_amount1" class="form-control order_product_amount" placeholder="" />
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <table id="tbl_data_subtotal" width="100%"  border="0">
                     <tbody>
                        <tr id="tbl_data_subtotal_tr" class="" style=>
                           <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1">&nbsp;</td>
                           <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1">&nbsp;</td>
                           <td class="col-md-2 col-lg-2 col-xs-2 col-sm-2">&nbsp;</td>
                           <td class="col-md-2 col-lg-2 col-xs-2 col-sm-2">&nbsp;</td>
                           <td class="col-md-2 col-lg-2 col-xs-2 col-sm-2">&nbsp;</td>
                           <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1">subtotal</td>
                           <td class="col-md-2 col-lg-2 col-xs-2 col-sm-2">&nbsp;</td>
                        </tr>
                     </tbody>
                  </table>
                  <button type="button" class='btn btn-danger delete'>- Delete</button>
                  <button type="button" class='btn btn-success addbtn'>+ Add More</button>
               </div>
               <div class="modal-footer bg-danger">
                  <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">   
                  <input type="hidden" name="order_action" id="order_action" />                  
                  <button type="button" class="btn btn-secondary" id="cloes" data-dismiss="modal">CLOSE</button>
                  <input type="submit" name="order_action_button" id="order_action_button" class="btn btn-primary" value="SAVE">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection