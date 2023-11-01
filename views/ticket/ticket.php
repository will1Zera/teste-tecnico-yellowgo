<?php
    require_once("dao/TicketDAO.php");
    require_once("dao/UserDAO.php");

    $ticketDao = new TicketDAO($conn, $BASE_URL);

    // Restrict access to only user logged
    $userDao = new UserDAO($conn, $BASE_URL);
    $userData = $userDao->verifyToken(true);
    $userType = $userData->id_user_type;

    // Get the parameter id
    $id = filter_input(INPUT_GET, "id");
    
    if(empty($id)){ 
        $message->setMessage("A solicitação não foi encontrado.", "error", "./");
    } else{
        $ticket = $ticketDao->findById($id);
        if((!$ticket)){
            $message->setMessage("A solicitação não foi encontrado.", "error", "./");
        }
    }
?>

    <div id="main-container" class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-6 ticket__container">
                <h3>Solicitação: <span><?= $ticket->protocol ?></span></h3>
                <h5>Título: <?= $ticket->title ?></h5>
                <p>Descrição: <?= $ticket->description ?></p>
                <p>Data de abertura: <?= $ticket->formatDate($ticket->created_at) ?>.</p>

                <?php if($ticket->responsable_name && $ticket->closure_reason): ?>
                    <p>Data de fechamento: <?= $ticket->formatDate($ticket->update_at) ?>.</p>
                    <p>Status: <span>Fechado.</span></p>
                    <p>Suporte resposável: <?= $ticket->responsable_name ?>.</p>
                    <p>Motivo do fechamento: <?= $ticket->closure_reason ?></p>
                <?php else: ?>
                    <p class="ticket__status">Status: <span>Solicitado.</span></p>
                <?php endif; ?>

                <form action="ticket-process" method="POST">
                    <input type="hidden" name="type-form" value="delete"> 
                    <input type="hidden" name="id" value="<?= $ticket->id ?>"> 
                    <button type="submit" class="dashboard__button">Cancelar solicitação</button>
                </form>
            </div>

            <?php if($userType === 2 || $userType === 1): ?>
                <div class="offset-md-1 col-md-6 ticket__update">
                    <h3>Atualizar solicitação</h3>
                    <form action="ticket-process" method="POST">
                        <input type="hidden" name="type-form" value="update">
                        <input type="hidden" name="id" value="<?= $ticket->id ?>">
                        <div class="form-group">
                            <label for="responsable_name">Responsável</label>
                            <input type="text" maxlength="200" class="form-control" id="responsable_name" placeholder="Digite seu nome" name="responsable_name" value="<?= $userData->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="closure_reason">Explicação</label>
                            <textarea name="closure_reason" id="closure_reason" class="form-control" placeholder="Diigte a solução do problema"><?= $ticket->closure_reason ?></textarea>
                        </div>
                        <button type="submit" class="dashboard__button">Atualizar solicitação</button>
                    </form>
                </div>
            <?php endif; ?>

        </div>
    </div>