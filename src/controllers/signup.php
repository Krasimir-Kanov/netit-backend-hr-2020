<?php
if (isset($_POST['user_request_tokken']) && $_POST['user_request_tokken'] == 1) {
    $userName        = isset($_POST['user_name'])         ? $_POST['user_name'] : '';
    $userFname       = isset($_POST['user_fname'])        ? $_POST['user_fname'] : '';
    $userLname       = isset($_POST['user_lname'])        ? $_POST['user_lname'] : '';
    $userAge         = isset($_POST['user_age'])          ? $_POST['user_age'] : '';
    $userCity        = isset($_POST['user_city'])         ? $_POST['user_city'] : '';
    $userNumber      = isset($_POST['user_number'])       ? $_POST['user_number'] : '';
    $userEmail       = isset($_POST['user_email'])        ? $_POST['user_email'] : '';
    $userEmailRepeat = isset($_POST['user_email_repeat']) ? $_POST['user_email_repeat'] : '';
    $userPass        = isset($_POST['user_pass'])         ? $_POST['user_pass'] : '';
    $userPassRepeat  = isset($_POST['user_pass_repeat'])  ? $_POST['user_pass_repeat'] : '';

    if (strlen($userName)    < 4) {
        return setFormError('signup', 'user_name', 'At least 4 characters required');
    }

    if (strlen($userFname)   < 3) {
        return setFormError('signup', 'user_fname', 'At least 3 characters required');
    }

    if (strlen($userLname)   < 3) {
        return setFormError('signup', 'user_lname', 'At least 3 characters required');
    }

    if ($userAge == NULL) {
        return setFormError('signup', 'user_age', 'You need to fill the age form');
    }

    if (strlen($userCity)   < 1) {
        return setFormError('signup', 'user_city', 'At least 1 character is required');
    }

    if (strlen($userNumber)   < 5) {
        return setFormError('signup', 'user_number', 'Incorrect Number');
    }

    if (strlen($userEmail)   < 5) {
        return setFormError('signup', 'user_email', 'Atleast 5 characters is required');
    }

    if ($userEmail != $userEmailRepeat) {
        return setFormError('signup', 'user_email', 'E-mail don\'t match');
    }

    if ($userPass != $userPassRepeat) {
        return setFormError('signup', 'user_pass', 'Password don\'t match');
    }

    if (Auth::isUserAlreadyExists(array('user_name' => $userName, 'user_email' => $userEmail))) {
        return setFormError('signup', 'user_name', 'This user already exists');
    }

    $isUserCreated = Auth::createNewEmploy(array(
        'user_name'  => $userName,
        'user_fname' => $userFname,
        'user_lname' => $userLname,
        'user_age'   => $userAge,
        'user_city'  => $userCity,
        'user_number' => $userNumber,
        'user_email' => $userEmail,
        'user_pass'  => $userPass,
    ));
    if ($isUserCreated) {
        redirectTo('signin');
    }
} 