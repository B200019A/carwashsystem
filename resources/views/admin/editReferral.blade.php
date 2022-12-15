@extends('layouts.app')
@section('content')

    
    <div class="col-sm-3"></div>
    </div>
    <div class="row admin-background">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Referral</h3>
        <form action="{{route('updateReferral')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @foreach($referrals as $referral)
            <input type="hidden" name="referralId" value="{{$referral->id}}">
            <div class="form-group">
            <label for="referralTimes">Times</label>
            <input class="form-control" type="text" id="referralTimes" name="referralTimes"  value="{{$referral->times}}">
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Edit Referral</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection