@extends('admin.main.main_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Отклоненные заявки</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">mondi</a></li>
              <li class="breadcrumb-item active">На сайт</li>
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
                        <th colspan="6" class="text-center">Действия</th>
                      </tr>
                    </thead>
                    <tbody>    
                      @foreach ($posts as $post)
                      @if((auth()->user()->dislikedPosts->contains($post->id) == 1))
                      <tr aria-expanded="false">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                          @if((auth()->user()->dislikedPosts->contains($post->id) == 1))
                          <p class="blog-post-category text-danger" style="font-size: large;"><strong> {{ $post->category->title }} <i class="text-danger"></i></strong></p>
                          @else
                          <p class="blog-post-category" style="font-size: large;"><mark>{{ $post->category->title }}</mark></p>   
                          @endif
                        </td>
                        <td>{{ $post->start_time }}</td>
                        <td>{{ $post->end_time }}</td> 
                        <td class="text-center"></i>
                          @if((auth()->user()->dislikedPosts->contains($post->id) != 1))
                          <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent">
                              @auth()
                              @if((auth()->user()->dislikedPosts->contains($post->id) != 1))
                                @if(auth()->user()->likedPosts->contains($post->id))
                                  <i class="text-success fas fa-thumbs-up"><strong>Согласовано</strong></i>
                                @else
                                  <i><u>Согласовать</u></i> 
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
                        <td class="text-center"><a href="{{ route('admin.post.edit', $post->id) }}" class="text-warning"><i class="fas fa-pencil-alt"></i></a></td>
                        @if((auth()->user()->dislikedPosts->contains($post->id) != 1))
                        <td class="text-center">
                          <form action="{{ route('admin.post.refused', $post->id) }}">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="text-center"><u>Отклонить</u></i>                              
                            </button>
                          </form>
                        </td>
                        @endif
                        <td class="text-center">
                            <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fas fa-trash text-danger" role="button"></i>
                                </button>
                            </form>
                        </td>
                      </tr>
                      @endif
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
