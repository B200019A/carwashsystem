@extends('layouts.app')
@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" type="text/css" href="../css/Table/main.css">
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
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>Reservation</a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <button style="border-radius: 8px;" class="w3-bar-item w3-button" value="1"
                        onclick="openReservation('upcoming')">UpComing</button>

                    <button style="border-radius: 8px;" class="w3-bar-item w3-button" value="2"
                        onclick="openReservation('unpaid')">Unpaid</button>
                    <button style="border-radius: 8px;" class="w3-bar-item w3-button" value="3"
                        onclick="openReservation('cancel')">Cancel</button>
                    <button style="border-radius: 8px;"class="w3-bar-item w3-button" value="4"
                        onclick="openReservation('exipired')">Booking History</button>

                </div>
            </li>
        </div>
        <input id="reservationStatus" type="hidden" class="reservationStatus" name="reservationStatus" value="1"
            readonly="true">

        <div id="upcoming" class="w3-container reservation">

            <div id="tablePosition">
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
                            <th class="column9">Operate</th>
                            <th class="column10">Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allReservation as $allReservations)
                            @if ($allReservations->status == 'upcoming')
                                @if ($allReservations->paymentStatus == 1 || $allReservations->paymentStatus == 4)
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
                                        @endif
                                        <td class="column7">{{ $allReservations->branchName }}</td>
                                        <td class="column8" style="color:green;">{{ $allReservations->status }}</td>
                                        <td class="column9"><a
                                                href="{{ route('editReservation', ['id' => $allReservations->id]) }}"
                                                class="btn btn-warning btn-xs">Edit</a>
                                            <a href="{{ route('cancelReservation', ['id' => $allReservations->id]) }}"
                                                class="btn btn-danger btn-xs"
                                                onClick="return confirm('Are you sure to cancel?')">Cancel</a>
                                        </td>
                                        <td class="column10">
                                            <a href="{{ route('printInvoice', ['id' => $allReservations->id]) }}"
                                                class="btn btn-info btn-xs">Print</a>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div id="unpaid" class="w3-container reservation" style="display:none">

            <div id="tablePosition">
                <table id="myTable2">
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
                            <th class="column9">Operate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allReservation as $allReservations)
                            @if ($allReservations->paymentStatus == 0)
                                @if ($allReservations->status == 'upcoming')
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
                                        @endif
                                        <td class="column8">{{ $allReservations->branchName }}</td>
                                        <td class="column9" style="color:green;">{{ $allReservations->status }}</td>
                                        <td><a href="{{ route('repayment', ['id' => $allReservations->orderId]) }}"
                                                class="btn btn-warning btn-xs">Payment</a></td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="cancel" class="w3-container reservation" style="display:none">
            <div id="tablePosition">
                <table id="myTable3">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Order Id</th>
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
                            @if ($allReservations->status == 'cancel' || $allReservations->status == 'cancelByPackage')
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
                                    @endif
                                    <td class="column7">{{ $allReservations->branchName }}</td>
                                    <td class="column8" style="color:red;">Pending Cancel</td>
                                </tr>
                            @elseif ($allReservations->status == 'refund success' || $allReservations->status == 'refund success by package')
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
                                    @endif
                                    <td class="column7">{{ $allReservations->branchName }}</td>
                                    <td class="column8" style="color:#d15619;">Refund Success</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <div id="exipired" class="w3-container reservation" style="display:none">
            <div id="tablePosition">
                <table id="myTable4">
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
                            <!-- <th class="column9">Operate</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allReservation as $allReservations)
                            @if ($allReservations->status == 'expired')
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
                                    @endif
                                    <td class="column7">{{ $allReservations->branchName }}</td>
                                    <td class="column8" style="color:red;">{{ $allReservations->status }}</td>
                                    <!-- <td class="column9"><a href="" class="btn btn-warning btn-xs">view</a></td>-->
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>




    <script>
        function openReservation(reservation) {
            var i;
            var x = document.getElementsByClassName("reservation");
            //var clickValue = document.getElementById(reservation).value;
            //alert(clickValue);
            if (reservation == "upcoming") {
                document.getElementById("reservationStatus").value = "1";
            } else if (reservation == "unpaid") {
                document.getElementById("reservationStatus").value = "2";

            } else if (reservation == "cancel") {
                document.getElementById("reservationStatus").value = "3";

            } else {
                document.getElementById("reservationStatus").value = "4";

            }

            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(reservation).style.display = "block";
        }

        function searchFunction() {

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("keyword");
            filter = input.value.toUpperCase();
            var reservationValue = document.getElementById("reservationStatus").value;

            if (reservationValue == "1") {
                table = document.getElementById("myTable1");
            } else if (reservationValue == "2") {
                table = document.getElementById("myTable2");
            } else if (reservationValue == "3") {
                table = document.getElementById("myTable3");
            } else {
                table = document.getElementById("myTable4");
            }
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
