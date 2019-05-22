<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	class Product {
		
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function productInsert($data, $file) {
			$productNome = mysqli_real_escape_string($this->db->link, $data['productNome']);
			$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
			$brandId     = mysqli_real_escape_string($this->db->link, $data['brandId']);
			$body        = mysqli_real_escape_string($this->db->link, $data['body']);
			$price       = mysqli_real_escape_string($this->db->link, $data['price']);			
			$type        = mysqli_real_escape_string($this->db->link, $data['type']);

			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $file['image']['name'];
			$file_size = $file['image']['size'];
			$file_temp = $file['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;
			if ($productNome == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "" || $file_name == "") {
				$msg = "<span class='error'> Campos não podem ser vazios.</span>";
				return $msg;
			} elseif ($file_size > 1048567) {
				echo "<span class='error'> Imagem não pode ser maior que 1MB !</span>";
			} elseif (in_array($file_ext, $permited) === false) {
				echo "<span class='error'> Você pode fazer upload somente:-".implode(', ', $permited)."</span>";
			} else {
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_product (productNome, catId, brandId, body, price, image, type)
				           VALUES ('$productNome', '$catId', '$brandId', '$body', '$price', '$uploaded_image', '$type')";

				$prodinsert = $this->db->insert($query);
				if ($prodinsert) {
					$msg = "<span class='sucess'> Produto inserido com sucesso.</span>";
					return $msg;
				} else {
					$msg = "<span class='error'> Produto não inserido.</span>";
					return $msg;
				}				           
			}
		}
						
		public function getAllProduct() {
			$query = "SELECT p.*, c.catNome, b.brandNome
					  FROM tbl_product as p, tbl_category as c, tbl_brand as b
					  WHERE p.catId = c.catId AND p.brandId = b.brandId
					  ORDER BY p.productId DESC";
			$result = $this->db->select($query);
			return $result;
			/*
			$query = "SELECT tbl_product.*, tbl_category.catNome, tbl_brand.brandNome
					  FROM tbl_product
					  INNER JOIN tbl_category
					  ON tbl_product.catId = tbl_category.catId
					  INNER JOIN tbl_brand
					  ON tbl_product.brandId = tbl_brand.brandId
			          ORDER BY tbl_product.productId DESC";			
			*/			
		}


		public function productUpdate($data, $file, $id) {
			$productNome = mysqli_real_escape_string($this->db->link, $data['productNome']);
			$catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
			$brandId     = mysqli_real_escape_string($this->db->link, $data['brandId']);
			$body        = mysqli_real_escape_string($this->db->link, $data['body']);
			$price       = mysqli_real_escape_string($this->db->link, $data['price']);			
			$type        = mysqli_real_escape_string($this->db->link, $data['type']);

			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $file['image']['name'];
			$file_size = $file['image']['size'];
			$file_temp = $file['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;
			if ($productNome == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "") {
				$msg = "<span class='error'> Campos não podem ser vazios.</span>";
				return $msg;
			} else {
				if (!empty($file_name)) {				

				if ($file_size > 1048567) {
					echo "<span class='error'> Imagem não pode ser maior que 1MB !</span>";
				} elseif (in_array($file_ext, $permited) === false) {
					echo "<span class='error'> Você pode fazer upload somente:-".implode(', ', $permited)."</span>";
				} else {
					move_uploaded_file($file_temp, $uploaded_image);					

					$query = "UPDATE tbl_product
							  SET
								  productNome = '$productNome',
								  catId       = '$catId',
								  brandId     = '$brandId',
								  body        = '$body',
								  price       = '$price',
								  image       = '$uploaded_image',
								  type        = '$type'
							  WHERE productId = '$id'";

					$produpdate = $this->db->update($query);					
					if ($produpdate) {
						$msg = "<span class='sucess'> Produto alterado com sucesso.</span>";
						return $msg;
					} else {
						$msg = "<span class='error'> Produto não alterado.</span>";
						return $msg;
					}				           
				}
			} else {
			
					$query = "UPDATE tbl_product
							  SET
								  productNome = '$productNome',
								  catId       = '$catId',
								  brandId     = '$brandId',
								  body        = '$body',
								  price       = '$price',
								  type        = '$type'
							  WHERE productId = '$id'";

					$produpdate = $this->db->update($query);					
					if ($produpdate) {
						$msg = "<span class='sucess'> Produto alterado com sucesso.</span>";
						return $msg;
					} else {
						$msg = "<span class='error'> Produto não alterado.</span>";
						return $msg;
					}				           

				}

			}
		}
						
		public function getProById($id) {
			$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function delProductById($id) {
			$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$getdata = $this->db->select($query);
			if ($getdata) {
				while ($delImg = $getdata->fetch_assoc()) {
					$dellink = $delImg['image'];
					unlink($dellink);
				}
			}
			
			$delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
			$deldata = $this->db->delete($delquery);
			if ($deldata) {
			 	$msg = "<span class='sucess'> Produto deletado com sucesso.</span>";
				return $msg;
			} else {
			   $msg = "<span class='error'> Produto não deletado.</span>";
			   return $msg;
			}
		}

		public function getFeaturedProduct(){
			$query = "SELECT * FROM tbl_product WHERE type = '0' ORDER BY productId DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function getNewProduct(){
			$query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function getSingleProduct($id) {
			$query = "SELECT p.*, c.catNome, b.brandNome
					  FROM tbl_product as p, tbl_category as c, tbl_brand as b
					  WHERE p.catId = c.catId AND p.brandId = b.brandId
					  AND p.productId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function latestFromIphone() {
			$query = "SELECT * FROM tbl_product WHERE brandId = '3' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}


		public function latestFromSony() {
			$query = "SELECT * FROM tbl_product WHERE brandId = '6' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}


		public function latestFromAcer() {
			$query = "SELECT * FROM tbl_product WHERE brandId = '1' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}


		public function latestFromSamsung() {
			$query = "SELECT * FROM tbl_product WHERE brandId = '2' ORDER BY productId DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function productByCat($id) {
			$catId  = mysqli_real_escape_string($this->db->link, $id);
			$query  = "SELECT * FROM tbl_product WHERE catId = '$catId'";
			$result = $this->db->select($query);
			return $result;
		}
	}
?>