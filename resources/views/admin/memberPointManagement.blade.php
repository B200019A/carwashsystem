@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Member Point</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($memberPoints as $memberPoint)
                        <tr>
                            <td>spend RM1 get {{ $memberPoint->multiple }} member point</td>
                            <td><a href="{{ route('editMemberPoint', ['id' => $memberPoint->id]) }}"
                                    class="btn btn-warning btn-xs">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
