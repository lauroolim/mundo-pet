<?php

namespace app\database\models;

use PDO;
use app\database\Connection;

class AgendamentoModel
{
    public static function create($userId, $petType, $serviceType, $date, $time)
    {
        $pdo = Connection::getConnection();
        $stmt = $pdo->prepare('INSERT INTO scheduling (user_id, pet_type, service_type, date, time) 
                               VALUES (:user_id, :pet_type, :service_type, :date, :time)');
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':pet_type', $petType);
        $stmt->bindParam(':service_type', $serviceType);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        return $stmt->execute();
    }

    public static function isAvailable($userId, $date, $time, $serviceType)
    {
        $pdo = Connection::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM scheduling WHERE user_id = :user_id AND date = :date AND time = :time AND service_type = :service_type');
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':service_type', $serviceType);
        $stmt->execute();

        return $stmt->rowCount() === 0;
    }

    public static function find($id)
    {
        $pdo = Connection::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM scheduling WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $data)
    {
        $pdo = Connection::getConnection();
        $stmt = $pdo->prepare('UPDATE scheduling SET pet_type = :pet_type, service_type = :service_type, date = :date, time = :time WHERE id = :id');
        $stmt->bindParam(':pet_type', $data['pet_type']);
        $stmt->bindParam(':service_type', $data['service_type']);
        $stmt->bindParam(':date', $data['date']);
        $stmt->bindParam(':time', $data['time']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function all()
    {
        $pdo = Connection::getConnection();
        $stmt = $pdo->query('SELECT * FROM scheduling');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
