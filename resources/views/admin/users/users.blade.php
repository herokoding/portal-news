@extends('layouts.admin')

@php
    $pluginStyles = [
        asset('admin/vendor/DataTables/datatables.min.css')
    ];

    $aferStyles = [];

    $pluginScripts = [
        asset('admin/vendor/DataTables/datatables.min.js')
    ];

    $afterScripts = [
        asset('admin/js/users.js')
    ];
@endphp

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h5 class="card-title">{{ $title }} <span>| Today</span></h5>

                        <table id="tblUser" class="table table-borderless compact">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->role_name }}</td>
                                        <td>
                                            <a href="/dashboard/users/show/{{ $user->id }}"
                                                class="badge bg-info text-dark"><i class="bi bi-eye"></i></a>
                                            <a href="/dashboard/users/editUser/{{ $user->id }}"
                                                class="badge bg-warning"><i class="bi bi-pencil"></i></a>
                                            <form action="/dashboard/users/deleteUser/{{ $user->id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <a href="/dashboard/users/deleteUser/{{ $user->id }}" class="badge bg-danger border-0" type="submit" data-confirm-delete="true"><i class="bi bi-x-circle"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="btn-right mt-3">
                            <a href="/dashboard/users/create" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Create User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection