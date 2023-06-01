<?php

class Members extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members JOIN tim, roles WHERE members.id_tim = tim.id_tim AND members.id_role = roles.id_role";
        return $this->execute($query);
    }
    
    function getMemberById($id)
    {
        $query = "SELECT * FROM members JOIN tim, roles WHERE members.id_tim = tim.id_tim AND members.id_role = roles.id_role AND members.id_member = $id";
        return $this->execute($query);
    }
    
    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_tim = $data['id_tim'];
        $id_role = $data['id_role'];
        $query = " INSERT INTO members VALUES ( '','$name', '$email', '$phone', '$join_date', $id_tim, $id_role )";
        
        return $this->executeAffected($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM members WHERE id_member = '$id'";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function update($data)
    {
        $id = $data['id_member'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_tim = $data['id_tim'];
        $id_role = $data['id_role'];
        $query = "UPDATE members SET name = '$name', email = '$email', phone = '$phone', join_date = '$join_date', id_tim = $id_tim, id_role = $id_role WHERE members.id_member = $id";
        
        return $this->executeAffected($query);
    }
}


?>