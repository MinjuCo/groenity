<?php
include_once(__DIR__ . "/Db.php");

class User
{
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
    private $code;


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
        if (empty($firstName)) {
            throw new Exception("Gelieve een voornaam in te vullen");
        }

        $this->firstName = htmlspecialchars($firstName);

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
        if (empty($lastName)) {
            throw new Exception("Gelieve een achternaam in te vullen");
        }

        $this->lastName = htmlspecialchars($lastName);

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
        if (empty($email)) {
            throw new Exception("Gelieve een geldig e-mailadres in te vullen");
        }

        $this->email = htmlspecialchars($email);

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
        if (empty($password)) {
            throw new Exception("Gelieve een wachtwoord te kiezen");
        }

        $this->password = htmlspecialchars($password);

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
        if (empty($street)) {
            throw new Exception("Vul straat in");
        }

        $this->street = htmlspecialchars($street);

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
        if (empty($houseNumber)) {
            throw new Exception("Vul huis nummer naam in");
        }

        $this->houseNumber = htmlspecialchars($houseNumber);

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
        if (empty($zip)) {
            throw new Exception("Vul zip code in");
        }

        $this->zip = htmlspecialchars($zip);

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
        if (empty($phoneNumber)) {
            throw new Exception("Vul phonenumber in");
        }

        $this->phoneNumber = htmlspecialchars($phoneNumber);

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

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        if (empty($code)) {
            throw new Exception("Leege code");
        }
        $this->code = $code;

        return $this;
    }

    /*
        LOGIN
    */
    public function login()
    {

        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $email = $this->getEmail();

        $statement->bindValue(":email", $email);
        $statement->execute();
        
        if($statement->rowCount() > 0){
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $password = $this->getPassword();

            if (password_verify($password, $user['password'])) {
                //verified?
                if ($user['verified'] == 0) {
                    throw new Exception("Gelieve uw e-mail te activeren.");
                }
                return true;
            } else {
                throw new Exception("Er is geen account gevonden met deze gegevens. <a class='link-gn' href='../index.php'>Neem snel deel aan Gresident</a>");
            }
        }else{
            throw new Exception("Er is geen account gevonden met deze gegevens. <a class='link-gn' href='../index.php'>Neem snel deel aan Gresident</a>");
        }
    }

    /*
        REGISTER
    */
    public function saveUser()
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare("INSERT users(first_name, last_name, email, password) values (:firstname, :lastname, :email, :password)");
        
        $password = $this->protectPassword();
        
        $statement->bindValue(":firstname", $this->getFirstName());
        $statement->bindValue(":lastname", $this->getLastName());
        $statement->bindValue(":email", $this->getEmail());
        $statement->bindValue(":password", $password);

        $result = $statement->execute();
        return $result;
    }

    public function compliteRegistration($id)
    {
        try{
        $conn = Db::getConnection();

        
        $statement = $conn->prepare("INSERT user_information(user_id, street, house_number, zip) values(:user, :street, :house, :zip)");
        $statement->bindValue(":user", $id);
        $statement->bindValue(":street", $this->getStreet());
        $statement->bindValue(":house", $this->getHouseNumber());
        $statement->bindValue(":zip", $this->getZip());
        $statement->execute();
        
        $statement2 =  $conn->prepare("UPDATE users SET verified = 1 WHERE id = :user");
        $statement2->bindValue(":user", $id);
        $statement2->execute();

        header("Location: ../pages/instellingen.php");
        return true;
        } catch(Throwable $e) {
            throw new Exception("check fout");
        }
    }

    //send validation code
    public function sendValidationCode()
    {
        $conn = Db::getConnection();
        // get id
        $statement = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $statement->bindValue(":email", $this->getEmail());
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // set up validation code
        $statementCode = $conn->prepare("INSERT verification_code(verify_code, user_id) values(:code, :id)");
        
        $code = $this->randomCode();
        $statementCode->bindValue(":code", $code);
        $statementCode->bindValue(":id", $user['id']);
        $result = $statementCode->execute();

        return $result;
    }

    // create random code
    function randomCode()
    {

        $chars = "abcdefghijkmn023456789opqrstuvwxyz";
        srand((float) microtime() * 1000000);
        $i = 0;
        $code = '';

        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $code = $code . $tmp;
            $i++;
        }

        return $code;
    }
    // hash password
    public function protectPassword()
    {
        $options = [
            "cost" => 12 // 2^12
        ];
        $password = password_hash($this->getPassword(), PASSWORD_DEFAULT, $options);
        return $password;
    }
    /*
        
    */
    /* 
        VALIDATION 
    */
    // email validation
    public function emailExists()
    {
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindParam(":email", $this->email);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
    // password registration/change validation
    public function validatePassword($confirmPassword)
    {
        $password = $this->getPassword();
        $confirmPassword = htmlspecialchars($confirmPassword);

        if (strlen($password) < 8) {
            throw new Exception("Wachtwoord moet ten minste 8 karakters bevaten");
        }

        //equal
        if ($password == $confirmPassword) {
            return true;
        }else{
            throw new Exception("Wachtwoorden komen niet overeen");
        }

        
    }

    //code verification
    public function validateCode(){
        $conn = Db::getConnection();

        $statement = $conn->prepare("SELECT * FROM verification_code WHERE verify_code = :code");
        $statement->bindParam(":code", $this->code);
        $statement->execute();
        $user = $statement->fetch();
        $count = $statement->rowCount();
        if ($count > 0) {
            return $user[2];
        } else {
            throw new Exception("Wij hebben dit code helaas niet gevonden");
        }
    }

}
