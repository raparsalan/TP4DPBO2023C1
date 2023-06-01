<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Roles.controller.php");

$roles = new RolesController();

if (isset($_POST['add'])) {
    //memproses tambah data
    $roles->addData($_POST);
}else if (isset($_GET['addForm'])) {
    //memanggil tampilan form untuk add data
    $roles->add();
}else if (isset($_GET['editForm'])) {
    //memanggil tampilan form edit
    $id = $_GET['editForm'];
    $roles->edit($id);
}else if (isset($_POST['edit'])) {
    //memproses edit data
    $roles->editData($_POST);
}  else if (!empty($_GET['delete'])) {
    //memproses delete data
    $id = $_GET['delete'];
    $roles->delete($id);
}else{
    $roles->index();
}
