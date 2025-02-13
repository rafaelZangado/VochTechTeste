<h1># VochTechTeste - Aplicação Laravel</h1>

Este é um projeto desenvolvido com **Laravel 10** para a aplicação **VochTechTeste**.
![image](https://github.com/user-attachments/assets/7f4c5990-a1df-4284-9033-5ef1e404ee87)
![image](https://github.com/user-attachments/assets/e7e5a6ce-0178-4620-b718-041e6ebf7b9f)
![image](https://github.com/user-attachments/assets/deca9042-2c04-4f5c-b740-77e1deab7556)

🛠️  Requisitos

Antes de começar, certifique-se de que você tem os seguintes requisitos instalados:

- **PHP**: versão 8.1 ou superior.
- **Composer**: Gerenciador de dependências do PHP.
- **MySQL**: Banco de dados para rodar a aplicação.

🚀  Instalação

Siga os passos abaixo para instalar e configurar o ambiente de desenvolvimento.

### 1. Clonar o repositório

Clone o repositório para sua máquina local:

```bash
git clone https://github.com/rafaelZangado/VochTechTeste.git
cd VochTechTeste
```
### 2. Configurar o ambiente

Copie o arquivo de configuração padrão:

```bash
cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=VochTechTeste
DB_USERNAME=root
DB_PASSWORD=
```
### 2. Instale o composer
```bash
composer install
```

### 3. Rode o comando para as tabelas 
```bash
php artisan migrate
```

obs: caso queria gerar alguns dados fakes voce pode rodar o comando 
```bash
php artisan migrate db:seed
```
ou voce pode criar sua conta normal na opção de 
"Quero criar uma conta."


RELATORIOS
voce tem a opção de exportar no Exel ou PDF 
![image](https://github.com/user-attachments/assets/6d5f1c79-a0f9-4d58-9290-0a76b3a7650e)

supondo que voce queria uma relação somente com algumas informações... basta usar o filtor da tabela 
veja o exemplo
Exemplo 01

![image](https://github.com/user-attachments/assets/21d543cb-36f4-4150-90e2-3f5a57abb092)

![image](https://github.com/user-attachments/assets/f4261555-c1d8-4cdb-a04f-afe4f6e08bf7)

Exemplo 02
![image](https://github.com/user-attachments/assets/d71555a6-990a-444a-b75b-8573958c80f4)



📌 Autor: Rafael Zangado | 🛠️ Projeto: VochTechTeste | 🌱 Tecnologia: Laravel 10




