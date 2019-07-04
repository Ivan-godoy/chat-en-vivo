<?php
require_once 'vendor/autoload.php';
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{

    public $conexiones = [];

    function onOpen(\Ratchet\ConnectionInterface $conn)
    {
        echo 'Hay una nueva conexion';
        foreach ($this->conexiones as $conexion){
            /** @var \Ratchet\ConnectionInterface $conexion */
            $conexion->send('Se ha conectado un nuevo usuario');

        }
        $this->conexiones[] = $conn;
    }


    function onClose(\Ratchet\ConnectionInterface $conn)
    {
        foreach ($this->conexiones as $conexion){
            /** @var \Ratchet\ConnectionInterface $conexion */
            $conexion->send('Se ha desconectado un nuevo usuario');

        }
        $this->conexiones[] = $conn;
    }


    function onError(\Ratchet\ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }


    function onMessage(\Ratchet\ConnectionInterface $from, $msg)
    {
        foreach ($this->conexiones as $conexion){
            if ($conexion->onOpen() !== $from){
                $conexion->send($msg);
            };

        }
    }
}