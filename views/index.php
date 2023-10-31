<?php 
    require_once("dao/UserDAO.php");
    require_once("dao/TicketDAO.php");
    require_once("config/connect.php");
    require_once("config/globals.php");

    // Restrict access to only user logged
    $userDao = new UserDAO($conn, $BASE_URL);
    $userData = $userDao->verifyToken(true);

    $ticketDao = new TicketDAO($conn, $BASE_URL);
    $userTickets = $ticketDao->getTicketsByUserId($userData->id);
?>

    <div class="main__container">
        <div class="col-md-10 offset-md-1 dashboard__title">
            <h1 class="">Minhas solicitações</h1>
        </div>
        <div class="col-md-10 offset-md-1 dashboard__tickets">
            <?php if($userTickets != []): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Protocolo</th>
                            <th scope="col">Título</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userTickets as $ticket): ?>
                            <tr>
                                <td><a href="#" class="dashboard__link"><?= $ticket->protocol ?></a></td>
                                <td scope="row"><?= $ticket->title ?></td>
                                <td><?= $ticket->type ?></td>
                                <td>
                                    <a href="#" class="dashboard__button">Acompanhar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Você não possui nenhuma solicitação.</p>
            <?php endif; ?>
        </div>
    </div>