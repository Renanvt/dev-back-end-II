# Tópicos

- [API: conceito](#API:-conceito)
- [Extensão MySQLi](#Extensão-MySQLi)
- [PreparadStatement](#PreparadStatement)
- [Extensão-PDO](#Extensão-PDO)

# API: conceito

Em uma definição formal, o conceito de API está relacionado a um conjunto de rotinas e padrões estabelecidos por um
software para a utilização das suas funcionalidades por outros aplicativos. O conceito de API nada mais é do que uma
forma de comunicação entre sistemas. Elas permitem a integração entre dois sistemas, em que um deles fornece informações
e serviços que podem ser utilizados pelo outro, sem a necessidade de o sistema que consome a API conhecer detalhes de
implementação do software

> Fonte: ALVES, F. Manipulação de dados entre PHP com as APIs (mysqli, mysqli prepared e pdo). In: TAKE, 2019 Programação back end II. 22.ed. Maringa, PR: Centro Universitário de Maringá, 2019. p. 159


Atualmente, o PHP se conecta com diversos gerenciadores de bancos de dados disponíveis no mercado, sejam pagos ou free,
tais como: Oracle, SQLServer, PostgreSql, Mysql, Interbase, Db2, o MariaDB, entre outros. Para cada tipo de gerenciador
de banco de dados, o PHP dispõe de funções específicas para conexão, bem como para realizar as consultas ao banco.

Como dito anteriormente, o PHP dispõe de diversas funções para trabalhar com banco de dados. Contudo, para que isso seja
possível, é necessário que o seu servidor web tenha habilitado as configurações das extensões necessárias para que o seu
gerenciador possa se conectar com o servidor PHP. Caso o seu não esteja habilitado, você deverá abrir o arquivo de
configuração (**php.ini**). No meu servidor, este arquivo se encontra no diretório (C:\xampp\php). Ao abri-lo, procure
pelas linhas a seguir, e, caso elas tenham um (;) no início, retire-os, salve o arquivo e reinicie o seu servidor web,
caso o tenha inicializado.

```bash
extension=mysqli
extension=pdo_mysql
```

A primeira extensão ```extension=mysqli``` habilita a conexão do PHP com o gerenciador do banco de dados Mysql, e a
segunda extensão ```extension=pdo_mysql``` habilita o driver de conexão com o PDO (PHP Data Objects). Ambas serão
explicadas no decorrer desta aula e das demais. Sugiro olhar o arquivo todo para que tenha uma maior familiaridade com o
poder do seu servidor, mas cuidado:
uma alteração errada pode inativar o seu servidor.


> Fonte: ALVES, F. Manipulação de dados entre PHP com as APIs (mysqli, mysqli prepared e pdo). In: ALVES, Programação back end II. 22.ed. Maringa, PR: Centro Universitário de Maringá, 2019. p. 153-154

# Extensão MySQLi

O Mysqli é uma extensão do PHP que substitui a extensão antiga API do Mysql, que poderia ser utilizado até a versão 5.6
do PHP. Agora, a partir da versão 6 do PHP, essa é a extensão disponível para a nova versão da API do MySQL, e esta, por
sua vez, aproveita os recursos avançados do Mysql. MySQLi inclui recursos aprimorados que o MySQL não realiza. Por
exemplo, MySQLi pode suportar declarações preparadas para o cliente e do lado do servidor, incluindo várias instruções

O MySQLi pode ser utilizado de duas formas: orientada ou estrutural.

```php
$objetoInstancia = new Mysqli("<servidor>", "<usuário>", "<senha>", "<nome do banco de dados>");
```

Após a conexão ser realizada, ou seja, após o objeto de conexão ser instanciado, ele carregará consigo todos os
atributos e comportamentos da classe. Desta forma, poderemos utilizar os métodos que a classe disponibiliza, além de
trabalhar com as declarações preparadas.

> Fonte: ALVES, F. Manipulação de dados entre PHP com as APIs (mysqli, mysqli prepared e pdo). In: ALVES,Programação back end II. 22.ed. Maringa, PR: Centro Universitário de Maringá, 2019. p. 154-156

# PreparadStatement

A API do Mysqli proporciona uma maior performance e segurança em suas consultas ao banco de dados. Para isso, devemos
utilizar o recurso de preparação de consultas, recurso conhecido como PreparadStatement (declaração preparada). Esse
recurso prepara as consultas de forma que recebam por parâmetros as variáveis necessárias, evitando, assim, a injeção de
códigos maliciosos.

Uma instrução preparada ou parametrizada é usada para executar a mesma instrução repetidamente com alta eficiência,
melhorando a performance, pois é preparada apenas uma vez e executada quantas vezes forem necessárias. A sua execução
consiste em duas etapas: preparar e executar.

No estágio de preparação, utilizaremos a função ```prepare()```. O método
```prepare``` enviará uma consulta SQL com valores vazios como espaços reservados (com um ponto de interrogação para
cada valor). Após a preparação, é hora de realizar as vinculações, neste caso, utilizaremos o método ```bind_param()```,
que vinculará as variáveis aos espaços reservados delimitados pelo sinal de (?)
na consulta preparada, informando cada variável, junto com seu tipo. Existem, atualmente, quatro tipos de variáveis,
sendo:

- i - Integer
- d - duplo
- s - String
- b - Blob

Após a preparação e a vinculação dos parâmetros, é hora de executar a consulta, para isso, utilizaremos o método
```execute()```, que fará uma verificação da sintaxe e inicializará os recursos internos do servidor para uso posterior

```php
$sql = $conectar->prepare("SELECT FROM noticias WHERE autor = ?) ");

// Atribui valores às variáveis da consulta
$autor = "Rafael";
$sql->bind_param('s', $autor);

// Executa a consulta
$sql->execute();
```

> Fonte: ALVES, F. Manipulação de dados entre PHP com as APIs (mysqli, mysqli prepared e pdo). In: ALVES,Programação back end II. 22.ed. Maringa, PR: Centro Universitário de Maringá, 2019. p. 156-157

# Extensão PDO

O PDO (PHP Data Objects) é um módulo/extensão de PHP que trabalha com o paradigma Orientado a Objetos e que tem por
objetivo prover uma padronização da forma com que o PHP se comunica com um banco de dados relacional. PDO pode ser
definido como uma interface que define um conjunto de classes e a assinatura dos métodos de comunicação com uma base de
dados.

O PDO nos oferece recurso de abstração de implementação em toda a nossa aplicação, sem se preocupar com qual banco
utilizamos. Essa abstração se refere ao fato de que uma mudança na escolha do banco, após colocado em produção, não
trará grandes problemas à sua aplicação.

Uma vantagem do PDO em relação a outras extensões de banco de dados para PHP estudadas é a possibilidade de executar
consultas em diferentes SGBDs
(Sistema Gerenciador de Banco de Dados), isso é muito importante. Desta forma, o desenvolvedor não precisa conhecer os
recursos de várias extensões diferentes para trabalhar com diferentes SGBD na linguagem.

Para utilizar o PDO, como já informado anteriormente, você deve ativar a extensão de acordo com o SGDB. Após ativar,
você pode agir da seguinte forma: toda a conexão com banco de dados é realizada ao criar uma instância da classe PDO. O
construtor da classe PDO recebe as informações do banco como parâmetro obrigatório, além dos parâmetros opcionais
username, password. Confira a sintaxe a seguir:

```php
$objeto_de_conexao = new PDO("<drive_do_banco>: host = <localização_do_banco>; dbname = <nome_do_banco>", "<usuário_do_banco", "");
```

> Fonte: ALVES, F. Manipulação de dados entre PHP com as APIs (mysqli, mysqli prepared e pdo). In: ALVES,Programação back end II. 22.ed. Maringa, PR: Centro Universitário de Maringá, 2019. p. 157
