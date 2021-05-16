@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-12 ">


                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All Massages</div>

                        <table class="table">
                            <thead>

                            <tr>
                                <th scope="col" width="10%">#</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col" width="20%">Email</th>
                                <th scope="col" width="30%">Subject</th>
                                <th scope="col" width="30%">Massage</th>
                                <th scope="col" width="25%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($massages as $msg )
                                <tr>

                                    <th scope="row">{{  $i++ }}</th>

                                    <td>{{ $msg->name }}</td>
                                    <td>{{ $msg->email }}</td>
                                    <td>{{ $msg->subject }}</td>
                                    <td>{{ $msg->massage }}</td>



                                    <td>

                                        <a href="{{ route('delete.massage',$msg) }}" onclick="return confirm('Are you Sure to Delete ')" class="btn btn-danger">Delete</a>


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

