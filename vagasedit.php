<?php include 'inc/header.php';?>
<?php include 'classes/Vagas.php';?>

<?php
    if (!isset($_GET['id_vaga']) || $_GET['id_vaga'] == NULL ) {
        echo "<script> window.location = 'vagaslist.php' </script>";
    } else {       
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id_vaga']);
      }       
    
    $cat = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catNome   = $_POST['catNome'];
        $updateCat = $cat->catUpdate($catNome, $id);
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Atualiza Categoria</h2>
               <div class="block copyblock"> 
               <?php
                    if (isset($updateCat)) {
                        echo $updateCat;
                    }
               ?>
               <?php
                    $getCat = $cat->getCatById($id);
                    if ($getCat) {
                        while ($result = $getCat->fetch_assoc()) {                           
               ?>

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catNome" value="<?php echo $result['catNome'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Salvar" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>