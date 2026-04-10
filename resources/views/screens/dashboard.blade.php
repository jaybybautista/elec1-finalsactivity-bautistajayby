@extends('layouts.app')

@section('title', 'Dashboard — EnrollPortal')

@section('content')
<div class="container">

    <div style="background:#1a3a5c;color:white;border-radius:8px;padding:24px 32px;margin-bottom:24px;display:flex;justify-content:space-between;align-items:center;">
        <div>
            <div style="font-size:20px;font-weight:700;">Welcome, {{ session('first_name') }} {{ session('last_name') }}!</div>
            <div style="color:#90cdf4;font-size:14px;margin-top:4px;">Student ID: {{ $user->student_id_number }}</div>
        </div>
        <div style="text-align:right;">
            <div style="font-size:13px;color:#90cdf4;">{{ now()->format('l, F j, Y') }}</div>
            <a href="{{ route('profile') }}" style="display:inline-block;margin-top:8px;padding:7px 16px;background:white;color:#1a3a5c;border-radius:5px;font-size:13px;font-weight:700;text-decoration:none;">Edit Profile</a>
        </div>
    </div>

    <div class="card" style="margin-bottom:24px;">
        <div class="card-title">Student Information</div>
        <div class="info-grid">
            <div class="info-item">
                <label>Full Name</label>
                <p>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</p>
            </div>
            <div class="info-item">
                <label>Email</label>
                <p>{{ $user->email }}</p>
            </div>
            <div class="info-item">
                <label>Course</label>
                <p>{{ $user->course }}</p>
            </div>
            <div class="info-item">
                <label>Year Level</label>
                <p>{{ $user->year_level }}{{ in_array($user->year_level, ['1']) ? 'st' : (in_array($user->year_level, ['2']) ? 'nd' : (in_array($user->year_level, ['3']) ? 'rd' : 'th')) }} Year</p>
            </div>
            <div class="info-item">
                <label>Gender</label>
                <p>{{ $user->gender }}</p>
            </div>
            <div class="info-item">
                <label>Date of Birth</label>
                <p>{{ \Carbon\Carbon::parse($user->date_of_birth)->format('F j, Y') }}</p>
            </div>
            <div class="info-item">
                <label>Contact Number</label>
                <p>{{ $user->contact_number }}</p>
            </div>
            <div class="info-item">
                <label>Address</label>
                <p>{{ $user->address }}</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-title">Recent Activity</div>
        @if($logs->isEmpty())
            <p style="color:#718096;font-size:14px;">No activity yet.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Description</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td>
                            @php
                                $badge = match($log->action) {
                                    'LOGIN'          => 'badge-green',
                                    'LOGOUT'         => 'badge-yellow',
                                    'REGISTER'       => 'badge-blue',
                                    'UPDATE_PROFILE' => 'badge-blue',
                                    default          => 'badge-red',
                                };
                            @endphp
                            <span class="badge {{ $badge }}">{{ $log->action }}</span>
                        </td>
                        <td>{{ $log->description }}</td>
                        <td style="white-space:nowrap;font-size:13px;color:#718096;">{{ \Carbon\Carbon::parse($log->created_at)->format('M d, Y h:i A') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</div>
@endsection
