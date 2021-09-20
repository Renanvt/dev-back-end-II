<?php

namespace UsuarioPDO;

use ConexaoPDO\ConexaoPDO;


require_once('ConexaoPDO.php');

class UsuarioPDO extends ConexaoPDO
{
    protected $conectar;
    private $nome;
    private $email;
    private $dataNascimento;
    private $telefone;


    public function __construct()
    {
        $this->conectar = $this->conectarDB();
    }

    function setDados($dados)
    {
        $objCadastro = json_decode($dados);
        $this->nome = $objCadastro->nome;
        $this->email = $objCadastro->email;
        $this->dataNascimento = $objCadastro->dataNascimento;
        $this->telefone = $objCadastro->telefone;
    }

    public function inserirUserPreparado($dados)
    {
        $this->setDados($dados);

        $sql = "INSERT INTO usuario (nome, email, dataNascimento, telefone)
value (:NOME, :EMAIL, :DATANASCIMENTO, :TELEFONE)";

        $stmt = $this->conectar->prepare($sql);

        /*não utilizamos o bindParams(), executamos um array dentro do comando execute(). Essa é uma outra forma de se utilizar a associação
e a preparação. Caso deseje optar por fazer os bindParams(), terá que fazer
para todos os atributos*/
        $results = $stmt->execute(
            array(
                ":NOME" => $this->nome,
                ":EMAIL" => $this->email,
                ":DATANASCIMENTO" => $this->dataNascimento,
                ":TELEFONE" => $this->telefone
            )
        );

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function listarUsuario()
    {
        $sql = "SELECT * FROM usuario order by nome ASC";

        //Não estamos associando
        //parâmetros à string preparada
        $stmt = $this->conectar->prepare($sql);
        $stmt->execute();

        /*
         executamos e resgatamos todos os registros que estão no objeto $stmt->fetchAll(PDO::FETCH_ASSOC)
e, após, associamos cada registro ao atributo $results.
        */
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($results);
    }

    public function buscarUsuario($id)
    {
        $sql = "SELECT * FROM usuario where id = :ID";

        $stmt = $this->conectar->prepare($sql);
        //Após preparada, associaremos o parâmetro utilizando o método bindParam
        $stmt->bindParam(":ID", $id);
        $stmt->execute();

        //realiza a associação do objeto, retornado no atributo results.
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($results);
    }

    public function editarUser($id, $dados)
    {
        $this->setDados($dados);
        $this->id = $id;

        $sql = "UPDATE usuario SET nome=:NOME, email=:EMAIL,
dataNascimento=:DATANASCIMENTO, telefone=:TELEFONE WHERE id= :ID";

        $stmt = $this->conectar->prepare($sql);
        $results = $stmt->execute(
            array(
                ":NOME" => $this->nome,
                ":EMAIL" => $this->email,
                ":TELEFONE" => $this->telefone,
                ":DATANASCIMENTO" => $this->dataNascimento,
                ":ID" => $this->id
            )
        );

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deletarUser($id)
    {
        $this->id = $id;

        $sql = "DELETE FROM usuario WHERE id= :ID";

        $stmt = $this->conectar->prepare($sql);
        $stmt->bindParam(":ID", $this->id);
        $results = $stmt->execute();

        $count = $stmt->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
}
