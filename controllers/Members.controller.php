<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Tim.class.php");
include_once("models/Roles.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $member;
  private $author;

  function __construct(){
    $this->member = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->tim = new Tim(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->roles = new Roles(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    
  }

  public function index() {
    $this->member->open();
    $this->member->getMember();
    $data = array();
    while($row = $this->member->getResult()){
      array_push($data, $row);
    };

    $this->member->close();
    
    $view = new MembersView();
    $view->render($data);
  }

  public function add() {

    $this->tim->open();
    $this->tim->getTim();
    $dataTim = array();
    while($row = $this->tim->getResult()){
      array_push($dataTim, $row);
    };

    $this->roles->open();
    $this->roles->getRoles();
    $dataRole = array();
    while($row = $this->roles->getResult()){
      array_push($dataRole, $row);
    };
    
    $view = new MembersView();
    $view->addForm($dataTim, $dataRole);
  }

  function addData($data){
    $this->member->open();
    $add = $this->member->add($data);
    $this->member->close();
    if ($add > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Data Berhasil di Tambah');
          document.location.href = 'index.php';
      </script>
    ";
    } else {
        echo "
        <script>
        alert('Tambah Data Gagal!');
        document.location.href = 'index.php';
        </script>
        ";
    }
  }

  public function edit($id) {

    $this->tim->open();
    $this->tim->getTim();
    $dataTim = array();
    while($row = $this->tim->getResult()){
      array_push($dataTim, $row);
    };

    $this->roles->open();
    $this->roles->getRoles();
    $dataRole = array();
    while($row = $this->roles->getResult()){
      array_push($dataRole, $row);
    };
    
    $this->member->open();
    $this->member->getMemberById($id);
    $member = $this->member->getResult();
    $view = new MembersView();
    $view->editForm($member, $dataTim, $dataRole);
  }

  function editData($data){
    $this->member->open();
    $add = $this->member->update($data);
    $this->member->close();
    if ($add > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Data Berhasil di Update');
          document.location.href = 'index.php';
      </script>
    ";
    } else {
        echo "
        <script>
        alert('Update Data Gagal!');
        document.location.href = 'index.php';
        </script>
        ";
    }
  }

  function delete($id){
    $this->member->open();
    $delete = $this->member->delete($id);
    $this->member->close();
    if ($delete > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
      <script>
          alert('Data Berhasil di Hapus');
          document.location.href = 'index.php';
      </script>
    ";
    } else {
        echo "
        <script>
        alert('Hapus Data Gagal!');
        document.location.href = 'index.php';
        </script>
        ";
    }
  }

}