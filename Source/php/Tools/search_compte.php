<?php
include "../classes/autoload.php";
if (isset($_POST['email'])) {
    $u=new user();
    $u->setEmail($_POST['email']);
    if($u->searchUser()){
    echo '
    <div class="d-flex flex-row" id="content_result" style="height:40px;overflow:hidden;">
        <div class="h-100">
            <img src="../Images/users/'.$u->getImage().'" alt="Image user" style="background-size:cover;width:40px;" class="h-100">
        </div>
        <div class="h-100 ps-2 pt-2" style="line-height: 2px;font-size:1rem;">
        <input type="hidden" id="id_user" value="'.$u->getId().'" name="id_user">
            <p id="email_user">' .$u->getEmail() . '</p>
            <p style="color:#6c757d;font-size:0.8rem;" id="name_user" >'.$u->getFullName().'</p>
        </div>
    </div>';
    }
    else
        echo '';
}
