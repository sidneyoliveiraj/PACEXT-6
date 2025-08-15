# PACEXT-6


1 .Requisitos Funcionais<br><br>
Cadastro <br><br>
RF01: O sistema deve permitir que clientes criem uma conta com e-mail e senha.<br>
RF02: O sistema deve permitir login e logout de clientes cadastrados.<br>
RF03: O sistema deve permitir a recuperação de senha via e-mail.<br><br>
Produtos e Serviços<br><br>
RF04: O sistema deve permitir o cadastro, edição e remoção de produtos de skincare.<br>
RF05: O sistema deve permitir o cadastro, edição e remoção de serviços estéticos.<br>
RF06: O sistema deve exibir um catálogo de produtos com imagens, descrição e preços.<br>
RF07: O sistema deve permitir a filtragem de produtos por categorias, preços e avaliações.<br>
RF08: O sistema deve exibir um catálogo de serviços estéticos oferecidos, com descrições detalhadas.<br><br>
Venda e Pedidos<br><br>
RF09: O sistema deve permitir que clientes adicionem produtos ao carrinho e finalizem compras.<br>
RF10: O sistema deve permitir diferentes formas de pagamento, como cartão de crédito, boleto e Pix.<br>
RF11: O sistema deve fornecer um histórico de compras para cada cliente.<br>
RF12: O sistema deve permitir que clientes acompanhem o status de seus pedidos.<br>
RF13: O sistema deve enviar notificações por e-mail sobre status do pedido (confirmação, envio, entrega).<br><br>
Estoque e Relatórios<br><br><br>
RF14: O sistema deve controlar o estoque dos produtos, atualizando automaticamente após cada compra.<br>
RF15: O sistema deve gerar relatórios de vendas, incluindo produtos mais vendidos, faturamento total e pedidos cancelados.<br>
RF16: O sistema deve exibir métricas de engajamento, como origem dos visitantes e interações com produtos.<br><br>
Interação e Engajamento<br><br>
RF17: O sistema deve permitir avaliação e comentários em produtos por clientes cadastrados.<br>
RF18: O sistema deve exibir automaticamente as postagens mais recentes do Instagram da loja.<br>
RF19: O sistema deve possuir uma vitrine interativa com produtos em destaque e depoimentos de clientes.<br>
RF20: O sistema deve fornecer um chat integrado ao WhatsApp para dúvidas rápidas sobre produtos.<br>
RF21: O sistema deve possuir links rápidos para redes sociais da loja.<br><br>
Gestão e Administração<br><br>
RF22: O sistema deve fornecer uma dashboard para a esteticista com um painel de controle de estoque e pedidos, incluindo métricas como produtos mais vendidos, estoque baixo, histórico de vendas, clientes mais ativos e análise de engajamento.<br>

<br><br>

Requisitos Não Funcionais<br><br>
RNF01: O sistema deve ser responsivo, garantindo uma experiência otimizada em dispositivos móveis, tablets e desktops.<br>
RNF02: O tempo de resposta das requisições deve ser inferior a 3 segundos, garantindo um desempenho ágil.<br>
RNF03: O sistema deve garantir a segurança dos dados dos usuários, utilizando criptografia para armazenamento de senhas e conexões seguras (HTTPS).<br>
RNF04: O sistema deve permitir a exportação de relatórios de vendas e engajamento em formato CSV e PDF.<br>
RNF05: O sistema deve ser compatível com os navegadores Google Chrome, Mozilla Firefox e Microsoft Edge, garantindo funcionalidade consistente.<br>
RNF06: O sistema deve seguir as normas da LGPD (Lei Geral de Proteção de Dados), garantindo a privacidade e o tratamento adequado das informações dos usuários.<br>
RNF07: O sistema deve possuir backup periódico dos dados para evitar perdas em caso de falhas.<br>
RNF08: O sistema deve ter uma interface intuitiva e acessível, seguindo diretrizes de usabilidade e acessibilidade.<br>





<br><br>


