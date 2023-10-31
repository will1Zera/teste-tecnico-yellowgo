<?php 
    require_once("models/Ticket.php");
    require_once("models/Message.php");

    class TicketDAO{
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url){
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildTicket($data){
            $ticket = new Ticket();

            $ticket->id = $data['id'];
            $ticket->users_id = $data['users_id'];
            $ticket->title = $data['title'];
            $ticket->protocol = $data['protocol'];
            $ticket->type = $data['type'];
            $ticket->description = $data['description'];
            $ticket->responsable_id = $data['responsable_id'];
            $ticket->closure_reason = $data['closure_reason'];

            return $ticket;
        }

        // Create a ticket
        public function create(Ticket $ticket){
            $stmt = $this->conn->prepare("INSERT INTO tickets(
                users_id, title, protocol, type, description, responsable_id, closure_reason
                ) VALUES (
                :users_id, :title, :protocol, :type, :description, :responsable_id, :closure_reason)");

            $stmt->bindParam(":users_id", $ticket->users_id);
            $stmt->bindParam(":title", $ticket->title);
            $stmt->bindParam(":protocol", $ticket->protocol);
            $stmt->bindParam(":type", $ticket->type);
            $stmt->bindParam(":description", $ticket->description);
            $stmt->bindParam(":responsable_id", $ticket->responsable_id);
            $stmt->bindParam(":closure_reason", $ticket->closure_reason);
            $stmt->execute();
        }

        // Redeem user tickets
        public function getTicketsByUserId($id){
            $tickets = [];
            $stmt = $this->conn->prepare("SELECT * FROM tickets WHERE users_id = :users_id");
            $stmt->bindParam(":users_id", $id);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $ticketsArray = $stmt->fetchAll();

                foreach($ticketsArray as $ticket){
                    $tickets[] = $this->buildTicket($ticket);
                }
            }
            return $tickets;
        }
    }