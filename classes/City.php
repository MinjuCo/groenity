<?php 
  include_once(__DIR__ . "/Db.php");

  class City{
    private $zip;
    private $name;
    private $country;
    private $population;
    private $greenPoints;

    /**
     * Get the value of zip
     */ 
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set the value of zip
     *
     * @return  self
     */ 
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of population
     */ 
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set the value of population
     *
     * @return  self
     */ 
    public function setPopulation($population)
    {
        $this->population = $population;

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

    public static function getInfoByName($cityName){
      $conn = Db::getConnection();
      $statement = $conn->prepare("select * from cities where name = :cityName");
      $statement->bindValue(":cityName", $cityName);
      $statement->execute();

      $city = $statement->fetch(PDO::FETCH_ASSOC);

      return $city;
    }
  }