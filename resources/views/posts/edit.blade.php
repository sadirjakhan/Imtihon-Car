<x-layout.main>
    <x-slot:title>
        Edit
    </x-slot:title>




<x-page-header>

    Edit:{{$post->id}}
</x-page-header>

<div class=" col-md-5">
    <div class=" container contact-form">
        <div id="success"></div>
         
        <form action="{{ route('posts.update' , ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @csrf
            <div class="mb-4 control-group">
                <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Your Name" />
                @error('title')
                <p class="help-block text-danger">{{ $message }}</p>
                @enderror
            </div>
            {{-- <div class="control-group">
            <input type="file" class="form-control" id="name" placeholder="Rasm" =""   />
            <p class="help-block text-danger"></p>
        </div>
       --}}

            <div class="mb-4 control-group">
                <input type="text" class="form-control" name="short_content" value="{{$post->short_content}}"  placeholder="Sarlavha" />
                @error('short_content')
                <p class="help-block text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 control-group">
                <textarea class="form-control" name="content" placeholder="Maqola">{{$post->content}}</textarea>
                @error('content')
                <p class="help-block text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex" >
                <button class="btn btn-custom" type="submit" id="sendMessageButton">Saqlash</button>
            
        
                <a href="{{route('posts.index' ,['post' =>$post->id] )}}" class="btn btn-custom"  id="sendMessageButton">Bekor qilish</a>
            </div>
        </form>
    </div>
</div>


</x-layout.main>
