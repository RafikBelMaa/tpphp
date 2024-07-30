<?php
class ModelContact
{

    private $dao;

    function __construct()
    {
        $this->dao = new DAO_MySqli();
    }

    function inserer($enreg)
    {
        return $this->dao->requete("INSERT INTO `contact` (`nom`, `prenom`, `id_civilite`, `id_objet`, `message`) VALUES ('{$enreg['nom']}', '{$enreg['prenom']}', '{$enreg['id_civilite']}', '{$enreg['id_objet']}', '{$enreg['message']}' )");
    }

    function selectContacts()
    {
        $result = $this->dao->requete("SELECT co.id_contact, co.nom, co.prenom, ci.libelle FROM `contact` as co JOIN civilite as ci ON co.id_civilite = ci.id_civilite;");
        $contacts = [];
        for ($row_no = 0; $row_no < $result->num_rows; $row_no++) {
            $result->data_seek($row_no);
            $row = $result->fetch_object();
            $contacts[] = $row;
            //echo " nom = " . $row->nom . ", prenom = " . $row->prenom . "<br/>";

        }
        return $contacts;
    }

    function selectCivilites()
    {
        $result = $this->dao->requete("SELECT * FROM `civilite`;");
        $civilites = [];
        for ($row_no = 0; $row_no < $result->num_rows; $row_no++) {
            $result->data_seek($row_no);
            $row = $result->fetch_object();
            $civilites[] = $row;
        }
        return $civilites;
    }
    function selectObjets()
    {
        $result = $this->dao->requete("SELECT * FROM `objet`;");
        $objets = [];
        for ($row_no = 0; $row_no < $result->num_rows; $row_no++) {
            $result->data_seek($row_no);
            $row = $result->fetch_object();
            $objets[] = $row;
        }
        return $objets;
    }

    function nbParGenre()
    {
        $result = $this->dao->requete("SELECT 
SUM(CASE WHEN co.id_civilite = '" . Conf::$civilite_homme . "' THEN 1 ELSE 0 END) AS 'Hommes',
SUM(CASE WHEN co.id_civilite = '" . Conf::$civilite_femme . "' OR co.id_civilite = '" . Conf::$civilite_mademoiselle . "' THEN 1 ELSE 0 END) AS 'Femmes'
FROM contact AS co");
        $genres = [];
        for ($row_no = 0; $row_no < $result->num_rows; $row_no++) {
            $result->data_seek($row_no);
            $row = $result->fetch_assoc();
            $genres[] = $row;
        }
        return $genres;
    }
    function contactsParObjects()
    {
        $result = $this->dao->requete("SELECT co.id_contact, co.nom, co.prenom, ci.libelle, o.titre FROM contact AS co
JOIN civilite AS ci ON co.id_civilite = ci.id_civilite
JOIN objet AS o ON co.id_objet = o.id_objet");
        $data = [];
        for ($row_no = 0; $row_no < $result->num_rows; $row_no++) {
            $result->data_seek($row_no);
            $row = $result->fetch_assoc();
            $data[$row['titre']][] = $row;
        }
        return $data;
    }

    function getContacts()
    {
        $result = $this->dao->requete("SELECT ci.libelle, co.nom, co.prenom FROM contact as co
                JOIN civilite AS ci ON co.id_civilite = ci.id_civilite
        ");
        $data = [];
        for ($row_no = 0; $row_no < $result->num_rows; $row_no++) {
            $result->data_seek($row_no);
            $row = $result->fetch_assoc();
            $data[] = $row;
        }
        return $data;
    }

    function deleteContact($id)
    {
        return $this->dao->requete("DELETE FROM contact WHERE id_contact=$id");
    }

    function selectContact($id){
        $result = $this->dao->requete("SELECT * FROM contact as co WHERE co.id_contact = $id");

        return $result->fetch_assoc();
    }
    function updateContact($id,$enreg){
        return $this->dao->requete("UPDATE `contact` SET `nom` = '{$enreg['nom']}', `prenom` = '{$enreg['prenom']}', `message` = '{$enreg['message']}', `id_civilite` = '{$enreg['id_civilite']}', `id_objet` = '{$enreg['id_objet']}' WHERE `contact`.`id_contact` = $id;");
    }
}