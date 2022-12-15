@extends('layouts.app')
@section('content')
    <div class="col-sm-3"></div>
    </div>
    <div class="row admin-background">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <h3>Edit Member Level</h3>
            <form action="{{ route('updateMemberLevel') }}" method="POST" enctype="multipart/form-data">
                @CSRF
                @foreach ($memberLevels as $memberLevel)
                    <input type="hidden" name="memberLevelId" value="{{ $memberLevel->id }}">
                    <div class="form-group">
                        <label for="memberLevelName">Member level</label>
                        <input class="form-control" type="text" id="memberLevelName" name="memberLevelName" value="{{ $memberLevel->memberLevel }}">
                    </div>
                    <div class="form-group">
                        <label for="targetPoint">Target point</label>
                        <input class="form-control" type="number" id="targetPoint" name="targetPoint" value="{{ $memberLevel->targetPoint }}">
                    </div>
                    <div class="form-group">
                        <label for="dicount">Discount %</label>
                        <input class="form-control" type="number" id="dicount" name="dicount" value="{{ $memberLevel->discount }}">
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Edit Member Level</button>
            </form>
            <br><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
