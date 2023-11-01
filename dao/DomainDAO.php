<?php 
    require_once("models/Domain.php");
    require_once("models/Message.php");

    class DomainDAO{
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url){
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildDomain($data){
            $domain = new Domain();

            $domain->id = $data['id'];
            $domain->users_id = $data['users_id'];
            $domain->name = $data['name'];
            $domain->domain_type = $data['domain_type'];
            $domain->user_type = $data['user_type'];

            return $domain;
        }

        // Create a domain
        public function create(Domain $domain){
            $stmt = $this->conn->prepare("INSERT INTO domains(
                users_id, name, domain_type, user_type
                ) VALUES (
                :users_id, :name, :domain_type, :user_type)");

            //$domain->domain = "osirnet.com.br";    

            $stmt->bindParam(":users_id", $domain->users_id);
            $stmt->bindParam(":name", $domain->name);
            $stmt->bindParam(":domain_type", $domain->domain_type);
            $stmt->bindParam(":user_type", $domain->user_type);
            $stmt->execute();
        }

        // Redeem user domains
        public function getDomainByUserId($id){
            $domains = [];
            $stmt = $this->conn->prepare("SELECT * FROM domains WHERE users_id = :users_id");
            $stmt->bindParam(":users_id", $id);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $domainsArray = $stmt->fetchAll();

                foreach($domainsArray as $domain){
                    $domains[] = $this->buildDomain($domain);
                }
            }
            return $domains;
        }
    }