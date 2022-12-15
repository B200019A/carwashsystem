@extends('layouts.app')
@section('content')
    <div style="margin-top:10px; margin-bottom:10px">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title"style="margin-left:20px; color:green;">
                        <h4>Your current package:</h4>
                    </div>
                    <div style="margin-left:20px; margin-right:20px;  ">
                    @foreach ($userPackages as $userPackage)
                        
                            @if ($userPackage->paymentStatus == 0)
                                <!--adjust margin strat-->
                                <!---card--->
                                <div class="row">
                                    <div class="col-sm-4" style="margin-top:10px">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $userPackage->packageName }}</h5>
                                                <a href=""><img src="{{ asset('images/carwash.jpeg') }}"
                                                        alt="" width="100" class="img-fluid"><a>

                                                        <div class="card-heading"><a href="">Left: --<a></div>
                                                        <div class="card-heading"><a
                                                                href="{{ route('repaymentPackage', ['id' => $userPackage->id]) }}"
                                                                class="btn btn-warning btn-xs">Payment</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!---card end--->
                                @else
                                        <!---card--->
                                        <div class="row">
                                            <div class="col-sm-4" style="margin-top:10px">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $userPackage->packageName }}</h5>
                                                        <a href=""><img src="{{ asset('images/carwash.jpeg') }}"
                                                                alt="" width="100" class="img-fluid"><a>

                                                                <div class="card-heading"><a >Left:
                                                                        {{ $userPackage->times }}<a>
                                                                </div>
                                                                <div class="card-heading"><a
                                                                        href="{{ route('viewAddReservation_package', ['id' => $userPackage->id]) }}"
                                                                        class="btn btn-danger btn-xs">add reservation<a>
                                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <!---card end--->
                            @endif
                    @endforeach
                    </div>
                    &nbsp;
                    <div class="card-title"style="margin-left:20px; color:green;">
                        <h4>Available Package</h4>
                    </div>
                    @foreach ($packages as $package)
                        <div class="row">
                            <!--card start-->
                            <div class="col-sm-4" style="margin-top:10px">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $package->name }}</h5>
                                        <a href=""><img src="{{ asset('images/carwash.jpeg') }}" alt=""
                                                width="100" class="img-fluid"><a>
                                                <p>{{ $package->description }}<p>
                                                    <div class="card-heading">RM {{ $package->price }}<a
                                                            href="{{ route('addNewPackage', $package->id) }}"><button
                                                                type="submit" style="float:right;"
                                                                class="btn btn-danger btn-xs">Buy</button><a></div>
                                                    <div class="card-heading"><a href=""><a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--card end-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