Escolha da Arquitetura<br><br>
Para acomodar todos os requisitos funcionais (RF) e não funcionais (RNF) levantados no projeto, optamos por uma arquitetura em camadas (layered architecture). Essa escolha se mostra consistente porque separa claramente as responsabilidades de cada parte do sistema, permitindo evoluções futuras sem comprometer a estrutura como um todo.<br><br>
Camada de Apresentação (Front-end)<br><br>
 Esta camada cuida da interação com o usuário, tanto para clientes quanto para a esteticista, garantindo uma interface responsiva (RNF01). Ferramentas como React, possibilitam uma experiência rápida e intuitiva (RNF08). Além disso, manter o front-end bem organizado contribui para que as requisições sejam ágeis (RNF02).<br><br>


Camada de Negócio (Back-end)<br><br>
 Aqui ficam as regras de negócio, como autenticação de usuários (RF01-RF03), processamento de pagamentos (RF10) e geração de relatórios (RF15). É também o ponto-chave para aplicar políticas de segurança (RNF03) e assegurar a conformidade com a LGPD (RNF06). Com isso, garantimos que as operações de estoque (RF14) e a integração com redes sociais ou gateways de pagamento sejam centralizadas e confiáveis.<br><br>


Camada de Dados (Banco de Dados)<br><br>
 Responsável por armazenar de forma segura informações como cadastro de usuários, histórico de compras e produtos em estoque (RF14, RNF03). Por meio de rotinas de backup (RNF07) e boas práticas de banco de dados, conseguimos minimizar perdas de informação e atender também às necessidades de exportação de relatórios em diferentes formatos (RNF04).<br><br>
Por que essa arquitetura atende aos requisitos?<br><br>
Separação de Responsabilidades: Cada camada resolve uma parte do problema, facilitando manutenção e evolução.


Escalabilidade e Desempenho: Se precisarmos lidar com mais usuários ou aprimorar a performance, podemos otimizar cada camada de forma independente (por exemplo, adicionar cache no back-end para diminuir o tempo de resposta).


Centralização de Segurança: Criptografia e controle de acesso ficam concentrados no back-end, tornando mais simples garantir requisitos como RNF03 (segurança) e RNF06 (LGPD).


Facilidade de Trabalho em Equipe: Dividir o projeto em front-end, back-end e banco de dados permite que diferentes membros atuem em paralelo, mantendo boa comunicação via APIs.

<br><br>

Responsabilidade de cada integrante no projeto :

<br>

Luis Felipe Fachini<br>
Função: Gerente de Projeto<br>
Responsabilidades:<br>
Coordenar as atividades da equipe<br>
Garantir o cumprimento dos prazos<br>
Fazer a ponte entre a equipe e a esteticista (cliente)<br>
Documentar requisitos e mudanças do projeto<br>

<br><br>


José Lucas A. Fonseca<br>
Função: Desenvolvedor Front-end<br>
Responsabilidades:<br>
Projetar a interface do usuário<br>
Implementar elementos visuais responsivos<br>
Garantir boa experiência em dispositivos móveis<br>
Integrar com APIs de redes sociais<br>


<br><br>

Sidney Cardoso de Oliveira Junior<br>
Função: Desenvolvedor Back-end<br>
Responsabilidades:<br>
Desenvolver a estrutura do servidor<br>
Implementar sistema de autenticação<br>
Desenvolver APIs para comunicação front-end/back-end<br>
Configurar banco de dados<br>

<br><br>


Eder Duarte Zerek<br>
Função: UX/UI Designer<br>
Responsabilidades:<br>
Criar wireframes e protótipos<br>
Projetar identidade visual alinhada com a marca da esteticista<br>
Garantir usabilidade para diferentes públicos<br>
Realizar testes de usabilidade<br>

<br><br>

Max Buzzarello Maul<br>
Função: UX/UI Designer<br>
Responsabilidades:<br>
Criar wireframes e protótipos<br>
Projetar identidade visual alinhada com a marca da esteticista<br>
Garantir usabilidade para diferentes públicos<br>
Realizar testes de usabilidade<br>

<br><br>

Leonardo Henrique Nascimento<br>
Função: Tester / Quality Assurance<br>
Responsabilidades:<br>
Desenvolver e executar planos de teste<br>
Identificar e documentar bugs<br>
Verificar conformidade com requisitos<br>
Testar experiência do usuário e performance<br>

