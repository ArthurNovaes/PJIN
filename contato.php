<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MonOP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/icone.ico">
</head>
<body>
    <div class="container">
      <div class="row">
        <?php include "header.html"; ?>
        <div class="contact" id="contato">
          
            <form action="" class="form-horizontal">
              <div class="col-sm-offset-4 col-sm-12"><legend style="width:30%;"><h1>Contato</h1></legend></div>
              <div class="form-group">
                <label for="nome" class="col-sm-4 control-label">Nome: </label>
                <div class="col-sm-4">
                  <input class="form-control" type="text" id="nome" placeholder="Nome">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-4 control-label">Email: </label>
                <div class="col-sm-4">
                  <input class="form-control" type="mail" id="email" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="assunto" class="col-sm-4 control-label">Assunto: </label>
                  <div class="col-sm-4">
                    <input class="form-control" type="text" id="assunto" placeholder="Assunto"><br>
                    </div>
              </div>
              <div class="form-group">
                <label for="mensagem" class="col-sm-4 control-label">Mensagem</label>
                <div class="col-sm-4">
                  <textarea class="form-control" rows="5" placeholder="Sua Mensagem"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-11">
                  <button type="submit" class="btn btn-default">Enviar Mensagem</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>    
    <?php include "footer.html"; ?>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>