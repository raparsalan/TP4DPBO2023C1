<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Tim.controller.php");

$tim = new TimController();

if (isset($_POST['add'])) {
    //memproses tambah data
    $tim->addData($_POST);
}else if (isset($_GET['addForm'])) {
    //memanggil tampilan form untuk add data
    $tim->add();
}else if (isset($_GET['editForm'])) {
    //memanggil tampilan form edit
    $id = $_GET['editForm'];
    $tim->edit($id);
}else if (isset($_POST['edit'])) {
    //memproses edit data
    $tim->editData($_POST);
}  else if (!empty($_GET['delete'])) {
    //memproses delete data
    $id = $_GET['delete'];
    $tim->delete($id);
}else{
    $tim->index();
}
