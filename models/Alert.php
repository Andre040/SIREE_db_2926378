<?php
class Alert
{

    private $dbh;
    private $Alert_id;
    private $Alert_message;
    private $Alert_date;
    private $Alert_status;

    // Sobrecarga de Constructores
    public function __construct()
    {
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

    // Constructor 4 parámetros
    public function __construct4($Alert_id, $Alert_message, $Alert_date, $Alert_status)
    {
        $this->Alert_id = $Alert_id;
        $this->Alert_message = $Alert_message;
        $this->Alert_date = $Alert_date;
        $this->Alert_status = $Alert_status;
    }

    // Métodos setter y getter

    // Alerta: Id
    public function setAlertId($Alert_id)
    {
        $this->Alert_id = $Alert_id;
    }
    public function getAlertId()
    {
        return $this->Alert_id;
    }

    // Alerta: Mensaje
    public function setAlertMessage($Alert_message)
    {
        $this->Alert_message = $Alert_message;
    }
    public function getAlertMessage()
    {
        return $this->Alert_message;
    }

    // Alerta: Fecha
    public function setAlertDate($Alert_date)
    {
        $this->Alert_date = $Alert_date;
    }
    public function getAlertDate()
    {
        return $this->Alert_date;
    }

    // Alerta: Estado
    public function setAlertStatus($Alert_status)
    {
        $this->Alert_status = $Alert_status;
    }
    public function getAlertStatus()
    {
        return $this->Alert_status;
    }

    // Métodos: Persistencia a la base de datos

    // Crear Alerta
    public function createAlert()
    {
        try {
            $sql = 'INSERT INTO ALERTS (alert_id, alert_message, alert_date, alert_status) VALUES (
                    :alert_id, :alert_message, :alert_date, :alert_status)';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('alert_id', $this->getAlertId());
            $stmt->bindValue('alert_message', $this->getAlertMessage());
            $stmt->bindValue('alert_date', $this->getAlertDate());
            $stmt->bindValue('alert_status', $this->getAlertStatus());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Obtener una alerta por ID
    public function getAlertById()
    {
        try {
            $sql = 'SELECT * FROM ALERTS WHERE alert_id = :alertId';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('alertId', $this->getAlertId());
            $stmt->execute();
            $alert = $stmt->fetch();
            if ($alert) {
                return new Alert(
                    $alert['alert_id'],
                    $alert['alert_message'],
                    $alert['alert_date'],
                    $alert['alert_status']
                );
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Actualizar una alerta
    public function updateAlert()
    {
        try {
            $sql = 'UPDATE ALERTS SET alert_message = :alert_message, alert_date = :alert_date, alert_status = :alert_status WHERE alert_id = :alert_id';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('alert_message', $this->getAlertMessage());
            $stmt->bindValue('alert_date', $this->getAlertDate());
            $stmt->bindValue('alert_status', $this->getAlertStatus());
            $stmt->bindValue('alert_id', $this->getAlertId());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Eliminar una alerta
    public function deleteAlert()
    {
        try {
            $sql = 'DELETE FROM ALERTS WHERE alert_id = :alert_id';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('alert_id', $this->getAlertId());
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>