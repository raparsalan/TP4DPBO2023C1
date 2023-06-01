<?php

  class TimView{
    public function render($data){
        $no = 1;
        $dataHeader = "<tr>
            <th>NO</th>
            <th>NAMA TIM</th>
            <th>Action</th>
        </tr>";
        $dataMember = null;
        foreach ($data as $row) {
            $dataMember .= "<tr>
            <th>$no</th>
            <td>$row[nama_tim]</td>
            <td>
                      <a class='btn btn-success' href='tim.php?editForm=$row[id_tim]'>Edit</a>
                      <a class='btn btn-danger' href='tim.php?delete=$row[id_tim]'>Delete</a>
            </td>
          </tr>";
          $no++;
        }    
        $tpl = new Template("templates/index.html");

        $tpl->replace("TUJUAN_ADD", "tim.php");
        $tpl->replace("DATA_HEADER", $dataHeader);
        $tpl->replace("DATA_TABEL", $dataMember);
        $tpl->write(); 
    }

    public function addForm(){
        
        $dataForm = '<div class="card">
 
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Add New Tim </h1>
        </div><br>
       
        <label> NAMA TIM: </label>
        <input type="text" name="nama_tim" class="form-control"> <br>
       
        <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="tim.php"> Cancel </a><br>
       
        </div>';
        $tpl = new Template("templates/addEdit.html");

        $tpl->replace("TUJUAN_ADDEDIT", "tim.php");
        $tpl->replace("FORM", $dataForm);
        $tpl->write(); 
    }

    public function editForm($tim){
        
        $dataForm = '<div class="card">
 
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Edit Tim </h1>
        </div><br>
       
        <label> NAMA TIM : </label>
        <input type="hidden" name="id_tim" class="form-control" value="'.$tim['id_tim'].'">
        <input type="text" name="nama_tim" class="form-control" value="'.$tim['nama_tim'].'"> <br>
       
        <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="tim.php"> Cancel </a><br>
       
        </div>';
        $tpl = new Template("templates/addEdit.html");

        $tpl->replace("TUJUAN_ADDEDIT", "tim.php");
        $tpl->replace("FORM", $dataForm);
        $tpl->write(); 
    }
  }
?>