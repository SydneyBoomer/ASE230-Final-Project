<?php

function verifyPassword ($pwd) {
    
    //create password hash
    $hash = password_hash($storedPwd, PASSWORD_DEFAULT);

    //verify hash
    $isVerified = password_verify($pwd, $demoUser["password_hash"]);

    return $isVerified;
}

?>