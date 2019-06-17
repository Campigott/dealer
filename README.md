# dealer
<b>Requisitos</b>
<br>
1 -Php 7.3.1 ou Superior <br>
2 - MySql  <br>
3 - Apache <br>
-- Pode realizar a instalação desses requistos juntos através de: http://www.wampserver.com/en/  Ou https://www.apachefriends.org/pt_br/download.html  <br>
4 - Composer (https://getcomposer.org/download/) <br>
5 - Git (https://git-scm.com/) <br>

<b>Instalação: </b> <br>
--Após a instalação dos sofwtares requeridos como mencionado acima, abrir o Shell de comandos (Caso seja Windowns, Pressionar a Tecla Windowns + R, irá abrir uma janela de comando, digitar CMD e dar Enter) <br>
--Ir até a pasta destino de download (https://medium.com/@adsonrocha/como-abrir-e-navegar-entre-pastas-com-o-prompt-de-comandos-do-windows-10-68750eae8f47), que deverá ser dentro do: Se você instalou o Xampp -> dentro da pasta Htdocs | Se você instalou Wamp -> dentro da pasta www <br>
--Digitar o seguinte comando: "git clone https://github.com/Campigott/dealer.git" <br>
--Após o download digitar o seguinte comando: "composer install" <br>
--Para criar o banco de dados, digite o seguinte comando: "mysql -u root -p create database teste" <br>
--Após digitar o sequinte comando: "php artisan serve" <br>
--Para Criarmos as tabelas digite: "php artisan migrate" <br>
--Para popularmos as tabelas digite o seguinte comando: "php artisan db:seed" -- Poderá rodar mais de uma vez, caso queira mais dados. <br>
--Para entrar no sistema: abra um navegador de sua preferência e escreva no caminho: "localhost/dealer/public" <br>
<br>
Obs: O Filtro de datas deverá ter o seguinte formato: "Y-m-d H:i:s" Exemplo: 2008-04-25 08:37:17
