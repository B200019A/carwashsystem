@extends('layouts.app')
@section('content')

    
    <div class="col-sm-3"></div>
    </div>
    <div class="row admin-background">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Notification</h3>
        <form action="{{route('updateNotification')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @foreach($notifications as $notification)
            <input type="hidden" name="notificationId" value="{{$notification->id}}">
            <div class="form-group">
               
                <label for="notificationTitle">Notification title</label>
                <input class="form-control" type="text" id="notificationTitle" name="notificationTitle" value="{{$notification->title}}">
            </div>
            <div class="form-group">
            <label for="notificationDescription">Description</label>
            <input class="form-control" type="text" id="notificationDescription" name="notificationDescription"  value="{{$notification->description}}">
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Edit Notification</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection