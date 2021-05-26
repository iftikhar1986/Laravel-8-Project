@extends('admin.admin_master')

@section('admin')

    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User Profile Update</h2>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{ route('update.user.profile') }}" class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlPassword3">User Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name}}" >
                </div>

                <div class="form-group">
                    <label for="exampleFormControlPassword3">User Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" >
                </div>

                <div class="form-group">
                    <label for="exampleFormControlPassword3">User Image</label>
                    <input type="file" name="image" class="form-control" value="{{ $user->profile_photo_path }}" >
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>

@endsection
