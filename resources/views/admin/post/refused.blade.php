@extends('admin.main.main_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0">Отклонение заявки</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.post.main') }}">Назад</a></li>
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
            <div class="text-left mb-2"><a href="{{ route('post.show', $post->id) }}">Информация по заявке</i></a></div>
            <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="title" placeholder="Название заявки" value="{{ $post->title }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-75">
                    <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                    @error('content')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-25">
                  <input type="text" class="form-control" name="start_time" placeholder="Укажите время начала" value="{{ $post->start_time }}">
                  @error('start_time')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group w-25">
                  <input type="text" class="form-control" name="end_time" placeholder="Укажите время окончания" value="{{ $post->end_time }}">
                  @error('end_time')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group w-25">
                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                        @foreach ($tags as $tag)
                            <option {{ is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
                <label>Добавить комментарий</label>
                <div class="text-left"><a href="{{ route('post.show', $post->id) }}"><i class="far fa-comment">Добавить</i></a></div>
                <div class="form-group mt-2">
                  <label>Новый статус заявки</label>
                  <select name="category_id" class="form-control w-auto">
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}"
                          {{ $category->id == $post->category_id ? 'select' : '' }}
                          >{{ $category->title }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group w-100">
                  @if($post->liked_users_count == 1)
                  <p class="blog-post-category text-center text-danger" style="font-size: x-large;"><strong><mark class="text-danger">! ОТМЕНИТЕ СОГЛАСОВАНИЕ ЗАЯВКИ !</mark></strong></p>
                  <p class="text-center text-danger" style="font-size: large;">Для отклонения завяки необходимо отменить её согласование</p>
                  @else
                  <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Отправить">
                  </div>
                  @endif
                </div>
            </form>
            </div>
            <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
