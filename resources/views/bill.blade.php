@include('layout.header')


<!--Start Table -->
   <div class="table">
     <div class="container">

             <h2 class="h1 text-center">Bills and orders</h2>
           @foreach($bills as $bill)
           <table class="table  text-center mt-5">
              <thead class="table-dark">
                <tr>
                      <th scope="col">#</th>
                      <th scope="col">Picture</th>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                </tr>
              </thead>
              <tbody>
                @foreach($bill->orders as $order)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td><img src="{{asset($order->product->image)}}"></td>
                  <td>{{$order->product->name}}</td>
                  <td>{{$order->product->price}}</td>
                  <td>{{$order->quantity}}</td>
                  

                </tr>
                @endforeach
                
              </tbody>
            </table>
            @endforeach
       </div>
    </div>
<!--End Table-->
    
  @include('layout.footer')
    
    
