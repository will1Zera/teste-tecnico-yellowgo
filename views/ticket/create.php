    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-6" id="register__container">
                    <h2 class="mb-3">Solicite o suporte da Osir</h2>
                    <p>Nos informe o seu problema ou dúvida e em breve <br />  um suporte da Osirnet irá te atender.</p>
                    <form action="ticket-process" method="POST">
                        <input type="hidden" name="type" value="register">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" maxlength="200" class="form-control" id="title" placeholder="Digite o título da solicitação" name="title">
                        </div>
                        <div class="form-group">
                            <label for="type">Qual o tipo da solicitação?</label>
                            <select name="type" id="type" class="form-control">
                                <option value="Dúvida">Dúvida</option>
                                <option value="Suporte">Suporte</option>
                                <option value="Erro">Erro</option>
                                <option value="Bug">Bug</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Descrição</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Conte-nos os detalhes da solicitação"></textarea>
                        </div>
                        <input type="submit" class="btn card-btn" value="Solicitar">
                    </form>
                </div>
            </div>
        </div>
    </div>