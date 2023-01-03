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

        .page-link {
            color: black !important;
            background-color: white !important;
        }

        .page-link:active {
            color: white !important;
            background-color: #3f3b4b !important;
            border-color: grey !important;

        }

        .page-item.active {
            background-color: #3f3b4b !important;
            border-color: grey !important;
        }

        .active>.page-link {
            z-index: 3;
            color: white !important;
            background-color: #3f3b4b !important;
            border-color: black !important;
        }

    </style>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <div id="body">

        <div class="buttonStyle">

            <li class="nav-item dropdown">
                <a id="navbarDropdown" style="color:white !important;" class="  nav-style dropdown-toggle" href="#"
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Sort</a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="" href="{{ route('sortReservationId') }}"><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1">Order Id</button></a>
                    <a class="" href="{{ route('sortReservationService') }}"><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1">Type of services</button></a>
                    <a class="" href="{{ route('sortReservationPrice') }}"><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1">Price</button></a>
                    <a class="" href="{{ route('sortReservationCarPlate') }}"><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1">Car plate</button></a>
                    <a class="" href="{{ route('sortReservationDate') }}"><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1">Date</button></a><br>
                    <a class="" href="{{ route('sortReservationBranch') }}"><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1">Branch</button></a>
                    <a class="" href="{{ route('sortReservationStatus') }}"><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1">Status</button></a>

                </div>
            </li>
        </div>
          <div class="buttonStyle">

            <li class="nav-item dropdown">
                <a id="navbarDropdown" style="color:white !important;" class="  nav-style dropdown-toggle" href="#"
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Search By</a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="" ><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1" onclick="openReservation('1')">Order Id</button></a>
                    <a class="" ><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1" onclick="openReservation('2')">Type of services</button></a>
                    <a class="" ><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1" onclick="openReservation('3')">Price</button></a>
                    <a class="" ><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1" onclick="openReservation('4')">Car plate</button></a>
                    <a class="" ><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1" onclick="openReservation('5')">Date</button></a><br>
                    <a class="" ><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1" onclick="openReservation('6')">Branch</button></a>
                    <a class=""><button style="border-radius: 8px;"
                            class="w3-bar-item w3-button" value="1" onclick="openReservation('7')">Status</button></a>

                </div>
            </li>
        </div>
        <div class="buttonStyle">
            <div id="">
            <form class="form-inline" action="{{route('searchReservation')}}" method="POST">
                @csrf
                <input class="form-control " style="margin-left:5px;height:30px;"name="keyword" type="search" placeholder="Search" aria-label="Search">
                <input id="reservationStatus" type="hidden" class="reservationStatus" name="reservationStatus" value="1"
            readonly="true">
                <button class="btn buttonStyle buttonhover" type="submit">Search</button>
            </form>
            </div>
        </div>


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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewReservations as $viewReservation)
                            <tr>
                                <td class="column1"> {{ $viewReservation->orderId }}</td>
                                <td class="column2">{{ $viewReservation->Services }}</td>
                                <td class="column3">RM {{ number_format($viewReservation->totalAmount, 2) }}</td>
                                <td class="column4">{{ $viewReservation->carPlate }}</td>
                                <td class="column5">{{ $viewReservation->date }}</td>
                                @if ($viewReservation->timeSlot == '1')
                                    <td class="column6">10:00 AM</td>
                                @elseif($viewReservation->timeSlot == '2')
                                    <td class="column6">12:00 PM</td>
                                @elseif($viewReservation->timeSlot == '3')
                                    <td class="column6">2:00 PM</td>
                                @elseif($viewReservation->timeSlot == '4')
                                    <td class="column6">4:00 PM</td>
                                @elseif($viewReservation->timeSlot == '5')
                                    <td class="column6">6:00 PM</td>
                                @endif
                                <td class="column7">{{ $viewReservation->branchName }}</td>
                                <td class="column8" style="">{{ $viewReservation->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(method_exists($viewReservations, 'links'))
                <div class="d-flex justify-content-center" style="margin-top:1%">
                    {{ $viewReservations->links('pagination::bootstrap-5') }}
                </div>
                @endif
            </div>
        </div>
    </div>




    <script>
        function openReservation(reservation) {
            var i;
            var x = document.getElementsByClassName("reservation");
            //var clickValue = document.getElementById(reservation).value;
            //alert(clickValue);
            if (reservation == "1") {
                document.getElementById("reservationStatus").value = "1";
            } else if (reservation == "2") {
                document.getElementById("reservationStatus").value = "2";

            } else if (reservation == "3") {
                document.getElementById("reservationStatus").value = "3";

            }  else if (reservation == "4") {
                document.getElementById("reservationStatus").value = "4";

            }else if (reservation == "5") {
                document.getElementById("reservationStatus").value = "5";

            }else if (reservation == "6") {
                document.getElementById("reservationStatus").value = "6";

            }else{
                document.getElementById("reservationStatus").value = "7";

            }

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
