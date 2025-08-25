Para começar abri o XAMPP e liguei o apache e o MySQL.
Então abrimos o MySQL no modo admin e abrimos o banco de dados pelo navegador.
Abrimos o apache no modo admin também, para nós podermos verificar como está ficando a interface do crud. 

Comecei criando o banco de dados que foi utilizado no código, e assim no código criei a areá para vincular o banco de dados com o código em si, criando assim o db.php, sendo que tive que linkar cada tabela do código separadamente, 
sendo assim criei o db.php no jogadores, times e partidas.
Depois de ter feito a vinculação do banco de dados, criei a parte do index.php, para criar a estrutura do crud.

Depois de ter criado o index.php, criamos as tabelas cadastrar.php em todas as etapas(jogadores, partidas e times), na tabela cadastrar.php dos jogadores tive que criar um codigo para o jogador adicionar seu nome, a posição em que ele joga,
o número de sua camisa e o nome do time.
Na tabela partidas coloquei para adicionar se o time é da casa ou se é de fora, a data em que o jogo vai acontecer, os gols que cada time fez.
Na tabela dos times criei paa adicionar o nome do time e de qual cidade eles são.
Assim adicionando a função de adicionar um novo jogador, um novo time ou uma nova partida.

Na tabela do delete.php apenas criei um código simples para conseguirem excluir o jogador, o mesmo para as partidas e para os times, assim adicionando aos botões do index uma função para apagar.

Na tabela do update.php que também foi criado em todas as etapas(jogadores, partidas e times), na tabela update.php dos jogadores tive que criar um codigo para o jogador atualizar seu nome, a posição em que ele joga,
o número de sua camisa e o nome do time.
Na tabela partidas coloquei para atualizar se o time é da casa ou se é de fora, a data em que o jogo vai acontecer, os gols que cada time fez.
Na tabela dos times criei paa atualizar o nome do time e de qual cidade eles são.
Assim adicionando a função de atualizar um novo jogador, um novo time ou uma nova partida.

No read.php usei o código para conseguir ler e mostrar o o que foi adicionado no cadastrar, assim mostrando o que foi feito, sendo um novo cadastro, uma atualização ou mostrar o que foi deletado.

Assim podemos ver como ficou o site no navegador.
