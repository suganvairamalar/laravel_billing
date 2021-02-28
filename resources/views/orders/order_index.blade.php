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
                  
                  <table id="tbl_detail_order" >
                     <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">DATE </label>
                     <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                        <input type="text" id="order_date" name="order_date" class="form-control datepicker order_date" placeholder="DD-MM-YYYY" style="width:100%;line-height: 65px;">
                     </div>                    
                  </div>
                     <thead >
                        <th class="col-xs-1 col-sm-1 col-md-1"><input class='check_all' type='checkbox' onclick=""/></th>
                        <th class="col-xs-1 col-sm-1 col-md-1">S. No</th>
                        <th class="col-xs-2 col-sm-2 col-md-2">CODE</th>
                        <th class="col-xs-1 col-sm-1 col-md-1" style="display:none;">CATEGORY</th>
                        <th class="col-xs-2 col-sm-2 col-md-2">PRODUCT</th>
                        <th class="col-xs-2 col-sm-2 col-md-2">PRICE</th>
                        <th class="col-xs-1 col-sm-1 col-md-1">QUANTITY</th>
                        <th class="col-xs-2 col-sm-2 col-md-2">AMOUNT</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="col-xs-1 col-sm-1 col-md-1"><input type='checkbox' class='chkbox'/></td>
                           <td class="col-xs-1 col-sm-1 col-md-1 "><span id='sn'>1.</span></td>
                           <td class="col-xs-2 col-sm-2 col-md-2 "><input class="form-control order_product_code" type='text' data-type="product_code" id='order_product_code_1' name='order_product_code[]'/></td>
                           <td style="display:none;" class=""><input class="form-control order_product_category_name" type='text' data-type="product_category_name" id='order_product_category_name_1' name='order_product_category_name[]'/></td>
                           <td class="col-xs-2 col-sm-2 col-md-2 "><input class="form-control order_product_name" type='text' data-type="product_name" id='order_product_name_1' name='order_product_name[]'/> </td>
                           <td class="col-xs-2 col-sm-2 col-md-2 "><input class="form-control order_product_price" type='text' data-type="product_price" id='order_product_price_1' name='order_product_price[]'/> </td>
                           <td class="col-xs-1 col-sm-1 col-md-1 "><input class="form-control order_quantity" type='text' data-type="quantity" id='order_quantity_1' name='order_quantity[]'/> </td>
                           <td class="col-xs-2 col-sm-2 col-md-2 "><input class="form-control order_product_amount" type='text' data-type="product_amount" id='order_product_amount_1' name='order_product_amount[]' readonly /> </td>
                        </tr>
                     </tbody>
                  </table>
                  <table id="tbl_data_subtotal" width="100%"  >
                     <tbody>
                        <tr id="tbl_data_subtotal_tr" class="" style=>
                           <td class="col-xs-1 col-sm-1 col-md-1">&nbsp;</td>
                           <td class="col-xs-1 col-sm-1 col-md-1">&nbsp;</td>
                           <td class="col-xs-1 col-sm-1 col-md-1" style="display:none;">&nbsp;</td>
                           <td class="col-xs-2 col-sm-2 col-md-2">&nbsp;</td>
                           <td class="col-xs-2 col-sm-2 col-md-2">&nbsp;</td>
                           <td class="col-xs-2 col-sm-2 col-md-2">&nbsp;</td>
                           <td class="col-xs-1 col-sm-1 col-md-1"><strong>SUBTOTAL</strong></td>
                           <td class="col-xs-2 col-sm-2 col-md-2"><input class="form-control order_sub_total" type='text' id='order_sub_total' name='order_sub_total' readonly /></td>
                        </tr>
                     </tbody>
                  </table>
                  <button type="button" class='btn btn-danger delete'>- Delete</button>
                  <button type="button" class='btn btn-success addbtn'>+ Add More</button>
               </div>
               <div class="modal-footer bg-danger">
                  <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">  
                  <input type="hidden" name="hidden_order_date" id="hidden_order_date" class="form-control"/>
                  <input type="hidden" name="hidden_order_product_code" id="hidden_order_product_code" class="form-control"/> 
                  <input type="hidden" name="hidden_order_product_category_name" id="hidden_order_product_category_name" class="form-control"/> 
                  <input type="hidden" name="hidden_order_product_name" id="hidden_order_product_name" class="form-control"/> 
                  <input type="hidden" name="hidden_order_quantity" id="hidden_order_quantity" class="form-control"/>   
                  <input type="hidden" name="hidden_order_product_price" id="hidden_order_product_price" class="form-control"/>   
                  <input type="hidden" name="hidden_order_product_amount" id="hidden_order_product_amount" class="form-control"/> 
                  <input type="hidden" name="hidden_order_sub_total" id="hidden_order_sub_total" class="form-control"/> 
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