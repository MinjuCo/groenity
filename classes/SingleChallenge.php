<?php
  include_once(__DIR__."/Challenge.php");

  class SingleChallenge extends Challenge{
    private $userId;
    private $active;
    private $challengeId;

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

    public function acceptChallenge($userId){
        $challengeId = $this->getChallengeId();

        if(Challenge::challengeAlreadyAccepted($userId, $challengeId, false)){
            throw new Exception("Je hebt al deelgenomen aan deze uitdaging.");
        }

        $conn = Db::getConnection();
        $statement = $conn->prepare("insert into `challenge_singles` (user_id, challenge_id, active) values (:userId, :challengeId, 1)");
  
        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":challengeId", $challengeId);
  
        $result = $statement->execute();
        return $result;
        
    }

    public static function setChallengeToComplete($userId, $challengeId){
        $conn = Db::getConnection();

        $statement = $conn->prepare("update `challenge_singles` set is_completed = 1 where user_id = :userId and challenge_id = :challengeId");
        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":challengeId", $challengeId);

        $result = $statement->execute();
        return $result;
    }

    public static function completeChallenge($userId, $challengeId){
        SingleChallenge::setChallengeToComplete($userId, $challengeId);
        Challenge::saveSingleCompleted($userId, $challengeId);
        if(SingleChallenge::setChallengeToComplete($userId, $challengeId) && Challenge::saveSingleCompleted($userId, $challengeId)){
            return true;
        }else{
            throw new Exception("Niet gelukt");
        }
    }

    /**
     * Get the value of challengeId
     */ 
    public function getChallengeId()
    {
        return $this->challengeId;
    }

    /**
     * Set the value of challengeId
     *
     * @return  self
     */ 
    public function setChallengeId($challengeId)
    {
        $this->challengeId = $challengeId;

        return $this;
    }
  }