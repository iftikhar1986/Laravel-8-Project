@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-12 ">
                    <a href="{{ route('add.contact') }}"> <button class="btn btn-info">Add Contact</button></a>
                    <hr>
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All Contact Data</div>

                        <table class="table">
                            <thead>

                            <tr>
                                <th scope="col" width="10%">#</th>
                                <th scope="col" width="15%">Address</th>
                                <th scope="col" width="20%">Email</th>
                                <th scope="col" width="30%">Phone</th>
                                <th scope="col" width="25%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($contacts as $contact )
                                <tr>

                                    <th scope="row">{{  $i++ }}</th>

                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>



                                    <td>
                                        <a href="{{ route('edit.contact',$contact) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.contact',$contact) }}" onclick="return confirm('Are you Sure to Delete ')" class="btn btn-danger">Delete</a>


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

@endsection

