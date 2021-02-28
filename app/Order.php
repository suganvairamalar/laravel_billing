<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
     protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_date','order_product_category_name','order_product_code','order_product_name','order_quantity','order_product_price','order_product_amount','order_product_tax','order_product_discount','order_sub_total','order_grand_total'];

    protected $dates = ['order_date'];

    public function getOrderDateAttribute($value){         
        return Carbon::parse($value)->format('d-m-Y');
    }

     //BELOW FUNCTION USED TO SEND VIEW TO DATABASE in 
    public function setOrderDateAttribute($orderDate) {
        $this->attributes['order_date'] = Carbon::parse($orderDate)->toDateString(); //'toDateTimeString(); use to dd:mm:yyyy:hh:mm:ss
    }
    



    public function getOrderProductCodeAttribute($order_product_code){
        return explode(',',$order_product_code);
    }

    public function getOrderProductCategoryNameAttribute($order_product_category_name){
        return explode(',',$order_product_category_name);
    }

    public function getOrderProductNameAttribute($order_product_name){
        return explode(',',$order_product_name);
    }

    public function getOrderQuantityAttribute($order_quantity){
        return explode(',',$order_quantity);
    }

    public function getOrderProductPriceAttribute($order_product_price){
        return explode(',',$order_product_price);
    }

    public function getOrderProductAmountAttribute($order_product_amount){
        return explode(',',$order_product_amount);
    }    

    public function setOrderProductCodeAttribute($order_product_code){
         $this->attributes['order_product_code'] = implode(",", $order_product_code);
    }

    public function setOrderProductCategoryNameAttribute($order_product_category_name){
         $this->attributes['order_product_category_name'] = implode(",", $order_product_category_name);
    }

    public function setOrderProductNameAttribute($order_product_name){
         $this->attributes['order_product_name'] = implode(",", $order_product_name);
    }

    public function setOrderQuantityAttribute($order_quantity){
       $this->attributes['order_quantity'] = implode(",", $order_quantity);
    }

    public function setOrderProductPriceAttribute($order_product_price){
       $this->attributes['order_product_price'] = implode(",", $order_product_price);
    }

    public function setOrderProductAmountAttribute($order_product_amount){
       $this->attributes['order_product_amount'] = implode(",", $order_product_amount);
    }
}
