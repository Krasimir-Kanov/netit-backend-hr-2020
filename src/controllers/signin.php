<!-- Целта на контролерите е да подава данни -->
<?php

if (isset($_POST['user_request_tokken']) && $_POST['user_request_tokken'] == 1) {

    $userEmail    = $_POST['user_email'];
    $userPassword = $_POST['user_pass'];

    $checkIfUserExistsQuery = "SELECT * FROM tb_users WHERE email ='$userEmail' AND password = '$userPassword'";

    $userRecord = Database::get($checkIfUserExistsQuery); //mysqli_fetch_assoc - ВРЪЩА САМО 1 ЗАПИС НЕ ЦЯЛАТА ТАБЛИЦА (СЛЕДВАЩИЯ)

    if ($userRecord) {

        $userRoleId = $userRecord['id'];
        $getUserRoleCollectionQuery = "SELECT b.title AS role_title FROM tb_user__role AS a,
                                       tm_roles AS b
                                       WHERE user_id = $userRoleId AND a.role_id = b.id"; // Тук връщаме ролята като title //Employ // Admin

        $UserRoleCollection = Database::getAll($getUserRoleCollectionQuery); //$UserRoleCollection Ни е масивът от роли!

        Auth::setAuthenticatedUser(array(
            'user_data_collection' => $userRecord,
            'user_role_collection' => $UserRoleCollection
        )); //Взимаме тези данни от Auth:: Класът
            
        if(Auth::isAdmin()) {
            redirectTo('admin');
        }
                
        if(Auth::isEmploy()) {
            redirectTo('jobs');
        }
        
        if(Auth::isEmployer()) {
            redirectTo('employer');
        }

        if(Auth::isHR()) {
            redirectTo('HR');
        }
    }

    return setFormError(
        "signin",
        "user_pass",
        "Wrong E-mail or Password"
    );
}
