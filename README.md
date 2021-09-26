# 🖥️ Yub Delivery API 🖥️
<h3> Projeto desenvolvido para a conclusão do processo seletivo </h3>

> ## Tecnologias usadas no desenvolvimento:
<ul>
  <li>💎Laravel - Backend</li>
  <li>🔵Postman - Testes na Api</li>
  <li>🤎IDE - Visual Studio Code</li>
  <li>💜WAMP - Servidor Apache Local</li>
  <li>✅GIT Flow - Versionamento do projeto</li>
</ul>

> # Documentação API:
> > ## Endpoints (Url's para onde deve-se fazer as requisições):
###  |POST| /registrar - Endpoint disponível para realizar o cadastro da sua empresa.
 #### Autenticação: Não necessária
 ============================== <table>
  <tr>
    <td>Campos esperados</td>
    <td>Tipo</td>
    <td>Requerido</td>
    <td>Descrição</td>
  </tr>
  
  <tr>
    <td>email</td>
    <td>email</td>
    <td>Obrigatório</td>
    <td>Email corporativo para o cadastro da sua empresa (Max:50 Characters)</td>
  </tr>
  
  <tr>
    <td>razaosocial</td>
    <td>string</td>
    <td>Obrigatório</td>
    <td>O nome fantasia ou Razão social da sua empresa, (O nome inserido deve ser único, Max:50 Characters)</td>
  </tr>
  
  <tr>
    <td>password</td>
    <td>string</td>
    <td>Obrigatório</td>
    <td>A senha para o seu acesso a plataforma, minimo de 6 characters (Max:50 Characters)</td>
  </tr>
</table>

---
###  |POST| /login - Endpoint disponível para realizar o Login da sua empresa e ter acesso ao seu Token de autenticação.
#### (Pode ser usando a qualquer momento, para a geração de novo Token autencidado)
 #### Autenticação: Não necessária
 ============================== <table>
<thead>
  <tr>
    <th>Campos esperados</th>
    <th>Tipo</th>
    <th>Requerido</th>
    <th>Descrição</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Email</td>
    <td>email</td>
    <td>Obrigatório</td>
    <td>Email usado no momento do cadastro na endpoint /registrar</td>
  </tr>
  <tr>
    <td>password</td>
    <td>string</td>
    <td>Obrigatório</td>
    <td>Senha usada no momento do cadastro na endpoint /registrar</td>
  </tr>
</tbody>
</table>

---
###  |GET| /dados - Endpoint disponível para visualizar todos os dados de segurança do usuário logado.
 #### 🚨 Autenticação: É necessário estar com seu token autenticado !
 ============================== <table>
<thead>
  <tr>
    <th>Campos esperados</th>
    <th>Tipo</th>
    <th>Requerido</th>
    <th>Descrição</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Bearer Token</td>
    <td>Bearer Token</td>
    <td>Obrigatório</td>
    <td>O seu Token gerado na endpoint /login, necessário para acessar seus dados</td>
  </tr>
</tbody>
</table>

---
###  |POST| /novoproduto - Endpoint disponível para cadastrar um novo produto a sua conta na plataforma.
 #### 🚨 Autenticação: É necessário estar com seu token autenticado !
 ============================== <table>
<thead>
  <tr>
    <th>Campos esperados</th>
    <th>Tipo</th>
    <th>Requerido</th>
    <th>Descrição</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Bearer Token</td>
    <td>Bearer Token</td>
    <td>Obrigatório</td>
    <td>O seu Token gerado na endpoint /login, necessário para acessar seus dados</td>
  </tr>
  <tr>
    <td>nome</td>
    <td>string</td>
    <td>Obrigatório</td>
    <td>O nome que o seu produto vai receber ao cadastrar na plataforma, o nome de cada produto necessita ser único. (Max: 100 characters, Min: 2 characters)</td>
  </tr>
  <tr>
    <td>marca</td>
    <td>string</td>
    <td>Obrigatório</td>
    <td>A marca a qual o produto registrado pertence (Max:100 characteres, Min: 2 characters)</td>
  </tr>
  <tr>
    <td>quantidade</td>
    <td>inteiro</td>
    <td>Obrigatório</td>
    <td>A quantidade de produtos que estão sendo cadastrados (Min: 1)</td>
  </tr>
</tbody>
</table>

---
###  |POST| /pesquisar - Endpoint disponível para pesquisar todos os dados de produtos referentes a sua conta na pesquisa enviada.
 #### 🚨 Autenticação: É necessário estar com seu token autenticado !
 ============================== <table>
<thead>
  <tr>
    <th>Campos esperados</th>
    <th>Tipo</th>
    <th>Requerido</th>
    <th>Descrição</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Bearer Token</td>
    <td>Bearer Token</td>
    <td>Obrigatório</td>
    <td>O seu Token gerado na endpoint /login, necessário para acessar seus dados</td>
  </tr>
  <tr>
    <td>nome</td>
    <td>string</td>
    <td>Obrigatório</td>
    <td>O nome do produto a qual você está buscando mais informações</td>
  </tr>
</tbody>
</table>

---
###  |POST| /estoque - Endpoint disponível para alterar,adicionar,remover produtos ao seu estoque na plataforma.
 #### 🚨 Autenticação: É necessário estar com seu token autenticado !
 ============================== <table>
<thead>
  <tr>
    <th>Campos esperados</th>
    <th>Tipo</th>
    <th>Requerido</th>
    <th>Descrição</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Bearer Token</td>
    <td>Bearer Token</td>
    <td>Obrigatório</td>
    <td>O seu Token gerado na endpoint /login, necessário para acessar seus dados</td>
  </tr>
  <tr>
    <td>id</td>
    <td>inteiro</td>
    <td>Obrigatório</td>
    <td>💡 O id do produto a qual você quer modificar no estoque (Para descobrir o id do produto, use a endpoint /pesquisar para encontrar usando o nome do produto na pesquisa)</td>
  </tr>
  <tr>
    <td>tipo</td>
    <td>string</td>
    <td>Obrigatório</td>
    <td>💡 O tipo de ação feito ao estoque, esse campo só aceita duas opções - Entrada ou Saida, caso haja qualquer outro valor além desses será devolvido um error</td>
  </tr>
  <tr>
    <td>quantidade</td>
    <td>inteiro</td>
    <td>Obrigatório</td>
    <td>A quantidade dos produtos que estão sendo adicionado ou retirados da plataforma (Min:1)</td>
  </tr>
</tbody>
</table>

---
###  |GET| /todos - Endpoint disponível para visualizar todos os produtos cadastrados a sua conta na plataforma.
 #### 🚨 Autenticação: É necessário estar com seu token autenticado !
 ============================== <table>
<thead>
  <tr>
    <th>Campos esperados</th>
    <th>Tipo</th>
    <th>Requerido</th>
    <th>Descrição</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Bearer Token</td>
    <td>Bearer Token</td>
    <td>Obrigatório</td>
    <td>O seu Token gerado na endpoint /login, necessário para acessar seus dados</td>
  </tr>
</tbody>
</table>

