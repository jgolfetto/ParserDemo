<?php
  header('Content-Type: text/html; charset=ISO8859-1');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Deixando as leis palatáveis</title>
  <meta name="description" content="Formatando o visual das leis">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php
          //carrega o arquivo
          $html = file_get_contents('http://www.planalto.gov.br/ccivil_03/Constituicao/ConstituicaoCompilado.htm');
          //pega apenas o conteudo do body
          preg_match("/<body[^>]*>(.*?)<\/body>/is", $html, $matches);
          //remove a formatação inline
          $content = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $matches[1]);
          //remove tags vazias
          $content = preg_replace("/<[^\/>][^>]*><\/[^>]+>/",'', $content);
          //imprime na tela
          echo $content;
        ?>
      </div>
    </div>
  </div>
</body>
</html>
