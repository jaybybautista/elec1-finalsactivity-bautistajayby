@extends('layouts.auth')

@section('title', 'Register — EnrollPortal')
@section('wrapper-class', 'wide')

@section('content')
    <div class="card">
        <div class="card-title">Create a Student Account</div>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>• {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('auth.register') }}" method="POST">
            @csrf


            <p style="font-size:12px;font-weight:700;color:#718096;letter-spacing:1px;margin-bottom:10px;">PERSONAL
                INFORMATION</p>

            <div class="form-row">
                <div class="form-group">
                    <label>First Name *</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Juan" required>
                </div>
                <div class="form-group">
                    <label>Last Name *</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="dela Cruz" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name') }}" placeholder="(optional)">
                </div>
                <div class="form-group">
                    <label>Date of Birth *</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Gender *</label>
                    <select name="gender" required>
                        <option value="">-- Select --</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contact Number *</label>
                    <input type="text" name="contact_number" value="{{ old('contact_number') }}" placeholder="09XXXXXXXXX"
                        required>
                </div>
            </div>

            <div class="form-group">
                <label>Complete Address *</label>
                <input type="text" name="address" value="{{ old('address') }}"
                    placeholder="Street, Barangay, City, Province" required>
            </div>

            <p style="font-size:12px;font-weight:700;color:#718096;letter-spacing:1px;margin:16px 0 10px;">ACADEMIC
                INFORMATION</p>

            <div class="form-row">
                <div class="form-group">
                    <label>Student ID Number *</label>
                    <input type="text" name="student_id_number" value="{{ old('student_id_number') }}"
                        placeholder="e.g. 26-XX-0001" required>
                </div>
                <div class="form-group">
                    <label>Year Level *</label>
                    <select name="year_level" required>
                        <option value="">-- Select --</option>
                        <option value="1" {{ old('year_level') == '1' ? 'selected' : '' }}>1st Year</option>
                        <option value="2" {{ old('year_level') == '2' ? 'selected' : '' }}>2nd Year</option>
                        <option value="3" {{ old('year_level') == '3' ? 'selected' : '' }}>3rd Year</option>
                        <option value="4" {{ old('year_level') == '4' ? 'selected' : '' }}>4th Year</option>
                        <option value="5" {{ old('year_level') == '5' ? 'selected' : '' }}>5th Year</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Course / Program *</label>
                <select name="course" required>
                    <option value="">-- Select Course --</option>
                    <option value="BSIT" {{ old('course') == 'BSIT' ? 'selected' : '' }}>BS Information Technology</option>
                    <option value="ABEL" {{ old('course') == 'ABEL' ? 'selected' : '' }}>BA English Language</option>
                    <option value="BSED" {{ old('course') == 'BSED' ? 'selected' : '' }}>BS Secondary Education</option>
                    <option value="BSMATH" {{ old('course') == 'BSMATH' ? 'selected' : '' }}>BS Mathematics</option>
                    <option value="BSME" {{ old('course') == 'BSME' ? 'selected' : '' }}>BS Mechanical Engineering</option>
                    <option value="BSCE" {{ old('course') == 'BSCE' ? 'selected' : '' }}>BS Civil Engineering</option>
                    <option value="BSEE" {{ old('course') == 'BSEE' ? 'selected' : '' }}>BS Electrical Engineering</option>
                    <option value="Other" {{ old('course') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>


            <p style="font-size:12px;font-weight:700;color:#718096;letter-spacing:1px;margin:16px 0 10px;">ACCOUNT
                INFORMATION</p>

            <div class="form-group">
                <label>Email Address *</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password" placeholder="Minimum 6 characters" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password *</label>
                    <input type="password" name="password_confirmation" placeholder="Repeat password" required>
                </div>
            </div>

            <button type="submit" class="btn">Create Account</button>
        </form>
    </div>

    <div class="auth-footer">
        Already have an account? <a href="{{ route('login') }}">Log in</a>
    </div>
@endsection
