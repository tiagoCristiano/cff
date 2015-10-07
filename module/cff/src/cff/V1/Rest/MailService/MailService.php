<?php
/**
 * Created by PhpStorm.
 * User: Tiago
 * Date: 05/10/2015
 * Time: 01:22
 */

namespace cff\V1\Rest\MailService;

use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtTransport;
use Zend\Mail\Transport\SmtpOptions;

class MailService
{
    /**
     * @var Configurações de email em local.php
     */
    protected $mailConfig;

    public function __construct($config)
    {
        $this->configMail = $config['email'];
    }

    public function sendRegisterMail($usuario) {


        $message = new Message();
        $message->addTo($usuario['email'])
                ->addFrom('cff@cff.com')
                ->setSubject('Cadastro Controle Financeiro Familiar')
                ->setBody("Seu email foi cadastrono sistema de controle financeiro familiar.<br> usario : {$usuario['nome']}<br> senha : {$usuario['password']}");

        $transport = new SmtTransport();
        $options = new SmtpOptions([
            'name'=> $this->configMail['host'],
            'host' => $this->configMail['host'],
            'connection_class' => $this->configMail['auth'],
            'port'=> $this->configMail['port'],
            'connection_config' => array(
                'username' => $this->configMail['username'],
                'password' => $this->configMail['password'],
                'ssl' => $this->configMail['ssl']
            )

        ]);
        $transport->setOptions($options);
        $transport->send($message);

    }

}