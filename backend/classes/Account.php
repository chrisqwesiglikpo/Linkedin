<?php
include_once 'User.php';
class Account extends User{
    protected $con;
    protected $hashed_password;
    public $password;
    private $errorArray=array();

    public function __construct(){
      $this->con = Database::instance();
    }
    public function login($un,$pw){
        $password_hash=$this->getHashPasswordByName($un);
        $stmt=$this->con->prepare("SELECT * FROM `users` WHERE (`username`=:un AND `password`=:pwd) OR (`email`=:em AND `password`=:pwd)");
        $stmt->bindParam(":un",$un,PDO::PARAM_STR);
        $stmt->bindParam(":em",$un,PDO::PARAM_STR);
        $stmt->bindParam(":pwd",$password_hash,PDO::PARAM_STR);
        $stmt->execute();
        
        $count=$stmt->rowCount();

        if($count != 0){
          if(password_verify($pw,$password_hash)){
             return true;
          }else{
            array_push($this->errorArray,Constants::$loginPasswordFailed);
            return false;
          }
        }else{
            array_push($this->errorArray,Constants::$loginUsernameFailed);
            return false;
        }
    }
   
    protected function set_hashed_password(){
        $this->hashed_password=password_hash($this->password,PASSWORD_BCRYPT,['cost'=>10]);
    }
    public function verify_password($password){
        return password_verify($password,$this->hashed_password);
    }

    private function getHashPasswordByName($un){
        $stmt=$this->con->prepare("SELECT password FROM `users` WHERE `username`=:un OR `email`=:em");
        $stmt->bindParam(":un",$un,PDO::PARAM_STR);
        $stmt->bindParam(":em",$un,PDO::PARAM_STR);
        $stmt->execute();
        $user=$stmt->fetch(PDO::FETCH_OBJ);
        $count=$stmt->rowCount();
        if($count != 0){
            $password_hash=$user->password;
            return $password_hash;
        }else{
            return false;
        }
    }

    public function register($fn,$ln,$un,$em,$pw,$pw2){
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmail($em);
        $this->validatePasswords($pw,$pw2);

        if(empty($this->errorArray)){
           return $this->insertUserDetails($fn,$ln,$un,$em,$pw);
        }else{
            return false;
        }
    }
    public function insertUserDetails($fn,$ln,$un,$em,$pw){
        $pw=password_hash($pw,PASSWORD_BCRYPT,['cost'=>10]);
        $rand=rand(0,2);
        if($rand==0){
            $profilePic="frontend/assets/images/defaultPic.png";
            $profileCov="frontend/assets/images/coverPic.svg";
        }else if($rand==1){
            $profilePic="frontend/assets/images/profileDefaultPic.svg";
            $profileCov="frontend/assets/images/coverPic.svg";
        }else if($rand==2){
            $profilePic="frontend/assets/images/default.svg";
            $profileCov="frontend/assets/images/backgroundImage.svg";
        }
        $query=$this->con->prepare("INSERT INTO users (firstName,lastName,email,password,profilePic,profileCover,username)
                                 VALUES(:fn,:ln,:em,:pw,:pic,:cover,:un)");
        $query->bindParam(":fn",$fn,PDO::PARAM_STR);
        $query->bindParam(":ln",$ln,PDO::PARAM_STR);
        $query->bindParam(":un",$un,PDO::PARAM_STR);
        $query->bindParam(":em",$em,PDO::PARAM_STR);
        $query->bindParam(":pw",$pw,PDO::PARAM_STR);
        // $query->bindParam(":screenName",$un,PDO::PARAM_STR);
        $query->bindParam(":pic",$profilePic,PDO::PARAM_STR);
        $query->bindParam(":cover",$profileCov,PDO::PARAM_STR);

       return $query->execute();
    }
    private function validateFirstName($fn){
       if(strlen($fn) >25 || strlen($fn) <3){
           array_push($this->errorArray,Constants::$firstNameCharacters);
           return;
       }
    }
    private function validateLastName($ln){
        if(strlen($ln) >25 || strlen($ln) <3){
           return array_push($this->errorArray,Constants::$lastNameCharacters);
        }
     }

     private function validateEmail($em){
        $stmt=$this->con->prepare("SELECT `email` FROM `users` WHERE `email`=:email");
        $stmt->bindParam(":email",$em,PDO::PARAM_STR);
        $stmt->execute();

        $count=$stmt->rowCount();
        if($count != 0){
            return array_push($this->errorArray,Constants::$emailTaken);
        }
        if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
            return array_push($this->errorArray,Constants::$emailInvalid);
        }
     }
    
     private function validatePasswords($pw,$pw2){
         if($pw != $pw2){
            return array_push($this->errorArray,Constants::$passwordsDoNotMatch);
         }

         if(preg_match("/[^A-Za-z0-9]/",$pw)){
            return array_push($this->errorArray,Constants::$passwordNotAlphanumeric);
         }

         if(strlen($pw) >30 || strlen($pw) <5){
            return array_push($this->errorArray,Constants::$passwordLength);
         }
     }
    public function getError($error){
        if(in_array($error,$this->errorArray)){
            return "<span class='error'>$error</span>";
        }
    }
    private function checkUsernameExists($un){
      $stmt=$this->con->prepare("SELECT `username` FROM `users` WHERE `username`=:username");
      $stmt->bindParam(":username",$un,PDO::PARAM_STR);
      $stmt->execute();

      $count=$stmt->rowCount();
      if($count >0){
          return true;
      }else{
          return false;
      }
    }
    public function formSanitizer($data){
		$data=htmlspecialchars($data);
		$data=trim($data);
		$data=stripcslashes($data);
		return $data;

	}
    public function getUserId($name){
        $stmt=$this->con->prepare("SELECT `user_id` FROM `users` WHERE `email`=:em OR `username`=:un");
        $stmt->bindParam(":em",$name,PDO::PARAM_STR);
        $stmt->bindParam(":un",$name,PDO::PARAM_STR);
        $stmt->execute();
        $user=$stmt->fetch(PDO::FETCH_OBJ);
        $count=$stmt->rowCount();
        if($count != 0){
            return $user->user_id;
        }else{
            return false;
        }
    }
    public function getCareers(){
        $stmt=$this->con->prepare("SELECT * FROM `careers` ORDER BY category ASC");
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $cat){
           echo '<option value="'.$cat->id.'">'.$cat->category.'</option>';
        }
    }
    public function generateUsername($fn,$ln){
        if(!empty($fn) && !empty($ln)){
            if(!in_array(Constants::$firstNameCharacters,$this->errorArray) && !in_array(Constants::$lastNameCharacters,$this->errorArray)){
                $username=strtolower($fn."".$ln);
                if($this->checkUsernameExists($username)){
                    $screenRand=rand();
                    $userLink=''.$username.''.$screenRand.'';
                }else{
                    $userLink=$username;
                }
                return $userLink;
            }
        }
    }
}

?>