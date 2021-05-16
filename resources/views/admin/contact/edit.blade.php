@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">



                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Contact</div>


                        <div class="card-body">

                            <form action="{{ route('edit.contact',$contact) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Email</label>

                                    <input type="email" name="email" value="{{ $contact->email }}" class="form-control">


                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Phone</label>

                                    <input type="text" name="phone" value="{{ $contact->phone }}" class="form-control">


                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Address</label>

                                    <input type="text" name="address" class="form-control"  value=" {{ $contact->address }}">

                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <br>

                                </div>




                                <br>
                                <button type="submit" class="btn btn-primary">Update contact</button>



                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
