@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="../css/Layout/selectService_CarWashPackage.css">

    <div class="container">
        <h1 style="margin-top:2%; text-align:center;">Your Current Package<h1>
                <ul class="cards">
                    @foreach ($userPackages as $userPackage)
                        @if ($userPackage->paymentStatus == 1)
                            @if ($userPackage->times >= 1)
                                <li class="cards__item_package">
                                    <div class="card">
                                        <div class="card__image"
                                            style="background-image: url({{ asset('images/carwash.jpeg') }});">
                                        </div>
                                        <div class="card__content">
                                            <div class="card__title">{{ $userPackage->packageName }}</div>
                                            <p class="card__text">Left: {{ $userPackage->times }}
                                                <!-- <br> it's safe to clean
                                                                your engine bay and we recommend it from time to time in order to keep it
                                                                clean, just like you do with the rest of the car.-->

                                            </p>
                                            <a style="text-decoration: none;" href=""><button
                                                    class="btn btn--block">View</button></a>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @else
                            <li class="cards__item_package">
                                <div class="card">
                                    <div class="card__image"
                                        style="background-image: url({{ asset('images/carwash.jpeg') }});">
                                    </div>
                                    <div class="card__content">
                                        <div class="card__title">{{ $userPackage->packageName }}</div>
                                        <p class="card__text">Left: {{ $userPackage->times }}
                                            <!-- <br> it's safe to clean
                                                                your engine bay and we recommend it from time to time in order to keep it
                                                                clean, just like you do with the rest of the car.-->

                                        </p>
                                        <a style="text-decoration: none;" href="{{ route('repaymentPackage', ['id' => $userPackage->id]) }}"><button
                                                class="btn btn--block">Payment</button></a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach

                </ul>

                <h1 style="text-align:center;">Available Package<h1>
                         <ul class="cards">
                        @foreach ($packages as $package)
                            <li class="cards__item_package">
                                <div class="card">
                                    <div class="card__image"
                                        style="background-image: url({{ asset('images/carwash.jpeg') }});">
                                    </div>
                                    <div class="card__content">
                                        <div class="card__title">{{ $package->name }}</div>
                                        <p class="card__text">RM {{ $package->price }}
                                            <!-- <br> it's safe to clean
                                                                your engine bay and we recommend it from time to time in order to keep it
                                                                clean, just like you do with the rest of the car.-->

                                        </p>
                                        <a style="text-decoration: none;" href="{{ route('addNewPackage', $package->id) }}"><button
                                                class="btn btn--block">Buy</button></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                        </ul>
    </div>
@endsection
