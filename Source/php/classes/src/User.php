<?php

class user extends Connection
{
    private $id;
    private $fullname;
    private $email;
    private $password;
    private $country;
    private $xp;
    private $lv;
    private $Image;
    function __construct($_id = "", $_fullname = "", $_email = "", $_password = "", $_country = "", $_xp = "0,0", $_lv = 0, $_Image = "default.png")
    {
        $this->id = $_id;
        $this->fullname = $_fullname;
        $this->email = $_email;
        $this->password = $_password;
        $this->country = $_country;
        $this->xp = $_xp;
        $this->lv = $_lv;
        $this->Image = $_Image;
    }
    function ExitUser(): bool
    {
        $select = "select * from users where email=:email && password=:password";
        $res = $this->getConnection()->prepare($select);
        $res->execute(["email" => $this->email, "password" => $this->password]);
        $resfin = $res->fetchObject();
        if ($res->rowCount() > 0) {
            foreach ($resfin as $key => $value)
                $_SESSION["user"][$key] = $value;
            $_SESSION['login']=true;
            return true;
        }
        return false;
    }
    function searchUser():bool
    {
        $select = "select * from users where email=:email";
        $res = $this->getConnection()->prepare($select);
        $res->execute(["email" => $this->email]);
        $resfin = $res->fetchObject();
            if ($res->rowCount() > 0) {
                $this->Image= $resfin->Image;
                $this->fullname= $resfin->fullname;
                $this->id= $resfin->id;
                return true;
            }
        return false;
    }
    function searchUser_id():bool
    {
        $select = "select * from users where id=:id";
        $res = $this->getConnection()->prepare($select);
        $res->execute(["id" => $this->id]);
        $resfin = $res->fetchObject();
            if ($res->rowCount() > 0) {
                $this->email=$resfin->email;
                $this->Image= $resfin->Image;
                $this->fullname= $resfin->fullname;
                $this->country= $resfin->country;
                $this->xp= $resfin->xp;
                $this->password= $resfin->password;
                $this->lv= $resfin->level;
                return true;
            }
        return false;
    }
    function AddUser(): bool
    {
        $u = [
            "fullname" => $this->fullname,
            "email" => $this->email,
            "password" => $this->password,
            "country" => $this->country,
            "xp" => $this->xp,
            "level" => $this->lv,
            "Image" => $this->Image
        ];
        $select = "select * from users where email=:email";
        $insert = "insert into `users`(fullname,email,password,country,xp,level,Image)values(:fullname,:email,:password,:country,:xp,:level,:Image)";
        $res = $this->getConnection()->prepare($select);
        $res->execute(["email" => $this->email]);
        $resfin = $res->fetchObject();
        if ($res->rowCount() == 0) {
            $res = $this->getConnection()->prepare($insert);
            if ($res->execute($u)) {
                $res = $this->getConnection()->prepare($select);
                $res->execute(["email" => $this->email]);
                $resfin = $res->fetchObject();
                foreach ($resfin as $key => $value)
                    $_SESSION["user"][$key] = $value;
                $_SESSION['login']=true;
                
                return true;
            }
        }
        return false;
    }

    function UpdateUser():bool
    {
        $u = [
            "fullname" => $this->fullname,
            "email" => $this->email,
            "password" => $this->password,
            "country" => $this->country,
            "xp" => $this->xp,
            "level" => $this->lv,
            "Image" => $this->Image,
            "id"=>$this->id
        ];
        $update="update `users` set fullname=:fullname,email=:email,password=:password,country=:country,xp=:xp,level=:level,Image=:Image where id=:id";
        $res=$this->getConnection()->prepare($update);
        if($res->execute($u))
            return true;
        return false;
    }
    function filter(): void
    {
        foreach ($this as $value) {
            $value = trim($value);
            $value = strip_tags($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);
        }
    }
    function getId()
    {
        return $this->id;
    }
    function getFullName()
    {
        return $this->fullname;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getPassword()
    {
        return $this->password;
    }
    function getCountry()
    {
        return $this->country;
    }
    function getXp()
    {
        return $this->xp;
    }
    function getLv()
    {
        return $this->lv;
    }
    function getImage()
    {
        return $this->Image;
    }
    function setFullName($fn)
    {
        $this->fullname = $fn;
    }
    function setEmail($em)
    {
        $this->email = $em;
    }
    function setPassword($pass)
    {
        $this->password = $pass;
    }
    function setCountry($cnt)
    {
        $this->country = $cnt;
    }
    function setXp($x)
    {
        $this->xp = $x;
    }
    function setLv($lvl)
    {
        $this->lv = $lvl;
    }
    function setImage($img)
    {
        $this->Image = $img;
    }
    function setId($id)
    {
        $this->id = $id;
    }
}
