<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Addit Parking</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="css/app.css">


        <!-- Styles -->
{{--        <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    </head>
    <body>
        <header></header>
{{--            <main>--}}
{{--                @yield('content')--}}
{{--            </main>--}}
        <div class="main">

            <div class="container text-center">
                <div class="row align-items-center align-middle" style="min-height: 100vh;">
                    <div class="col">
                        <a type="button"
                           class="btn btn-outline-primary btn-lg availabilities-btn"
                        >Check availabilities</a>
                    </div>
                    <div class="col">
                        <a type="button"
                           class="btn btn-outline-primary btn-lg"
                           data-bs-toggle="modal"
                           data-bs-target="#time"
                        >Check Vehicle's Time</a>
                    </div>
                    <div class="col">
                        <a type="button"
                           class="btn btn-outline-primary btn-lg registration-btn"
                           data-bs-toggle="modal" data-bs-target="#register-modal"
                        >Register new vehicle</a>
                    </div>
                </div>

                <!--Availabilities Modal -->
                <div class="modal fade" id="availabilities-modal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <span id="availabilities-details"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Check Time Modal -->
                <div class="modal fade" id="time" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Check vehicle's time</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Registration Number"
                                           id="registration-number"
                                    >
                                </div>
                                <span id="time-details"></span>
                            </div>
                            <div class="modal-footer">
                                <div class="col">
                                    <button class="btn btn-danger exit-btn float-start"
                                            onclick="unregister('registration-number')"
                                    >Unregistered</button>
                                </div>
                                <button class="btn btn-primary" onclick="checkVehiclesTime('registration-number')">Check</button>
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Registration Modal -->
                <div class="modal fade" id="register-modal" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Register new vehicle in the parking</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('vehicles') }}" method="POST" id="register-form" target="_self">
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Registration Number"
                                               aria-label="Registration Number"
                                               aria-describedby="basic-addon1"
                                               name="registration_number"
                                               required
                                        >
                                    </div>
                                    <div class="input-group mb-3">
                                        <select name="vehicle_type" class="form-control" required>
                                            <option disabled selected>Choose vehicle's type</option>
                                            @foreach(App\Http\Controllers\VehicleTypeController::getAll() as $type)
                                                <option value="{{ $type->id }}">{{ $type->category }} - {{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <select name="discount_card" class="form-control">
                                            <option disabled selected> Choose discount card</option>
                                            @foreach(App\Http\Controllers\DiscountCardController::getAll() as $card)
                                                <option value="{{ $card->id }}">{{ $card->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" onclick="register('register-form')">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="align-items-end fixed-bottom">
            <img class="addit-logo" src="<?php echo url('/images/addit-logo.png'); ?>" alt="Addit">
            <div>Copyright © <?php echo date('Y'); ?> Addit | Parking Service v1.0</div>
        </footer>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/service.js') }}"></script>
        @stack('scripts')
    </body>
</html>
