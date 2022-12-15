@extends('layouts.app')
@section('content')
<div class="row admin-background">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add Invite Code</h3>
        <form action="{{route('addInviteCode')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            <div class="form-group">
                <input id="freeWash" type="hidden" class="" name="freeWash" value="1" readonly="true">
                <label for="inviteCode">Invite Code</label>
                <input class="form-control" type="text" id="inviteCode" name="inviteCode" >
            </div>
            
          
            <button type="submit" class="btn btn-primary">Enroll Invite Code</button>
        </form>
        <br><br>
        <div style="text-align:left">
        <input type="text" value="qe12QW" id="myInput" readonly>
        <button class="btn btn-primary" onclick="copyReferral()">Copy text</button>
</div>
    </div>
    <div class="col-sm-3"></div>
</div>


<script>
function copyReferral(){
    var referralCode = document.getElementById("myInput");
    referralCode.select();
    document.execCommand('copy');
    alert("Successfully Copied!");
}
</script>
@endsection