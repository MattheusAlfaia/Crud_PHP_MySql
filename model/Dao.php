<?php
include_once 'conn.php';
class cadastroModel extends MysqlConnection{
    
    public function __construct(){
        parent::__construct();
    }

    public function login($login, $senha){
        $query = "SELECT * FROM curriculos WHERE Login_User = :login_user AND Senha = :senha";
        try {
            $result = $this->MySql->prepare($query);
            $result->bindParam(':login_user', $login);
            $result->bindParam(':senha', $senha);
            if ($result->execute()) {
                $result = $result->fetchAll(PDO::FETCH_ASSOC);
                if (count($result) > 0) {
                    return $result;
                }else {
                    return false;
                }        
            } else {
                echo "<script>alert('Erro ao buscar usuário!');</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function buscaUser($email, $Cpf, $login){
        $query = "SELECT * FROM curriculos WHERE Email = :email OR CPF = :cpf OR Login_User = :login_user";
        try {
            $result = $this->MySql->prepare($query);
            $result->bindParam(':email', $email);
            $result->bindParam(':cpf', $Cpf);
            $result->bindParam(':login_user', $login);
            if ($result->execute()) {
                $result = $result->fetchAll(PDO::FETCH_ASSOC);
                if (count($result) > 0) {
                    return true;
                }else {
                    return false;
                }        
            } else {
                echo "<script>alert('Erro ao buscar usuário!');</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function cadastrarUser($nome, $email, $login, $senha, $cpf, $nascimento, $sexo, $estadoCivil, $escolaridade, $cursos, $experienciaProfissional, $salario){
        $timezone = new DateTimeZone('America/Manaus');
        $dataHora = new DateTime('now', $timezone);
        $data = $dataHora->format('Y-m-d H:i:s');

        $query = "INSERT INTO curriculos(Nome, Email, Login_User, Senha, CPF, DataNascimento, Sexo, EstadoCivil, Escolaridade, CursosEspecializacoes, ExperienciaProfissional, PretensaoSalarial, dataRegistro";
        $query .= ") VALUES (:nome, :email, :login, :senha, :cpf, :nascimento, :sexo, :estadoCivil, :escolaridade, :cursos, :experienciaProfissional, :salario, :dataRegistro)";
        $result = $this->MySql->prepare($query);
        $result->bindParam(':nome', $nome);
        $result->bindParam(':email', $email);
        $result->bindParam(':login', $login);
        $result->bindParam(':senha', $senha);
        $result->bindParam(':cpf', $cpf);
        $result->bindParam(':nascimento', $nascimento);
        $result->bindParam(':sexo', $sexo);
        $result->bindParam(':estadoCivil', $estadoCivil);
        $result->bindParam(':escolaridade', $escolaridade);
        $result->bindParam(':cursos', $cursos);
        $result->bindParam(':experienciaProfissional', $experienciaProfissional);
        $result->bindParam(':salario', $salario);
        $result->bindParam(':dataRegistro', $data);
        if ($result->execute()) {
            $user_id = $this->MySql->lastInsertId();
            return $user_id;
        } else {
            return false;
        }
    }

    public function getCurriculo($id_user, $email){
        $query = "SELECT * FROM curriculos WHERE ID = :id_user AND Email = :email";
        try {
            $result = $this->MySql->prepare($query);
            $result->bindParam(':id_user', $id_user);
            $result->bindParam(':email', $email);
            if ($result->execute()) {
                $result = $result->fetchAll(PDO::FETCH_OBJ);
                if (count($result) > 0) {
                    return $result;
                }else {
                    return false;
                }        
            } else {
                echo "<script>alert('Erro ao buscar usuário!');</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function atualizaCurriculo($nome, $email, $login, $senha, $cpf, $nascimento, $sexo, $estadoCivil, $escolaridade, $cursos, $experienciaProfissional, $salario){
        $query = "UPDATE curriculos SET Nome = :nome, Email = :email, Login_User = :login, Senha = :senha, CPF = :cpf, DataNascimento = :nascimento, Sexo = :sexo, EstadoCivil = :estadoCivil, Escolaridade = :escolaridade, CursosEspecializacoes = :cursos, ExperienciaProfissional = :experienciaProfissional, PretensaoSalarial = :salario WHERE Email = :email";
        $result = $this->MySql->prepare($query);
        $result->bindParam(':nome', $nome);
        $result->bindParam(':email', $email);
        $result->bindParam(':login', $login);
        $result->bindParam(':senha', $senha);
        $result->bindParam(':cpf', $cpf);
        $result->bindParam(':nascimento', $nascimento);
        $result->bindParam(':sexo', $sexo);
        $result->bindParam(':estadoCivil', $estadoCivil);
        $result->bindParam(':escolaridade', $escolaridade);
        $result->bindParam(':cursos', $cursos);
        $result->bindParam(':experienciaProfissional', $experienciaProfissional);
        $result->bindParam(':salario', $salario);
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function apagarCurriculo($id_user){
        $query = "DELETE FROM curriculos WHERE ID = :id_user";
        try {
            $result = $this->MySql->prepare($query);
            $result->bindParam(':id_user', $id_user);
            if ($result->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listarCurriculos(){
        $query = "SELECT * FROM curriculos";
        try {
            $result = $this->MySql->prepare($query);
            if ($result->execute()) {
                $result = $result->fetchAll(PDO::FETCH_OBJ);
                if (count($result) > 0) {
                    return $result;
                }else {
                    return false;
                }        
            } else {
                echo "<script>alert('Erro ao buscar!');</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
