<?php
// Define functions gerais:
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}

function existValue($value, $undefined = "")
{
    $validate = (isset($value) && $value != null) ? $value : $undefined;
    return validateValue($validate);
}

function validateValue($value)
{
    $value = stripcslashes($value);
    $value = strip_tags($value);

    return $value;
}

function verificaEmail($email)
{

    /* Verifica se o email e valido */
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        /* Obtem o dominio do email */
        list($usuario, $dominio) = explode("@", $email);

        /* Faz um verificacao de DNS no dominio */
        if (checkdnsrr($dominio, "MX") == 1) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function formataData($value, $format = "d/m/Y")
{
    $final = date($format, strtotime($value));
    return $final;
}

function sanitizarVarString($value)
{
    $newvalue = htmlentities($value, ENT_QUOTES, 'UTF-8');
    $newvalue = htmlspecialchars($newvalue);
    $newvalue = stripslashes($newvalue);
    $newvalue = trim($newvalue);
    $newvalue = filter_var($newvalue, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    return $newvalue;
}

function sanitizarVarInt($value)
{
    if (is_numeric($value)) {
        $newvalue = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        return $newvalue;
    } else {
        return "";
    }
}

function sanitizarVarDouble($value)
{
    if (is_numeric($value)) {
        $newvalue = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        return $newvalue;
    } else {
        return "";
    }
}

function informationSecurity()
{
    $json = [
        "Mensagem" => "Obrigado pela sua visita, armazenaremos algumas informações sobre seu acesso para análise posterior.",
        "Data de acesso" => $date = date('d-m-y h:i:s'),
        "Seu IP" => $_SERVER['REMOTE_ADDR'],
    ];

    return $json;
}
