@extends('personal.main.main_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Комменатрии</h1>
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
                      <h3 class="card-title">Все комментарии</h3>
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
                            <th>Дата и время создания</th>
                            <th>Комментарий</th>
                            <th colspan="3" class="text-center">Действия</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($comments as $comment)
                          <tr aria-expanded="false">
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td>{{ $comment->message }}</td> 
                            <td class="text-center"><a href="{{ route('post.show', $comment->post_id) }}"><i class="far fa-eye"></i></a></td>                    
                            <td class="text-center"><a href="{{ route('personal.comment.edit', $comment->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center">
                                <form action="{{ route('personal.comment.delete', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fas fa-trash text-danger" role="button"></i>
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
