<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('Conexao.php');

use Conexao\Conexao;

class Usuario extends Conexao
{
    protected $conectar;
    private $id;
    private $nome;
    private $email;
    private $dataNascimento;
    private $telefone;

    public function __construct()
    {
        //O método construtor armazenará, no atributo conectar, o retorno do método
        //conectaBd.
        $this->conectar = $this->conectarDB();
    }

    /**
     * Tem a responsabilidade
     * de realizar o decode do JSON recebido em um objeto $objCadastro =
     * json_decode($dados) e, depois, setar cada atributo desse objeto em um
     * atributo da classe.
     */
    public function setDados($dados)
    {
        $objCadastro = json_decode($dados);
        $this->nome = $objCadastro->nome;
        $this->email = $objCadastro->email;
        $this->dataNascimento = $objCadastro->dataNascimento;
        $this->telefone = $objCadastro->telefone;
    }

    /**
     * Recebe um JSON, chama
     * o método setDados, passando por parâmetro o JSON recebido. Depois de
     * interpretado e setado nos atributos, é hora de montar a string e executar a query
     * no banco.
     * Após inserir o valor, retornamos um resultado true ou false, representado
     * por 1 e 0, respectivamente.
     * @param $dados
     * @return int
     */
    public function inserirUsuario($dados)
    {
        $this->setDados($dados);

        $sql = "INSERT INTO usuario (nome, email, dataNascimento, telefone) values ('$this->nome', '$this->email', '$this->dataNascimento', '$this->telefone')";

        if ($this->conectar->query($sql) === true) {
            echo "Novo usuário criado com sucesso";
        } else {
            echo "Error: " . $sql . "</br>" . $this->conectar->error;
        }
    }

    public function inserirUserPreparado($dados)
    {
        $this->setDados($dados);

        $sql = "INSERT INTO usuario (nome, email, dataNascimento, telefone) values (?, ?, ?, ?)";

        // prepara a string
        $stmt = $this->conectar->prepare($sql);

        //realiza a associação dos valores
        $stmt->bind_param('ssss', $this->nome, $this->email, $this->dataNascimento, $this->telefone);

        //executamos a consulta no banco de dados
        if ($stmt->execute() === true) {
            echo "</br> Novo usuário preparado criado com sucesso";
        } else {
            echo "Error: " . $sql . "</br>" . $this->conectar->error;
        }
    }

    public function buscarUserPreparado($id)
    {
        $sql = "SELECT * FROM usuario where id = ?";

        $stmt = $this->conectar->prepare($sql);
        $stmt->bind_param("d", $id);

        $stmt->execute();

        //resgatará e associará cada registro em uma
        // posição no array $result.
        $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return json_encode($results);
    }

    /**
     * Realizará
     * uma consulta à tabela usuario, e retornará todos os usuários ordenados por
     * nome em ordem ascendente. Esse retorno é armazenado no atributo $sql,
     * que será um parâmetro a ser executado no método query().
     * @return false|string
     */
    public function listarUsuario()
    {
        $sql = "SELECT * FROM usuario order by nome ASC";

        $retorno = $this->conectar->query($sql);

        //necessitamos utilizar um laço de repetição para percorrer
        //esse resultado e de um array
        $usuarios = array();
        /**
         * Esse laço é responsável por pegar as informações no objeto e
         * associar os campos (nome e valor) pelo método fetch_assoc() em uma
         * variável local $linha. Essa variável será armazenada na posição atual do array
         * $usuarios[]=$linha
         */
        while ($linha = $retorno->fetch_assoc()) {
            $usuarios[] = $linha;
            echo PHP_EOL;
        }
        return json_encode($usuarios);
        echo "</br>";
    }

    public function editarUsuario($id, $dados)
    {
        $this->id = $id;
        $this->setDados($dados);

        echo $sql = "UPDATE usuario SET nome = '$this->nome',
email='$this->email', dataNascimento='$this->dataNascimento',
telefone='$this->telefone' WHERE id = '$this->id'";

        $retorno = $this->conectar->query($sql);
        if ($retorno) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editarUsuarioPreparado($id, $dados)
    {
        $this->id = $id;
        $this->setDados($dados);

        $sql = "UPDATE usuario SET nome = ?, email =?, dataNascimento=?, telefone=?
 WHERE id =?";

        $stmt = $this->conectar->prepare($sql);
        $stmt->bind_param("ssssd", $this->nome,
$this->email, $this->dataNascimento, $this->telefone, $this->id);
        $results = $stmt->execute();

        if ($results > 0)
            return 1;
        else
            return 0;
    }

    public function deletarUsuario($id)
    {
        $this->id = $id;

        $sql = "DELETE FROM usuario WHERE id = $this->id";

        $retorno = $this->conectar->query($sql);
        if ($retorno) {
            return 1;
        } else {
            return 0;
        }
    }

    public function deletarUsuarioPreparado($id)
    {
        $this->id = $id;
        $sql = "DELETE FROM usuario WHERE id = ?";

        $stmt = $this->conectar->prepare($sql);
        $stmt->bind_param("d", $id);
        $results = $stmt->execute();

        if ($results > 0)
            return 1;
        else
            return 0;
    }
}
