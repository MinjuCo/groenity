<?php
  include_once(__DIR__."/Db.php");

  class Challenge{
    private $id;
    private $title;
    private $description;
    private $goals;
    private $extraInfo;
    private $rewards;
    private $greenPoints;
    private $themaId;
    private $createdBy;
    private $isBattle;

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of goals
     */ 
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * Set the value of goals
     *
     * @return  self
     */ 
    public function setGoals($goals)
    {
        $this->goals = $goals;

        return $this;
    }

    /**
     * Get the value of extraInfo
     */ 
    public function getExtraInfo()
    {
        return $this->extraInfo;
    }

    /**
     * Set the value of extraInfo
     *
     * @return  self
     */ 
    public function setExtraInfo($extraInfo)
    {
        $this->extraInfo = $extraInfo;

        return $this;
    }

    /**
     * Get the value of rewards
     */ 
    public function getRewards()
    {
        return $this->rewards;
    }

    /**
     * Set the value of rewards
     *
     * @return  self
     */ 
    public function setRewards($rewards)
    {
        $this->rewards = $rewards;

        return $this;
    }

    /**
     * Get the value of greenPoints
     */ 
    public function getGreenPoints()
    {
        return $this->greenPoints;
    }

    /**
     * Set the value of greenPoints
     *
     * @return  self
     */ 
    public function setGreenPoints($greenPoints)
    {
        $this->greenPoints = $greenPoints;

        return $this;
    }

    /**
     * Get the value of themaId
     */ 
    public function getThemaId()
    {
        return $this->themaId;
    }

    /**
     * Set the value of themaId
     *
     * @return  self
     */ 
    public function setThemaId($themaId)
    {
        $this->themaId = $themaId;

        return $this;
    }

    /**
     * Get the value of createdBy
     */ 
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set the value of createdBy
     *
     * @return  self
     */ 
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get the value of isBattle
     */ 
    public function getIsBattle()
    {
        return $this->isBattle;
    }

    /**
     * Set the value of isBattle
     *
     * @return  self
     */ 
    public function setIsBattle($isBattle)
    {
        $this->isBattle = $isBattle;

        return $this;
    }

    public static function getChallenges(){
      $conn = Db::getConnection();
      $statement = $conn->prepare("select * from challenges");
      $statement->execute();

      $challenges = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $challenges;
    }

    public static function getUserParticipations($userId){
      $conn = Db::getConnection();
      $statement = $conn->prepare("select * from challenge_participators where user_id = :userId");
      $statement->bindValue(":userId", $userId);

      $statement->execute();

      $userParticipations = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $userParticipations;
    }

    public static function getUserActiveChallenges($userId){
      $conn = Db::getConnection();
      $statement = $conn->prepare("select * from challenge_battles where (participator_one = :userId or participator_two = :userId)");
      $statement->bindValue(":userId", $userId);

      $statement->execute();

      $userParticipations = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $userParticipations;
    }
  }