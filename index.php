<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_POST['add'])) {
    //memproses add data
    $members->addData($_POST);
}else if (isset($_GET['addForm'])) {
    //memanggil tampilan form add 
    $members->add();
}else if (isset($_GET['editForm'])) {
    //memanggil tampilan form edit
    $id = $_GET['editForm'];
    $members->edit($id);
}else if (isset($_POST['edit'])) {
    //memproses edit data
    $members->editData($_POST);
}  else if (!empty($_GET['delete'])) {
    //memproses delete data
    $id = $_GET['delete'];
    $members->delete($id);
}else{
    $members->index();
}
