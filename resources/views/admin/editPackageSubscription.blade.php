@extends('layouts.app')
@section('content')
    <div class="col-sm-3"></div>
    </div>
    <div class="row admin-background">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <h3>Edit package</h3>
            <form action="{{ route('updatePackageSubscription') }}" method="POST" enctype="multipart/form-data">
                @CSRF
                @foreach ($packages as $package)
                    <input type="hidden" name="packageId" value="{{ $package->id }}">
                    <div class="form-group">
                        <label for="packageName">Package Name</label>
                        <input class="form-control" type="text" id="packageName" name="packageName" value="{{ $package->name }}">
                    </div>
                    <div class="form-group">
                        <label for="packageDescription">Description </label>
                        <input class="form-control" type="text" id="packageDescription" name="packageDescription" value="{{ $package->description }}">
                    </div>
                    <div class="form-group">
                        <label for="packageFreeWashTimes">Free Wash Times</label>
                        <input class="form-control" type="number" id="packageFreeWashTimes" name="packageFreeWashTimes" value="{{ $package->washTimes }}">
                    </div>
                    <div class="form-group">
                        <label for="packagePrice">Price</label>
                        <input class="form-control" type="number" id="packagePrice" name="packagePrice" value="{{ $package->price }}">
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Edit package</button>
            </form>
            <br><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
