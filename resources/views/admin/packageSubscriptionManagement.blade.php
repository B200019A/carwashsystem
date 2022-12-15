@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Package name</th>
                        <th>Description</th>
                        <th>Wash times</th>
                        <th>Price</th>
                        <th>Operate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                        <tr>
                            <td>{{ $package->name }}</td>
                            <td>{{ $package->description }}</td>
                            <td>{{ $package->washTimes }}</td>
                            <td>{{ $package->price }}</td>
                            <td><a href="{{ route('editPackageSubscription', ['id' => $package->id]) }}"
                                    class="btn btn-warning btn-xs">Edit</a>
                                <a href="{{ route('deletePackageSubscription', ['id' => $package->id]) }}"
                                    class="btn btn-danger btn-xs"
                                    onClick="return confirm('Are you sure to delete?')">Delete</a>
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
            <h3>Add New Package</h3>
            <form action="{{ route('addPackageSubscription') }}" method="POST" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <label for="packageName">Package Name</label>
                    <input class="form-control" type="text" id="packageName" name="packageName">
                </div>
                <div class="form-group">
                    <label for="packageDescription">Description </label>
                    <input class="form-control" type="text" id="packageDescription" name="packageDescription">
                </div>
                <div class="form-group">
                    <label for="packageFreeWashTimes">Free Wash Times</label>
                    <input class="form-control" type="number" id="packageFreeWashTimes" name="packageFreeWashTimes">
                </div>
                <div class="form-group">
                    <label for="packagePrice">Price</label>
                    <input class="form-control" type="number" id="packagePrice" name="packagePrice">
                </div>

                <button type="submit" class="btn btn-primary">Add New Package</button>
            </form>
            <br><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
