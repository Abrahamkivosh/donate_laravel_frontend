@extends('layouts.app')
@section('styles')
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center rounded">
                            <h6 class="text-white text-capitalize ps-3">Our Donations </h6>

                            <a href="{{ route('donations.create') }}" class="btn btn-sm bg-gradient-primary ms-3">
                                Do Donation
                            </a>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Amount</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Payment Method
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Donation Date</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Compaign</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donations as $donation)
                                        <tr class="text-dark">
                                            <td>

                                                <p class="text-xs font-weight-bold mb-0 text-center">
                                                    {{ $donation->user->name }}</p>

                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center">{{ $donation->amount }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center">
                                                    {{ $donation->payment_method }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center">
                                                    {{ $donation->donation_date }}</p>
                                            </td>

                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center">
                                                    {{ $donation->compaign->name }}</p>
                                            </td>


                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
