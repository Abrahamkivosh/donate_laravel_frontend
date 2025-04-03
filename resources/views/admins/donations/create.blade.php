@extends('layouts.app')
@section('styles')
    <style>
        select.form-control {
            padding: 0.5rem 0.5rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #8898aa;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #cad1d7;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center rounded">
                            <h6 class="text-white text-capitalize ps-3">Humbly Donate To Marhab Foundation Compaign</h6>

                            <a href="{{ route('donations.index') }}" class="btn btn-sm bg-gradient-primary ms-3">Back</a>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form action="{{ route('donations.store') }}" method="post">
                            @csrf
                            <div class="row px-4">
                                <div class="col-md-6">
                                    <div
                                        class=" input-group input-group-outline my-3
                                    @error('amount') has-danger @enderror">
                                        <label class="form-label" for="amount">Amount To Donate</label>
                                        <input type="text" name="amount" id="amount" class="form-control"
                                            value="{{ old('amount') }}">
                                        @error('amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="compaign_id">Select Compaign To Participate</label>
                                        <select class="form-select  @error('compaign_id') has-danger @enderror"
                                            name="compaign_id" id="compaign_id">
                                            @foreach ($compaigns as $id => $name)
                                                <option value="{{ $id }}" @selected(old('compaign_id') == $id)>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('compaign_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="payment_method">Payment Method</label>
                                        <select class="form-select  @error('payment_method') has-danger @enderror"
                                            name="payment_method" id="payment_method">
                                            <option value="mpesa" @selected(old('payment_method') == 'mpesa')>Mpesa</option>
                                            <option value="cash" @selected(old('payment_method') == 'cash')>Cash</option>
                                        </select>
                                        @error('payment_method')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div
                                        class="input-group input-group-outline my-3 @error('phone_number') has-danger @enderror">
                                        <label class="form-label" for="phone_number">Phone Number</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                                            value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>




                            </div>
                            <div class="px-4 pt-4">
                                <button type="submit" class="btn bg-gradient-dark">Proceed</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
