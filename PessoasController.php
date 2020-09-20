<?php
class PessoasController extends Controller
{
  
    public function listar()
    {
        $pessoas = Pessoas::all();
        return $this->view('grade', ['pessoas' => $pessoas]);
    }
 
    public function criar()
    {
        return $this->view('form');
    }
 
    public function editar($dados)
    {
        $id = (int) $dados['id'];
        $pessoas = Pessoas::find($id);
 
        return $this->view('form', ['pessoas' => $pessoas]);
    }

    public function saveimg()
    {
        $imgName = $_FILES['foto']['name'];
		$imgTmp = $_FILES['foto']['tmp_name'];
        $imgSize = $_FILES['foto']['size'];

        $upload_dir = 'uploads/';

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

		$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

		$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

		if(in_array($imgExt, $allowExt)){

			if($imgSize < 5000000){
				move_uploaded_file($imgTmp ,$upload_dir.$userPic);
			}else{
				$errorMsg = 'Image muito grande';
			}
		}else{
			$errorMsg = 'Por favor sleccione um formato de imagem valido';
        }
        
        return $userPic;
    }
 
    public function salvar()
    {
        $pessoas = new Pessoas;
        $pessoas->nome = $this->request->nome;
        $pessoas->cargo = $this->request->cargo;
        $pessoas->cpf = $this->request->cpf;
        $pessoas->foto = $this->saveimg();

        if ($pessoas->save()) {
            return $this->listar();
        }
    }
 
    public function atualizar($dados)
    {
        $id = (int) $dados['id'];
        $pessoas = Pessoas::find($id);
        $pessoas->nome = $this->request->nome;
        $pessoas->cargo = $this->request->cargo;
        $pessoas->cpf = $this->request->cpf;
        if($_FILES['foto']['size'] != 0)
        {
            $pessoas->foto = $this->saveimg();
        }
        $pessoas->save();
 
        return $this->listar();
    }
 
    public function excluir($dados)
    {
        $id = (int) $dados['id'];
        $pessoas = Pessoas::destroy($id);
        return $this->listar();
    }
}