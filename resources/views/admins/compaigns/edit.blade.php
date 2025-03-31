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
                            <h6 class="text-white text-capitalize ps-3">Edit Donations Compaign</h6>

                            <a href="{{ route('compaigns.index') }}" class="btn btn-sm bg-gradient-primary ms-3">Back</a>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form action="{{ route('compaigns.update', $compaign) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div
                                        class=" input-group input-group-outline my-3
                                    @error('name') has-danger @enderror">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name', $compaign->name) }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div
                                        class="form-group input-group input-group-outline my-3
                                    @error('target_amount') has-danger @enderror">
                                        <label class="form-label" for="target_amount">Target Amount</label>
                                        <input type="number" name="target_amount" id="target_amount" class="form-control"
                                            value="{{ old('target_amount', $compaign->target_amount) }}">
                                        @error('target_amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="   my-3
                                    @error('status') has-danger @enderror">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>



                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group  my-3
                                    @error('start_date') has-danger @enderror">
                                        <label class="form-label" for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control"
                                            style="border: 1px solid #ced4da; border-radius: 0.375rem; padding: 0.375rem 0.75rem;"
                                            value="{{ old('start_date', $compaign->start_date) }}">
                                        @error('start_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-group  my-3
                                    @error('end_date') has-danger @enderror">
                                        <label class="form-label" for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control"
                                            style="border: 1px solid #ced4da; border-radius: 0.375rem; padding: 0.375rem 0.75rem;"
                                            value="{{ old('end_date', $compaign->end_date) }}">
                                        @error('end_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div
                                        class="form-group input-group input-group-outline my-3
                                    @error('description') has-danger @enderror">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" title="Description">{{ old('description', $compaign->description) }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Update Compaign</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
