@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Branch id</th>
                        <td>Bracnh name</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Operate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($branches as $branch)
                        @if ($branch->status == 'exist')
                            <tr>
                                <td>{{ $branch->id }}</td>
                                <td>{{ $branch->name }}</td>
                                <td>{{ $branch->address }}</td>
                                <td>{{ $branch->description }}</td>
                                <td><a href="{{ route('editBranch', ['id' => $branch->id]) }}"
                                        class="btn btn-warning btn-xs">Edit</a>
                                    <a href="{{ route('deactivateBranch', ['id' => $branch->id]) }}"
                                        class="btn btn-danger btn-xs"
                                        onClick="return confirm('Are you sure to deactivate?')">Deactivate</a>
                                </td>
                            </tr>
                        @else
                        <tr>
                            <td>{{ $branch->id }}</td>
                            <td>{{ $branch->name }}</td>
                            <td>{{ $branch->address }}</td>
                            <td>{{ $branch->description }}</td>
                            <td><a href="{{ route('reactivateBranch', ['id' => $branch->id]) }}" class="btn btn btn-xs" style=" background-color:red;" onClick="return confirm('Are you sure to reactivate?')">Reactivate</a></td>
                        </tr>
                        @endif
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
            <h3>Add New Branch</h3>
            <form action="{{ route('addBranch') }}" method="POST" enctype="multipart/form-data">
                @CSRF
                <div class="form-group">
                    <label for="branchName">Branch Name</label>
                    <input class="form-control" type="text" id="branchName" name="branchName">
                </div>
                <div class="form-group">
                    <label for="branchAddress">Address</label>
                    <input class="form-control" type="text" id="branchAddress" name="branchAddress">
                </div>
                <div class="form-group">
                    <label for="branchDescription">Description</label>
                    <input class="form-control" type="text" id="branchDescription" name="branchDescription">
                </div>

                <button type="submit" class="btn btn-primary">Add New Branch</button>
            </form>
            <br><br>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
