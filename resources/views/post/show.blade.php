@extends('main.main_layout')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title text-warning" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta mb-3" data-aos="fade-up" data-aos-delay="200">Заявка создана: {{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} • {{ $date->format('H:i') }} • {{ $post->comments->count() }} комментарий</p>
            @if($post->category_id == 7)
            <h2 class="d-flex justify-content-center text-success mb-3" data-aos="fade-up">{{ $post->category->title }}</h2>
            @else
            <h2 class="d-flex justify-content-center text-danger mb-3" data-aos="fade-up">{{ $post->category->title }}</h2>
            @endif
            <section class="post-content">
                <div class="container col-6" style="border: 3px solid #aaa; outline: 1px solid #000;">
                    @php
                    $i = 0;  
                    @endphp
                    <div class="col-lg-9 mx-auto mb-1 mt-1"><strong>время начала: &nbsp;</strong><i>{{ $start->year }} год, {{ $start->day }} {{ $start->getTranslatedMonthName('Do MMMM') }}, {{ $start->format('H:i') }}</i></div>
                    <div class="col-lg-9 mx-auto mb-1"><strong>время окончания: &nbsp;</strong><i>{{ $end->year }} год, {{ $end->day }} {{ $end->getTranslatedMonthName('Do MMMM') }}, {{ $end->format('H:i') }}</i></div>
                    <div class="col-lg-9 mx-auto mb-1"><strong>времени всего: &nbsp;</strong><i>{{ $time[$i] }}</i></div>
                    @if(Auth::user()->role == 1)  
                    <div class="col-lg-9 mx-auto mb-1"><strong>причина: </strong><i>{!! $post->content !!}</i></div>
                    @endif
                    @php
                    $i++;
                    @endphp
                </div>
            </section>
            <div class="row"> 
                <div class="col-lg-9 mx-auto">
                    <section class="py-3">
                        @auth()
                        <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                            @csrf
                            @if(Auth::user()->role == 1) 
                            <button type="submit" class="border-0 bg-transparent">
                            @endif
                                @auth()
                                  @if($post->liked_users_count > 0)
                                    <i class="text-success fas fa-thumbs-up"><strong>Согласовано</strong></i>
                                  @else
                                    @if(Auth::user()->role == 1)
                                    <i>Согласовать</i> 
                                    @endif
                                  @endif
                                @endauth
                            </button>
                        </form>
                        @endauth
                        @guest()
                            <div>
                                <span>{{ $post->liked_users_count }}</span>
                                <i class="far fa-bell"></i>
                            </div>
                        @endguest
                    </section>
                    <section class="comment-list mb-5">
                        <h2 class="section-title mb-3 mt-5" data-aos="fade-up">Комментарии ({{ $post->comments->count() }}) </h2>
                        @foreach ($post->comments as $comment)
                        <div class="comment-text mb-3">
                            <span class="username">
                              <div>
                                {{ $comment->user->name }}
                              </div>
                              <span class="text-muted float-right">{{ $comment->DateAsCarbon->diffForHumans() }}</span>
                            </span><!-- /.username -->
                            {{ $comment->message }}
                        </div>
                        @endforeach
                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Добавить комментарий</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Ваш комментарий" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Опубликовать" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
