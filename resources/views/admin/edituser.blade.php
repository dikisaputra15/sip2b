@extends('layouts.master')

@section('title','Edit User')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Edit User</h3>
                </div>

                <div class="card-body">
                <div class="form-group row">
                    <a href="/admin/{{ $user->id }}/changeuserpass" class="btn btn-primary">Change Password</a>
                </div>
                    <form method="POST" action="/admin/edituser/{{ $user->id }}">
                        @method('put')
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Role Akses</label>

                            <div class="col-md-6">
                                <select class="form-control" name="role">
                                    <option value="0" @if($user->type == 0) selected @endif>Admin</option>
                                    <option value="1" @if($user->type == 1) selected @endif>Supplier</option>
                                    <option value="2" @if($user->type == 2) selected @endif>KaGudang</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                                <a href="../user" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
