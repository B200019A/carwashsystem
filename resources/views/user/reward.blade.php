@extends('layouts.app')
@section('content')
<div style="margin-top:10px; margin-bottom:10px">
<div class="row">
    <div class="col-sm-2"></div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-title"style="margin-left:20px;"><h4>Voucher</h4></div> 

            <div style="margin-left:20px; margin-right:20px;  "><!--adjust margin strat-->
             <div class="row">
                <div class="col-sm-4" style="margin-top:10px">
                    <div class="card h-100">
                        <div class="card-body">
                          <h5 class="card-title">Voucher</h5>
                          <a href=""><img src="{{asset('images/voucher1.jpeg')}}" alt="" width="100" class="img-fluid"><a>
                        
                          <div class="card-heading">100 Point<a href=""><button type="submit" style="float:right;" class="btn btn-danger btn-xs">redeem</button><a></div>
                      </div>
                    </div>
                  </div>
                &nbsp;

        
             <div class="row"><!--card start-->
                <div class="col-sm-4" style="margin-top:10px">
                    <div class="card h-100">
                        <div class="card-body">
                          <h5 class="card-title">Voucher</h5>
                          <a href=""><img src="{{asset('images/voucher1.jpeg')}}" alt="" width="100" class="img-fluid"><a>
                        
                          <div class="card-heading">100 Point<a href=""><button type="submit" style="float:right;" class="btn btn-danger btn-xs">redeem</button><a></div>
                      </div>
                    </div>
                  </div>
              </div><!--card end-->

            </div>
        </div>
@endsection