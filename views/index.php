<?php 
    require_once("dao/UserDAO.php");
    require_once("dao/TicketDAO.php");
    require_once("config/connect.php");
    require_once("config/globals.php");

    // Restrict access to only user logged
    $userDao = new UserDAO($conn, $BASE_URL);
    $userData = $userDao->verifyToken(true);
    $userType = $userData->id_user_type;

    $ticketDao = new TicketDAO($conn, $BASE_URL);

    if($userData->id_user_type === 2 || $userData->id_user_type === 1){
        $userTickets = $ticketDao->getAllTickets();
    } else{
        $userTickets = $ticketDao->getTicketsByUserId($userData->id);
    }
?>

    <div class="main__container">
        <div class="col-md-10 offset-md-1 dashboard__title">
            <?php if($userType === 2 || $userType === 1): ?>
                <h1 class="">Solicitações do sistema</h1>
            <?php else: ?>
                <h1 class="">Minhas solicitações</h1>
            <?php endif; ?>
        </div>
        <div class="col-md-10 offset-md-1 dashboard__tickets">
            <?php if($userTickets != []): ?>
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
                        <?php foreach ($userTickets as $ticket): ?>
                            <tr>
                                <td><a href="ticket?id=<?= $ticket->id ?>" class="dashboard__link"><?= $ticket->protocol ?></a></td>
                                <td scope="row"><?= $ticket->title ?></td>
                                <td><?= $ticket->type ?></td>
                                <?php if($ticket->responsable_name && $ticket->closure_reason): ?>
                                    <td>Fechado</td>
                                <?php else: ?>
                                    <td>Aberto</td>
                                <?php endif; ?>
                                <td>
                                    <a href="ticket?id=<?= $ticket->id ?>" class="dashboard__button">Acompanhar</a>
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