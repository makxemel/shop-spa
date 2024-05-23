@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
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
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" placeholder="Наименование продукта" value="{{ $product->title }}">
                    </div>
                    <div class="form-group">
                        <input name="description" type="text" class="form-control" placeholder="Описание продукта" value="{{ $product->description }}">
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент продукта">{{ $product->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <input name="price" type="text" class="form-control" placeholder="Стоимость продукта" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <input name="count" type="text" class="form-control" placeholder="Количество продукта" value="{{ $product->count }}">
                    </div>
                    <div class="form-group">
                        <div class="w-50 mb-2">
                            <img src="{{ asset('storage/'.$product->preview_image) }}" alt="preview_image"
                                 class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите превью</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option
                                    @foreach($product->categories as $ownCategory)
                                        {{ $ownCategory == $category ? ' selected' : '' }}
                                    @endforeach
                                    value="{{ $category->id }}"
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тэг" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option
                                    @foreach($product->tags as $ownTag)
                                        {{ $ownTag->id == $tag->id ? ' selected' : '' }}
                                    @endforeach
                                    value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                            @foreach($colors as $color)
                                <option
                                    @foreach($product->colors as $ownColor)
                                        {{ $ownColor->id == $color->id ? ' selected' : '' }}
                                    @endforeach
                                    value="{{ $color->id }}">{{ $color->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
