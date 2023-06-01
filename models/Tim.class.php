<?php

class Tim extends DB
{
    function getTim()
    {
        $query = "SELECT * FROM tim";
        return $this->execute($query);
    }
    
    function getTimById($id)
    {
        $query = "SELECT * FROM tim WHERE tim.id_tim = $id";
        return $this->execute($query);
    }
    
    function add($data)
    {
        $nama = $data['nama_tim'];
        $query = " INSERT INTO tim VALUES ( '','$nama')";

        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM tim WHERE id_tim = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {
        $id = $data['id_tim'];
        $nama = $data['nama_tim'];
        $query = "UPDATE tim SET nama_tim = '$nama' WHERE tim.id_tim = $id";
        return $this->execute($query);
    }
}


?>