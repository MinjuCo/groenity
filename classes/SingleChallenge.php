<?php
  include_once(__DIR__."/Challenge.php");

  class SingleChallenge extends Challenge{
    private $userId;
    private $active;

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

    public function addUserToSingle(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into challenge_singles (user_id, challenge_id, active) values (:userId, :challengeId, 1)");
  
        $challengeId = $this->getId();
        $userId = $this->getUserId();
  
        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":challengeId", $challengeId);
  
        $result = $statement->execute();
        return $result;
        
    }
  }