@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users view</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">View User</h6>
                    <form class="forms-sample">

                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ID</label>
                            <div class="col-sm-9">
                                {{ $user->id }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                {{ $user->name }}
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                {{ $user->username }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                {{ $user->email }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                @if (!empty($user->photo))
                                    <img src="{{ asset('upload/'. $user->photo) }}" style="width: 5%; height: 100%">
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                {{ $user->phone }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                {{ $user->address }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                @if($user->role == 'admin')
                                    <span class="badge bg-info">Admin</span>
                                @elseif($user->role == 'agent')
                                    <span class="badge bg-primary">Agent</span>
                                @elseif($user->role == 'user')
                                    <span class="badge bg-danger">User</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                @if($user->status == 'active')
                                    <span class="badge bg-info">Active</span>
                                @else
                                    <span class="badge bg-danger">InActive</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Created_at</label>
                            <div class="col-sm-9">
                                {{ $user->created_at }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Updated_at</label>
                            <div class="col-sm-9">
                                {{ $user->updated_at }}
                            </div>
                        </div>

                        <a href="{{ url('admin/users ') }}" class="btn btn-secondary">Back</a>

                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection