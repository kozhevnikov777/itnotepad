@extends('admin.main.main_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Заявки</h1>
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
        <div class="row d-flex justify-content-between">
            <div class="col-1 mb-3">
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Добавить</a>
            </div>
            <div class="col-1 mb-3">
              <form action="{{ route('admin.post.export') }}" method="POST">
                @csrf
                <input type="submit" value="Экспорт" class="btn btn-muted">
              </form>
            </div>


            {{-- <div class="col-1 mb-3 ml-3">
              <form action="{{ route('admin.post.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" name="files">
                <button type="submit" class="btn btn-warning">&nbsp;Импорт&nbsp;</button>
              </form>
            </div> --}}


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
                <div class="container d-flex justify-content-center">
                <div class="card-body">
                  <table class="table table-bordered table-hover col-10">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Категория</th>
                        <th>Дата начала</th>
                        <th>Дата окончания</th>
                        <th>Времени всего</th>
                        <th colspan="6" class="text-center">Действия</th>
                      </tr>
                    </thead>
                    <tbody> 
                      @php
                        $i = 0;  
                      @endphp
                      @foreach ($posts as $post)
                      <tr aria-expanded="false">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                          @if($post->category_id == 6)
                          <p class="blog-post-category" style="font-size: large;"><mark style="color:orangered"><strong>{{ $post->category->title }}</i></strong></mark></p>
                          @else
                          <p class="blog-post-category" style="font-size: large;"><mark><strong>{{ $post->category->title }}</strong></mark></p>   
                          @endif
                        </td>
                        <td>{{ $post->start_time }}</td>
                        <td>{{ $post->end_time }}</td> 
                        <td>{{ $time[$i] }}</td> 
                        
                        <td class="text-center"></i>
                          @if((auth()->user()->dislikedPosts->contains($post->id) != 1))
                          <form id="myform{{$i}}" action="{{ route('post.like.store', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" form="myform{{$i}}" class="border-0 bg-transparent">
                              @auth()
                              @if((auth()->user()->dislikedPosts->contains($post->id) != 1))
                                @if(auth()->user()->likedPosts->contains($post->id))
                                  <i class="text-success fas fa-thumbs-up" style="font-size: large;"><strong>Согласовано </strong></i>
                                @else
                                  <i><u>Согласовать</u></i> 
                                @endif
                              @endif
                              @endauth
                            </button>
                          @else
                              <p class="text-danger"><a class="text-muted" href="{{ route('admin.post.edit', $post->id) }}">необходимо редактировать</p></a>
                          @endif
                          </form>
                        </td>
                        <td class="text-center"><a href="{{ route('post.show', $post->id) }}"><i class="far fa-eye"></i></a></td>
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
                              <p class="text-muted"><a class="text-muted" href="{{ route('admin.post.edit', $post->id) }}">необходимо редактировать</p></a>
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
                                    <strong class="fas fa-trash text-dark text-muted" role="button"></strong>
                                </button>
                            </form>
                        </td>
                        @php
                        $i++;
                        @endphp
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        </div>
                        <!-- Вторая таблица -->
                        <table class="table table-bordered table-hover" style="margin-top: 0px; margin-left: -21px; margin-bottom: 20px; ">
                          <form id="checkbox" action="{{route('admin.checkbox.main')}}" method="POST">
                            @csrf
                          <thead>
                            <tr>
                              <th class="text-center" style="font-size: 11.5px"> <button type="submit" form="checkbox">Отправить</button> </th>
                            </tr>
                            <tr>
                              <th class="text-center" style="font-size: 12px">
                                <select name="like_dislike">
                                  <option value="like">Согл.</option>
                                  <option value="dislike">Откл.</option>
                                </select>
                              </th>
                            </tr>
                          </thead>
                        <tbody> 
                          @php
                            $j = 0;  
                          @endphp
                          @foreach ($posts as $post)
                          <tr aria-expanded="false">
                            <td class="text-center">                           
                              <input type="checkbox" name="options[]" value="{{$post->id}}" id="option-{{$post->id}}">                           
                            </td>
                          </tr>
                            @php
                                $j++;
                            @endphp
                            @endforeach
                          </form>
                        </tbody>
                        </table>
                        </div>
                        </div>
                  </div> 
                </div>
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
