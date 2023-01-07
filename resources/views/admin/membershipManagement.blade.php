@extends('layouts.app')
@section('content')


<div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Member level</th>
                        <td>Target point</th>
                        <td>Discount</th>
                        <th>Operate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($memberLevels as $memberLevel)
                    <tr>
                        <td>{{$memberLevel->memberLevel}}</td>
                        <td>{{$memberLevel->targetPoint}}</td>
                        <td>{{$memberLevel->discount}}%</td>
                        <td><a href="{{ route('editMemberLevel', ['id' => $memberLevel->id]) }}"
                                    class="btn btn-warning btn-xs">Edit</a>
                            <a href="{{ route('deleteMemberLevel', ['id' => $memberLevel->id]) }}"
                                    class="btn btn-danger btn-xs">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row admin-background">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New member level</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            @CSRF
            <div class="form-group">
                <label for="memberLevelName">Member level</label>
                <input class="form-control" type="text" id="memberLevelName" name="memberLevelName" >
            </div>
            <div class="form-group">
            <label for="targetPoint">Target point</label>
            <input class="form-control" type="number" id="targetPoint" name="targetPoint" >
            </div>
            <div class="form-group">
            <label for="dicount">Discount %</label>
            <input class="form-control" type="number" id="dicount" name="dicount" >
            </div>

            <button type="submit" class="btn btn-primary">Add New Mmeber Level</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection
