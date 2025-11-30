# PACEXT-6 – Sistema Web para Gestão de Produtos e Serviços para Esteticista

## PAC – Projeto de Aprendizagem Colaborativa Extensionista  
Curso de Engenharia de Software – Católica de Santa Catarina

---

## Autores
- Eder Duarte Zerek  
- José Lucas A. Fonseca  
- Leonardo Henrique Nascimento  
- Luis Felipe Fachini  
- Max Buzzarello Maul  
- Sidney Cardoso de Oliveira Junior  

## Professores Orientadores
- Luiz Carlos Camargo  
- Claudinei Dias  

---

## Justificativa do PAC e Entidade Beneficiada

O projeto foi desenvolvido para uma esteticista autônoma que trabalha com serviços faciais, venda de produtos e atendimento personalizado.  
Antes da criação do sistema, suas operações eram realizadas exclusivamente por mensagens e redes sociais, dificultando:

- organização do catálogo de produtos;  
- controle de estoque;  
- gerenciamento de pedidos;  
- acompanhamento de vendas;  
- comunicação estruturada com clientes.

O sistema proposto oferece uma plataforma centralizada que profissionaliza e simplifica essas tarefas, contribuindo diretamente para a eficiência do atendimento da entidade beneficiada.

---

## Descrição do App

O sistema consiste em uma aplicação web desenvolvida em Laravel com MySQL, voltada para auxiliar na gestão de produtos, serviços e fluxo de vendas da esteticista.

### Funcionalidades implementadas

#### Área do Cliente
- Cadastro e autenticação de usuários  
- Recuperação de senha  
- Catálogo de produtos  
- Catálogo de serviços estéticos  
- Visualização de detalhes de produtos  
- Carrinho de compras  
- Finalização de pedidos  
- Integração com redes sociais  
- Interface intuitiva e responsiva  

#### Área Administrativa
- Cadastro de produtos  
- Edição de produtos  
- Remoção de produtos  
- Controle de estoque  
- Cadastro e edição de serviços  
- Visualização de pedidos recebidos  
- Gerenciamento geral do catálogo  

### Tecnologias utilizadas
- Laravel  
- Livewire  
- PHP 8+  
- MySQL  
- Blade Templates  

---

## Requisitos para Preparar o Ambiente de Desenvolvimento

### Tecnologias Necessárias
- PHP 8.0 ou superior  
- Composer  
- MySQL ou MariaDB   
- Git  
- XAMPP, WAMP ou Laragon  

### Passos para Configuração


```bash
git clone https://github.com/sidneyoliveiraj/PACEXT-6
cd PACEXT-6

composer install
cp .env.example .env
php artisan key:generate

php artisan migrate --seed

php artisan serve

```

O sistema ficará disponível em:
http://localhost:8000

## Prints das Principais Telas do App

Tela Inicial

( inserir imagem aqui )
Descrição da tela.

Tela de Login

( inserir imagem aqui )
Descrição da tela.

Tela de Cadastro

( inserir imagem aqui )
Descrição da tela.

Catálogo de Produtos

( inserir imagem aqui )
Descrição da tela.

Detalhes do Produto

( inserir imagem aqui )
Descrição da tela.

Carrinho de Compras

( inserir imagem aqui )
Descrição da tela.

Área Administrativa

( inserir imagem aqui )
Descrição da tela.


## Vídeo de Demonstração do APP

Link do vídeo:
