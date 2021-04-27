<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Multi <Picture></Picture>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card-group">
                    @foreach($images as $multi)

                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <img src="{{asset('storage/'.$multi->image)}}" alt="">
                        </div>
                    </div>

                    @endforeach

                    </div>
                </div>

                  <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Multi Image</div>
                             <div class="card-body">

                        <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
                                <label for="exampleInputEmail1">Multi Image</label>

                                <input type="file" name="image[]" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter brand Image" multiple="">

                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Add Image</button>
                        </form>
                         </div>
                    </div>
                  </div>
            </div>
        </div>


    </div>
</x-app-layout>
