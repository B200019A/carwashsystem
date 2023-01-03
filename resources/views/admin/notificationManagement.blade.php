@extends('layouts.app')
@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <style>
    th{
        text-align:center;
    }
    </style>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <H1>Notification</H1>
                        </th>
                        <th style="text-align:center;">Operates</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                        <tr>
                            <td>
                                <h5>{{ $notification->title }}</h5>
                                <p>{{ $notification->description }}</p>
                                <p style="text-align: right;">
                                    {{ $carbon::parse($notification->created_at)->format('Y-m-d') }}</p>
                            </td>
                            <td><a href="{{ route('editNotification', ['id' => $notification->id]) }}"
                                    class="btn btn-warning btn-xs">Edit</a>
                                <a href="{{ route('deleteNotification', ['id' => $notification->id]) }}"
                                    class="btn btn-danger btn-xs"
                                    onClick="return confirm('Are you sure to delete?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="col-sm-3"></div>
    </div>
    <div class="row admin-background">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <h3>Add New Notification</h3>
            <form action="{{ route('addNotification') }}" method="POST" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <label for="notificationTitle">Notification title</label>
                    <input class="form-control" type="text" id="notificationTitle" name="notificationTitle">
                </div>
                <div class="form-group">
                    <label for="notificationDescription">Description</label>
                    <input class="form-control" type="text" id="notificationDescription" name="notificationDescription">
                </div>

                <button type="submit" class="btn btn-primary">Add New Notification</button>
            </form>
            <br><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
