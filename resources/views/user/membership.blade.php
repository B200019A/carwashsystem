@extends('layouts.app')
@section('content')
<div style="margin-top:10px; margin-bottom:10px">
<div class="row">
    <div class="col-sm-2"></div>
        <div class="col-md-8">
          <div class="card">
          @foreach($userMemberPoints as $userMemberPoint)
          <div class="card-title"style="margin-left:20px; color:green;"><h4>Your current Member level: {{$userMemberPoint->memberLevel}}</h4></div>
          <div class="card-title"style="margin-left:20px; color:green;"><h4>Your current point: {{$userMemberPoint->currentPoint}} point</h4></div> 
            <div class="card-title"style="margin-left:20px;"><h4>Your Voucher</h4></div> 
          @endforeach
            <div style="margin-left:20px; margin-right:20px;  "><!--adjust margin strat-->
             <div class="row">
                <div class="col-sm-4" style="margin-top:10px">
                    <div class="card h-100">
                        <div class="card-body">
                          <h5 class="card-title">Voucher</h5>
                          <a href=""><img src="{{asset('images/voucher1.jpeg')}}" alt="" width="100" class="img-fluid"><a>
                        
                          <div class="card-heading"><a href="">Valid Till: 16.08.2022<a></div>
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
                        
                          <div class="card-heading"><a href="">Valid Till: 16.08.2022<a></div>
                      </div>
                    </div>
                  </div>
              </div><!--card end-->

            </div>
        </div>
@endsection