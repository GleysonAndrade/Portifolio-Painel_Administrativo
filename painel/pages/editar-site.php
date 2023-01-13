<?php 
    $site = Painel::select('tb_site.config',false);
?>
<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Editar Configurações do Site</h2>
    <form method="post" enctype="multipart/form-data">
        <?php
        if (isset($_POST['acao'])) {
            if(Painel::update($_POST,true)){
                Painel::alert('sucesso', 'O site foi editado com sucesso!');
                $site = Painel::select('tb_site.config',false);
            }else{
                Painel::alert('erro', 'Campos vázios não são permetidos');
            }
        }
        ?>
        <div class="form-group">
            <label>Titulo do site:</label>
            <input type="text" name="titulo_site" value="<?php echo $site['titulo_site'];?>">
        </div>
        <div class="form-group">
            <label>Nome autor:</label>
            <input type="text" name="nome_autor" value="<?php echo $site['nome_autor'];?>">
        </div>
        <div class="form-group">
            <label>Descição:</label>
            <textarea name="descricao"><?php echo $site['descricao'];?></textarea>
        </div>
        <div class="form-group">
            <label>Icone 1:</label>
            <input type="text" name="icone1" value="<?php echo $site['icone1'];?>">
        </di>
        <div class="form-group">
            <label>Descrição icone 1:</label>
            <textarea name="descricao1"><?php echo $site['descricao1'];?></textarea>
        </div>
        <div class="form-group">
            <label>Icone 2:</label>
            <input type="text" name="icone2" value="<?php echo $site['icone2'];?>">
        </di>
        <div class="form-group">
            <label>Descrição icone 2:</label>
            <textarea name="descricao2"><?php echo $site['descricao2'];?></textarea>
        </div>
        <div class="form-group">
            <label>Icone 3:</label>
            <input type="text" name="icone3" value="<?php echo $site['icone3'];?>">
        </di>
        <div class="form-group">
            <label>Descrição icone 3:</label>
            <textarea name="descricao3"><?php echo $site['descricao3'];?></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.config">
            <input type="submit" name="acao" value="Atualizar">
        </div>
    </form>
</div>