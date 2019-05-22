<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';?>

<?php
	$cat = new Category();

	if (isset($_GET['delcat'])) {		
		$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
		$delcat = $cat->delCatById($id);
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Lista de Categoria</h2>
                <div class="block">
                <?php
                	if(isset($delcat)){
                		echo $delcat;
                	}
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id.</th>
							<th>Nome Categoria</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$getCat = $cat->getAllCat();
						if ($getCat) {
							$i = 0;
							while ( $result = $getCat->fetch_assoc()) {
								$i++;					
					?>
						<tr class="odd gradeX">
							<td><?php echo $result['catId'];?></td>
							<td><?php echo $result['catNome'];?></td>
							<td><a href="catedit.php?catId=<?php echo $result['catId'];?>">Alterar</a> |
								<a onclick="return confirm('Tem certeza que deseja deletar !')"
								   href="?delcat=<?php echo $result['catId'];?>">Excluir</a>
							</td>
						</tr>
					<?php
							}
						}
					?>						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

