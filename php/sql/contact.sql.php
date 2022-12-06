<?php

/*
On injecte $db lorsqu'on appelle la fonction
*/
function save_contact_form($db, $fullname, $email, $phone, $text) {
    // global $db;
    // var_dump(func_get_args());
    $query = $db->prepare('INSERT INTO contacts(fullname, email, phone, `text`) VALUES(:fullname, :email, :phone, :text)');
    $query->execute([
        'fullname' => $fullname,
        'email' => $email,
        'phone' => $phone,
        'text' => $text
    ]);

    // var_dump($db->errorInfo());

}

/*
On va chercher $db qui est une variable deja declaree
*/
function save_contact_form_global($fullname, $email, $phone, $text) {
    global $db;

    $query = $db->prepare('INSERT INTO contacts(fullname, email, phone, text) VALUES(:fullname, :email, :phone, :text)');
    $query->execute([
        'fullname' => $fullname,
        'email' => $email,
        'phone' => $phone,
        'text' => $text
    ]);
}

