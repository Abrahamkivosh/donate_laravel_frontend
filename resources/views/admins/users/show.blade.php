@extends('layouts.app')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .profile-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .donation-table th,
        .donation-table td {
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <!-- User Profile Card -->
            <div class="col-lg-4">
                <div class="card profile-card p-3">
                    <div class="text-center">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&size=100"
                            alt="User Avatar" class="avatar mb-2">
                        <h4 class="fw-bold">{{ $user->name }}</h4>
                        <p class="text-muted mb-1">
                            <i class="fas fa-envelope"></i> {{ $user->email }}
                        </p>
                        <p class="text-muted mb-1">
                            <i class="fas fa-phone"></i> {{ $user->phone ?? 'N/A' }}
                        </p>
                        <p class="badge bg-primary">{{ ucfirst($user->role) }}</p>
                    </div>
                    {{-- action buttons --}}
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>

                </div>
            </div>

            <!-- User Details & Donations -->
            <div class="col-lg-8">
                <div class="card p-3">
                    <h5 class="fw-bold mb-3"><i class="fas fa-hand-holding-heart"></i> Donations History</h5>
                    @if ($user->donations->isEmpty())
                        <p class="text-muted">No donations made yet.</p>
                    @else
                        <table class="table table-bordered donation-table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Amount (KES)</th>
                                    <th>Payment Method</th>
                                    <th>Date</th>
                                    <th>Campaign</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->donations as $donation)
                                    <tr>
                                        <td>{{ number_format($donation->amount, 2) }}</td>
                                        <td>{{ ucfirst($donation->payment_method) }}</td>
                                        <td>{{ $donation->donation_date->format('M d, Y') }}</td>
                                        <td>{{ $donation->compaign->name ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <div class="card p-3 mt-3">
                    <h5 class="fw-bold mb-3"><i class="fas fa-bullhorn"></i> Interested Campaigns</h5>
                    @if ($user->compaigns->isEmpty())
                        <p class="text-muted">No campaigns selected.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($user->compaigns as $campaign)
                                <li class="list-group-item">
                                    <strong>{{ $campaign->name }}</strong>
                                    <span class="badge bg-success">{{ $campaign->status ? 'Active' : 'Closed' }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
