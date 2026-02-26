# 🏢 Sistema de Condomínio

*Sistema web para gerenciamento de condomínio desenvolvido utilizando HTML, CSS, Bootstrap, JavaScript, PHP e MySQL.*

*O sistema permite administrar e controlar diversos aspectos do condomínio, como cadastro de moradores, notificações de correspondências, reservas de áreas comuns, controle de acesso e gerenciamento de prestadores de serviços.*

## 🚀 Tecnologias Utilizadas

- **HTML:** Estrutura das páginas do sistema.

- **CSS:** Estilização personalizada das interfaces.

- **Bootstrap:** Framework para criação de layouts responsivos e componentes modernos.

- **JavaScript:** Validação de formulários e interações dinâmicas.

- **PHP:** Responsável pela lógica do sistema, conexão com o banco de dados, autenticação e processamento de formulários.

- **MySQL:** Banco de dados para armazenamento das informações.

## 📌 Funcionalidades do Sistema

**👤 Cadastro de Moradores**

- Cadastro completo com dados pessoais e informações de contato.
- Edição e exclusão de registros.
- Histórico dos moradores cadastrados no sistema.

**📬 Notificação de Correspondências**

- Registro de correspondências recebidas.
- Associação da correspondência ao morador.
- Histórico de correspondências cadastradas no sistema.

**🏢 Reserva de Áreas Comuns**

- Cadastro de reservas de espaços como salão de festas e salão de jogos.
- Visualização das reservas registradas no sistema.

**🛠 Cadastro de Prestadores de Serviços**

- Registro de prestadores de serviços.
- Cadastro do tipo de serviço prestado.

**🔐 Controle de Acesso**

- Sistema de login com autenticação.
- Validação de usuário e senha.
- Acesso restrito à área administrativa do sistema.

## 🛠 Como Rodar o Projeto Localmente

**1️⃣ Clone o repositório**

git clone ``https://github.com/AlliferLopes27/SistemaCondominio.git``

**2️⃣ Configure o Banco de Dados**

1. Instale o XAMPP, WampServer ou Laragon.

2. Inicie o servidor.

- No XAMPP → Inicie Apache e MySQL
- No WampServer → Inicie os serviços
- No Laragon → Clique em Start All

3. Acesse o phpMyAdmin.

``localhost/phpmyadmin/``

4. Importe o arquivo.

``sistema_condominio.sql``

**3️⃣ Coloque o projeto na pasta do servidor**

- **📂 XAMPP**

``C:\xampp\htdocs\SistemaCondominio``

- **📂 WampServer**

``C:\wamp64\www\SistemaCondominio``

- **📂 Laragon**

``C:\laragon\www\SistemaCondominio``

**4️⃣ Acesse no navegador**

- **XAMPP / WampServer**

``http://localhost/SistemaCondominio/paginas/``

- **Laragon**

``http://SistemaCondominio.test``
