<!-- Import main layout -->
@extends('layouts.main')

<!-- Include layout content -->
@section('content')

    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-6" id="register__container">
                    <form>
                        <input type="hidden" name="type" value="register">
                        <img src="/img/logo-icon.png" alt="Logo" class="auth__image"/>
                        <div class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" maxlength="200" class="form-control" id="name" placeholder="Digite seu nome" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" maxlength="200" class="form-control" id="email" placeholder="Digite seu e-mail" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" maxlength="30" class="form-control" id="password" placeholder="Digite sua senha" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirmar senha</label>
                            <input type="password" maxlength="30" class="form-control" id="confirmpassword" placeholder="Confirme sua senha" name="confirmpassword">
                        </div>
                        <input type="submit" class="btn card-btn" value="Cadastrar">
                        <p class="form__text">Já possui uma conta? <a class="form__link-register" href="login">Acesse aqui.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
