<?php
// Puedes reemplazar esto con conexión LDAP o base de datos si lo deseas
function registrarUsuario($usuario, $password) {
    $usuarios = json_decode(file_get_contents('usuarios.json'), true);
    if (isset($usuarios[$usuario])) {
        return false; // Usuario ya existe
    }
    $usuarios[$usuario] = password_hash($password, PASSWORD_DEFAULT);
    file_put_contents('usuarios.json', json_encode($usuarios));
    return true;
}
function autenticarUsuario($usuario, $password) {
    $usuarios = json_decode(file_get_contents('usuarios.json'), true);
    if (isset($usuarios[$usuario]) && password_verify($password, $usuarios[$usuario])) {
        return true;
    }
    return false;
}
