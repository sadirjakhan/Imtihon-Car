<x-layout.main>
    <x-slot:title>
        Habarnomalar
    </x-slot:title>




<x-page-header>

    Habarnomalar
</x-page-header>

   


    <!-- Blog Start -->



    <div class="blog">
        <div class="container">
            <div class="section-header text-center">
                <p> Habarnoma</p>
                <h2>Ohirgi</h2>
            </div>

    

            
                @foreach ( $posts as $post  )  
                <div class="lg-4">
                    <div class="blog-item">
                        <div class="blog-img">
                            {{-- <img src="img/blog-1.jpg" alt="Image"> --}}
                            <div class="meta-date">
                                <span>01</span>
                                <strong>Jan</strong>
                                <span>2045</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="#">{{$post->title}}</a></h3>
                            <p>{{$post->short_content}}</p>
                            
                            
                        </div>
                        <div class="ml-auto">
                            <a class=" mb-5 " href="{{route('posts.show' ,['post'=> $post->id])}}">Kirish</a>
                        </div>
                       
                            
                      
                        <div class="row mb-4">
                            <a class=" mb-5 btn" href="{{route('posts.edit' ,['post'=> $post->id])}}">Edit</a>



                            
                            <form action="{{route('posts.destroy' ,['post'=> $post->id ] )}}" method="POST" onsubmit="return confirm('Вы уверены, что хотите это удалить?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" mb-5 btn btn-custom" href="">Destroy</button>

                            </form>
                    
                        </div>
                       
                        <div class="blog-meta">
                            <p><i class="fa fa-user"></i><a href="">Admin</a></p>
                            <p><i class="fa fa-folder"></i><a href="">Web Design</a></p>
                            @foreach ($post->tags as $tag )
                                
                            
                            <p><i class="fa fa-comments"></i><a href="">{{'title'}}</a></p>
                            @endforeach
                            <p><i class="fa fa-user"></i>{{$post->category->name}}</a></p>
                        </div>
                      
                    </div>
                </div>
                @endforeach
            </div>
            {{-- {{$posts->links()}}  --}}
            
          
        </div>
    </div>
    <!-- Blog End -->




</x-layout.main>
