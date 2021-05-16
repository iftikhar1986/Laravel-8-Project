@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">




                <div class="col-md-12 ">
                    <a href="{{ route('add.service') }}"> <button class="btn btn-info">Add Services</button></a>
                    <hr>
                    <div class="card">





                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All Services</div>

                        <table class="table">
                            <thead>


                            <tr>
                                <th scope="col" width="15%">#</th>
                                <th scope="col" width="15%">Service Title</th>
                                <th scope="col" width="30%">Service Description</th>
                                <th scope="col" width="15%">Service Image</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($service as $services)
                                <tr>

                                    <th scope="row">{{  $i++ }}</th>

                                    <td>{{ $services->title }}</td>
                                    <td>{{ $services->description }}</td>
                                    <td><img src="{{ asset('storage/'.$services->image)}}" style="height: 40px; width: 70px;"></td>


                                    <td>
                                        <a href="{{ url('service/edit/'.$services->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('service/delete/'.$services->id )}}" onclick="return confirm('Are you Sure to Delete ')" class="btn btn-danger">Delete</a>


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

