@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">



                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Service</div>


                        <div class="card-body">

                            <form action="{{ route('edit.service',$service) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Slider</label>

                                    <input type="text" name="title" value="{{ $service->title }}" class="form-control">


                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Slider</label>

                                    <input type="text" name="description" value="{{ $service->description }}" class="form-control">


                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Slider Image</label>

                                    <input type="file" name="image" class="form-control"  value=" {{ $service->image }}">

                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <br>

                                </div>




                                <br>
                                <button type="submit" class="btn btn-primary">Update Service</button>



                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
