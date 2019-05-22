<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	class GerarBoleto {
		
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function vagasInsert($data) {
		

		public function gerarboleto() {
			$query = "SELECT * FROM vagas ORDER BY id_vaga DESC";
			$result = $this->db->select($query);
			return $result;
		}