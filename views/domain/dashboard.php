<?php 
    require_once("dao/UserDAO.php");
    require_once("dao/DomainDAO.php");
    require_once("config/connect.php");
    require_once("config/globals.php");

    // Restrict access to only user logged
    $userDao = new UserDAO($conn, $BASE_URL);
    $domainDao = new DomainDAO($conn, $BASE_URL);
    $userData = $userDao->verifyToken(true);
    $userType = $userData->id_user_type;

    $userDomains = $domainDao->getDomainByUserId($userData->id);
?>
<?php if($userType === 1): ?>
    <div class="main__container">
        <div class="col-md-10 offset-md-1 dashboard__title">
            <h1>Domínios do sistema</h1>
        </div>
        <div class="col-md-10 offset-md-1 dashboard__tickets">
            <?php if($userDomains != []): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Domínio</th>
                            <th scope="col">Tipo de usuário</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userDomains as $domain): ?>
                            <tr>
                                <td scope="row"><?= $domain->name ?></a></td>
                                <td scope="row"><?= $domain->domain_type ?></td>
                                <td scope="row"><?= $domain->user_type ?></td>
                                <td scope="row">
                                    <form action="domain-process" method="POST">
                                        <input type="hidden" name="type-form" value="delete"> 
                                        <input type="hidden" name="id" value="<?= $domain->id ?>"> 
                                        <button type="submit" class="dashboard__button">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Você não possui nenhum domínio cadastrado.</p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>