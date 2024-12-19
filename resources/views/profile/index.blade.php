@extends('layouts.app_profile')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Profile /</span> My Account</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h4 class="card-header">Profile Details</h4>
                <!-- Account -->
                <div class="card-body">
                    <form method="POST" action="{{ route('updateProfile', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if($user->avatar)
                            <img src="{{ asset('storage/avatars/'.$user->avatar) }}" class="d-block w-px-120 h-px-120 rounded">
                            @else
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar">
                            @endif
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
                            </div>
                        </div>


                        <h6 class="mt-4">Edit Profile</h6>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}" />
                                    <label for="name">You're Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}" />
                                    <label for="email">E-mail</label>
                                </div>
                            </div>
                        </div>
                        <h6 class="mt-4">Change Password</h6>
                        <div class="row mt-2 ">
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" autocomplete="old-password" placeholder="Current Password">
                                    <label for="old_password">Current Password</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="New Password" />
                                    <label for="password">New Password</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm New Password" />
                                    <label for="password-confirm">Confirm New Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-danger">Cancel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection