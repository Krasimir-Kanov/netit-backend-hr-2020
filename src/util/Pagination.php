<?php

class Pagination {

    //Може да имаме променливи който да използваме в рамките на целия клас
    
    private static $pageLimit = 5;
    private static $totalCount = 0;

    //Добавяме лимит на страниците
    static function setPageLimit($pageLimit) {
        Pagination::$pageLimit = $pageLimit;
    }

    //Взимаме лимита който сме задали
    static function getPageLimit() {
        return Pagination::$pageLimit;
    }
    
    //Функция да не се движим само с един запис напред
    static function getPageOffset() {
        
        return (Pagination::getPageIndex() - 1) * 
               (Pagination::getPageLimit());
    }
    
    //Това ще връща Indexa на страницата
    static function getPageIndex() {
        return isset($_GET['page_index']) ? $_GET['page_index'] : 1;
    }
    
    //Абсолютно всички записи от базите данни
    static function setTotalCount($count) {
        Pagination::$totalCount = $count;
    }
    
    //Тотал може да е 0 по дефаулт
    static function getTotalCount() {
        return Pagination::$totalCount;
    }    
    
    //Булеви функции който отговарят за бутоните Next и Prev
    static function hasNextPage() {
        return (Pagination::getPageOffset() + Pagination::getPageLimit()) < Pagination::getTotalCount();
    }
    
    static function hasPrevPage() {
        return Pagination::getPageIndex() > 1;
    }
    
    //Показва ни бутоните за следваща и предишна страница
    static function display() {
        
        $pageIndex      = Pagination::getPageIndex();
        $nextPageIndex  = $pageIndex + 1;
        $prevPageIndex  = $pageIndex - 1;
        

        //Маха една страница назад
        if(Pagination::hasPrevPage()) {
            echo "<a class='btn btn-dark' href='?page_index=$prevPageIndex'>Prev</a>";
        }        
        
        // Визуализираме колко страници има и колко ни остават
        echo '<span>' . Pagination::getPageOffset() . ' - ' . Pagination::getTotalCount() . '</span>';
        
        //Добавя една страница напред
        if(Pagination::hasNextPage()) {
            echo "<a class='btn btn-dark' href='?page_index=$nextPageIndex'>Next</a>";        
        }
    }  
}