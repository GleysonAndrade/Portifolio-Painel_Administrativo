<?php
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.servicos', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
    }elseif (isset($_GET['order']) && isset($_GET['id'])) {
        Painel::orderItem('tb_site.servicos',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 10;

    $servicos = Painel::selectAll('tb_site.servicos',($paginaAtual - 1) * $porPagina ,$porPagina);
    
?>
<div class="box-content">
    <h2><i class="fa fa-id-card-o"></i> Serviços Cadastrados</h2>
    <div class="waper-table">
        <table>
            <tr>
                <td>Serviço</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>#</td>
                <td>#</td>
            </tr>
            <?php 
                foreach ($servicos as $key => $value) {
                
            ?>
            <tr>
                <td><?php echo $value['servicos'];?></td>
                <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-servico?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
                <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?excluir=<?php echo $value['id'];?>"><i class="fa fa-times"></i> Excluir</a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=up&id=<?php echo $value['id'];?>"><i class="fa fa-angle-up"></i></a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=down&id=<?php echo $value['id'];?>"><i class="fa fa-angle-down"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="paginacao">
        <?php 
            $totalPaginas = ceil(count(Painel::selectAll('tb_site.servicos')) / $porPagina);

            for ($i=0; $i < $totalPaginas; $i++) { 
                $numero = $i + 1;
                if($numero == $paginaAtual){
                    echo'<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$numero.'">'.$numero.'</a>';
                }else{
                    echo'<a href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$numero.'">'.$numero.'</a>';
                }
            }
        ?>
    </div><!--paginacao-->
</div><!--box-content-->