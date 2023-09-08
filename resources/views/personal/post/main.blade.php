@extends('personal.main.main_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Мои заявки</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item active">itnotepad</li> 
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-1 mb-3">
                <a href="{{ route('personal.post.create') }}" class="btn btn-primary">Добавить</a>
            </div>
        </div>
        <!-- user_rating
        <div class="row mb-3 d-flex justify-content-center">
          @if(Auth::user()->role == 1)
          <h3>Личный рейтинг:</h3>
          @else
          <h3>Личный рейтинг:</h3>
          @endif
          @if($user_rating >= 0)
          <h3 class="text-success"><strong>&nbsp;{{ $user_rating }}</strong></h3>
          @else
          <h3 class="text-danger"><strong>&nbsp;{{ $user_rating }}</strong></h3>
          @endif
        </div>
        -->
      </div><!-- /.container-fluid --> 
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Все заявки</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Найти...">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Номер</th>
                        <th>ФИО</th>
                        <th>Категория</th>
                        <th>Дата начала</th>
                        <th>Дата окончания</th>
                        <th>Времени всего</th>
                        <th colspan="7" class="text-center">Действия</th>
                      </tr>
                    </thead>
                    <tbody>    
                     @php
                       $i = 0;  
                     @endphp
                     @foreach ($posts as $post)
                      @if($post->title == auth()->user()->name)
                      <tr aria-expanded="false">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                          @if($post->category_id == 6)
                          <p class="blog-post-category" style="font-size: large;"><mark style="color:orangered"><strong>{{ $post->category->title }}</strong></mark><i class="text-danger"></i></p>
                          @else
                          <p class="blog-post-category" style="font-size: large;"><mark><strong>{{ $post->category->title }}</strong></mark></p>   
                          @endif
                        </td>
                        <td>{{ $post->start_time }}</td>
                        <td>{{ $post->end_time }}</td> 
                        <td>{{ $time[$i] }}</td>    
                        <td class="text-center"></i>
                          @if($post->category_id != 12)
                          <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                            @csrf
                            @if(Auth::user()->role == 1)
                            <button type="submit" class="border-0 bg-transparent">
                            @endif
                              @auth()
                              @if($post->category_id != 12)
                              {{-- {{ dd($posts)}} --}}
                                @if($post->liked_users_count > 0) 
                                  <i class="text-success fas fa-thumbs-up"><strong>Согласовано</strong></i>
                                @else
                                    @foreach ($dislikes as $dislike)
                                    @if($post->id == $dislike->post_id && $dislike->user_id > 0)
                                    <i class="text-danger fas fa-thumbs-down"><strong>Отклонено</strong></i>
                                  @else
                                    @if(Auth::user()->role == 1)
                                    <i><u>Согласовать</u></i> 
                                    @else
                                    <p class="text-warning"><strong>Заявка на рассмотрении</strong><p>
                                    @endif
                                  @endif
                                  @endforeach
                                @endif                            
                              @endif
                              @endauth
                            </button>
                          @else
                              <p class="text-danger"><a class="text-danger" href="{{ route('admin.post.edit', $post->id) }}">Для согласования необходимо редактировать заявку</p></a>
                          @endif
                         </form>
                        </td>
                        <td class="text-center"><a href="{{ route('post.show', $post->id) }}"><i class="far fa-eye"></i></a></td>
                        @if(Auth::user()->role == 0)
                        <td class="text-center"><a href="{{ route('personal.post.edit', $post->id) }}" class="text-warning"><i class="fas fa-pencil-alt"></i></a></td>
                        @endif
                        @if(Auth::user()->role == 1)
                        <td class="text-center"><a href="{{ route('admin.post.edit', $post->id) }}" class="text-warning"><i class="fas fa-pencil-alt"></i></a></td>
                        <td class="text-center">
                          <form action="{{ route('post.dislike.store', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent">
                              @auth()
                              @if(auth()->user()->likedPosts->contains($post->id) != 1)
                                @if(auth()->user()->dislikedPosts->contains($post->id))
                                  <i class="text-danger fas fa-thumbs-down" style="font-size: large;"><strong>Отклонено</strong></i>
                                @else
                                  <i><u>Отклонить</u></i> 
                                @endif
                              @else
                              <p class="text-muted"><a class="text-muted" href="{{ route('admin.post.edit', $post->id) }}">Для отклонения необходимо редактировать заявку</p></a>
                              @endif
                              @endauth
                            </button>
                          </form>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fas fa-trash text-muted" role="button"></i>
                                </button>
                            </form>
                        </td>
                        @endif
                      </tr>
                      @endif
                      @php
                       $i++;
                      @endphp 
                     @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
