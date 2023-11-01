<?php
    require_once("dao/TicketDAO.php");

    $ticketDao = new TicketDAO($conn, $BASE_URL);

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
                    <p>Status: <span>Fechado.</span></p>
                    <p>Data de fechamento: <?= $ticket->formatDate($ticket->update_at) ?>.</p>
                    <p>Suporte resposável: <?= $ticket->responsable_name ?>.</p>
                    <p>Motivo de fechadmento: <?= $ticket->closure_reason ?></p>

                <?php else: ?>
                    <p class="ticket__status">Status: <span>Solicitado.</span></p>

                <?php endif; ?>
                <form action="ticket-process" method="POST">
                    <input type="hidden" name="type-form" value="delete"> 
                    <input type="hidden" name="id" value="<?= $ticket->id ?>"> 
                    <button type="submit" class="dashboard__button">Cancelar solicitação</button>
                </form>
            </div>
        </div>
    </div>