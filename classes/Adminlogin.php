<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	Session::checkLogin();	
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Adminlogin {
	private $db;
	private $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminLogin($adminUsuario, $adminPass)
	{
		$adminUsuario = $this->fm->validation($adminUsuario);
		$adminPass = $this->fm->validation($adminPass);

		$adminUsuario = mysqli_real_escape_string($this->db->link, $adminUsuario);
		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

		if (empty($adminUsuario) || empty($adminPass)) {
			$loginmsg = "Usuario ou senha não pode ser vazio !";
			return $loginmsg;
		}
		else {
			$query = "SELECT * FROM tbl_admin WHERE adminUsuario = '$adminUsuario' AND adminPass = '$adminPass'";
			$result = $this->db->select($query);
			if($result != false) {
				$value = $result->fetch_assoc();
				Session::set("adminLogin", true);
				Session::set("adminId", $value['adminId']);
				Session::set("adminUsuario", $value['adminUsuario']);
				Session::set("adminNome", $value['adminNome']);
				header("Location:dashbord.php");
			}
			else {
				$loginmsg = "Usuario ou senha errado !";
				return $loginmsg;
			}
		}
	}
}
?>