<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Tim.class.php");
include_once("models/Roles.class.php");
include_once("views/Tim.view.php");

class TimController {
  private $member;
  private $author;

  function __construct(){
    $this->member = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->tim = new Tim(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->roles = new Roles(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    
  }

  public function index() {
    $this->tim->open();
    $this->tim->getTim();
    $data = array();
    while($row = $this->tim->getResult()){
      array_push($data, $row);
    };

    $this->tim->close();
    
    $view = new TimView();
    $view->render($data);
  }

  public function add() {
    
    $view = new TimView();
    $view->addForm();
  }

  function addData($data){
    $this->tim->open();
    $add = $this->tim->add($data);
    $this->tim->close();
    if ($add > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Data Berhasil di Tambah');
          document.location.href = 'tim.php';
      </script>
    ";
    } else {
        echo "
        <script>
        alert('Tambah Data Gagal!');
        document.location.href = 'tim.php';
        </script>
        ";
    }
  }

  public function edit($id) {
    
    $this->tim->open();
    $this->tim->getTimById($id);
    $tim = $this->tim->getResult();
    $view = new TimView();
    $view->editForm($tim);
  }

  function editData($data){
    $this->tim->open();
    $update = $this->tim->update($data);
    $this->tim->close();
    if ($update > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Data Berhasil di Update');
          document.location.href = 'tim.php';
      </script>
    ";
    } else {
        echo "
        <script>
        alert('Update Data Gagal!');
        document.location.href = 'tim.php';
        </script>
        ";
    }
  }

  function delete($id){
    $this->tim->open();
    $delete = $this->tim->delete($id);
    $this->tim->close();
    if ($delete > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Data Berhasil di Hapus');
          document.location.href = 'tim.php';
      </script>
    ";
    } else {
        echo "
        <script>
        alert('Hapus Data Gagal!');
        document.location.href = 'tim.php';
        </script>
        ";
    }
  }

}