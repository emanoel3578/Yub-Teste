# 🖥️ Yup Delivrey API 🖥️
<h3> Projeto desenvolvido para a conclusão do processo seletivo </h3>

> ## Tecnologias usadas no desenvolvimento:
<ul>
  <li>💎Laravel - Backend</li>
  <li>🔵Postman - Testes na Api</li>
  <li>🤎IDE - Visual Studio Code</li>
  <li>💜WAMP - Servidor Apache Local</li>
</ul>

> # Documentação API:
> > ## Endpoints (Url's para onde deve-se fazer as requisições):
> > ###  |POST| /Registar - Endpoint disponível para realizar o cadastro da sua empresa.
> > #### Autenticação: Não necessária
> > ============================== <table>
  <tr>
    <td>Campos esperados</td>
    <td>Tipo</td>
    <td>Requerido</td>
    <td>Descrição</td>
  </tr>
  
  <tr>
    <td>Email</td>
    <td>email</td>
    <td>Obrigatório</td>
    <td>Email corporativo para o cadastro da sua empresa</td>
  </tr>
  
  <tr>
    <td>Razão Social</td>
    <td>string</td>
    <td>Obrigatório</td>
    <td>O nome fantasia ou Razão social da sua empresa, OBS:O nome inserido deve ser único</td>
  </tr>
  
  <tr>
    <td>Senha</td>
    <td>string</td>
    <td>Obrigatório</td>
    <td>A senha para o seu acesso a plataforma, minimo de 6 characters</td>
  </tr>
> > </table>
