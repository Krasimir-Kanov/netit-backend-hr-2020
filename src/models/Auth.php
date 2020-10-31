<?php
class Auth {
       static function isUserAlreadyExists($columnName) {
        $userName  = $columnName['user_name'];
        $userEmail = $columnName['user_email'];

        $ValidateIfRegistrationUserAlreadyExistQuery = "SELECT * FROM tb_users WHERE name = '$userName' OR email = '$userEmail'";
        $requestResult = Database::get($ValidateIfRegistrationUserAlreadyExistQuery);
        return ($requestResult != NULL); }

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
        )); }

    static function assignRoleToUser($userid, $roleId) {
        return Database::insert('tb_user__role', array(
            'user_id' => $userid,
            'role_id' => $roleId
        )); }

    static function createNewEmploy($databaseColumn) {
        $isUserCreated = Auth::createNewEmployInDataBase($databaseColumn);
        if ($isUserCreated) {
            return Auth::assignRoleToUser(Database::getLastInsertedId(), 1); } }

    static function createNewEmployerInDataBase($databaseColumn) {
        return Database::insert('tb_users', array(
            'name'        => $databaseColumn['user_name'   ],
            'category'    => $databaseColumn['user_category'  ],
            'information' => $databaseColumn['user_information'  ],
            'email'       => $databaseColumn['user_email'  ],
            'password'    => $databaseColumn['user_pass'   ]
        )); }

    static function assignRoleToEmployer($userid, $roleId) {
        return Database::insert('tb_user__role', array(
            'user_id' => $userid,
            'role_id' => $roleId
        )); }

    static function createNewEmployer($databaseColumn) {
        $isUserCreated = Auth::createNewEmployerInDataBase($databaseColumn);
        if ($isUserCreated) {
            return Auth::assignRoleToUser(Database::getLastInsertedId(), 2); } }

    static function setAuthenticatedUser($authenticatedCollectionData) {
        $_SESSION['user_data_collection'] = $authenticatedCollectionData['user_data_collection'];
        $_SESSION['user_role_collection'] = $authenticatedCollectionData['user_role_collection'];
        $_SESSION['is_authenticated'] = true; }

    static function isAuthenticated() {
        return (isset($_SESSION['is_authenticated']) ? $_SESSION['is_authenticated'] : false); }

    static function isNotAuthenticated() {
        return !Auth::isAuthenticated(); }

    static function isEmploy(){
        return Auth::isAuthenticated() && Auth::hasRole('EMPLOY'); }

    static function isEmployer() {
        return Auth::isAuthenticated() && Auth::hasRole('EMPLOYER'); }

    static function isAdmin() {
        return Auth::isAuthenticated() && Auth::hasRole('ADMIN'); }

    static function isHR() {
        return Auth::isAuthenticated() && Auth::hasRole('HR'); }

    static function signout() {
        session_destroy(); }

    private static function hasRole($roleTitle) {        
        foreach ($_SESSION['user_role_collection'] as $key => $value) {
        if($value['role_title'] == $roleTitle) return true; }
        return false; }
}