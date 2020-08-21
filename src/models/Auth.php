<!-- models означава логика която работи с данни {Целта им е да проверява да записва да селектира данните} -->

<?php

class Auth
{
    //Превръщаме го във функция isUserAlreadyExists която става МАСИВ от данни $columnName за да го ползваме по-късно
    static function isUserAlreadyExists($columnName) // Това се нарича метод
    {

        //МАСИВЪТ = ще получава $стойности като [ключове]
        $userName = $columnName['user_name'];
        $userEmail = $columnName['user_email'];
        //Правим заявка да проверим дали съществува в системата
        $ValidateIfRegistrationUserAlreadyExistQuery = "SELECT * FROM tb_users WHERE name = '$userName' OR email = '$userEmail'";

        //С ДВЕ ТОЧКИ ДВЕ ТОЧКИ ВИКАМЕ ФУНКЦИЯТА ОТ КЛАСЪТ
        $requestResult       = Database::get($ValidateIfRegistrationUserAlreadyExistQuery); //Подаваме го на mysqli_fetch_assoc за да ми върне резултата

        return ($requestResult != NULL); //Проверяваме дали е различен от 0 ако е различен от нула изписваме че този user вече съществува
    }

    //Създаваме нов user в базата данни като МАСИВ //С тези функции може да създадем и Employer
    static function createNewEmployInDataBase($databaseColumn) {

        return Database::insert('tb_users', array(
            'name'      => $databaseColumn['user_name'   ],
            'fname'     => $databaseColumn['user_fname'  ],
            'lname'     => $databaseColumn['user_lname'  ],
            'age'       => $databaseColumn['user_age'    ],
            'city'      => $databaseColumn['user_city'   ],
            'number'    => $databaseColumn['user_number' ],
            'email'     => $databaseColumn['user_email'  ],
            'password'  => $databaseColumn['user_pass'   ]
        ));
    }
    // Добавяме роля на потребителя от базата данни //С тези функции може да създадем и Employer
    static function assignRoleToUser($userid, $roleId) {

        return Database::insert('tb_user__role', array(
            'user_id' => $userid,
            'role_id' => $roleId
        ));
    }

    //С тези функции може да създадем и Employer
    static function createNewEmploy($databaseColumn)
    {

        $isUserCreated = Auth::createNewEmployInDataBase($databaseColumn);


        //Добавяме роля на потребителя след регистрацията му в сайта и автентикацията
        if ($isUserCreated) {
            return Auth::assignRoleToUser(Database::getLastInsertedId(), 1);
        }
    }
// Създавам нов Employer
    static function createNewEmployerInDataBase($databaseColumn) {

        return Database::insert('tb_users', array(
            'name'        => $databaseColumn['user_name'   ],
            'category'    => $databaseColumn['user_category'  ],
            'information' => $databaseColumn['user_information'  ],
            'email'       => $databaseColumn['user_email'  ],
            'password'    => $databaseColumn['user_pass'   ]
        ));
    }
    // Добавяме роля на потребителя от базата данни //С тези функции може да създадем и Employer
    static function assignRoleToEmployer($userid, $roleId) {

        return Database::insert('tb_user__role', array(
            'user_id' => $userid,
            'role_id' => $roleId
        ));
    }

    //С тези функции може да създадем и Employer
    static function createNewEmployer($databaseColumn)
    {

        $isUserCreated = Auth::createNewEmployerInDataBase($databaseColumn);


        //Добавяме роля на потребителя след регистрацията му в сайта и автентикацията
        if ($isUserCreated) {
            return Auth::assignRoleToUser(Database::getLastInsertedId(), 2);
        }
    }

    

    //Проверяваме дали сме влезли в сесията И каква ни е ролята записана в сесията
    //Това е масив от всичките записи на tb_user__role
    static function setAuthenticatedUser($authenticatedCollectionData)
    {

        $_SESSION['user_data_collection'] = $authenticatedCollectionData['user_data_collection'];
        $_SESSION['user_role_collection'] = $authenticatedCollectionData['user_role_collection'];

        $_SESSION['is_authenticated'] = true;
    }  //Връщаме се в signIn

    // Връщаме труе ако сме се логнали
    static function isAuthenticated()
    {
        return (isset($_SESSION['is_authenticated']) ? $_SESSION['is_authenticated'] : false); //Това е новият компактен вариант без return true или return false
    }

    // Ако не е успешно логването да ни върне
    static function isNotAuthenticated()
    {
        return !Auth::isAuthenticated();
    }

    // Тук създаваме методи за автентикация според ролята 
    static function isEmploy()
    {
        return Auth::isAuthenticated() && Auth::hasRole('EMPLOY');
    }

    static function isEmployer()
    {
        return Auth::isAuthenticated() && Auth::hasRole('EMPLOYER');
    }

    static function isAdmin()
    {
        return Auth::isAuthenticated() && Auth::hasRole('ADMIN');
    }

    static function isHR()
    {
        return Auth::isAuthenticated() && Auth::hasRole('HR'); //Бонус задача да го направим като HasRole
    }


    //Унищожава сесиите който имаме при излизане
    static function signout()
    {
        session_destroy();
    }

        // Проверяваме дали има роля и каква е ролята му според title в базата данни //private изчезва от визуализирането
    // Ако не искаме този метод да се използва извън класът слагаме PRIVATE 
    // Всички PRIVATE методи се слагат най-доло в класът
    
    private static function hasRole($roleTitle) {
        
        foreach ($_SESSION['user_role_collection'] as $key => $value) {
            if($value['role_title'] == $roleTitle) return true;
        }

        return false; //Ако не намери нищо 
    }
}

