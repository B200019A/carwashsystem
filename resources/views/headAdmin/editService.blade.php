@extends('layouts.app')

@section('content')
    <div class="row admin-background">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <h3>Add New Car Service</h3>
            <form action="{{ route('updateService') }}" method="POST" enctype="multipart/form-data">
                @CSRF
                @foreach ($services as $service)
                    <input type="hidden" name="serviceId" value="{{ $service->id }}">
                    <div class="form-group">
                        <label for="serviceName">Service Name</label>
                        <input class="form-control" type="text" id="serviceName" name="serviceName"
                            value="{{ $service->name }}">
                    </div>
                    <div class="form-group">
                        <label for="servicePrice">Price</label>
                        <input class="form-control" type="number" id="servicePrice" name="servicePrice"
                            value="{{ $service->price }}">
                    </div>
                    <div class="form-group">
                        <label for="serviceDescription">Description</label>
                        <input class="form-control" type="text" id="serviceDescription" name="serviceDescription"
                            value="{{ $service->description }}">
                    </div>

                    <div class="form-group">
                        <label for="serviceImage">Image</label>
                        <input class="form-control" type="file" id="seviceImage" name="seviceImage" value="{{ $service->image }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Edit Service</button>
                @endforeach
            </form>
            <br><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
