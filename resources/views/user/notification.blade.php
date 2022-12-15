@extends('layouts.app')
@section('content')

@inject('carbon', 'Carbon\Carbon')

<div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;"><H1>Notification</H1></th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($notifications as $notification)
                    <tr>
                        <td><h5>{{$notification->title}}</h5><p>{{$notification->description}}</p>
                            <p style="text-align: right;">{{ $carbon::parse($notification->created_at)->format('Y-m-d') }}</p></td>
                    </tr> 
                    @endforeach

                </tbody>
                </table>      
        </div>
        <div class="col-sm-3"></div>
    </div>


@endsection