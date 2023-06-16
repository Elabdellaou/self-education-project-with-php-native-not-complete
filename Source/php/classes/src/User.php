<?php

class user extends Connection
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $country;
    private $xp;
    private $lv;
    private $image;
    function __construct($_id = "", $_fullname = "", $_email = "", $_password = "", $_country = "", $_xp = "0,0", $_lv = 0, $_image = "default.png")
    {
        $this->id = $_id;
        $this->name = $_fullname;
        $this->email = $_email;
        $this->password = $_password;
        $this->country = $_country;
        $this->xp = $_xp;
        $this->lv = $_lv;
        $this->image = $_image;
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
                $this->image= $resfin->image;
                $this->name= $resfin->name;
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
                $this->image= $resfin->image;
                $this->name= $resfin->name;
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
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "country" => $this->country,
            "xp" => $this->xp,
            "level" => $this->lv,
            "image" => $this->image
        ];
        $select = "select * from users where email=:email";
        $insert = "insert into `users`(name,email,password,country,xp,level,image)values(:name,:email,:password,:country,:xp,:level,:image)";
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
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "country" => $this->country,
            "xp" => $this->xp,
            "level" => $this->lv,
            "image" => $this->image,
            "id"=>$this->id
        ];
        $update="update `users` set name=:name,email=:email,password=:password,country=:country,xp=:xp,level=:level,image=:image where id=:id";
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
        return $this->name;
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
        return $this->image;
    }
    function setFullName($fn)
    {
        $this->name = $fn;
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
    function setimage($img)
    {
        $this->image = $img;
    }
    function setId($id)
    {
        $this->id = $id;
    }
}
