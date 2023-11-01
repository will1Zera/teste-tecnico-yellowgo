<?php 
    require_once("dao/UserDAO.php");
    require_once("dao/DomainDAO.php");
    require_once("config/connect.php");
    require_once("config/globals.php");

    // Restrict access to only user logged
    $userDao = new UserDAO($conn, $BASE_URL);
    $userData = $userDao->verifyToken(true);
?>
<?php if($userType === 1): ?>
    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-6" id="register__container">
                    <h2 class="mb-3">Cadastro de domínio</h2>
                    <form action="domain-process" method="POST">
                        <input type="hidden" name="type-form" value="create">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" maxlength="200" class="form-control" id="name" placeholder="Digite o nome do domínio" name="name">
                        </div>
                        <div class="form-group">
                            <label for="domain_type">Domínio</label>
                            <input type="text" maxlength="200" class="form-control" id="domain_type" placeholder="Digite o domínio" name="domain_type">
                        </div>
                        <div class="form-group">
                            <label for="user_type">Qual o tipo de usuário?</label>
                            <select name="user_type" id="user_type" class="form-control">
                                <option value="3">Cliente</option>
                                <option value="2">Suporte</option>
                                <option value="1">Administrador</option>
                            </select>
                        </div>
                        <input type="submit" class="btn card-btn" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>