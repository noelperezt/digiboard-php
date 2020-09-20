<div class="container">
    <form action="?controller=PessoasController&<?php echo isset($pessoas->id) ? "method=atualizar&id={$pessoas->id}" : "method=salvar"; ?>" method="post" enctype="multipart/form-data">
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Cadastro de Pessoas</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Nome:</label>
                <input type="text" class="form-control col-sm-8" name="nome" id="nome" value="<?php
                echo isset($pessoas->nome) ? $pessoas->nome : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Cargo:</label>
                <input type="text" class="form-control col-sm-8" name="cargo" id="cargo" value="<?php
                echo isset($pessoas->cargo) ? $pessoas->cargo : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">CPF:</label>
                <input type="text" class="form-control col-sm-8" name="cpf" id="cpf" value="<?php
                echo isset($pessoas->cpf) ? $pessoas->cpf : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Foto:</label>
                <input type="file" class="form-control col-sm-8" name="foto" id="foto" multiple="multiple" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])" value="<?php
                echo isset($pessoas->foto) ? $pessoas->foto : null;
                ?>"/>
            </div>
            <?php if (isset($pessoas->foto)):?>
                <div class="form-group form-row">
                <div class="col-sm-2 col-form-label text-right"></div>
                <img id = "img" src="<?php echo 'uploads/'.$pessoas->foto;?>" height="100">
                </div>   
            <?php endif; ?>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($pessoas->id) ? $pessoas->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <a class="btn btn-danger" href="?controller=PessoasController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function($) {
        $('#cpf').mask("999.999.99-99");
      } );
    </script>