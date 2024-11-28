<?php
    // Nombra la clase
    class Rent {
        
        // Atributos
        private $dbh;
        private $rent_id;
        private $rent_date;
        private $rent_date_refund;
        private $rent_status;
         // Sobrecarga de Constructores
         public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
         # Constructor 04 parámetros
         public function __construct4($rent_id,$rent_date,$rent_date_refund,$rent_status){
            $this->rent_id = $rent_id;            
            $this->rent_date = $rent_date;            
            $this->rent_date_refund = $rent_date_refund;            
            $this->rent_status = $rent_status;  
         }
         // Métodos setter y getter
        
        # Renta: Id
        public function setRentId($rent_id){
            $this->rent_id = $rent_id;
        }
        public function getRentId(){
            return $this->rent_id;
        }
        # Renta: Fecha         
        public function setRentDate($rent_date){
            $this->rent_date =$rent_date = $rent_date;
        }
        public function getRentDate(){
            return $this->rent_date;
        }
        # Renta: Fecha devolucion         
        public function setRentDateRefund($rent_date_refund){
            $this->rent_date_refund = $rent_date_refund;
        }
        public function getUserEmail(){
            return $this->rent_date_refund;
        }
        # Renta: Estado        
        public function setRentStatus($rent_status){
            $this->rent_status = $rent_status;
        }
        public function getUserPassword(){
            return $this->rent_status;
        }
               # Login
               public function login(){
                try {
                    $sql = 'SELECT * FROM USERS
                            WHERE user_email = :userEmail AND user_pass = :userPass';
                    $stmt = $this->dbh->prepare($sql);
                    $stmt->bindValue('userEmail', $this->getUserEmail());
                    $stmt->bindValue('userPass', sha1($this->getUserPassword()));
                    $stmt->execute();
                    $userDb = $stmt->fetch();
                    if ($userDb) {
                        $user = new User(
                            $userDb['rol_code'],                    
                            $userDb['user_code'],
                            $userDb['user_name'],
                            $userDb['user_lastname'],
                            $userDb['user_id'],
                            $userDb['user_email'],
                            $userDb['user_pass'],
                            $userDb['user_state']
                        );
                        return $user;
                    } else {
                        return false;
                    }
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
            
    
            # CU09 - Crear Usuario
            public function user_create(){
                try {
                    $sql = 'INSERT INTO SOCIOS VALUES (
                            :socio_id,
                            :socio_nombre,
                            :socio_direccion,
                            :socio_categoria,
                            :socio_telefono,
                            :socio_pass,
                            :socio_estado
                        )';
                    $stmt = $this->dbh->prepare($sql);          
                    $stmt->bindValue('socio_categoria', $this->getUserEmail());                
                    $stmt->bindValue('socio_pass', $this->getUserPassword());                 
                    $stmt->execute();
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
    
        }
    
    ?>
        
    
  