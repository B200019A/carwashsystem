@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Cancel Order id</th>
                        <td>Type of services</th>
                        <th>Price</th>
                        <th>Car plate</th>
                        <td>Date</th>
                        <th>Time slot</th>
                        <th>Branch</th>
                        <th>Status</th>
                        <th>Operate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($refundReservations as $refundReservation)
                    <tr>
                        <td> {{ $refundReservation->orderId }}</td>
                        <td>{{ $refundReservation->Services }}</td>
                        <td>{{ $refundReservation->price }}</td>
                        <td>{{ $refundReservation->carPlate }}</td>
                        <td>{{ $refundReservation->date }}</td>
                        @if ($refundReservation->timeSlot == '1')
                            <td>10:00 AM</td>
                        @elseif($refundReservation->timeSlot == '2')
                            <td>12:00 PM</td>
                        @elseif($refundReservation->timeSlot == '3')
                            <td>2:00 PM</td>
                        @elseif($refundReservation->timeSlot == '4')
                            <td>4:00 PM</td>
                        @elseif($refundReservation->timeSlot == '5')
                            <td>6:00 PM</td>
                        @endif
                        <td>{{ $refundReservation->branchName }}</td>
                        <td style="color:red;">{{ $refundReservation->status }}</td>
                        <td><a href="{{route('refund',['id'=>$refundReservation->orderId])}}" class="btn btn-warning btn-xs" onClick="return confirm('Are you sure to refund?')">Refund</a>
                        </td>
                    </tr>
                    @endforeach
                    @foreach($refundReservationsPackages as $refundReservationsPackage)
                    <tr>
                        <td> {{ $refundReservationsPackage->orderId }}</td>
                        <td>{{ $refundReservationsPackage->Services }}</td>
                        <td>{{ $refundReservationsPackage->price }}</td>
                        <td>{{ $refundReservationsPackage->carPlate }}</td>
                        <td>{{ $refundReservationsPackage->date }}</td>
                        @if ($refundReservationsPackage->timeSlot == '1')
                            <td>10:00 AM</td>
                        @elseif($refundReservationsPackage->timeSlot == '2')
                            <td>12:00 PM</td>
                        @elseif($refundReservationsPackage->timeSlot == '3')
                            <td>2:00 PM</td>
                        @elseif($refundReservationsPackage->timeSlot == '4')
                            <td>4:00 PM</td>
                        @elseif($refundReservationsPackage->timeSlot == '5')
                            <td>6:00 PM</td>
                        @endif
                        <td>{{ $refundReservationsPackage->branchName }}</td>
                        <td style="color:red;">{{ $refundReservationsPackage->status }}</td>
                        <td><a href="{{route('refund',['id'=>$refundReservationsPackage->orderId])}}" class="btn btn-warning btn-xs" onClick="return confirm('Are you sure to refund?')">Refund</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
