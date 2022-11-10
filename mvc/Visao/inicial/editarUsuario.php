<div class="container-fluid p-3 border">
    <div class="row">
      <div class="col">
  <img src="icon.png" class="img-fluid"/>
</div>
<div class="col">
      <ul class="nav p-3 justify-content-end">
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= $perfil->getNome() ?></a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Editar conta</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" onclick="$('#logout').submit()">Sair</a>
      <form id="logout" action="<?= URL_RAIZ . 'logar' ?>" method="post" class="hidden">
						<input type="hidden" name="_metodo" value="DELETE">
					</form>
    </div>
  </li>
          </li>
      </ul>
    </div>
  </div>
  </div>
    <div class="container-fluid">
    <div class="row justify-content-start p-4">
        <div class="col-1">
        <h5><a href="<?= URL_RAIZ . 'notes'?>"><i class="fa-solid fa-person-walking-arrow-loop-left">Voltar</i></a></h5>
        </div>
      </div>
    </div>
    <div class="container pt-5">
       
    <form action="<?php URL_RAIZ . 'notes/perfil'?>" method='post'>
            <input type="hidden" name="_metodo" value="PATCH">
            <div class="row align-items-center justify-content-center vh-100">
            <div class="col">
            <div class="form-group">
                 <label for="exampleInputEmail1">Nome</label>
                 <input type="text" class="form-control" id="Nome" name="nome" value="<?= $perfil->getNome()?>">
                 <label for="exampleInputEmail1">E-mail</label>
                 <input type="text" class="form-control" id="Nome" name="email" value="<?= $perfil->getEmail()?>">
                 <label for="exampleInputEmail1">Nova senha</label>
                 <input type="text" class="form-control" id="Nome" name="senha1">
                 <label for="exampleInputEmail1">Confirmar senha</label>
                 <input type="text" class="form-control" id="Nome" name="senha2">
                 
                  </div>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
            
        </div>
    </div>
          </form>
       

    </div>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>