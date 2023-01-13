<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $noticia = Painel::select('tb_site.noticias','id = ?',array($id));
    }else{
        Painel::alert('erro','Você precisa parssar o paramentro id');
        die();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <div class="box-content">
        <h2><i class="fa fa-pencil"></i> Editar Notícia</h2>
        <form method="post" enctype="multipart/form-data">
            <?php
            if (isset($_POST['acao'])) {
                // Envie o formulário.
                $nome = $_POST['titulo'];
                $conteudo = $_POST['conteudo'];
                $categoria = $_POST['categoria_id'];
                $imagem = $_FILES['capa'];
                $imagem_atual = $_POST['imagem_atual'];
                $verifica = Mysql::conectar()->prepare("SELECT `id` FROM `tb_site.noticias` WHERE titulo = ? AND categoria_id = ? AND id != ?");
                $verifica->execute(array($nome,$categoria,$id));

                if($verifica->rowCount() == 0){
                    if ($imagem['name'] != '') {
                        //Existe o upload de imagem
                        if (Painel::imagemValida($imagem)) {
                            Painel::deleteFile($imagem_atual);
                            $imagem = Painel::uploadFile($imagem);
                            $slug = Painel::generateSlug($nome);
                            $arr = ['titulo'=>$nome,'categoria_id'=>$categoria,'data'=>date('Y-m-d'),'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
                            Painel::update($arr);
                            $noticia = Painel::select('tb_site.noticias','id = ?',array($id));
                            Painel::alert('sucesso', 'A notícia foi editada junto com a imagem!');
                        } else {
                            Painel::alert('erro', 'O formato da imagem não é válido');
                        }
                    } else {
                        $imagem = $imagem_atual;
                        $slug = Painel::generateSlug($nome);
                        $arr = ['titulo'=>$nome,'categoria_id'=>$categoria,'data'=>date('Y-m-d'),'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
                        Painel::update($arr);
                        $noticia = Painel::select('tb_site.noticias','id = ?',array($id));
                        Painel::alert('sucesso', 'A notícia foi editada com sucesso!');
                    }
                }else{
                    Painel::alert('erro','Já existe uma notícia com esse nome!');
                }
            }
            ?>
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="titulo" required value="<?php echo $noticia['titulo']; ?>">
            </div>
            <div class="form-group">
                <label>Conteúdo:</label>
                <textarea class="tinymce" name="conteudo"><?php echo $noticia['conteudo']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Categoria:</label>
                <select name="categoria_id">
                    <?php 
                        $categorias = Painel::selectAll('tb_site.categorias');
                        foreach ($categorias as $key => $value) {
                            
                    ?>
                    <option <?php if($value['id'] == $noticia['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Imagem:</label>
                <input type="file" name="capa">
                <input type="hidden" name="imagem_atual" value="<?php echo $noticia['capa']; ?>">
            </div>
            <div class="form-group">
                <input type="submit" name="acao" value="Atualizar">
            </div>
        </form>
    </div>
    <!--box-content-->
</body>

</html>