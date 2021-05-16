@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">



                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Slider</div>


                        <div class="card-body">

                            <form action="{{ url('slider/update/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Slider</label>

                                    <input type="text" name="title" value="{{ $slider->title }}" class="form-control">


                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Slider</label>

                                    <input type="text" name="description" value="{{ $slider->description }}" class="form-control">


                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Slider Image</label>

                                    <input type="file" name="image" class="form-control"  value=" {{ $slider->image }}">

                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <br>

                                </div>




                                <br>
                                <button type="submit" class="btn btn-primary">Update Slider</button>



                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

{{--        <!-- Trashed Part -->--}}

{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <div class="col-md-8">--}}
{{--                    <div class="card">--}}


{{--                        <div class="card-header">Trashed List</div>--}}

{{--                        <table class="table">--}}
{{--                            <thead>--}}


{{--                            <tr>--}}
{{--                                <th scope="col">#</th>--}}
{{--                                <th scope="col">Category Name</th>--}}
{{--                                <th scope="col">User Name</th>--}}
{{--                                <th scope="col">Created At</th>--}}
{{--                                <th scope="col">Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <!-- @php($i = 1) -->--}}
{{--                            @foreach($trashCat as $category)--}}
{{--                                <tr>--}}

{{--                                    <th scope="row">{{  $categories->firstItem()+$loop->index }}</th>--}}

{{--                                    <td>{{ $category->category_name }}</td>--}}
{{--                                    <td>{{ $category->user->name }}</td>--}}
{{--                                    <!-- if you are using Query Bilder we use or name instead of user->name -->--}}
{{--                                    <td>--}}
{{--                                        @if($category->created_at == NULL)--}}
{{--                                            <span class="text-danger">No Date Set</span>--}}
{{--                                        @else--}}
{{--                                        <!-- Using for Eloquent ORM Read Data  --> {{ $category->created_at->diffForHumans() }}--}}
{{--                                        <!-- Query Builder Read Data   {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }} -->--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info">Restore</a>--}}
{{--                                        <a href="{{ url('pdelete/category/'.$category->id) }}" class="btn btn-danger">P Delete</a>--}}


{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <!-- Using Pagniations for trash-->--}}
{{--                        {{ $trashCat->links() }}--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-4">--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- End Trash -->--}}


        </div>
@endsection
