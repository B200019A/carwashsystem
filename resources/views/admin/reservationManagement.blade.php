@extends('layouts.app')
@section('content')

    <style>
        .dropbtn {
            background-color: transparent;
            color: black;
            font-size: 15px;
            padding: 5px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #ddd;
        }
    </style>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <div class="dropdown">
                <button class="dropbtn">Sort</button>
                <div class="dropdown-content">
                    <a class="" href="{{ route('sortReservationId') }}">Reservation id</a>
                    <a class="" href="{{ route('sortReservationService') }}">Type of services</a>
                    <a class="" href="{{ route('sortReservationPrice') }}">Price</a>
                    <a class="" href="{{ route('sortReservationCarPlate') }}">Car plate</a>
                    <a class="" href="{{ route('sortReservationDate') }}">Date</a>
                    <a class="" href="{{ route('sortReservationBranch') }}">Branch</a>
                    <a class="" href="{{ route('sortReservationStatus') }}">Status</a>
                </div>
            </div>
            <br><br>

            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>Reservation id</th>
                        <th>Order Id</th>
                        <th>Type of services</th>
                        <th>Price</th>
                        <th>Car plate</th>
                        <th>Date</th>
                        <th>Time slot</th>
                        <th>Branch</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewReservations as $viewReservation)
                        @if ($viewReservation->status == 'expired')
                            <tr>
                                <td> {{ $viewReservation->id }}</td>
                                <td> {{ $viewReservation->orderId }}</td>
                                <td>{{ $viewReservation->Services }}</td>
                                <td>{{ $viewReservation->price }}</td>
                                <td>{{ $viewReservation->carPlate }}</td>
                                <td>{{ $viewReservation->date }}</td>
                                @if ($viewReservation->timeSlot == '1')
                                    <td>10:00 AM</td>
                                @elseif($viewReservation->timeSlot == '2')
                                    <td>12:00 PM</td>
                                @elseif($viewReservation->timeSlot == '3')
                                    <td>2:00 PM</td>
                                @elseif($viewReservation->timeSlot == '4')
                                    <td>4:00 PM</td>
                                @elseif($viewReservation->timeSlot == '5')
                                    <td>6:00 PM</td>
                                @endif
                                <td>{{ $viewReservation->branchName }}</td>
                                <td style="background-color: red;">{{ $viewReservation->status }}</td>

                            </tr>
                        @elseif($viewReservation->status == 'cancel' || $viewReservation->status == 'cancelByPackage')
                            <tr>
                                <td> {{ $viewReservation->id }}</td>
                                <td> {{ $viewReservation->orderId }}</td>
                                <td>{{ $viewReservation->Services }}</td>
                                <td>{{ $viewReservation->price }}</td>
                                <td>{{ $viewReservation->carPlate }}</td>
                                <td>{{ $viewReservation->date }}</td>
                                @if ($viewReservation->timeSlot == '1')
                                    <td>10:00 AM</td>
                                @elseif($viewReservation->timeSlot == '2')
                                    <td>12:00 PM</td>
                                @elseif($viewReservation->timeSlot == '3')
                                    <td>2:00 PM</td>
                                @elseif($viewReservation->timeSlot == '4')
                                    <td>4:00 PM</td>
                                @elseif($viewReservation->timeSlot == '5')
                                    <td>6:00 PM</td>
                                @endif
                                <td>{{ $viewReservation->branchName }}</td>
                                <td style="background-color: grey;">{{ $viewReservation->status }}</td>

                            </tr>
                        @elseif($viewReservation->status == 'refund success' || $viewReservation->status=='refund success by package')
                            <tr>
                                <td> {{ $viewReservation->id }}</td>
                                <td> {{ $viewReservation->orderId }}</td>
                                <td>{{ $viewReservation->Services }}</td>
                                <td>{{ $viewReservation->price }}</td>
                                <td>{{ $viewReservation->carPlate }}</td>
                                <td>{{ $viewReservation->date }}</td>
                                @if ($viewReservation->timeSlot == '1')
                                    <td>10:00 AM</td>
                                @elseif($viewReservation->timeSlot == '2')
                                    <td>12:00 PM</td>
                                @elseif($viewReservation->timeSlot == '3')
                                    <td>2:00 PM</td>
                                @elseif($viewReservation->timeSlot == '4')
                                    <td>4:00 PM</td>
                                @elseif($viewReservation->timeSlot == '5')
                                    <td>6:00 PM</td>
                                @endif
                                <td>{{ $viewReservation->branchName }}</td>
                                <td style="background-color: orange;">{{ $viewReservation->status }}</td>

                            </tr>
                        @else
                            @if ($viewReservation->paymentStatus == 1 || $viewReservation->paymentStatus == 4)
                                <tr>
                                    <td> {{ $viewReservation->id }}</td>
                                    <td> {{ $viewReservation->orderId }}</td>
                                    <td>{{ $viewReservation->Services }}</td>
                                    <td>{{ $viewReservation->price }}</td>
                                    <td>{{ $viewReservation->carPlate }}</td>
                                    <td>{{ $viewReservation->date }}</td>
                                    @if ($viewReservation->timeSlot == '1')
                                        <td>10:00 AM</td>
                                    @elseif($viewReservation->timeSlot == '2')
                                        <td>12:00 PM</td>
                                    @elseif($viewReservation->timeSlot == '3')
                                        <td>2:00 PM</td>
                                    @elseif($viewReservation->timeSlot == '4')
                                        <td>4:00 PM</td>
                                    @elseif($viewReservation->timeSlot == '5')
                                        <td>6:00 PM</td>
                                    @endif
                                    <td>{{ $viewReservation->branchName }}</td>
                                    <td style="background-color: green;">{{ $viewReservation->status }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td> {{ $viewReservation->id }}</td>
                                    <td> {{ $viewReservation->orderId }}</td>
                                    <td>{{ $viewReservation->Services }}</td>
                                    <td>{{ $viewReservation->price }}</td>
                                    <td>{{ $viewReservation->carPlate }}</td>
                                    <td>{{ $viewReservation->date }}</td>
                                    @if ($viewReservation->timeSlot == '1')
                                        <td>10:00 AM</td>
                                    @elseif($viewReservation->timeSlot == '2')
                                        <td>12:00 PM</td>
                                    @elseif($viewReservation->timeSlot == '3')
                                        <td>2:00 PM</td>
                                    @elseif($viewReservation->timeSlot == '4')
                                        <td>4:00 PM</td>
                                    @elseif($viewReservation->timeSlot == '5')
                                        <td>6:00 PM</td>
                                    @endif
                                    <td>{{ $viewReservation->branchName }}</td>
                                    <td style="background-color: yellow;"> no payment, {{ $viewReservation->status }}</td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <script>
        function searchFunction(){

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("keyword");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
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
