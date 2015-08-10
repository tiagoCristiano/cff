<?php
return array(
    'cff\\V1\\Rest\\Auth\\Controller' => array(
        'entity' => array(
            'POST' => array(
                'request' => '{
   "email": "Email do usuário.",
   "password": "Senha do Usuário."
}',
                'description' => 'Caso o email e senha estejam cadastrados retorna true',
                'response' => '{
   "auth" : "true"
}',
            ),
        ),
        'description' => 'Efetua a autenticação do usuário, através de email e senha.',
    ),
);
