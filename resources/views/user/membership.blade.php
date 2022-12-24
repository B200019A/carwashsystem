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
          @endforeach

                &nbsp;




            </div>
        </div>
@endsection
