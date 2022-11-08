<div class="container-fluid p-3 border">
    <div class="row">
      <div class="col">
  <img src="icon.png" class="img-fluid"/>
</div>
<div class="col">
      <ul class="nav p-3 justify-content-end">
          <li class="nav-item">
              <a class="nav-link" href="<?= URL_RAIZ . 'logar'?>">Logar</a>
           
            <li class="nav-item">
              <a href = "<?= URL_RAIZ . 'registrar' ?>" type="button" class="btn btn-outline-warning text-dark">Registrar


                <i class="fa-sharp fa-solid fa-user-plus"></i></a>
            </li>
          </li>
      </ul>
    </div>
  </div>
  </div>
    <div class="container pt-4">
      <div class="row p-3">
      <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="<?php URL_RAIZ . 'pesquisar'?>" method='post'>
          <input class="form-control" name="pesquisa" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </nav>
    </div>
  <div class="row">
  <?php 
  foreach ($mensagens as $mensagem) : ?>

	<div class="col pb-4">
        <div class="card p-3" style="width: 18rem;">
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
