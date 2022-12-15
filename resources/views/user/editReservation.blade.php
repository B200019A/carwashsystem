@extends('layouts.app')
@section('content')
    <div class="row admin-background">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <h3>Edit Reservation</h3>
            <form action="{{ route('updateReservation') }}" method="POST" enctype="multipart/form-data">
                @CSRF
                @foreach ($reservation as $reservations)
                    <input type="hidden" name="reservationId" id="reservationId" value="{{ $reservations->id }}">
                    <div class="form-group">
                        <label for="carPlate">Car plate</label>
                        <input class="form-control" type="text" id="carPlate" name="carPlate"
                            value="{{ $reservations->carPlate }}">
                    </div>
                    <div class="form-group">
                        <label for="serviceType">Type of Services</label>
                        <input class="form-control" type="text" id="serviceType" name="serviceType"
                            value="{{ $reservations->Services }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input class="form-control" type="date" id="date" name="date" max=""
                            min="" value="{{ $reservations->date }}">
                    </div>
                    <div class="form-group">
                        <label for="timeSlot">Time slot</label>
                        <select name="timeSlot" id="timeSlot" class="form-control" value="{{ $reservations->timeSlot }}">
                            <option value="1">10:00 AM</option>
                            <option value="2">12:00 PM</option>
                            <option value="3">2:00 PM</option>
                            <option value="4">4:00 PM</option>
                            <option value="5">6:00 PM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="branch">Branch</label>
                        <select name="branch" id="branch" class="form-control" value="{{ $reservations->branchId }}">
                            @foreach ($branchs as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Update Reservation</button>
            </form>
            <br><br>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <script>
        var dateRange = document.querySelector("#date");
        var date_now = new Date().getTime();
        var date_end = new Date(date_now + 2592000000); //ater one month
        var date_now = new Date(date_now + 86400000); //ater one day 

        to_YY_MM_DD = function(date) {

            let year = date.getFullYear();
            let month = date.getMonth() + 1;
            let day = date.getDate();

            month = (month < 10) ? '0' + month : month;
            day = (day < 10) ? '0' + day : day;
            return year + '-' + month + '-' + day;
        }

        var max = to_YY_MM_DD(date_end);
        var min = to_YY_MM_DD(date_now);

        dateRange.setAttribute("max", max);
        dateRange.setAttribute("min", min);


        // Use Javascript
        //set min date
        /*cal()=function(){
            /*var tmr = new Date();
            var dd = tmr.getDate(); //can booking after today
            var mm = tmr.getMonth()+1; //January is 0 so need to add 1 to make it 1!
            var yyyy = tmr.getFullYear();
         
            if(dd>30){
                mm = mm+1;
                dd= '0'+1;
                
            }

            if(dd<10){
            dd='0'+dd
            } 
            if(mm<10){
            mm='0'+mm
            } 
            tmr = yyyy+'-'+mm+'-'+dd;
            document.getElementById("date").setAttribute('min', tmr);

        }*/
    </script>
@endsection
