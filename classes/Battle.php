<?php
  include_once(__DIR__."/Challenge.php");

  class Battle extends Challenge{
    private $participatorOne;
    private $participatorTwo;
    private $startTime;
    private $endTime;
    private $isStarted;
    private $isCompleted;
    private $active;

    /**
     * Get the value of participatorTwo
     */ 
    public function getParticipatorTwo()
    {
        return $this->participatorTwo;
    }

    /**
     * Set the value of participatorTwo
     *
     * @return  self
     */ 
    public function setParticipatorTwo($participatorTwo)
    {
        $this->participatorTwo = $participatorTwo;

        return $this;
    }

    /**
     * Get the value of participatorOne
     */ 
    public function getParticipatorOne()
    {
        return $this->participatorOne;
    }

    /**
     * Set the value of participatorOne
     *
     * @return  self
     */ 
    public function setParticipatorOne($participatorOne)
    {
        $this->participatorOne = $participatorOne;

        return $this;
    }

    /**
     * Get the value of startTime
     */ 
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set the value of startTime
     *
     * @return  self
     */ 
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get the value of endTime
     */ 
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set the value of endTime
     *
     * @return  self
     */ 
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get the value of isStarted
     */ 
    public function getIsStarted()
    {
        return $this->isStarted;
    }

    /**
     * Set the value of isStarted
     *
     * @return  self
     */ 
    public function setIsStarted($isStarted)
    {
        $this->isStarted = $isStarted;

        return $this;
    }

    /**
     * Get the value of isCompleted
     */ 
    public function getIsCompleted()
    {
        return $this->isCompleted;
    }

    /**
     * Set the value of isCompleted
     *
     * @return  self
     */ 
    public function setIsCompleted($isCompleted)
    {
        $this->isCompleted = $isCompleted;

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

    public static function getUserBattleChallenge($userId, $challengeId){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from battles where challenge_id = :challengeId and (participator_one = :userId or participator_two = :userId) and active = 1");

        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":challengeId", $challengeId);

        $statement->execute();

        $battle = $statement->fetch(PDO::FETCH_ASSOC);

        return $battle;
    }

    public static function userIsInQueue($userId, $challengeId){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select challenge_id from challenge_queue where challenge_id = :challengeId and user_id = :userId and matched = 0");

        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":challengeId", $challengeId);

        $statement->execute();
        if($statement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function addUserToQueue($userId){
      $conn = Db::getConnection();
      $statement = $conn->prepare("insert into challenge_queue (user_id, challenge_id, active) values (:userId, :challengeId, 1)");

      $challengeId = $this->getId();

      $statement->bindValue(":userId", $userId);
      $statement->bindValue(":challengeId", $challengeId);

      $result = $statement->execute();
      return $result;
    }

  }