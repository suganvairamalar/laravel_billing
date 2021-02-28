 @if(!empty($products))               
               <table class="table table-striped table-bordered table-hover" width="100%">
                  <thead>  
                   <form id="product_search_form" action="/products">  
                  <tr>
                      <td class="col-md-3 col-lg-3 col-xs-3 col-sm-3" colspan="2"><select class="form-control" name="search_dropdown" id="search_dropdown">
                          <option value="">Select Search</option>
                          <option value="category">CATEGORY</option>
                          <option value="code">CODE</option>
                          <option value="product">PRODUCT</option>                         
                        </select></td>
                           <td class="col-md-9 col-lg-9 col-xs-9 col-sm-9" colspan="3">
                           {{ csrf_field() }}
                           {{ method_field('GET') }}
                           <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                           <input type="text" class="form-control" name="search" id="search">
                     </td>
                     <td class="col-lg-2 col-xs-2 col-sm-2 col-md-2">
                     <button type="submit" class="btn btn-warning" id="product_search_submit" name="product_search_submit">
                     <span class="glyphicon glyphicon-search"></span></button> 
                     <a href="{{route('product.index')}}" class="btn btn-primary"><span class="reloadbtn glyphicon glyphicon-refresh"></span></a>                     
                     </td>                     
                  </tr>   
                  </form>              
                     <tr class="bg-primary">
                        <th class="col-lg-1 col-xs-1 col-sm-1 col-md-1">S.NO</th>
                        <th class="col-lg-2 col-xs-2 col-sm-2 col-md-2">CATEGORY</th>
                        <th class="col-lg-2 col-xs-2 col-sm-2 col-md-2">CODE</th>
                        <th class="col-lg-2 col-xs-2 col-sm-2 col-md-2">PRODUCT</th>
                        <th class="col-lg-1 col-xs-1 col-sm-1 col-md-1">PRICE</th>
                        <th class="col-lg-1 col-xs-1 col-sm-1 col-md-1">INSTOCK</th>
                        <th class="col-lg-2 col-xs-2 col-sm-2 col-md-2">ACTION</th>
                     </tr>
                  </thead>
                  <tbody >
                     <?php $i=0; ?>
                     @foreach($products as $product)
                     <?php $i++; ?>
                     <tr>
                        <td  class="col-xs-1 col-sm-1 col-md-1">{{ $i }}</td>
                        <td  class="col-lg-2 col-xs-2 col-sm-2 col-md-2">{{ $product->category_name }}</td>
                        <td  class="col-lg-2 col-xs-2 col-sm-2 col-md-2">{{ $product->product_code }}</td>
                        <td  class="col-lg-2 col-xs-2 col-sm-2 col-md-2">{{ $product->product_name }}</td>
                        <td  class="col-lg-1 col-xs-1 col-sm-1 col-md-1">{{ $product->product_price }}</td>
                        <td  class="col-lg-1 col-xs-1 col-sm-1 col-md-1">{{ $product->product_instock }}</td>
                        <td  class="col-lg-2 col-xs-2 col-sm-2 col-md-2">
                           <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
                           <button type="button" name="edit" id="{{ $product->id }}" class="edit btn btn-warning glyphicon glyphicon-edit btn-md"></button> <!-- class="btn btn-warning btn-sm editbtn" -->
                           <button type="button" name="delete" id="{{ $product->id }}" class="delete btn btn-danger glyphicon glyphicon-trash btn-md"></button> <!-- class="btn btn-danger btn-sm deletebtn" -->
                        </td>
                     </tr>
                     @endforeach       
                  </tbody>
               </table>
            @endif    
            {!! $products->appends(Request::capture()->except('page'))->render() !!}
            <!-- {!!$products->render()!!}  -->