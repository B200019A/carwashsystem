@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User id</th>
                        <td>Name</th>
                        <th>Email</th>
                        <th>Operates</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)
                        @if ($users->role == 0)
                            <tr>
                                <td>{{ $users->id }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td><a href="{{ route('deactivateUser', ['id' => $users->id]) }}" class="btn btn btn-xs"
                                        style=" background-color:red;"
                                        onClick="return confirm('Are you sure to deactivate?')">Deactivate</a></td>


                            </tr>
                        @elseif($users->role == 3)
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td><a href="{{ route('reactivateUser', ['id' => $users->id]) }}" class="btn btn btn-xs"
                                    style=" background-color:grey;"
                                    onClick="return confirm('Are you sure to reactivate?')">Reactivate</a></td>


                        </tr>
                        @else
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
