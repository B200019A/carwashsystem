@extends('layouts.app')
@section('content')
    <style>
        @media screen and (min-width: 766px) {
            .form-content {
                text-align:center;
                margin: auto;
                margin-top:10%;
                width: 50%;
                color:white;
                margin-bottom: 1%;
                box-sizing: border-box;
                box-shadow: 2px 2px 2px 2px rgb(73, 59, 75) !important;
                border-radius: 15px;
                background-color: #3f3b4b;
                top:50%;
                left:0;
                right:0;
                bottom:0;


            }
        }

        @media screen and (max-width: 765px) {
            .form-content {
                margin-left: 5%;
                margin-right: 5%;
                margin-top: 0.5%;
            }
        }

        .input-adjust {
            text-align: center;
            font-size: 35pt;
            background-color: transparent;
            border: none;
            color: orange;
            width: 400px;
            outline: none;
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

        .redeem {
            margin-top: 3%;
            margin-bottom:3%;
        }
    </style>
    <div class="form-content">
    <div class="row admin-background">
        <div class="col-sm-3"></div>
        <div class="col-sm-6" style="text-align:center; margin-top:1%">

            <h3>Your Invitation Code</h3>
            <div>
                @foreach ($invitecodes as $invitecode)
                    <input style="margin-left:-17px;"class="input-adjust"type="text" value="{{ $invitecode->invitecode }}" id="myInput" readonly>
                @endforeach
                <br>
                <div style="padding-bottom:3%;">
                <button class="btn" onclick="copyReferral()">Copy text</button>
                </div>
                <hr>
                <div class="redeem" style="padding-top:3%;">
                    <form action="{{ route('addInviteCode') }}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        <div class="form-group">
                            <input id="freeWash" type="hidden" class="" name="freeWash" value="1"
                                readonly="true">
                            <label for="inviteCode">
                                <h3>Redeem Your Free Car Wash<h3>
                            </label>
                            <input class="form-control" type="text" id="inviteCode" name="inviteCode">
                        </div>


                        <button type="submit" class="btn">Enroll Invite Code</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    </div>

    <script>
        function copyReferral() {
            var referralCode = document.getElementById("myInput");
            referralCode.select();
            document.execCommand('copy');
            alert("Successfully Copied!");
        }
    </script>
@endsection
