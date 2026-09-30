<?php

class Jidlo {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll() {
        $this->db->query("SELECT * FROM Jidla");
        $this->db->execute();
        return $this->db->results();
    }

    public function add($nazev, $typ, $popis, $alergeny, $img)
    {
        $this->db->query(
            "INSERT INTO Jidla (nazev, typ, popis, alergeny, img) 
            VALUES (:nazev, :typ, :popis, :alergeny, :img)"
        );

        $this->db->bind(':nazev', $nazev);
        $this->db->bind(':typ', $typ);
        $this->db->bind(':popis', $popis);
        $this->db->bind(':alergeny', $alergeny);
        $this->db->bind(':img', $img);

        $this->db->execute();
    }

    public function update($id, $nazev, $typ, $popis, $alergeny, $img)
    {
        $this->db->query("UPDATE Jidla SET nazev=:nazev, typ=:typ, popis=:popis, alergeny=:alergeny WHERE id=:id");

        $this->db->bind(':nazev', $nazev);
        $this->db->bind(':typ', $typ);
        $this->db->bind(':popis', $popis);
        $this->db->bind(':alergeny', $alergeny);
        $this->db->bind(':img', $img);
        $this->db->bind(':id', $id);

        $this->db->execute();
    }

    public function get($id)
    {
        $this->db->query("SELECT * FROM Jidla WHERE id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->result();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM Jidla WHERE id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
}

?>