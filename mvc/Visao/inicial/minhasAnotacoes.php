<body>
  <div class="container-fluid p-3 border">
    <div class="row">
      <div class="col">
  <img src="icon.png" class="img-fluid"/>
</div>
<div class="col">
      <ul class="nav p-3 justify-content-end">
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= $dados ?></a>
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
    <div class="container pt-4">
      <div class="row p-3">
      <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
          <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </nav>
      <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Todos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Minhas anotações</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Criar <i class="fa-solid fa-plus"></i></a>
  </li>
  </ul>
    </div>
    <div class="row">
  <?php 
  $contador = 0;
  foreach ($mensagens as $mensagem) : ?>

	<div class="col pb-4">
        <div class="card p-3" style="width: 18rem;">
        <h5 class="card-header"><i class="fa-solid fa-pen-to-square"></i> : <i class="fa-solid fa-trash"></i></h5>
            <div class="card-body">
              <h5 class="card-title"><?php echo $mensagem->getTitulo() ?></h5>
              <p class="card-text"><?= $mensagem->getTexto() ?></p>
            </div>
          </div>
	</div>
        <?php endforeach ?>
        </div>
</div>
    </div>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>