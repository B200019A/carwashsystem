@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="../css/Layout/selectService_CarWashPackage.css">

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">-->
    <div class="container">
        <h1 style="margin-top:2%; text-align:center;">Select Services<h1>
                <ul class="cards">
                    @foreach ($services as $service)
                        <li class="cards__item">
                            <div class="card">
                                <div class="card__image"
                                    style="background-image: url({{ asset('images/service') }}/{{ $service->image }});">
                                </div>
                                <div class="card__content">
                                    <div class="card__title">{{ $service->name }}</div>
                                    <p class="card__text">{{ $service->description }}</p>
                                    <a style="text-decoration: none;"href="{{ route('viewAddReservation', ['id' => $service->id]) }}"> <button
                                            class="btn btn--block  ">Select</button></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <h1 style="text-align:center;">Select Package<h1>
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
                                                    <a style="text-decoration: none;"
                                                        href="{{ route('viewAddReservation_package', ['id' => $userPackage->id]) }}"><button
                                                            class="btn btn--block">Select</button></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endif
                            @endforeach

                        </ul>
    </div>
@endsection
