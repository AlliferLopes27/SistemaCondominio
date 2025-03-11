# Sistema de Condomínio

Este é um sistema de gestão de condomínio desenvolvido com **HTML, CSS, Bootstrap, JavaScript e MySQL.** O sistema permite a administração e controle de diversos aspectos de um condomínio, como cadastro de moradores, notificações de correspondências, reservas de áreas comuns e cadastro de prestadores de serviços.

**Tecnologias Utilizadas**

- **HTML:** Estrutura básica das páginas.
- **CSS:** Estilo visual das páginas.
- **Bootstrap:** Framework para criação de layouts responsivos e componentes de interface.
- **JavaScript:** Funcionalidade interativa do sistema, como validação de formulários e interações dinâmicas.
- **MySQL:** Banco de dados utilizado para armazenar as informações de moradores, correspondências, reservas e prestadores de serviços.

**Funcionalidades do Sistema**

- **Cadastro de Moradores:** Cadastro completo de moradores, incluindo informações pessoais e dados de contato.
- **Notificação de Correspondências:** Sistema para registrar e notificar moradores sobre correspondências recebidas.
- **Reserva de Áreas Comuns:** Sistema para reservar espaços do condomínio.
- **Cadastro de Prestadores de Serviços:** Cadastro e gerenciamento de prestadores de serviços para o condomínio, como manutenção e limpeza.
- **Controle de Acesso:** Tela de login com autenticação somente para administradores.

---

## *Como Rodar o Projeto Localmente*

1. **Clone o repositório para o seu computador:**

``git clone https://github.com/AlliferLopes27/SistemaCondominio.git``

2. **Navegue até o diretório do projeto:**

``cd SistemaCondominio``

3. **Instale e configure o banco de dados MySQL:**

- Certifique-se de que **XAMPP, WampServer ou Laragon** está instalado e em funcionamento.
- Abra o **phpMyAdmin** e importe o arquivo ``sistema_condominio.sql`` para criar o banco de dados.

4. **Coloque os arquivos na pasta do servidor local:**

- **XAMPP** → Copie a pasta do projeto para ``C:\xampp\htdocs\SistemaCondominio.``
- **WampServer** → Copie a pasta do projeto para ``C:\wamp64\www\SistemaCondominio.``
- **Laragon** → Copie a pasta do projeto para ``C:\laragon\www\SistemaCondominio.``

5. **Inicie o servidor:**

- **No XAMPP,** abra o **Painel de Controle** e inicie **Apache** e **MySQL**.
- **No WampServer,** clique no ícone do programa e inicie os serviços.
- **No Laragon,** clique em **"Start All".**

6. **Acesse o sistema no navegador:**

- **Para XAMPP:**

``http://localhost/SistemaCondominio/index.php``

- **Para WampServer:**

``http://localhost/SistemaCondominio/index.php``

- **Para Laragon:**

``http://SistemaCondominio.test/``
(Caso Laragon use domínio automático, verifique no painel do programa).
