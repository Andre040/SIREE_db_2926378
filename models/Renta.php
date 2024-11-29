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
        public function getDateRefund(){
            return $this->rent_date_refund;
        }
        # Renta: Estado        
        public function setRentStatus($rent_status){
            $this->rent_status = $rent_status;
        }
        public function getRentStatus(){
            return $this->rent_status;
        }
    }