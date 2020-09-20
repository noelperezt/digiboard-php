<nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">DIGIBOARD</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="?controller=PessoasController&method=criar" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i></a></li>
              </ul>
          </div>
        </div>
</nav>
<div class = "container">
    <div class="card">
        <div class="card-header">Lista de Pessoas</div>
        <div class="card-body">
            <table class="table table-bordered table-striped" style="top:40px;">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>CPF</th>
                        <th>Foto</th>
                        <th>Ações </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($pessoas) {
                        foreach ($pessoas as $pessoa) {
                            ?>
                            <tr>
                                <td width="20%"><?php echo $pessoa->nome; ?></td>
                                <td width="20%"><?php echo $pessoa->cargo; ?></td>
                                <td width="20%"><?php echo $pessoa->cpf; ?></td>
                                <td width="20%"><center><img src="<?php echo 'uploads/'.$pessoa->foto;?>" height="40"></center></td>
                                <td width="20%">
                                    <center>
                                        <a href="?controller=PessoasController&method=editar&id=<?php echo $pessoa->id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-user-edit"></i></a>
                                        <a href="?controller=PessoasController&method=excluir&id=<?php echo $pessoa->id; ?>"  onclick="return confirm('tem certeza de apagar o cadastro?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                    </center>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">Nenhum registro encontrado</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>