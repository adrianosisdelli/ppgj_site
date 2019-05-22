<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	class Vagas {
		
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function vagasInsert($data) {
		/*
			$centro_de_custo = $this->fm->validation($centro_de_custo);
			$funcao          = $this->fm->validation($funcao);
			$descricao_1     = $this->fm->validation($descricao_1);
			$descricao_2     = $this->fm->validation($descricao_2);
			$descricao_3     = $this->fm->validation($descricao_3);
			$conhecimento_1  = $this->fm->validation($conhecimento_1);
			$conhecimento_2  = $this->fm->validation($conhecimento_2);
			$conhecimento_3  = $this->fm->validation($conhecimento_3);
			$conhecimento_4  = $this->fm->validation($conhecimento_4);
			$conhecimento_5  = $this->fm->validation($conhecimento_5);
			$cidade          = $this->fm->validation($cidade);
			$uf              = $this->fm->validation($uf);
			$data_inclusao   = $this->fm->validation($data_inclusao);
		*/	

			$centro_de_custo = mysqli_real_escape_string($this->db->link, $data['centro_de_custo']);
			$funcao          = mysqli_real_escape_string($this->db->link, $data['funcao']);
			$descricao_1     = mysqli_real_escape_string($this->db->link, $data['descricao_1']);
			$descricao_2     = mysqli_real_escape_string($this->db->link, $data['descricao_2']);
			$descricao_3     = mysqli_real_escape_string($this->db->link, $data['descricao_3']);
			$conhecimento_1  = mysqli_real_escape_string($this->db->link, $data['conhecimento_1']);
			$conhecimento_2  = mysqli_real_escape_string($this->db->link, $data['conhecimento_2']);
			$conhecimento_3  = mysqli_real_escape_string($this->db->link, $data['conhecimento_3']);
			$conhecimento_4  = mysqli_real_escape_string($this->db->link, $data['conhecimento_4']);
			$conhecimento_5  = mysqli_real_escape_string($this->db->link, $data['conhecimento_5']);
			$cidade          = mysqli_real_escape_string($this->db->link, $data['cidade']);			
			$uf              = mysqli_real_escape_string($this->db->link, $data['uf']);
			$data_inclusao   = mysqli_real_escape_string($this->db->link, $data['data_inclusao']);

			$query = "INSERT INTO vagas(centro_de_custo,funcao,descricao_1,descricao_2,descricao_3,
										conhecimento_1, conhecimento_2, conhecimento_3, conhecimento_4,
										conhecimento_5, cidade, uf, data_inclusao)
                      VALUES ('$centro_de_custo', '$funcao', '$descricao_1', '$descricao_2', '$descricao_3'   ,'$conhecimento_1', '$conhecimento_2', '$conhecimento_3','$conhecimento_4',
							  '$conhecimento_5', '$cidade', '$uf', '$data_inclusao')";
			$vaginsert = $this->db->insert($query);
			if ($vaginsert) {
				$msg = "<div class='alert alert-primary' role='alert'>Vaga inserida com sucesso.</div>";
				return $msg;
			} else {
				$msg = "<span class='error'> Categoria não alterada.</span>";
				return $msg;
			}
		}

		public function getAllVagas() {
			$query = "SELECT * FROM vagas ORDER BY id_vaga DESC";
			$result = $this->db->select($query);
			return $result;
		}
	
		public function getCatById($id) {
			$query = "SELECT * FROM tbl_category WHERE catId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function catUpdate($catNome, $id) {
			$catNome = $this->fm->validation($catNome);
			$catNome = mysqli_real_escape_string($this->db->link, $catNome);
			$id 	 = mysqli_real_escape_string($this->db->link, $id);
			if (empty($catNome)) {
				$msg = "<span class='error'> Campo Categoria não pode ser vazio.</span>";
				return $msg;
			} else {
				$query = "UPDATE tbl_category
				          SET catNome = '$catNome'
				          WHERE catId = '$id'";
				$updated_row = $this->db->update($query);
				if ($updated_row) {
				   $msg = "<span class='sucess'> Categoria alterada com sucesso.</span>";
				   return $msg;
				} else {
				   $msg = "<span class='error'> Categoria não alterada.</span>";
				   return $msg;
				}			
			}
		}

		public function delCatById($id) {			
			$query = "DELETE FROM tbl_category WHERE catId = '$id'";
			$deldata = $this->db->delete($query);
			if ($deldata) {
			 	$msg = "<span class='sucess'> Categoria deletada com sucesso.</span>";
				return $msg;
			} else {
			   $msg = "<span class='error'> Categoria não deletada.</span>";
			   return $msg;
			}
		}
	}
?>