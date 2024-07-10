<?php

namespace App\Repository;

use App\Repository\AbstractRepository;


class ConnecterRepository extends AbstractRepository
{
// creer une method getUserByemail ell eprendra eb parametre un email va retoruner un tableau 
// requete prepare select*from user where email=xxx

public function getUserByEmail($email) {

    $stmt = $this->pdo->prepare('SELECT * FROM user WHERE email = :email');
    // on relier la lie  :email en parammetre avec "binparam
    $stmt->bindParam(':email', $email , \PDO::PARAM_STR);
    $stmt->execute();
    // on excute la requete
    $stmt->fetch(\PDO::FETCH_ASSOC);
    // on retourne le resultat de la requete avec fetchAll
    return $stmt;
}
}