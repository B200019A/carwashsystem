@extends('layouts.app')
@section('content')
    <style>
        body{
            color: white;
        }
        @media screen and (min-width: 766px) {
            .form-content {
                margin-left: 25%;
                margin-right: 25%;
                margin-top: 5%;
                width: 50%;

                margin-bottom: 1%;
                box-sizing: border-box;
                box-shadow: 2px 2px 2px 2px rgb(73, 59, 75) !important;
                border-radius: 15px;
                background-color: #3f3b4b;

            }
        }
        @media screen and (max-width: 765px) {
            .form-content {
                margin-left: 5%;
                margin-right: 5%;
                margin-top: 0.5%;
            }
        }

        input {
            border-radius: 15px !important;
        }

        select {
            border-radius: 15px !important;
        }

        button {
            border-radius: 15px !important;
            background-color: rgb(102, 78, 107) !important;
            color:white !important;


        }
        .btn {
            border-radius: 15px !important;
            background-color: white !important;
            color: black !important;

        }
        .btn:hover {
            background-color: #8e8794 !important;
            border-color: #4a4252;
            color: white !important;
        }
    </style>
    <div class="form-content">
        <div class="row admin-background">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <br><br>
                <h3 style="text-align:center;">You Profile</h3>
                <div id="form-content">
                    <form action="{{ route('profileUpdate') }}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name}}" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ Auth::user()->email}}" >
                        </div>
                        <div style=" text-align: center; padding-top: 15px !important;">
                        <button type="submit" class="btn ">Update</button>
                        </div>
                    </form>
                </div>
                <br><br>
            </div>

            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection
