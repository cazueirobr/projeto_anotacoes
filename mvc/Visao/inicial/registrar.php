<div class="container-fluid p-3 border">
    <div class="row">
      <div class="col">
  <img src="icon.png" class="img-fluid"/>
</div>
<div class="col">
      <ul class="nav p-3 justify-content-end">
          <li class="nav-item">
              <a class="nav-link" href="Login.html">Logar</a>
           
            <li class="nav-item">
              <button onclick="window.location.href = 'Registrar.html'" type="button" class="btn btn-outline-warning text-dark">Registrar


                <i class="fa-sharp fa-solid fa-user-plus"></i></button>
            </li>
          </li>
      </ul>
    </div>
  </div>
  </div>
    <div class="container-fluid">
    <div class="row justify-content-start p-4">
        <div class="col-1">
        <h5><a href="<?= URL_RAIZ?>"><i class="fa-solid fa-person-walking-arrow-loop-left">Voltar</i></a></h5>
        </div>
      </div>
    </div>
    <div class="container pt-5">
       
        <form action="<?php URL_RAIZ . 'registrar'?>" method='post'>
            <div class="row align-items-center justify-content-center vh-100">
            <div class="col">
            <div class="form-group">
                 <label for="exampleInputEmail1">Nome de usuário</label>
                 <input type="text" class="form-control" id="Nome" name="nome" placeholder="Digite um nome de usúario">
                  </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Endereço de email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Seu email">
            
            </div>
            
            
            <div class="form-group">
              <label for="exampleInputPassword1">Senha</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Senha">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
          </form>
       

    </div>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>