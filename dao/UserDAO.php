<?php 
    require_once("models/User.php");
    require_once("models/Message.php");

    class UserDAO{
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url){
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function buildUser($data){
            $user = new User();

            $user->id = $data['id'];
            $user->id_user_type = $data['id_user_type'];
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->token = $data['token'];
            $user->status = $data['status'];

            return $user;
        }

        // Create a user
        public function create(User $user){
            $stmt = $this->conn->prepare("INSERT INTO users(
                id_user_type, name, email, password, token, status
                ) VALUES (
                :id_user_type, :name, :email, :password, :token, :status)");

            $stmt->bindParam(":id_user_type", $user->id_user_type);
            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":password", $user->password);
            $stmt->bindParam(":token", $user->token);
            $stmt->bindParam(":status", $user->status);
            $stmt->execute();

            $this->message->setMessage("Solicitação criada com sucesso.", "success", "./");
        }

        // Update a user
        public function update(User $user){
            $stmt = $this->conn->prepare("UPDATE users SET
                name = :name,
                email = :email,
                token = :token,
                status = :status
                WHERE id = :id
            ");

            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":token", $user->token);
            $stmt->bindParam(":status", $user->status);
            $stmt->bindParam(":id", $user->id);
            $stmt->execute();
        }

        // Create the token in the session
        public function setTokenToSession($token, $redirect = true){
            $_SESSION["token"] = $token;

            if($redirect){
                $this->message->setMessage("Login realizado com sucesso.", "success", "./");
            }
        }

        // Remove token in session
        public function destroyToken(){
            $_SESSION["token"] = "";

            $this->message->setMessage("Logout realizado com sucesso.", "success", "login");
        }

        // Validate the token
        public function findByToken($token){
            if($token != ""){
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");
                $stmt->bindParam(":token", $token);
                $stmt->execute();

                if($stmt->rowCount() > 0){

                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);
                    return $user;
                } else{
                    return false;
                }
            } else{
                return false;
            }
        }

        // Validate the email
        public function findByEmail($email){
            if($email != ""){
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindParam(":email", $email);
                $stmt->execute();

                if($stmt->rowCount() > 0){
                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);
                    return $user;
                } else{
                    return false;
                }
            } else{
                return false;
            }
        }

        // Performs user authentication
        public function authenticateUser($email, $password){
           $user = $this->findByEmail($email);

           if($user){
               if(password_verify($password, $user->password)){
                  $token = $user->generateToken();
                  $this->setTokenToSession($token, false); 

                  $user->token = $token;
                  $this->update($user);
                  return true;
               } else{
                   return false;
               }
           } else{
               return false;
           }
        }

        // Search for id types
        public function findByIdUserType($id_user_type){
            if($id_user_type != ""){
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE id_user_type = :id_user_type");
                $stmt->bindParam(":id_user_type", $id_user_type);
                $stmt->execute();

                if($stmt->rowCount() > 0){
                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);
                    return $user;
                } else{
                    return false;
                }
            } else{
                return false;
            }
        }

        // Check session token
        public function verifyToken($protected = false){
            if(!empty($_SESSION["token"])){
                $token = $_SESSION["token"];
                $user = $this->findByToken($token);

                if($user){
                   return $user; 
                } else if($protected){ 
                    $this->message->setMessage("Sem permissão de acesso.", "error", "login");
                }
            } else if($protected){ 
                $this->message->setMessage("Sem permissão de acesso.", "error", "login");
            }
        }
    }