<?php

include 'C:\xampp\htdocs\inscri\config.php';
include 'C:\xampp\htdocs\inscri\model\utilisateurs.php';

class utilisateursC
{
    public function listutilisateurs()
    {
        $sql = "SELECT * FROM utilisateurs";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteutilisateurs($id)
    {
        $sql = "DELETE FROM utilisateurs WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addutilisateurs($utilisateurs)
    {
        $sql = "INSERT INTO utilisateurs
        VALUES (NULL, :p,:e)";
        $db = config::getConnexion();
        try {
           
            $query = $db->prepare($sql);
            $query->execute([
                'p' => $utilisateurs->getpseudo(),
                'e' => $utilisateurs->getemail(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateutilisateurs($utilisateurs, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateurs SET 
                    pseudo = :pseudo, 
                    email = :email 
                   
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'pseudo' => $utilisateurs->getpseudo(),
                'email' => $utilisateurs->getemail()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showutilisateurs($id)
    {
        $sql = "SELECT * from utilisateurs where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $utilisateurs = $query->fetch();
            return $utilisateurs;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
