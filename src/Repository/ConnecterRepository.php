<?php

namespace App\Repository;

use App\Repository\AbstractRepository;


class ConnecterRepository extends AbstractRepository
{
// creer une method getUserByemail ell eprendra eb parametre un email va retoruner un tableau 
// requete prepare select*from user where email=xxx

public function getUserByEmail($email): array | bool
 {

    $stmt = $this->pdo->prepare('SELECT * FROM user WHERE email = :email');
    // on relier la lie  :email en parammetre avec "binparam
    $stmt->bindParam(':email', $email , \PDO::PARAM_STR);
    $stmt->execute();
    // on excute la requete
     return $stmt->fetch(\PDO::FETCH_ASSOC);
    // on retourne le resultat de la requete avec fetchAll

}

public function getAllUsers() : array | bool
{

    $stmt = $this->pdo->prepare('SELECT * FROM user ');
    // on relier la lie  :email en parammetre avec "binparam
    $stmt->execute();
     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // on retourne le resultat de la requete avec fetchAll

}


public function getUserById($id) : array | bool
{

    $stmt = $this->pdo->prepare('SELECT * FROM user WHERE id = :id');
    $stmt->bindParam(':id', $id);
    // on relier la lie  :email en parammetre avec "binparam
    $stmt->execute();
     return $stmt->fetchAll(\PDO::FETCH_ASSOC);

}

public function updateUser($id, $pseudo, $email) : bool
{
    $stmt = $this->pdo->prepare('UPDATE user SET pseudo = :pseudo, email = :email WHERE id = :id');
    $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
    $stmt->bindParam(':pseudo', $pseudo, \PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
    return $stmt->execute();
}
}