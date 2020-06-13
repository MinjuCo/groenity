<?php
  include_once(__DIR__."/Db.php");

  class Product{
    private $name;
    private $description;
    private $price;
    private $category;
    private $isGp;
    private $isCurrency;
    private $picture;
    private $likes;
    private $active;

    

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
        if(empty($name)){
          throw new Exception("Gelieve productnaam in te geven.");
        }
        $this->name = $name;

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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        if(is_nan($price)){
          throw new Exception("Gelieve een getal in te geven.");
        }
        $this->price = $price;

        return $this;
    }
    

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        if(empty($category)){
          throw new Exception("Gelieve categorie in te geven.");
        }

        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of isGp
     */ 
    public function getIsGp()
    {
        return $this->isGp;
    }

    /**
     * Set the value of isGp
     *
     * @return  self
     */ 
    public function setIsGp($isGp)
    {
        $this->isGp = $isGp;

        return $this;
    }

    /**
     * Get the value of isCurrency
     */ 
    public function getIsCurrency()
    {
        return $this->isCurrency;
    }

    /**
     * Set the value of isCurrency
     *
     * @return  self
     */ 
    public function setIsCurrency($isCurrency)
    {
        $this->isCurrency = $isCurrency;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of likes
     */ 
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set the value of likes
     *
     * @return  self
     */ 
    public function setLikes($likes)
    {
        $this->likes = $likes;

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

    public static function getProducts($category){
      $conn = Db::getConnection();
      switch($category){
        case 'all':
          $statement = $conn->prepare("select * from products where active = 1");
          break;
        case 'gadgets':
          $statement = $conn->prepare("select * from products where category = 'gadgets' and active = 1");
          break;
        case 'clothes':
          $statement = $conn->prepare("select * from products where category = 'clothes' and active = 1");
          break;
        case 'projects':
          $statement = $conn->prepare("select * from products where category = 'projects' and active = 1");
          break;
        default:
          throw new Exception("Deze categorie bestaat niet.");
          break;
      }
      
      $statement->execute();

      $products = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $products;
    }
  }