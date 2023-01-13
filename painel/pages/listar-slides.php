<?php
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectIamgem = Mysql::conectar()->prepare("SELECT slide FROM `tb_site.slides` WHERE id = ?");
        $selectIamgem->execute(array($_GET['excluir']));

        $imagem = $selectIamgem->fetch()['slide'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_site.slides', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
    }elseif (isset($_GET['order']) && isset($_GET['id'])) {
        Painel::orderItem('tb_site.slides',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 10;

    $slides = Painel::selectAll('tb_site.slides',($paginaAtual - 1) * $porPagina ,$porPagina);
    
?>
<div class="box-content">
    <h2><i class="fa fa-id-card-o"></i> Slides Cadastrados</h2>
    <div class="waper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Imagem</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>#</td>
                <td>#</td>
            </tr>
            <?php 
                foreach ($slides as $key => $value) {
                
            ?>
            <tr>
                <td><?php echo $value['nome'];?></td>
                <td><img style="width: 50px; height: 50px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['slide'];?>"></td>
                <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slides?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
                <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?php echo $value['id'];?>"><i class="fa fa-times"></i> Excluir</a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=up&id=<?php echo $value['id'];?>"><i class="fa fa-angle-up"></i></a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=down&id=<?php echo $value['id'];?>"><i class="fa fa-angle-down"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="paginacao">
        <?php 
            $totalPaginas = ceil(count(Painel::selectAll('tb_site.slides')) / $porPagina);

            for ($i=0; $i < $totalPaginas; $i++) { 
                $numero = $i + 1;
                if($numero == $paginaAtual){
                    echo'<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$numero.'">'.$numero.'</a>';
                }else{
                    echo'<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$numero.'">'.$numero.'</a>';
                }
            }
        ?>
    </div><!--paginacao-->
</div><!--box-content-->