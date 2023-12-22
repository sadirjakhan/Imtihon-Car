<x-layout.main>
    <x-slot:title>
        Creare
    </x-slot:title>




    <x-page-header>

        Create
    </x-page-header>

    <div class=" col-md-5">
        <div class=" container contact-form">
            <div id="success"></div>
             
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-4 control-group">
                    <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Your Name" />
                    @error('title')
                    <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 control-group">
                    <label >Kategoriyalar</label>
                    {{-- <input type="text" class="form-control" name="category" value="{{old('category')}}" placeholder="Categoriya" /> --}}
                    @error('category')
                    {{-- <p class="help-block text-danger">{{ $message }}</p> --}}
                    @enderror
                    <select name="category_id" >
                        @foreach ($categories as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4 control-group">
                    <label >Teglar</label>
                    {{-- <input type="text" class="form-control" name="category" value="{{old('category')}}" placeholder="Categoriya" /> --}}
                    @error('category')
                    {{-- <p class="help-block text-danger">{{ $message }}</p> --}}
                    @enderror
                    <select name="tags[]" multiple >
                                               @foreach ($tags as $tag )
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="control-group">
                <input type="file" class="form-control" id="name" placeholder="Rasm" =""   />
                <p class="help-block text-danger"></p>
            </div>
           --}}

                <div class="mb-4 control-group">
                    <input type="text" class="form-control" name="short_content" value="{{old('short_content')}}"  placeholder="Sarlavha" />
                    @error('short_content')
                    <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 control-group">
                    <textarea class="form-control" name="content" placeholder="Maqola">{{old('content')}}</textarea>
                    @error('content')
                    <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-custom" type="submit" id="sendMessageButton">Saqlash</button>
                </div>
            </form>
        </div>
    </div>


</x-layout.main>
