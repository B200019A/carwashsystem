@extends('layouts.app')
@section('content')

    
    <div class="col-sm-3"></div>
    </div>
    <div class="row admin-background">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Member Point</h3>
        <form action="{{route('updateMemberPoint')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @foreach($memberPoints as $memberPoint)
            <input type="hidden" name="memberPointId" value="{{$memberPoint->id}}">
            <div class="form-group">
            <label for="memberPointMultiple">Times</label>
            <input class="form-control" type="text" id="memberPointMultiple" name="memberPointMultiple"  value="{{$memberPoint->multiple}}">
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Edit Member Point</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection