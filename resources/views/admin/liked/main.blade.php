@extends('admin.main.main_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Согласованные заявки</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">itnotepad</a></li>
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
                            <th colspan="5" class="text-center">Действия</th>
                          </tr>
                        </thead>
                        <tbody>
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
                            <td class="text-center"><a href="{{ route('post.show', $post->id) }}"><i class="far fa-eye"></i></a></td>
                            <td class="text-center">
                              <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="border-0 bg-transparent">
                                      @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="text-danger fas fa-thumbs-down"></i>
                                      @else
                                        <a>Отслеживать</a> 
                                      @endif
                                </button>
                            </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </div>
    </section>
  <!-- /.content-wrapper -->
  </div>
@endsection
