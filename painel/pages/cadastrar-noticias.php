<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Cadastrar Notícia</h2>
    <form method="post" enctype="multipart/form-data">
        <?php
        if (isset($_POST['acao'])) {
            $categoria_id = $_POST['categoria_id']
            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo']
            $capa = $_FILES['capa'];

            if ($titulo == '' || $conteudo == '') {
                Painel::alert('erro', 'O campos vázios não são permetidos!');
            } else {
                //Podemos cadastrar!
                if (Painel::imagemValida($imagem) == false) {
                    Painel::alert('erro', 'O formaro especificado não está correto!');
                } else if($capa['tmp_name'] == '') {
                    Painel::alert('erro','A imagem de capa precisa ser selecionada.');
                }else{
                    Painel::('sucesso','Cadastro realizado com sucesso!');
                }
            }
        }
        ?>
        <div class="form-group">
            <label>Categoria:</label>
            <select name="categoria_id">
                <?php 
                    $categorias = Painel::selectAll('tb_site.categorias');
                    foreach ($categorias as $key => $value) {
                        
                ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Título:</label>
            <input type="text" name="titulo">
        </div>
        <div class="form-group">
            <label>Conteúdo:</label>
            <textarea name="conteudo"></textarea>
        </div>
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="capa">
            <input type="hidden" name="imagem_atual">
        </div>
        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="nome_tabela" value="tb_site.noticias">
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>