@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
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
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input name="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <input name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control" placeholder="Повторите пароль">
                    </div>
                    <div class="form-group">
                        <input name="surname" value="{{ old('surname') }}" type="text" class="form-control" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <input name="age" value="{{ old('age') }}" type="text" class="form-control" placeholder="Возраст">
                    </div>
                    <div class="form-group">
                        <input name="address" value="{{ old('address') }}" type="text" class="form-control" placeholder="Адрес">
                    </div>
                    <div class="form-group">
                        <select name="gender" class="custom-select form-control">
                            <option disabled selected>Пол</option>
                            <option {{ old('gender') == 1 ? ' selected' : '' }} value="1">Мужской</option>
                            <option {{ old('gender') == 2 ? ' selected' : '' }} value="2">Женский</option>
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
