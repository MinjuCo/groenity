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

    public static function getAllChallenges(){
      $conn = Db::getConnection();
      $statement = $conn->prepare("select * from challenges");
      $statement->execute();

      $challenges = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $challenges;
    }

    public static function getUserTodoChallenges($userId){
        $conn = Db::getConnection();
        $statement = $conn->prepare("
        select * from challenges c where not exists (select challenge_id from battles b where b.challenge_id = c.id and (b.participator_one = :userId or b.participator_two = :userId) and active = 1)
         and not exists (select challenge_id from challenge_singles cs where cs.challenge_id = c.id and cs.user_id = :userId and active = 1) 
         and not exists (select challenge_id from challenge_completed cc where cc.challenge_id = c.id and cc.user_id = :userId and active = 1)
         and not exists (select challenge_id from challenge_queue cq where cq.challenge_id = c.id and cq.user_id = :userId and active = 1)
         order by created_at desc
         ");

        $statement->bindValue(":userId", $userId);

        $statement->execute();

        $challenges = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $challenges;
    }

    public static function getUserCompletedChallenge($userId){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select cc.challenge_id, title, description, goals, extra_info, rewards, green_points, thema_id, is_battle, isWinner from challenges c inner join `challenge_completed` cc on cc.challenge_id = c.id where user_id = :userId order by timestamp desc");

        $statement->bindValue(":userId", $userId);

        $statement->execute();
        $challenges = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $challenges;
    }

    public static function getUserOngoingChallenges($userId){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT challenge_id, timestamp from battles 
        where is_completed = 0 and active = 1 and (participator_one = :userId or participator_two = :userId) 
        UNION 
        select challenge_id, timestamp from challenge_singles 
        where is_completed = 0 and active = 1 and user_id = :userId 
        UNION 
        SELECT challenge_id, timestamp from challenge_queue 
        where active = 1 and user_id = :userId
        ORDER BY timestamp DESC");

        $statement->bindValue(":userId", $userId);

        $statement->execute();

        $challenges = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $challenges;
    }

    public static function userIsDoingThisChallenge($userId, $challengeId){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT challenge_id from battles 
        where is_completed = 0 and active = 1 and (participator_one = :userId or participator_two = :userId) and challenge_id = :challengeId
        UNION 
        select challenge_id from challenge_singles 
        where is_completed = 0 and active = 1 and user_id = :userId and challenge_id = :challengeId");

        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":challengeId", $challengeId);

        $statement->execute();

        if($statement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function getUserCategorizedChallenges($category,$userId){
        $conn = Db::getConnection();
        switch($category){
            case "battle":
                $statement = $conn->prepare("select challenge_id as id, title, description, green_points from battles b left join challenges c on b.challenge_id = c.id where (participator_one = :userId or participator_two = :userId) and active = 1 and is_completed = 0 group by timestamp desc");
                break;
            case "single":
                $statement = $conn->prepare("select challenge_id as id, title, description, green_points from challenge_singles cs left join challenges c on cs.challenge_id = c.id where user_id = :userId and active = 1 and is_completed = 0 group by timestamp desc");
                break;
            case "queue":
                $statement = $conn->prepare("select challenge_id as id, title, description, green_points from challenge_queue cq left join challenges c on cq.challenge_id = c.id where user_id = :userId and active = 1 group by timestamp desc");
            break;
            default:
                return false;
        }

        $statement->bindValue(":userId", $userId);

        $statement->execute();

        $challenges = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $challenges;
    }

    public function getChallengeInfo($challengeId){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from challenges where id = :challengeId");
        $statement->bindValue(":challengeId", $challengeId);

        $statement->execute();

        $challenge = $statement->fetch(PDO::FETCH_ASSOC);
        return $challenge;
    }

    public static function challengeAlreadyAccepted($userId, $challengeId, $isBattle){
        $conn = Db::getConnection();

        if($isBattle == true){
            $statement = $conn->prepare("select * from challenge_queue where user_id = :userId and challenge_id = :challengeId and active = 1");
        }else{
            $statement = $conn->prepare("select * from challenge_singles where user_id = :userId and challenge_id = :challengeId and active = 1");
        }

        $statement->bindValue(":userId", $userId);
        $statement->bindValue(":challengeId", $challengeId);

        $statement->execute();

        if($statement->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }

  }