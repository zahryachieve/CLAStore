@extends('layouts.master')

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30" style="overflow: visible;">
            <div class="container-fluid">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col">
                            <h2 class="mb-4 text-primary">Profile</h2>

                            {{-- Update Profile Information --}}
                            <div class="card mb-4">
                                <div class="card-header bg-primary text-white">
                                    Update Profile Information
                                </div>
                                <div class="card-body">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>

                            {{-- Update Password --}}
                            <div class="card mb-4">
                                <div class="card-header bg-warning text-dark">
                                    Update Password
                                </div>
                                <div class="card-body">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>

                            {{-- Delete User --}}
                            <div class="card mb-5">
                                <div class="card-header bg-danger text-white">
                                    Delete Account
                                </div>
                                <div class="card-body">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
