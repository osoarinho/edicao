<?php
require_once __DIR__ . '/../form_security.php';

// Handler de formulário - Edição Audiovisual
$config = [
    'site_name'      => 'Edição Audiovisual',
    'recipient'      => 'contato@soarinho.com',
    'subject_prefix' => '[Edição]',
    // Campos esperados no POST (serão adicionados no HTML)
    'fields'         => ['name', 'email', 'service_type', 'message'],
    'required'       => ['name', 'email', 'message'],
    'email_field'    => 'email',
    'phone_field'    => null,
    'name_field'     => 'name',
    'subject_field'  => 'service_type', // usamos o tipo de serviço como assunto base
];

$result  = form_security_process($config);
$status  = $result['success'] ? 'ok' : 'error';
$message = urlencode($result['message']);

$redirectUrl = 'index.html?status=' . $status . '&msg=' . $message;
header('Location: ' . $redirectUrl);
exit;

