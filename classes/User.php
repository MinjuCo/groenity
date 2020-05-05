<?php 
  include_once(__DIR__."/Db.php");

  class User{
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $street;
    private $houseNumber;
    private $zip;
    private $phoneNumber;
    private $avatar;
    private $greenPoints;
    private $role_id;
    private $verified;

    

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

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
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of street
     */ 
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */ 
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of houseNumber
     */ 
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Set the value of houseNumber
     *
     * @return  self
     */ 
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

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
     * Get the value of phoneNumber
     */ 
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */ 
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

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
     * Get the value of role_id
     */ 
    public function getRole_id()
    {
        return $this->role_id;
    }

    /**
     * Set the value of role_id
     *
     * @return  self
     */ 
    public function setRole_id($role_id)
    {
        $this->role_id = $role_id;

        return $this;
    }

    /**
     * Get the value of verified
     */ 
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set the value of verified
     *
     * @return  self
     */ 
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    
  }