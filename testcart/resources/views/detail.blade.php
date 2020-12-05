@extends('layouts.app')
@section('content') 
<div class="container-fluid">
    <div class="row" style="margin-top: 10px">
  
      <div class="col-md-8">
      @foreach($products as $product)
        <div class="card border-0">
          <h5 class="card-title">Products</h5>
          <div class="row">
            <div class="col-sm-6">
              <img src="{{ asset('images/') }}/{{$product->image}}" alt="" class="img-fluid">
            </div>

            <div class="col-sm-6">
              <div class="card h-100 border-0">
                <div class="card-body">
                  <h5 class="card-title">{{$product->name}}</h5>
                  <p>{{$product->description}}</p>

                  <div style="height:100px">Quantity <input type="number" name="quantity" value="1" min="1" max="5">
                  {{$product->quantity}}</div>

                  <div class="card-heading">RM {{$product->price}} <button style="float:right;"
                      class="btn btn-danger btn-xs">AddToCart</button>
                  </div>
                </div>
              </div>
            </div> 
          </div>
          @endforeach
          <div class="card card-footer">&copy; 2020</div>


        </div>
      </div>
      <div class="col-md-1"></div>
     
    </div>
  </div>
  @endsection
