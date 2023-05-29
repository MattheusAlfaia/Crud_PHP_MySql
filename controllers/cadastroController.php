<?php
class cadastraCurriculo{

    public function __construct(){
        include_once '../model/Dao.php';
    }

    public function cadastrar($nome, $email, $login, $senha, $cpf, $nascimento, $sexo, $estadoCivil, $escolaridade, $cursos, $experienciaProfissional, $salario)
    {
        $buscaUser = new cadastroModel();
        $buscaUser = $buscaUser->buscaUser($email, $cpf, $login);
        if ($buscaUser) {
            return false;
        } else {
            if($cursos!=''){
            $cursos = implode(",", $cursos);
            $salarioString = preg_replace("/[^0-9,.]/", "", $salario);
            $salarioString = str_replace(".", "", $salarioString);
            $salarioString = str_replace(",", ".", $salarioString);
            $salarioDecimal = (float) $salarioString;
            $salario = number_format($salarioDecimal, 2, ".", "");
            }else{
                $cursos = '';
            }
            $cadastrar = new cadastroModel();
            $cadastrar = $cadastrar->cadastrarUser($nome, $email, $login, $senha, $cpf, $nascimento, $sexo, $estadoCivil, $escolaridade, $cursos, $experienciaProfissional, $salario);
            if ($cadastrar != '') {
                return true;
            } else {
                echo "<script>alert('Erro ao cadastrar Curriculo!');</script>";
            }
        }
    }
}
