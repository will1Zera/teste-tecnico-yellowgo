<!-- Import main layout -->
@extends('layouts.main')

<!-- Include layout content -->
@section('content')

    <div class="main__container">
        <div class="col-md-10 offset-md-1 dashboard__title">
            <h1>Minhas solicitações</h1>
        </div>
        <div class="col-md-10 offset-md-1 dashboard__tickets">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Protocolo</th>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#" class="dashboard__link">18956632</a></td>
                        <td scope="row">Problema no pagamento da fatura</td>
                        <td>Erro</td>
                        <td>Aberto</td>
                        <td>
                            <a href="#" class="dashboard__button">Acompanhar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
