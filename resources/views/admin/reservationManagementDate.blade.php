@extends('layouts.app')
@section('content')
    @inject('carbon', 'Carbon\Carbon')
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../../css/Table/main.css">
    <style>
        body {
            background-color: #f5f9ff;
        }

        #body {
            margin-top: 2%;
            margin-bottom: 2%;
            margin-left: 5%;
            margin-right: 5%;
            text-align: center;

        }

        @media screen and (max-width: 400px) {
            #body {
                margin-top: 2%;
                margin-bottom: 2%;
                margin-left: 0%;
                margin-right: 0%;
                text-align: center;
            }
        }

        #tablePosition {
            margin-top: 1%;
            margin-bottom: 2%;
            margin-right: 2%;
            text-align: center;


        }

        .buttonStyle {

            background-color: #3f3b4b !important;
            display: inline-block;
            color: white;
            border-radius: 8px 8px;
            font-size: 15px;
        }

        @media screen and (max-width: 440px) {
            .buttonStyle {
                font-size: 12px;
            }
        }

        .nav-style {
            display: block;
            font-size: var(--bs-nav-link-font-size);
            padding: 0.5rem 1rem;
            font-weight: var(--bs-nav-link-font-weight);
            color: var(--bs-nav-link-color);
            text-decoration: none;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        }
    </style>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <div id="body">

        <div class="buttonStyle">

            <li class="nav-item dropdown">
                <a id="navbarDropdown" style="color:white !important;" class="  nav-style dropdown-toggle" href="#"
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Branch</a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @foreach ($branches as $branch)
                        <a href="{{ route('findBranchreservation', ['id' => $branch->id]) }}"><button
                                style="border-radius: 8px;" class="w3-bar-item w3-button"
                                value="{{ $branch->id }}">{{ $branch->name }}</button><a>
                    @endforeach
                </div>
            </li>
        </div>
        <input id="reservationStatus" type="hidden" class="reservationStatus" name="reservationStatus" value="1"
            readonly="true">

        <div class="w3-container reservation">
            <h1 style="text-align:left;">{{ $carbon::parse(now())->format('Y-m-d') }}</h1>
            <div id="tablePosition">
                <h5 style="text-align:left;">10:00 AM</h5>
                <table id="myTable1">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Order id</th>
                            <th class="column2">Type of services</th>
                            <th class="column3">Price</th>
                            <th class="column4">Car plate</th>
                            <th class="column5">Date</th>
                            <th class="column6">Time slot</th>
                            <th class="column7">Branch</th>
                            <th class="column8">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allReservation as $allReservations)
                            @if ($allReservations->timeSlot <= '12:00')
                                <tr>
                                    <td class="column1"> {{ $allReservations->orderId }}</td>
                                    <td class="column2">{{ $allReservations->Services }}</td>
                                    <td class="column3">RM {{ number_format($allReservations->totalAmount, 2) }}</td>
                                    <td class="column4">{{ $allReservations->carPlate }}</td>
                                    <td class="column5">{{ $allReservations->date }}</td>
                                    @if ($allReservations->timeSlot == '1')
                                        <td class="column6">10:00 AM</td>
                                    @elseif($allReservations->timeSlot == '2')
                                        <td class="column6">12:00 PM</td>
                                    @elseif($allReservations->timeSlot == '3')
                                        <td class="column6">2:00 PM</td>
                                    @elseif($allReservations->timeSlot == '4')
                                        <td class="column6">4:00 PM</td>
                                    @elseif($allReservations->timeSlot == '5')
                                        <td class="column6">6:00 PM</td>
                                    @else
                                        <td class="column6">{{ $allReservations->timeSlot }}</td>
                                    @endif
                                    <td class="column7">{{ $allReservations->branchName }}</td>
                                    <td class="column8" style="color:green;">{{ $allReservations->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="w3-container reservation">
            <div id="tablePosition">
                <h5 style="text-align:left;">12:00 PM</h5>
                <table id="myTable1">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Order id</th>
                            <th class="column2">Type of services</th>
                            <th class="column3">Price</th>
                            <th class="column4">Car plate</th>
                            <th class="column5">Date</th>
                            <th class="column6">Time slot</th>
                            <th class="column7">Branch</th>
                            <th class="column8">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allReservation as $allReservations)
                            @if ($allReservations->timeSlot == '2')
                                <tr>
                                    <td class="column1"> {{ $allReservations->orderId }}</td>
                                    <td class="column2">{{ $allReservations->Services }}</td>
                                    <td class="column3">RM {{ number_format($allReservations->totalAmount, 2) }}</td>
                                    <td class="column4">{{ $allReservations->carPlate }}</td>
                                    <td class="column5">{{ $allReservations->date }}</td>
                                    @if ($allReservations->timeSlot == '1')
                                        <td class="column6">10:00 AM</td>
                                    @elseif($allReservations->timeSlot == '2')
                                        <td class="column6">12:00 PM</td>
                                    @elseif($allReservations->timeSlot == '3')
                                        <td class="column6">2:00 PM</td>
                                    @elseif($allReservations->timeSlot == '4')
                                        <td class="column6">4:00 PM</td>
                                    @elseif($allReservations->timeSlot == '5')
                                        <td class="column6">6:00 PM</td>
                                    @else
                                        <td class="column6">{{ $allReservations->timeSlot }}</td>
                                    @endif
                                    <td class="column7">{{ $allReservations->branchName }}</td>
                                    <td class="column8" style="color:green;">{{ $allReservations->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="w3-container reservation">
            <div id="tablePosition">
                <h5 style="text-align:left;">2:00 PM</h5>
                <table id="myTable1">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Order id</th>
                            <th class="column2">Type of services</th>
                            <th class="column3">Price</th>
                            <th class="column4">Car plate</th>
                            <th class="column5">Date</th>
                            <th class="column6">Time slot</th>
                            <th class="column7">Branch</th>
                            <th class="column8">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allReservation as $allReservations)
                            @if ($allReservations->timeSlot == '3')
                                <tr>
                                    <td class="column1"> {{ $allReservations->orderId }}</td>
                                    <td class="column2">{{ $allReservations->Services }}</td>
                                    <td class="column3">RM {{ number_format($allReservations->totalAmount, 2) }}</td>
                                    <td class="column4">{{ $allReservations->carPlate }}</td>
                                    <td class="column5">{{ $allReservations->date }}</td>
                                    @if ($allReservations->timeSlot == '1')
                                        <td class="column6">10:00 AM</td>
                                    @elseif($allReservations->timeSlot == '2')
                                        <td class="column6">12:00 PM</td>
                                    @elseif($allReservations->timeSlot == '3')
                                        <td class="column6">2:00 PM</td>
                                    @elseif($allReservations->timeSlot == '4')
                                        <td class="column6">4:00 PM</td>
                                    @elseif($allReservations->timeSlot == '5')
                                        <td class="column6">6:00 PM</td>
                                    @else
                                        <td class="column6">{{ $allReservations->timeSlot }}</td>
                                    @endif
                                    <td class="column7">{{ $allReservations->branchName }}</td>
                                    <td class="column8" style="color:green;">{{ $allReservations->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="w3-container reservation">
            <div id="tablePosition">
                <h5 style="text-align:left;">4:00 PM</h5>
                <table id="myTable1">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Order id</th>
                            <th class="column2">Type of services</th>
                            <th class="column3">Price</th>
                            <th class="column4">Car plate</th>
                            <th class="column5">Date</th>
                            <th class="column6">Time slot</th>
                            <th class="column7">Branch</th>
                            <th class="column8">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allReservation as $allReservations)
                            @if ($allReservations->timeSlot == '4')
                                <tr>
                                    <td class="column1"> {{ $allReservations->orderId }}</td>
                                    <td class="column2">{{ $allReservations->Services }}</td>
                                    <td class="column3">RM {{ number_format($allReservations->totalAmount, 2) }}</td>
                                    <td class="column4">{{ $allReservations->carPlate }}</td>
                                    <td class="column5">{{ $allReservations->date }}</td>
                                    @if ($allReservations->timeSlot == '1')
                                        <td class="column6">10:00 AM</td>
                                    @elseif($allReservations->timeSlot == '2')
                                        <td class="column6">12:00 PM</td>
                                    @elseif($allReservations->timeSlot == '3')
                                        <td class="column6">2:00 PM</td>
                                    @elseif($allReservations->timeSlot == '4')
                                        <td class="column6">4:00 PM</td>
                                    @elseif($allReservations->timeSlot == '5')
                                        <td class="column6">6:00 PM</td>
                                    @else
                                        <td class="column6">{{ $allReservations->timeSlot }}</td>
                                    @endif
                                    <td class="column7">{{ $allReservations->branchName }}</td>
                                    <td class="column8" style="color:green;">{{ $allReservations->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="w3-container reservation">
            <div id="tablePosition">
                <h5 style="text-align:left;">6:00 PM</h5>
                <table id="myTable1">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Order id</th>
                            <th class="column2">Type of services</th>
                            <th class="column3">Price</th>
                            <th class="column4">Car plate</th>
                            <th class="column5">Date</th>
                            <th class="column6">Time slot</th>
                            <th class="column7">Branch</th>
                            <th class="column8">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allReservation as $allReservations)
                            @if ($allReservations->timeSlot == '5')
                                <tr>
                                    <td class="column1"> {{ $allReservations->orderId }}</td>
                                    <td class="column2">{{ $allReservations->Services }}</td>
                                    <td class="column3">RM {{ number_format($allReservations->totalAmount, 2) }}</td>
                                    <td class="column4">{{ $allReservations->carPlate }}</td>
                                    <td class="column5">{{ $allReservations->date }}</td>
                                    @if ($allReservations->timeSlot == '1')
                                        <td class="column6">10:00 AM</td>
                                    @elseif($allReservations->timeSlot == '2')
                                        <td class="column6">12:00 PM</td>
                                    @elseif($allReservations->timeSlot == '3')
                                        <td class="column6">2:00 PM</td>
                                    @elseif($allReservations->timeSlot == '4')
                                        <td class="column6">4:00 PM</td>
                                    @elseif($allReservations->timeSlot == '5')
                                        <td class="column6">6:00 PM</td>
                                    @else
                                        <td class="column6">{{ $allReservations->timeSlot }}</td>
                                    @endif
                                    <td class="column7">{{ $allReservations->branchName }}</td>
                                    <td class="column8" style="color:green;">{{ $allReservations->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    @endsection
