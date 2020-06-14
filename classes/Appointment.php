<?php
  include_once(__DIR__."/Db.php");

  class Appointment{
    private $subject;
    private $email;
    private $message;
    private $userId;
    private $themeId;
    private $phone;
    private $expertName;
    private $completed;
    private $totalPrice;
    private $paid;
    private $active;

    

    /**
     * Get the value of subject
     */ 
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function setSubject($subject)
    {
        if (empty($subject)) {
          throw new Exception("Vul een onderwerp in.");
        }

        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        if (empty($message)) {
          throw new Exception("Gelieve een bericht achter te laten");
        }

        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of themeId
     */ 
    public function getThemeId()
    {
        return $this->themeId;
    }

    /**
     * Set the value of themeId
     *
     * @return  self
     */ 
    public function setThemeId($themeId)
    {
        $this->themeId = $themeId;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of expertName
     */ 
    public function getExpertName()
    {
        return $this->expertName;
    }

    /**
     * Set the value of expertName
     *
     * @return  self
     */ 
    public function setExpertName($expertName)
    {
        if (empty($expertName)) {
          throw new Exception("Geleive de naam van de expert in te geven");
        }
        $this->expertName = $expertName;

        return $this;
    }

    /**
     * Get the value of completed
     */ 
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * Set the value of completed
     *
     * @return  self
     */ 
    public function setCompleted($completed)
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */ 
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */ 
    public function setTotalPrice($totalPrice)
    {
        if (empty($phoneNumber)) {
          throw new Exception("Gelieve een prijs in te geven.");
        }
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get the value of paid
     */ 
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set the value of paid
     *
     * @return  self
     */ 
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    public static function getPendingAppointments($userId){
      $conn = Db::getConnection();
      $statement = $conn->prepare('select a.*, t.name as theme from appointments a left join themes t on t.id = a.theme_id where user_id = :userId and completed = 0 and a.active = 1');
      $statement->bindValue(":userId", $userId);
      $statement->execute();

      $appointments = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $appointments;
    }

    public static function getOutstandingBalance($userId){
      $conn = Db::getConnection();
      $statement = $conn->prepare('select a.*, t.name as theme from appointments a left join themes t on t.id = a.theme_id where user_id = :userId and completed = 1 and paid = false and a.active = 1');
      $statement->bindValue(":userId", $userId);
      $statement->execute();

      $appointments = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $appointments;
    }

    public static function getHistory($userId){
      $conn = Db::getConnection();
      $statement = $conn->prepare('select a.*, t.name as theme from appointments a left join themes t on t.id = a.theme_id where user_id = :userId and a.active = 1 order by timestamp desc');
      $statement->bindValue(":userId", $userId);
      $statement->execute();

      $appointments = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $appointments;
    }

    public function saveAppointment(){
      $conn = Db::getConnection();
      $statement = $conn->prepare('insert into appointments (subject, theme_id, message, email, phone, user_id) values (:subject, :themeId, :message, :email, :phone, :userId)');
      
      $userId = $this->getUserId();
      $subject = $this->getSubject();
      $themeId = $this->getThemeId();
      $message = $this->getMessage();
      $email = $this->getEmail();
      $phone = $this->getPhone();
      
      $statement->bindValue(":userId", $userId);
      $statement->bindValue(":subject", $subject);
      $statement->bindValue(":themeId", $themeId);
      $statement->bindValue(":message", $message);
      $statement->bindValue(":email", $email);
      $statement->bindValue(":phone", $phone);
      
      $result = $statement->execute();
      return $result;
    }

    public static function searchAppointment($userId, $query){
      $query = htmlspecialchars($query);
      $conn = Db::getConnection();
      $statement = $conn->prepare("select a.*, t.name as theme from appointments a left join themes t on t.id = a.theme_id where user_id = :userId and a.active = 1 and subject like '%$query%' order by timestamp desc");
      $statement->bindValue(":userId", $userId);
      $statement->execute();

      $appointments = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $appointments;
    }

    public static function removeAppointment($userId, $appointmentId){
      $conn = Db::getConnection();
      $statement = $conn->prepare("update appointments set active = 0 where user_id = :userId and id = :appointmentId and completed = 0");
      $statement->bindValue(":userId", $userId);
      $statement->bindValue(":appointmentId", $appointmentId);
      $result = $statement->execute();

      if($statement->rowCount() == 0){
        throw new Exception("Je kan deze afspraak niet verwijderen.");
      }

      return $result;
    }

  }