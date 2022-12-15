@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Service id</th>
                        <td>Type of Services</th>
                        <td>Image</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Operate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->name}}</td>
                        <td>{{$service->image}}</td>
                        <td>{{$service->description}}</td>
                        <td>{{$service->price}}</td>
                        <td style="text-align:center;">
                        <td>
                            <a href="{{ route('viewEditService', ['id' => $service->id]) }}"class="btn btn btn-xs" style=" background-color:rgb(15, 101, 214);">Edit</a>
                            <a href="{{ route('deleteService', ['id' => $service->id]) }}"class="btn btn-danger btn-xs"
                                style=" background-color:red;"onClick="return confirm('Are you sure to delete?')">Delete</a>
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
            <h3>Add New Car Service</h3>
            <form action="{{ route('addService') }}" method="POST" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <label for="serviceName">Service Name</label>
                    <input class="form-control" type="text" id="serviceName" name="serviceName">
                </div>
                <div class="form-group">
                    <label for="servicePrice">Price</label>
                    <input class="form-control" type="number" id="servicePrice" name="servicePrice">
                </div>
                <div class="form-group">
                    <label for="serviceDescription">Description</label>
                    <input class="form-control" type="text" id="serviceDescription" name="serviceDescription">
                </div>

                <div class="form-group">
                    <label for="serviceImage">Image</label>
                    <input class="form-control" type="file" id="seviceImage" name="seviceImage">
                </div>
                
                <button type="submit" class="btn btn-primary">Add New Service</button>
            </form>
            <br><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
