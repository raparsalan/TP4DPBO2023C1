<?php

  class MembersView {
    public function render($data){
        $no = 1;
        $dataHeader = "<tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>JOINING DATE</th>
            <th>ROLE</th>
            <th>NAMA TIM</th>
            <th>ACTIONS</th>
        </tr>";
        $dataMember = null;
        foreach ($data as $row) {
            $dataMember .= "<tr>
            <th>$no</th>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[join_date]</td>
            <td>$row[nama_role]</td>
            <td>$row[nama_tim]</td>
            <td>
                      <a class='btn btn-success' href='index.php?editForm=$row[id_member]'>Edit</a>
                      <a class='btn btn-danger' href='index.php?delete=$row[id_member]'>Delete</a>
                    </td>
          </tr>";
          $no++;
        }    
        $tpl = new Template("templates/index.html");

        $tpl->replace("TUJUAN_ADD", "index.php");
        $tpl->replace("DATA_HEADER", $dataHeader);
        $tpl->replace("DATA_TABEL", $dataMember);
        $tpl->write(); 
    }

    public function addForm($dataTim, $dataRole){
        
        $dataForm = '<div class="card">
 
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Add New Member </h1>
        </div><br>
       
        <label> NAMA: </label>
        <input type="text" name="name" class="form-control"> <br>
       
        <label> EMAIL: </label>
        <input type="text" name="email" class="form-control"> <br>
       
        <label> PHONE: </label>
        <input type="text" name="phone" class="form-control"> <br>
       
        <label> JOINING DATE: </label>
        <input type="text" name="join_date" class="form-control"> <br>
       
        <label> ASAL TIM : </label>
        <select class="form-select" name="id_tim" required>';
        foreach ($dataTim as $row) {
            $dataForm .= "<option value='".$row['id_tim']."'>" . $row['nama_tim'] . "</option>";
        }
        $dataForm .= '</select>
       
        <label> ROLE : </label>
        <select class="form-select" name="id_role" required>';

        foreach ($dataRole as $row ) {
            $dataForm .= "<option value='" . $row['id_role'] . "'>" . $row['nama_role'] . "</option>";
        }
        
        $dataForm .= '</select>
        <br>
        <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
       
        </div>';
        $tpl = new Template("templates/addEdit.html");

        $tpl->replace("TUJUAN_ADDEDIT", "index.php");
        $tpl->replace("FORM", $dataForm);
        $tpl->write(); 
    }

    public function editForm($member, $dataTim, $dataRole){
        
        $dataForm = '<div class="card">
 
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Edit Member </h1>
        </div><br>
       
        <label> NAMA: </label>
        <input type="hidden" name="id_member" class="form-control" value="'.$member['id_member'].'">
        <input type="text" name="name" class="form-control" value="'.$member['name'].'"> <br>
       
        <label> EMAIL: </label>
        <input type="text" name="email" class="form-control" value="'.$member['email'].'"> <br>
       
        <label> PHONE: </label>
        <input type="text" name="phone" class="form-control" value="'.$member['phone'].'"> <br>
       
        <label> JOINING DATE: </label>
        <input type="text" name="join_date" class="form-control" value="'.$member['join_date'].'"> <br>
       
        <label> ASAL TIM : </label>
        <select class="form-select" name="id_tim" required>';
        foreach ($dataTim as $row) {
            $dataForm .= "<option value='".$row['id_tim']."'>" . $row['nama_tim'] . "</option>";
        }
        $dataForm .= '</select>
       
        <label> ROLE : </label>
        <select class="form-select" name="id_role" required>';

        foreach ($dataRole as $row ) {
            $dataForm .= "<option value='" . $row['id_role'] . "'>" . $row['nama_role'] . "</option>";
        }
        
        $dataForm .= '</select>
        <br>
        <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
       
        </div>';
        $tpl = new Template("templates/addEdit.html");

        $tpl->replace("TUJUAN_ADDEDIT", "index.php");
        $tpl->replace("FORM", $dataForm);
        $tpl->write(); 
    }
  }
?>