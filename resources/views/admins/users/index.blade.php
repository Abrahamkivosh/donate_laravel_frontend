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
                            <h6 class="text-white text-capitalize ps-3">Users </h6>


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
                                            class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Role
                                        </th>
                                        <th
                                            class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            AMT Donated
                                        </th>
                                        <th
                                            class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Actions</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                                            <p class="text-xs text-secondary mb-0">{{ $user->phone }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>



                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $user->isAdmin() ? 'Admin' : 'Donor' }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $user->donations_sum_amount }}
                                                </p>
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-sm bg-gradient-primary">Edit</a>
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-sm bg-gradient-info">View</a>
                                                <a href="{{ route('users.destroy', $user->id) }}"
                                                    class="btn btn-sm bg-gradient-danger">Delete</a>
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
