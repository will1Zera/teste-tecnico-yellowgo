<!-- Import main layout -->
@extends('layouts.main')

<!-- Include layout content -->
@section('content')

    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-6" id="register__container">
                    <form>
                        <input type="hidden" name="type" value="login">
                        <img src="/img/logo-icon.png" alt="Logo" class="auth__image">
                        <div class="form-group" id="form-group">
                            <label for="email">E-mail</label>
                            <i class="fa-regular fa-id-card"></i><input type="text" maxlength="200" class="form-control" id="email" placeholder="Digite seu e-mail" name="email">
                        </div>
                        <div class="form-group" id="form-group">
                            <label for="password">Senha</label>
                            <i class="fa-solid fa-lock"></i><input type="password" maxlength="30" class="form-control" id="password" placeholder="Digite sua senha" name="password">
                        </div>
                        <input type="submit" class="btn card-btn" value="Entrar">
                        <p class="form__text">Não tem uma conta? <a class="form__link-register" href="register">Cadastre-se.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
