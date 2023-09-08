@extends('personal.main.main_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2">{{ $post->title }}</h1>
            <a href="{{ route('personal.post.edit', $post->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('personal.post.main') }}">Назад</a></li>
              <li class="breadcrumb-item active">Заявки</li>
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
                <!-- ./card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-hover">
                    <tbody>
                      <tr aria-expanded="false">
                        <td>ID</td>
                        <td>{{ $post->id }}</td>
                      </tr>
                      <tr aria-expanded="false">
                        <td>ФИО</td>
                        <td>{{ $post->title }}</td>
                      </tr>
                      <tr aria-expanded="false">
                        <td>Время начала</td>
                        <td>{{ $post->start_time }}</td>
                      </tr>
                      <tr aria-expanded="false">
                        <td>Время окончания</td>
                        <td>{{ $post->end_time }}</td>
                      </tr>
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
