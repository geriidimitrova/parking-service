@extends('layouts.app')

@section('content')

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

@endsection
