# projetoCadastromed

# Projeto desenvolvido Marina Luisa Lemos Barcelos, para a aplicação de teste para estágio.
 

## Sobre o Codigo PHP:
# O arquivo 'index.php' é a página principal do projeto.
# O projeto consiste em um cadastro de médicos, com nome, telefone, CRM e especialidade. Para cadastrar um novo médico é necessário iniciar uma sessão fazendo login.
# O arquivo contém as classes 'database', 'medico' e 'usuario', as funções utilizadas no resto do projeto podem ser localizadas dentro dos mesmos. 
# O arquivo 'cadastro.php' contém o formulário de cadastro de médicos.
# O arquivo 'cadastro_user.php' contém o formulário de cadastro de usuários.
# Para editar os dados de médico, é preciso ter um médico cadastrado na conta do usuário.
# Só é possível cadastrar um médico por usuário.
# A tela para editar informações/excluir dados de médico/excluir conta de usuário é a aba 'perfil', localizada no topo da tela. A tela perfil só é visível para usuários logados.
# Para fazer pesquisas, é possível usar a aba de pesquisas disponível na header, e a aba de pesquisas localizada na tela index. Também é possível utilizar os botões de sugestão nos cards na área inferior da tela index.
# O botão de 'ver todos' leva o usuario à uma tela com todas as especialidades disponiveis para pesquisa. 


## Sobre o Banco de Dados:
# Esse projeto foi desenvolvido utilizando PHPMyAdmin pelo XAMPP.
# Adicionar a pasta ['webtestemed'] ao caminho ['\Xampp\htdocs']
# Adicionar a pasta ['teste_cadastro_med'] ao caminho ['\Xampp\mysql\data']
# para acessar o projeto no navegador: ['localhost/webtestemed']
# O banco de dados está localizado no caminho 'projetoCadastromed\Projetomed_cadastro\backup_db', junto com o sql.
# Para rodar o projeto, é necessário o XAMPP e o MySQL.
# Fora alguns cadastros de teste, o banco não foi populado.
# As senhas não são protegidas e estão visíveis no banco de dados.
# Usuario já existente sem medico: [email: 'teste4@gmail.com'],[senha: '12345678']
# Usuario já existente com medico: [email: 'teste3@gmail.com'],[senha: '12345678']


