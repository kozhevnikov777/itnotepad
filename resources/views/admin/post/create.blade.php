@extends('admin.main.main_layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Форма добавления заявки</h1> 
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
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group w-25">
                    <input type="text" class="form-control" name="title" placeholder="ФИО" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-75">
                    <label>Укажите причину</label>
                    <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Выберите категорию</label>
                  <select name="category_id" class="form-control w-auto">
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}"
                          {{ $category->id == old('category_id') ? 'selected' : '' }}
                          >{{ $category->title }}</option>
                      @endforeach
                  </select>
                  @error('category_id')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group w-50">
                  <label class="mb-0">Укажите дату и время начала</label>
                  <p class="mb-0 text-muted">Заполнять по типу:&nbsp; </p>
                  <p class="mb-0 text-muted">год-месяц-день &nbsp;часы:минуты</p>
                  <input type="text" class="form-control w-50" name="start_time" placeholder="{{ $current }}" value="{{ $current }}">
                  @error('start_time')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group w-50">
                  <label class="mb-0">Укажите дату и время окончания</label>
                  <p class="mb-0 text-muted">Заполнять по типу:&nbsp; </p>
                  <p class="mb-0 text-muted">год-месяц-день &nbsp;часы:минуты</p>
                  <input type="text" class="form-control w-50" name="end_time" placeholder="{{ $current }}" value="{{ $current }}">
                  @error('end_time')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group w-25">
                    <label>Теги (по ситуации)</label>
                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                        @foreach ($tags as $tag)
                            <option {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                    @error('tag_ids')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Добавить">
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
