<?php
// КЛАСЪТ Е КАТО КЛАС ОТ УЧЕНИЦИ А ФУНКЦИИТЕ СА НЕГОВИТЕ УЧЕНИЦИ И ИЗПЪЛНЯВА ВСИЧКИ ФУНКЦИИ БЕЗ ДА ПРАВИ ПРОБЛЕМ
// КАТО КОНТЕЙНЕР ЗА ФУНКЦИИ ВСИЧКИ ФУНКЦИИ МОЖЕМ ДА ГИ ДОСТЪПИМ ЧРЕЗ ИМЕТО НА КЛАСЪТ
class Database
{

    //Можем да добавяме и глобални променливи
    static $dbConnection = NULL;

    //Учениците на класът Database трябва да са static функция
    static function dbConnect()
    {
        if (Database::$dbConnection == NULL) {
            Database::$dbConnection = mysqli_connect("localhost", "root", "", "kkanov");
        }
        // Създаваме и пазим сесията на mysqli_connect
        return  Database::$dbConnection;
    }

    // SELECT * FROM tb_job_offer // Селектираме всичко от таблицата 
    static function query($query)
    {

        // Свързваме се с базата данни
        $connection = Database::dbConnect();

        // Ако свързването не е успешно да изпише грешка
        if (!$connection) {
            echo mysqli_connect_error();
            return;
        }

        //Изпълняваме заявката ако всичко е преминало успешно
        $databaseResult = mysqli_query($connection, $query);

        //Ако има грешка в резултата при свързването да покаже грешка
        if (!$databaseResult) {
            echo '<div class="db-error">';
            echo mysqli_error($connection);
            echo '</div>';
        }

        return $databaseResult;
    }

    //Функция да получаваме последното добавено ID
    static function getLastInsertedId()
    {
        return mysqli_insert_id(Database::dbConnect());
    }


    static function get($databaseQuery)  // 0.Тук взимаме само един резултат от базата данни а с GETALL по-долу взимаме всички резултати
    {
        $databaseResultSet = Database::query($databaseQuery);
        return mysqli_fetch_assoc($databaseResultSet);
    }

    //Взимаме всички роли чрез цикъл
    static function getAll($databaseQuery)
    {
        $resultCollection = array();                           // 1.Създаваме празен масив
        $databaseResultSet = Database::query($databaseQuery);  // 2.Взимаме резултата който е КУРСОР {SELECT} САМО 1 РЕЗУЛТАТ my_sql_fetch само по 1 резултат връща
        while ($result = mysqli_fetch_assoc($databaseResultSet)) { //3.$databaseResultSet върти докато имаме записи и накрая го връща като резултат
            array_push($resultCollection, $result);            //4.Push-ваме го в нов масив
        }

        return $resultCollection;                             //5.Накрая го връща като резултат масив с няколко резултата
    }

    // Тази функция е добре ако искаме да изпълним Query и веднага след това fetch_assoc
    static function fetch($databaseResultSet)
    {
        return mysqli_fetch_assoc($databaseResultSet);
    }

    //Функция да брой всички итеми в избраната таблица
    static function count($tableName) {   
        $databaseQuery = "SELECT COUNT(*) AS count FROM $tableName";
        return Database::get($databaseQuery)['count'];
    }
    
    //Получава като входни данни (името на таблицата и масив където ключовете ще са имената на колонките)
    static function insert($tableName, $columnCollection) {
   
        $queryBuilder = "INSERT INTO $tableName (";
        foreach ($columnCollection as $key => $value) {
            $queryBuilder .= $key . ',';
        } // До тук добавяме само нови и нови данни
        $queryBuilder = substr_replace($queryBuilder, ")", strlen($queryBuilder) - 1); //Заменяме последната запетая с ")" като започваме от края
        $queryBuilder .= ' VALUES('; //Продължаваме кодът с разстояние и точката!
        
        //Тук сменяме $key с $value (Key е всъщност нашите данни като username,lname,city а value е стойност която вкарваме чрез автентикацията)
        foreach ($columnCollection as $key => $value) {
            $queryBuilder .= '\'' . $value . '\',';
        }//Слагаме наклонените черти за да добавим задължителните кавички за $value
        $queryBuilder = substr_replace($queryBuilder, ")", strlen($queryBuilder) - 1); // Слагаме -1 за да няма последна запетая
        
        return Database::query($queryBuilder);
    }
    
    //Да обновим информацията в дадена база данни
    static function update($tableName, $columnCollection, $whereCollection ) {
        
        $queryBuilder = "UPDATE $tableName SET ";
        
        foreach ($columnCollection as $key => $value) {
            $queryBuilder .= "$key = '$value',";
        }
        
        $queryBuilder  = substr_replace($queryBuilder, " ", strlen($queryBuilder) - 1);
        $queryBuilder .= " WHERE ";
        foreach ($whereCollection as $key => $value) {
            $queryBuilder .= "$key = '$value',";
        }        
        
        $queryBuilder = substr_replace($queryBuilder, " ", strlen($queryBuilder) - 1);
        return $queryBuilder;
    }
    
    static function delete($tableName, $whereCollection) {
        
        $queryBuilder = "DELETE FROM $tableName WHERE ";
        
        foreach ($whereCollection as $key => $value) {
            $queryBuilder .= "$key = '$value',";
        }                   
        
        $queryBuilder = substr_replace($queryBuilder, " ", strlen($queryBuilder) - 1);
        return $queryBuilder;
    }
}
