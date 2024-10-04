@extends('admin.admin_dashboard')
@section('admin')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users list</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users list</h4>
                        
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Photo</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="table-info text-dark">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td> 
                                                @if (!empty($user->photo))
                                                <img src="{{ asset('upload/'. $user->photo) }}" style="width: 50%; height: 50%">
                                                @endif
                                            </td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                @if($user->role == 'admin')
                                                    <span class="badge bg-info">Admin</span>
                                                @elseif($user->role == 'agent')
                                                    <span class="badge bg-primary">Agent</span>
                                                @elseif($user->role == 'user')
                                                    <span class="badge bg-danger">User</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->status == 'active')
                                                    <span class="badge bg-info">Active</span>
                                                @else
                                                    <span class="badge bg-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                            <td>
                                                <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/users/view'.$user->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                                        class="feather feather-eye icon-sm me-2">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg> 
                                                    <span class="">View</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>    
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection