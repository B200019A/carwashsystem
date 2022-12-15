@extends('layouts.app')
@section('content')


<div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Voucher name</th>
                        <td>Discount</th>
                        <td>Point</th>
                        <th>Operate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Voucher 1</td>
                        <td>15%</td>
                        <td>1000</td>
                        <td><button  type="submit" class="btn btn-primary">Edit</button> <button style=" background-color:red;" type="submit" class="btn btn-primary">Remove</button></td>
                    </tr> 
                    <tr>
                        <td>Voucher 2</td>
                        <td>20%</td>
                        <td>2000</td>
                        <td><button  type="submit" class="btn btn-primary">Edit</button> <button style=" background-color:red;" type="submit" class="btn btn-primary">Remove</button></td>
                    </tr> 
                    <tr>
                        <td>Voucher 3</td>
                        <td>30%</td>
                        <td>3000</td>
                        <td><button  type="submit" class="btn btn-primary">Edit</button> <button style=" background-color:red;" type="submit" class="btn btn-primary">Remove</button></td>
                    </tr> 

                </tbody>
                </table>      
        </div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row admin-background">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New voucher</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            @CSRF
            <div class="form-group">
                <label for="carPlate">Voucher name</label>
                <input class="form-control" type="text" id="carPlate" name="carPlate" >
            </div>
            <div class="form-group">
            <label for="targetPoint">Discount</label>
            <input class="form-control" type="number" id="targetPoint" name="targetPoint" >
            </div>
            <div class="form-group">
            <label for="targetPoint">Point</label>
            <input class="form-control" type="number" id="targetPoint" name="targetPoint" >
            </div>
  
            <button type="submit" class="btn btn-primary">Add New Voucher</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection