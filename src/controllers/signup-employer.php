<?php
if (isset($_POST['user_request_tokken']) && $_POST['user_request_tokken'] == 1) {
    $userName        = isset($_POST['user_name'])           ? $_POST['user_name'] : '';
    $userCategory    = isset($_POST['user_category'])       ? $_POST['user_category'] : '';
    $userInformation = isset($_POST['user_information'])    ? $_POST['user_information'] : '';
    $userEmail       = isset($_POST['user_email'])          ? $_POST['user_email'] : '';
    $userEmailRepeat = isset($_POST['user_email_repeat'])   ? $_POST['user_email_repeat'] : '';
    $userPass        = isset($_POST['user_pass'])           ? $_POST['user_pass'] : '';
    $userPassRepeat  = isset($_POST['user_pass_repeat'])    ? $_POST['user_pass_repeat'] : '';

    if (strlen($userName)    < 4) {
        return setFormError('signup-employer', 'user_name', 'Minimum 4 characters');
    }

    if (strlen($userCategory)   < 3) {
        return setFormError('signup-employer', 'user_category', 'Minimum 3 characters');
    }

    if (strlen($userInformation)   < 5) {
        return setFormError('signup-employer', 'user_information', 'Minimum 5 characters');
    }

    if (strlen($userEmail)   < 5) {
        return setFormError('signup-employer', 'user_email', 'Minimum 5 characters');
    }

    if ($userEmail != $userEmailRepeat) {
        return setFormError('signup-employer', 'user_email', 'E-mail don\'t match');
    }

    if ($userPass != $userPassRepeat) {
        return setFormError('signup-employer', 'user_pass', 'Password don\'t match');
    }

    if (Auth::isUserAlreadyExists(array('user_name' => $userName, 'user_email' => $userEmail))) {
        return setFormError('signup-employer', 'user_name', 'This user already exists');
    }

    $isUserCreated = Auth::createNewEmployer(array(
        'user_name'        => $userName,
        'user_category'    => $userCategory,
        'user_information' => $userInformation,
        'user_email'       => $userEmail,
        'user_pass'        => $userPass,
    ));
    if ($isUserCreated) {
        redirectTo('signin');
    }
} 