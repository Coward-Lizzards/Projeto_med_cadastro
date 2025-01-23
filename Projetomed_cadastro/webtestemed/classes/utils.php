<?php

function sanitizeInput($input)
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}


function validateInput($input, $type)
{
    if ($type === 'string') {
        return !empty($input) && strlen($input) <= 255;
    } elseif ($type === 'integer') {
        return filter_var($input, FILTER_VALIDATE_INT);
    } elseif ($type === 'phone') {
        return preg_match('/^\+?[0-9]{10,15}$/', $input);
    } elseif ($type === 'crm') {
        return preg_match('/^[A-Za-z0-9]{8}$/', $input);
    } elseif ($type === 'email') {
        return filter_var($input, FILTER_VALIDATE_EMAIL) !== false && strlen($input) <= 255;    
    } elseif ($type === 'senha') {
        return !empty($input) && strlen($input) >= 8 && strlen($input) <= 255;
    } else {
        return false;
    }
}

function protegerPagina() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login_page.php");
        exit;
    }
}

function verificarCadastroMedico($db, $user_id)
{
    $query = "SELECT id_medico FROM medicos WHERE id_usuario = :id_usuario";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id_usuario", $user_id);
    $stmt->execute();

    return $stmt->rowCount() > 0;
}





?>
