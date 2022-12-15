@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Referral benefit</th>
                        <th>Operate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($referrals as $referral)
                        <tr>
                            <td>Free Wash times: {{ $referral->times }}</td>
                            <td><a href="{{ route('editReferral', ['id' => $referral->id]) }}"
                                    class="btn btn-warning btn-xs">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
