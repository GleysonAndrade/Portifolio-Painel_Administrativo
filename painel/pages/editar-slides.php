<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $slide = Painel::select('tb_site.slides','id = ?',array($id));
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
        <h2><i class="fa fa-pencil"></i> Editar Slide</h2>
        <form method="post" enctype="multipart/form-data">
            <?php
            if (isset($_POST['acao'])) {
                // Envie o formulário.
                $nome = $_POST['nome'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];
                
                if ($imagem['name'] != '') {
                    //Existe o upload de imagem
                    if (Painel::imagemValida($imagem)) {
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
                        Painel::update($arr);
                        $slide = Painel::select('tb_site.slides','id = ?',array($id));
                        Painel::alert('sucesso', 'Slide editado junto com a imagem');
                    } else {
                        Painel::alert('erro', 'O formato da imagem não é válido');
                    }
                } else {
                    $imagem = $imagem_atual;
                    $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
                    Painel::update($arr);
                    $slide = Painel::select('tb_site.slides','id = ?',array($id));
                    Painel::alert('sucesso', 'Slide foi editado com sucesso!');
                }
            }
            ?>
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">
            </div>
            <div class="form-group">
                <label>Imagem:</label>
                <input type="file" name="imagem">
                <input type="hidden" name="imagem_atual" value="<?php echo $slide['slide']; ?>">
            </div>
            <div class="form-group">
                <input type="submit" name="acao" value="Atualizar">
            </div>
        </form>
    </div>
    <!--box-content-->
</body>

</html>