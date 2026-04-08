@extends('layouts.app')

@section('title', 'My Profile — EnrollPortal')

@section('content')
<div class="container">

    <div style="margin-bottom:20px;">
        <a href="{{ route('dashboard') }}" style="font-size:13px;color:#3182ce;text-decoration:none;">← Back to Dashboard</a>
    </div>

    <div class="card">
        <div class="card-title">Update Profile Settings</div>

        {{-- Success message --}}
        @if(session('success'))
            <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif

        {{-- Validation errors --}}
        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $error)
                    <div>• {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('profile.update', $user->id) }}" method="POST">
            @csrf

            {{-- Personal Information --}}
            <p style="font-size:12px;font-weight:700;color:#718096;letter-spacing:1px;margin-bottom:12px;">PERSONAL INFORMATION</p>

            <div class="form-row">
                <div class="form-group">
                    <label>First Name *</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                </div>
                <div class="form-group">
                    <label>Last Name *</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}">
                </div>
                <div class="form-group">
                    <label>Date of Birth *</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Gender *</label>
                    <select name="gender" required>
                        <option value="Male"   {{ old('gender', $user->gender)=='Male'   ? 'selected':'' }}>Male</option>
                        <option value="Female" {{ old('gender', $user->gender)=='Female' ? 'selected':'' }}>Female</option>
                        <option value="Other"  {{ old('gender', $user->gender)=='Other'  ? 'selected':'' }}>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contact Number *</label>
                    <input type="text" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}" required>
                </div>
            </div>

            <div class="form-group full">
                <label>Complete Address *</label>
                <input type="text" name="address" value="{{ old('address', $user->address) }}" required>
            </div>

            {{-- Academic Information --}}
            <p style="font-size:12px;font-weight:700;color:#718096;letter-spacing:1px;margin:20px 0 12px;">ACADEMIC INFORMATION</p>

            <div class="form-row">
                <div class="form-group">
                    <label>Course / Program *</label>
                    <select name="course" required>
                        @foreach(['BSIT','BSCS','BSED','BSBA','BSN','BSCE','BSEE','Other'] as $c)
                            <option value="{{ $c }}" {{ old('course', $user->course)==$c ? 'selected':'' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Year Level *</label>
                    <select name="year_level" required>
                        @foreach(['1'=>'1st Year','2'=>'2nd Year','3'=>'3rd Year','4'=>'4th Year'] as $val=>$label)
                            <option value="{{ $val }}" {{ old('year_level', $user->year_level)==$val ? 'selected':'' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Account Information --}}
            <p style="font-size:12px;font-weight:700;color:#718096;letter-spacing:1px;margin:20px 0 12px;">ACCOUNT INFORMATION</p>

            <div class="form-group">
                <label>Email Address *</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>New Password <span style="font-weight:400;color:#a0aec0;">(leave blank to keep current)</span></label>
                    <input type="password" name="password" placeholder="New password">
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" name="password_confirmation" placeholder="Repeat new password">
                </div>
            </div>

            <div style="margin-top:8px;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>

        </form>
    </div>
</div>
@endsection
