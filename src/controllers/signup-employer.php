<?php
// Да изпълним функцията на hidden бутона
if (isset($_POST['user_request_tokken']) && $_POST['user_request_tokken'] == 1) {

    //Ако имаме user_name върни ми го (?) ако го нямаме върни ми празен стринг
    $userName        = isset($_POST['user_name'])           ? $_POST['user_name'          ]  : '';
    $userCategory    = isset($_POST['user_category'])       ? $_POST['user_category'      ]  : '';
    $userInformation = isset($_POST['user_information'])    ? $_POST['user_information'   ]  : '';
    $userEmail       = isset($_POST['user_email'])          ? $_POST['user_email'         ]  : '';
    $userEmailRepeat = isset($_POST['user_email_repeat'])   ? $_POST['user_email_repeat'  ]  : '';
    $userPass        = isset($_POST['user_pass'])           ? $_POST['user_pass'          ]  : '';
    $userPassRepeat  = isset($_POST['user_pass_repeat'])    ? $_POST['user_pass_repeat'   ]  : '';

    if (strlen($userName)    < 4) {
        return setFormError('signup-employer', 'user_name', 'Minimum 4 characters');
    }   //Върни контрола и изпълни резултата на тази функция

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

    // Използваме фукнцията която създадохме в клас AUTH проверяваме дали този user може да бъде създаден с еднакво име и емаил
    if (Auth::isUserAlreadyExists(array('user_name' => $userName, 'user_email' => $userEmail))) {
        return setFormError('signup-employer', 'user_name', 'This user already exists');
    }

    
    $isUserCreated = Auth::createNewEmployer (array(
        'user_name'        => $userName,
        'user_category'    => $userCategory,
        'user_information' => $userInformation,
        'user_email'       => $userEmail,
        'user_pass'        => $userPass,
    ));

    // Тябва да оправим редиректа след като се регистрираме успешно!!!
    if($isUserCreated) {
            echo '<b class="register-success" >Employer created successfuly</b>';
        }
    }

//Хубаво е тук да имаме и логика за потвърждаване с JavaScript.
//Не трябва да имаме само JavaScript логика за потвърждаване защото тя е само локална и може да бъде спряна!
//echo визуализира само данните
//return връща данните и контрола на изпълнението на програмата