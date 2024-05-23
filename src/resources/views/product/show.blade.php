@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукт</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-2">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ $product->id }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Наименование</td>
                                    <td>
                                        {{ $product->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Описание</td>
                                    <td>
                                        {{ $product->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Контент</td>
                                    <td>
                                        {{ $product->content }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Превью</td>
                                    <td>
                                        <div class="w-50 mb-2">
                                            <img src="{{ asset('storage/'.$product->preview_image) }}" alt="main_image" class="w-50">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Стоимость</td>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Количество</td>
                                    <td>
                                        {{ $product->count }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Опубликованно</td>
                                    <td>
                                        {{ $product->is_published ? 'ДА' : 'НЕТ' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Категории</td>
                                    <td>
                                        {{ $product->category_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Тэги</td>
                                    <td>
                                        @foreach($product->tags as $tag)
                                            ({{ $tag->title }})
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Цвета</td>
                                    <td>
                                        @foreach($product->colors as $color)
                                            <div style="width: 16px; height: 16px; background: {{ '#'.$color->title }}"></div>
                                            {{ $color->title }}
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
