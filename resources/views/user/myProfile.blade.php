@extends('layouts.app')
@section('content')
<div class="row admin-background">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>My Profile</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            @CSRF
            <div class="form-group">
                <label for="carPlate">Name</label>
                <input class="form-control" type="text" id="carPlate" name="carPlate" value="{{ Auth::user()->name}}" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="carPlate">Email</label>
                <input class="form-control" type="text" id="carPlate" name="carPlate" value="{{ Auth::user()->email}}" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="carPlate">Gender</label>
                <input class="form-control" type="text" id="carPlate" name="carPlate" value="Male"readonly="readonly">
            </div>
            <div class="form-group">
                <label for="carPlate">Address</label>
                <input class="form-control" type="text" id="carPlate" name="carPlate" value="12234, jalan belakang 13, bandar putra 81000 kulai, johor"readonly="readonly">
            </div>
            <div class="form-group">
                <label for="carPlate">Password</label>
                <input class="form-control" type="text" id="carPlate" name="carPlate" value="******"readonly="readonly">
            </div>
      
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection