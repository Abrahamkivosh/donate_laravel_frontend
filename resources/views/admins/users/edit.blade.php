@extends('layouts.app')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .form-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            font-weight: 600;
        }

        .btn-save {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        input {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #0e0f0f !important;
        }

        select {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #0e0f0f !important;
        }
    </style>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card form-card">
                    <div class="card-header bg-primary text-white text-center">
                        <h5><i class="fas fa-user-edit"></i> Edit User Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Full Name -->
                            <div class="mb-3">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($user->isAdmin())
                                <!-- Role Selection -->
                                <div class="mb-3">
                                    <label for="role">User Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                            @endif



                            <!-- Campaign Selection -->
                            <div class="mb-3">
                                <label for="campaigns">Interested Campaigns</label>
                                <select class="form-control" id="campaigns" name="campaigns[]" multiple>
                                    @foreach ($allCampaigns as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ in_array($id, $compaigns) ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('campaigns')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-save">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
