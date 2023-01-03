@extends('layouts.app')
@section('content')
    @inject('carbon', 'Carbon\Carbon')
    <style>
        .table-adjust {
            text-align: center;
        }

        td {
            text-align: left;

        }

        table {
            border-collapse: collapse;
            border-radius: 1em;
            overflow: hidden;
            width: 100%;
        }

        th,
        td {
            padding: 1em;
            background: #FFFFFF;
            border-bottom: 3px solid grey !important;
        }
    </style>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table-adjust">
                <thead>
                    <tr>
                        <th style="background-color: #3f3b4b; color:white;">
                            <H1>Notification</H1>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                        <tr>
                            <td>
                                <h5>{{ $notification->title }}</h5>
                                <p>{{ $notification->description }}</p>
                                <p style="text-align: right;">
                                    {{ $carbon::parse($notification->created_at)->format('Y-m-d') }}</p>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
