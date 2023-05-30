<?php
class atualizaCurriculo
{

    public function __construct()
    {
        include_once '../model/Dao.php';
    }

    public function dadosUser($id_user, $email)
    {
        $dadosUser = new cadastroModel();
        $dadosUser = $dadosUser->getCurriculo($id_user, $email);
        return $dadosUser;
    }

    public function atualizarCurriculo($nome, $email, $login, $senha, $cpf, $nascimento, $sexo, $estadoCivil, $escolaridade, $cursos, $experienciaProfissional, $salario)
    {
        $cursos = implode(",", $cursos);
        $salarioString = preg_replace("/[^0-9,.]/", "", $salario);
        $salarioString = str_replace(".", "", $salarioString);
        $salarioString = str_replace(",", ".", $salarioString);
        $salarioDecimal = (float) $salarioString;
        $salario = number_format($salarioDecimal, 2, ".", "");
        $atualizarCurriculo = new cadastroModel();
        $atualizarCurriculo = $atualizarCurriculo->atualizaCurriculo($nome, $email, $login, $senha, $cpf, $nascimento, $sexo, $estadoCivil, $escolaridade, $cursos, $experienciaProfissional, $salario);
        return $atualizarCurriculo;
    }

    public function apagarCurriculo($id_user)
    {
        $apagarCurriculo = new cadastroModel();
        $apagarCurriculo = $apagarCurriculo->apagarCurriculo($id_user);
        return $apagarCurriculo;
    }
}
