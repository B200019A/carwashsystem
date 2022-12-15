@extends('layouts.app')

@section('content')

<div class="row admin-background">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Branch</h3>
        <form action="{{route('updateBranch')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @foreach($branches as $branch)
            <div class="form-group">
                <input type="hidden" name="branchId" value="{{$branch->id}}">
                <label for="branchName">Branch Name</label>
                <input class="form-control" type="text" id="branchName" name="branchName" value="{{$branch->name}}" >
            </div>
            <div class="form-group">
                <label for="branchAddress">Address</label>
                <input class="form-control" type="text" id="branchAddress" name="branchAddress" value="{{$branch->address}}" >
            </div>
            <div class="form-group">
                <label for="branchDescription">Description</label>
                <input class="form-control" type="text" id="branchDescription" name="branchDescription" value="{{$branch->description}}" >
            </div>
         
            <button type="submit" class="btn btn-primary">Edit Branch</button>
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection