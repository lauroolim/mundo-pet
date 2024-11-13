<?php

namespace app\database\models;

use PDO;

class ReviewModel
{
    private $pdo;

    public function __construct()
    {
        $dbPath = __DIR__ . '/../../database/db.db';
        $dsn = 'sqlite:' . $dbPath;
        $this->pdo = new PDO($dsn);
    }

    // Método para adicionar uma avaliação
    public function addReview($productId, $userId, $rating, $comment)
    {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO reviews (product_id, user_id, rating, comment) VALUES (:product_id, :user_id, :rating, :comment)');
            $stmt->bindParam(':product_id', $productId);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':comment', $comment);
            $stmt->execute();
            
            return true; 
        } catch (\Exception $e) {
            return false; 
        }
    }
    public function getReviewsByProductId($productId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM reviews WHERE product_id = :product_id');
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calculateAverageRating($productId)
    {
        $stmt = $this->pdo->prepare('SELECT AVG(rating) as average_rating FROM reviews WHERE product_id = :product_id');
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return round($result['average_rating'], 1);  
    }
}
