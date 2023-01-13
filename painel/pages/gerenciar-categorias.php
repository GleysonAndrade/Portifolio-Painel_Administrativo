<?php
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.categorias', $idExcluir);
        $noticias = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE categoria_id=?");
        $noticias->execute(array($idExcluir));
        $noticias = $noticias->fetchAll();
        foreach ($noticias as $key => $value) {
            $imgDelete = $value['capa'];
            Painel::deleteFile($imgDelete);
        }
        $noticias = Mysql::conectar()->prepare("DELETE FROM `tb_site.noticias` WHERE categoria_id=?");
        $noticias->execute(array($idExcluir));
        Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-categorias');
    }elseif (isset($_GET['order']) && isset($_GET['id'])) {
        Painel::orderItem('tb_site.categorias',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 10;

    $categorias = Painel::selectAll('tb_site.categorias',($paginaAtual - 1) * $porPagina ,$porPagina);
    
?>
<div class="box-content">
    <h2><i class="fa fa-id-card-o"></i> Categorias Cadastradas</h2>
    <div class="waper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>#</td>
                <td>#</td>
            </tr>
            <?php 
                foreach ($categorias as $key => $value) {
                
            ?>
            <tr>
                <td><?php echo $value['nome'];?></td>
                <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-categoria?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
                <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?excluir=<?php echo $value['id'];?>"><i class="fa fa-times"></i> Excluir</a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?order=up&id=<?php echo $value['id'];?>"><i class="fa fa-angle-up"></i></a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?order=down&id=<?php echo $value['id'];?>"><i class="fa fa-angle-down"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="paginacao">
        <?php 
            $totalPaginas = ceil(count(Painel::selectAll('tb_site.categorias')) / $porPagina);

            for ($i=0; $i < $totalPaginas; $i++) { 
                $numero = $i + 1;
                if($numero == $paginaAtual){
                    echo'<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$numero.'">'.$numero.'</a>';
                }else{
                    echo'<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$numero.'">'.$numero.'</a>';
                }
            }
        ?>
    </div><!--paginacao-->
</div><!--box-content-->