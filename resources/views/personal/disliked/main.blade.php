@extends('personal.main.main_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Отслеживаемые заявки</h1>
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
                            <th>ID</th>
                            <th>Название</th>
                            <th colspan="2" class="text-center">Действия</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                          <tr aria-expanded="false">
                            <td>{{ $post->id }}</td> 
                            <td>{{ $post->title }}</td>
                            <td class="text-center"><a href="{{ route('post.show', $post->id) }}"><i class="far fa-eye"></i></a></td>
                            <td class="text-center">
                              <form action="{{ route('post.dislike.store', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="border-0 bg-transparent">
                                      @if(auth()->user()->dislikedPosts->contains($post->id))
                                        <i class="text-danger fas fa-trash"></i>
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
