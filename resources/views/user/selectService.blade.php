@extends('layouts.app')
@section('content')
<style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    html {
        background-color: #f0f0f0;
    }

    body {
        color: #999999;
        /*font-family: 'Roboto', 'Helvetica Neue', Helvetica, Arial, sans-serif;*/
        /*font-style: normal;
        font-weight: 400;*/
        letter-spacing: 0;
        /*padding: 1rem;*/
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -moz-font-feature-settings: "liga"on;
    }

    img {
        height: auto;
        max-width: 100%;
        vertical-align: middle;
    }

    .btn {
        background-color: #05b9fa;
        border: 1px solid #cccccc;
        color: white;
        font-size: 18px;
        font-family: Arial;
        padding: 0.5rem;

    }

    .btn:hover {
        background-color: #14a8de;
        color: white;
    }

    .btn--block {
        display: block;
        width: 100%;
    }

    .cards {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .cards__item {
        display: flex;
        padding: 1rem;
    }
    .cards__item_package {
        padding: 1rem;
    }

    @media (min-width: 40rem) {
        .cards__item {
            width: 50%;
        }
        .cards__item_package {
            width: 50%;
        }
    }

    @media (min-width: 56rem) {
        .cards__item {
            width: 33.3333%;
        } .cards__item_package {
            width: 33.3333%;
        }
    }

    .card {
        background-color: white;
        border-radius: 0.25rem;
        box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .card:hover .card__image {
        filter: contrast(100%);
    }

    .card__content {
        display: flex;
        flex: 1 1 auto;
        flex-direction: column;
        padding: 1rem;
    }

    .card__image {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
        filter: contrast(70%);
        overflow: hidden;
        position: relative;
        transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
    }

    .card__image::before {
        content: "";
        display: block;
        padding-top: 56.25%;
    }

    @media (min-width: 40rem) {
        .card__image::before {
            padding-top: 66.6%;
        }
    }

    .card__image--flowers {
        background-image: url(https://unsplash.it/800/600?image=82);
    }

    .card__image--river {
        background-image: url(https://unsplash.it/800/600?image=11);
    }

    .card__image--record {
        background-image: url(https://unsplash.it/800/600?image=39);
    }

    .card__image--fence {
        background-image: url(https://unsplash.it/800/600?image=59);
    }

    .card__title {
        color: #696969;
        font-size: 1.25rem;
        font-weight: 300;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .card__text {
        flex: 1 1 auto;
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1.25rem;
    }
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="container">
<h1 style="text-align:center;">Select Services<h1>
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
                            <a href="{{ route('viewAddReservation', ['id' => $service->id]) }}"> <button
                                     class="btn btn--block  btn-primary btn-xs">Select</button></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <h1 style="text-align:center;">Select Pakcage<h1>
                <ul class="cards">
                    @foreach ($userPackages as $userPackage)
                        @if ($userPackage->paymentStatus == 1)
                            @if($userPackage->times >=1)
                            <li class="cards__item_package">
                                <div class="card">
                                    <div class="card__image"
                                        style="background-image: url({{ asset('images/carwash.jpeg') }});">
                                    </div>
                                    <div class="card__content">
                                        <div class="card__title">{{ $userPackage->packageName }}</div>
                                        <p class="card__text">Left: {{ $userPackage->times }}<!-- <br> it's safe to clean
                                            your engine bay and we recommend it from time to time in order to keep it
                                            clean, just like you do with the rest of the car.-->

                                        </p>
                                        <a href="{{ route('viewAddReservation_package', ['id' => $userPackage->id]) }}"><button
                                                class="btn btn--block  btn-primary btn-xs">Select</button></a>
                                    </div>
                                </div>
                            </li>
                            @endif
                        @endif
                    @endforeach
                    </div>
                </ul>
            </div>
@endsection
