@extends('main.main_layout')

@section('content') 
    @auth
    <main class="blog">
        <div class="container">
            @auth()
                @if(Auth::user()->role == 1)
                    <h1 class="edica-page-title text-warning" data-aos="fade-up">Учет переработок и отгулов сотрудников</h1>
                @else
                    <h1 class="edica-page-title text-warning" data-aos="fade-up">Заявки по отделу</h1>
                @endif
            @endauth
            <h5 class="text-center text-dark" style="margin-bottom: 50px;">Все заявки</h5>
            @auth()
            <!-- Часть админа -->
            @if(Auth::user()->role == 1)
            <section class="featured-posts-section">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                        <div>
                            <div class="container" style="margin-right: 50px; border: 3px solid #aaa; outline: 1px solid #000;">
                            @if($post->category_id == 12)
                            <p class="blog-post-category text-danger" style="font-size: large;"><strong> {{ $post->category->title }} <i class="text-danger fas fa-arrow-down"></i></strong></p>
                            @endif
                            @if($post->category_id == 6)
                            <p class="blog-post-category text-danger mt-1"><strong>{{ $post->category->title }}</strong></p> 
                            @else 
                            <p class="blog-post-category text-success mt-1"><strong>{{ $post->category->title }}</strong></p> 
                            @endif
                            <a href="{{ route('post.show', $post->id) }}" class="text-info permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                            <p class="blog-post-category mt-2"><a class="text-dark">создано: </a>{{ $post->created_at }}</p>
                            <p class="blog-post-category"><a class="text-dark">время начала: </a>{{ $post->start_time }}</p>
                            <p class="blog-post-category"><a class="text-dark">время окончания: </a>{{ $post->end_time }}</p>
                            @auth()
                            @if(Auth::user()->role == 1 && $post->category_id != 12)
                            <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="border-1 bg-transparent mb-2">
                                      @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="fas fa-thumbs-up text-success" style="font-size: large;"><strong>Согласовано</strong></i>
                                      @else
                                        <a>Согласовать</a> 
                                      @endif
                                </button>
                            </form>
                            @else
                            <button type="submit" class="border-1 bg-transparent">
                            <td class="text-center"><a href="{{ route('admin.post.edit', $post->id) }}" class="text-warning"><i class="fas fa-pencil-alt"> Редактировать</i></a></td>
                            </button>
                            @endif
                            @endauth
                            @guest()
                            <div>
                                <i class="far fa-bell"></i>
                            </div>
                            @endguest
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-bottom: 50px;">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
            <div class="container d-flex justify-content-center">
                <div class="col-md-6 sidebar">
                        <h5 class="widget-title d-flex justify-content-center" style="margin-bottom: 17px;">Ждут решения</h5>
                        <ul class="post-list">
                            @foreach ($likedPosts as $post)
                            @if($post->liked_users_count == 0 && $post->category_id != 12)
                            <div class="container d-flex justify-content-center mb-5 mt-3" style="margin-right: 50px; border: 3px solid #ff5202; outline: 1px solid #000000;">
                            <li class="post">
                                <a class="post-permalink media" style="margin-bottom: 0px;">
                                    @auth()
                                    <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                        @csrf
                                        @if(Auth::user()->role == 1) 
                                        <button type="submit" class="border-0 bg-transparent">
                                        @endif
                                            @auth()
                                              @if($post->liked_users_count > 0)
                                                <i class="text-success fas fa-thumbs-up"><strong>Согласовано <i class="text-success fas fa-arrow-right"></i> &nbsp;</strong></i>
                                              @else
                                                
                                                <p class="text-muted"><strong></strong></p> 
                                                
                                              @endif
                                            @endauth
                                        </button>
                                    </form>
                                    @endauth   
                                    @if($post->category_id == 6)
                                    <p class="blog-post-category text-danger mt-1" style="font-size: large;"><strong>{{ $post->category->title }}</strong></p> 
                                    @else 
                                    <p class="blog-post-category text-success mt-1" style="font-size: large;"><strong>{{ $post->category->title }}</strong></p> 
                                    @endif   
                                <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>   
                                    <div class="media-body">
                                        <h6 class="{{ $post->title }}" style="margin-bottom: 17px;"></h6>
                                        <p class="blog-post-category">создано: <a class="text-muted"> {{ $post->created_at}} </a> </p>
                                        <p class="blog-post-category">время начала: <a class="text-muted"> <i>{{ $post->start_time}}</i></a></p>
                                        <p class="blog-post-category">время окончания: <a class="text-muted"> <i>{{ $post->end_time}}</i></a></p>
                                    </div>
                                    <br>
                                </a>
                            </li>
                            </div>
                            @endif
                            @endforeach
                        </ul>
                </div>
            </div>
            <!-- Часть сотрудника -->
            @else
            <section class="featured-posts-section d-flex" style = "justify-content: space-around;">
                <div class="row">
                    @foreach ($posts as $post)
                    <li class="post" style="list-style:none;">
                        <a class="post-permalink media" style="margin-bottom: 0px;">
                            @auth()
                            <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                @csrf
                                @if(Auth::user()->role == 1) 
                                <button type="submit" class="border-0 bg-transparent">
                                @endif
                                    @auth()
                                      @if($post->liked_users_count > 0)
                                        <i class="text-success fas fa-thumbs-up" style="margin-bottom: 17px; margin-left: 17px; font-size: large;"><strong> Согласовано <i class="text-success fas fa-arrow-down"></i> &nbsp;</strong></i>
                                      @else
                                        
                                        <p class="text-muted"><strong></strong></p> 
                                        
                                      @endif
                                    @endauth
                                </button>
                            </form>
                            @endauth 
                            <div class="container" style="margin-right: 50px; border: 3px solid #aaa; outline: 1px solid #000;">  
                                @if($post->category_id == 12)
                                <p class="blog-post-category text-danger fas fa-thumbs-down" style="font-size: large;"><strong> {{ $post->category->title }} <i class="text-danger fas fa-arrow-down"></i></strong></p>
                                @else
                                    @if($post->category_id == 6)
                                        <p class="blog-post-category text-danger" style="margin-top: 10px; font-size: large;"><strong>{{ $post->category->title }}</strong></p>  
                                    @else
                                        <p class="blog-post-category text-success" style="margin-top: 10px; font-size: large;"><strong>{{ $post->category->title }}</strong></p>
                                    @endif  
                                @endif
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>   
                                <div class="media-body">
                                    <h6 class="{{ $post->title }}" style="margin-bottom: 17px;"></h6>
                                    <div class="row" style="margin-left: auto;">
                                        <p class="blog-post-category"><strong>создано: &nbsp; </strong></p> 
                                        <p class="">{{ $post->created_at}}</p>
                                    </div>
                                    <p class="blog-post-category">время начала: <i>{{ $post->start_time}}</i></p>
                                    <p class="blog-post-category">время окончания: <i>{{ $post->end_time}}</i></p>
                                </div>
                            </div>
                            <br>
                        </a>
                    </li>
                    @endforeach
                 </div>
            </section>
            <section>
                <div class="row">
                    <div class="mx-auto" style="margin-bottom: 50px;">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
            @endif
            @endauth
        </div>
    </main>
    @endauth
@endsection
