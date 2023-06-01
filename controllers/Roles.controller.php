<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Tim.class.php");
include_once("models/Roles.class.php");
include_once("views/Roles.view.php");

class RolesController {
  private $member;
  private $author;

  function __construct(){
    $this->member = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->tim = new Tim(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->roles = new Roles(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    
  }

  public function index() {
    $this->roles->open();
    $this->roles->getRoles();
    $data = array();
    while($row = $this->roles->getResult()){
      array_push($data, $row);
    };

    $this->roles->close();
    
    $view = new RolesView();
    $view->render($data);
  }

  public function add() {
    
    $view = new RolesView();
    $view->addForm();
  }

  function addData($data){
    $this->roles->open();
    $add = $this->roles->add($data);
    $this->roles->close();
    if ($add > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Data Berhasil di Tambah');
          document.location.href = 'roles.php';
      </script>
    ";
    } else {
        echo "
        <script>
        alert('Tambah Data Gagal!');
        document.location.href = 'roles.php';
        </script>
        ";
    }
  }

  public function edit($id) {
    
    $this->roles->open();
    $this->roles->getRolesById($id);
    $roles = $this->roles->getResult();
    $view = new RolesView();
    $view->editForm($roles);
  }

  function editData($data){
    $this->roles->open();
    $update = $this->roles->update($data);
    $this->roles->close();
    if ($update > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Data Berhasil di Update');
          document.location.href = 'roles.php';
      </script>
    ";
    } else {
        echo "
        <script>
        alert('Update Data Gagal!');
        document.location.href = 'roles.php';
        </script>
        ";
    }
  }

  function delete($id){
    $this->roles->open();
    $delete = $this->roles->delete($id);
    $this->roles->close();
    if ($delete > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Data Berhasil di Hapus');
          document.location.href = 'roles.php';
      </script>
    ";
    } else {
        echo "
        <script>
        alert('Hapus Data Gagal!');
        document.location.href = 'roles.php';
        </script>
        ";
    }
  }

}