<?php

  class RolesView {
    public function render($data){
        $no = 1;
        $dataHeader = "<tr>
            <th>NO</th>
            <th>NAMA ROLE</th>
            <th>Action</th>
        </tr>";
        $dataMember = null;
        foreach ($data as $row) {
            $dataMember .= "<tr>
            <th>$no</th>
            <td>$row[nama_role]</td>
            <td>
                      <a class='btn btn-success' href='roles.php?editForm=$row[id_role]'>Edit</a>
                      <a class='btn btn-danger' href='roles.php?delete=$row[id_role]'>Delete</a>
            </td>
          </tr>";
          $no++;
        }    
        $tpl = new Template("templates/index.html");

        $tpl->replace("TUJUAN_ADD", "roles.php");
        $tpl->replace("DATA_HEADER", $dataHeader);
        $tpl->replace("DATA_TABEL", $dataMember);
        $tpl->write(); 
    }

    public function addForm(){
        
        $dataForm = '<div class="card">
 
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Add New Role </h1>
        </div><br>
       
        <label> NAMA ROLE: </label>
        <input type="text" name="nama_role" class="form-control"> <br>
       
        <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="roles.php"> Cancel </a><br>
       
        </div>';
        $tpl = new Template("templates/addEdit.html");

        $tpl->replace("TUJUAN_ADDEDIT", "roles.php");
        $tpl->replace("FORM", $dataForm);
        $tpl->write(); 
    }

    public function editForm($roles){
        
        $dataForm = '<div class="card">
 
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Edit Role </h1>
        </div><br>
       
        <label> NAMA ROLE: </label>
        <input type="hidden" name="id_role" class="form-control" value="'.$roles['id_role'].'">
        <input type="text" name="nama_role" class="form-control" value="'.$roles['nama_role'].'"> <br>
       
        <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="roles.php"> Cancel </a><br>
       
        </div>';
        $tpl = new Template("templates/addEdit.html");

        $tpl->replace("TUJUAN_ADDEDIT", "roles.php");
        $tpl->replace("FORM", $dataForm);
        $tpl->write(); 
    }
  }
?>