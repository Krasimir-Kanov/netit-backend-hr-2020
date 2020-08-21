<?php

//Създаваме функция която да ни казва каква ни е грешката за групата (страницата)
function setFormError($group, $key, $message) {
    $_SESSION[$group][$key] = $message;
}

// Функция която проверява дали имаме стойност в $_SESSION масива и я връща само с message
function returnFormError($group, $key) {
    
    if(isset($_SESSION[$group][$key])) {
        return  $_SESSION[$group][$key];
    }
}


// Функция да визуализира грешката при signup.php
function displayFormError($group, $key) {
    
    echo '<div class="form-error">';
    echo returnFormError($group, $key);
    echo '</div>';
    $_SESSION[$group][$key] = NULL; //Зануляваме сесията за да не виждаме грешката на другите страници
}

// $group е страницата ни в този случай (signup.php) $key се отнася за текста от формата примерно (user_name)

