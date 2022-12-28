@extends('layouts.app')
@section('content')
    <style>
        * {
            box-sizing: border-box;

        }

        .columns {
            float: left;
            width: 33.3%;
            padding: 8px;

        }

        .price {
            list-style-type: none;
            border: 1px solid #eee;
            border-radius: 25px;
            margin: 0;
            padding: 0;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }

        .price:hover {
            box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2)
        }

        .price .header {
            background-color: #111;
            color: white;
            border-radius: 25px 25px 0px 0px;
            font-size: 25px;
        }

        .price li {
            border-bottom: 1px solid #eee;
            padding: 20px;
            text-align: center;
        }

        .price .grey {
            background-color: #eee;
            font-size: 20px;
        }

        .button {
            background-color: #04AA6D;
            border: none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
        }

        @media only screen and (max-width: 600px) {
            .columns {
                width: 100%;
            }
        }
    </style>
    <div class="container">
        <h2 style="margin-top: 2%; text-align:center">Member Level</h2>
        @foreach ($userMemberPoints as $userMemberPoint)
            @if ($userMemberPoint->memberLevel == 'new')
                <div class="columns">
                    <ul class="price">
                        <li class="header" style="background-color:#04AA6D">New</li>
                        <li class="grey">Target Point: 0</li>
                        <li>Current Mmeber Point: {{ $userMemberPoint->currentPoint }}</li>
                        <li>Benefit: no discount</li>
                        <li style="border-radius: 0px 0px 25px 25px;">(RM 1 spending get one point)</li>
                    </ul>
                </div>
            @else
                <div class="columns">
                    <ul class="price">
                        <li class="header">New</li>
                        <li class="grey">Target Point: 0</li>
                        <li>Current Mmeber Point: --</li>
                        <li>Benefit: no discount</li>
                        <li style="border-radius: 0px 0px 25px 25px;">(RM 1 spending get one point)</li>
                    </ul>
                </div>
            @endif
        @endforeach

        @foreach ($userMemberPoints as $userMemberPoint)
            @if ($userMemberPoint->memberLevel == 'Silver')
                <div class="columns">
                    <ul class="price">
                        <li class="header" style="background-color:#04AA6D">Silver</li>
                        <li class="grey">Target Point: 1500</li>
                        <li>Current Mmeber Point: {{ $userMemberPoint->currentPoint }}</li>
                        <li>Benefit: 5% discount</li>
                        <li style="border-radius: 0px 0px 25px 25px;">(RM 1 spending get one point)</li>
                    </ul>
                </div>
            @else
                <div class="columns">
                    <ul class="price">
                        <li class="header">Silver</li>
                        <li class="grey">Target Point: 1500</li>
                        <li>Current Mmeber Point: --</li>
                        <li>Benefit: 5% discount</li>
                        <li style="border-radius: 0px 0px 25px 25px;">(RM 1 spending get one point)</li>

                    </ul>
                </div>
            @endif
        @endforeach

        @foreach ($userMemberPoints as $userMemberPoint)
            @if ($userMemberPoint->memberLevel == 'Gold')
                <div class="columns">
                    <ul class="price">
                        <li class="header" style="background-color:#04AA6D">Gold</li>
                        <li class="grey">Target Point: 3000</li>
                        <li>Current Mmeber Point: {{ $userMemberPoint->currentPoint }}</li>
                        <li>Benefit: 10% discount</li>
                        <li style="border-radius: 0px 0px 25px 25px;">(RM 1 spending get one point)</li>
                    </ul>
                </div>
            @else
                <div class="columns">
                    <ul class="price">
                        <li class="header">Gold</li>
                        <li class="grey">Target Point: 3000</li>
                        <li>Current Mmeber Point: --</li>
                        <li>Benefit: 10% discount</li>
                        <li style="border-radius: 0px 0px 25px 25px;">(RM 1 spending get one point)</li>
                    </ul>
                </div>
            @endif
        @endforeach

        @foreach ($userMemberPoints as $userMemberPoint)
            @if ($userMemberPoint->memberLevel == 'Platinum')
                <div class="columns">
                    <ul class="price">
                        <li class="header" style="background-color:#04AA6D">Platinum</li>
                        <li class="grey">Target Point: 4500</li>
                        <li>Current Mmeber Point: {{ $userMemberPoint->currentPoint }}</li>
                        <li>Benefit: 15% discount</li>
                        <li style="border-radius: 0px 0px 25px 25px;">(RM 1 spending get one point)</li>
                    </ul>
                </div>
            @else
                <div class="columns">
                    <ul class="price">
                        <li class="header">Platinum</li>
                        <li class="grey">Target Point: 4500</li>
                        <li>Current Mmeber Point: --</li>
                        <li>Benefit: 15% discount</li>
                        <li style="border-radius: 0px 0px 25px 25px;">(RM 1 spending get one point)</li>
                    </ul>
                </div>
            @endif
        @endforeach
    </div>
@endsection
