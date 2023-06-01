<?php

class Roles extends DB
{
    function getRoles()
    {
        $query = "SELECT * FROM roles";

        return $this->execute($query);
    }
    
    function getRolesById($id)
    {
        $query = null;
        $query .= "SELECT * FROM roles WHERE roles.id_role = $id";
        return $this->execute($query);
    }
    
    function add($data)
    {
        $nama = $data['nama_role'];
        $query = " INSERT INTO roles VALUES ( '','$nama')";

        return $this->executeAffected($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM roles WHERE id_role = '$id'";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function update($data)
    {
        $id = $data['id_role'];
        $nama = $data['nama_role'];
        $query = "UPDATE roles SET nama_role = '$nama' WHERE roles.id_role = $id";
        return $this->executeAffected($query);
    }
}


?>