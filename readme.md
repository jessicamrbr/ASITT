# Fila ASITT - SISTEMA DE COMPARTILHAMENTO DE INFORMAÇÕES COM O PACIENTE
## VISÃO GERAL
### 1. Descrição
O Ambulatório de Saúde Integral para Travestis e Transexuais do Centro de Referência e Treinamento DST/Aids-SP (ASITT), tem por objetivo atender as travestis e transexuais de forma integral. Os principais procedimentos oferecidos pelo ambulatório são: acolhimento, avaliação médica, endocrinológica, proctológica, fonoaudiológica e de Saúde Mental. O serviço faz parte do Sistema Único de Saúde (SUS), um dos maiores sistemas públicos de saúde do mundo, que visa garantir acesso integral, universal e gratuito para toda a população do país.

O orçamento completo da saúde pública atualmente é composto por um valor fixo sobre o PIB nacional (nível federal), mais 15% da receita dos municípios e mais 12% da receita dos estados. Para atingir seus objetivos o ASITT conta com um repasse de uma pequena fração dos recursos do SUS.

A população de travesti e transexuais no estado de São Paulo cresce cada vez mais, várias ações e projetos são tomados para assegurar a cidadania e saúde de pessoas transgêneras, um deles muito conhecido é o Transcidadania. Com o crescimento da comunidade transgêneras a demanda pelos serviços do ASITT naturalmente também aumenta, visto que é um dos poucos lugares com atendimento integral. Assim a oferta de serviços pode não ser suficiente para atender a demanda dos usuários de forma imediata. Gerando filas que se estendem por meses em alguns casos.

Inconformados com o tempo espera, pacientes do ASITT criticam características de gerência dos serviços, se sentindo injustiçados. Muitas vezes atuam assim por não se informarem adequadamente.

Como órgão público, parte do SUS, o ASITT segue as diretrizes de compartilhamento de informação do DATASUS, disponibilizando informações nãos sigilosas a população.

Ainda sobre as informações individuais do paciente, o Conselho Federal de Medicina (CFM) enuncia: é vedado ao médico ou instituições de saúde negar, ao paciente, acesso a seu prontuário, deixar de lhe fornecer cópia quando solicitada, bem como deixar de lhe dar explicações necessárias à sua compreensão, salvo quando ocasionarem riscos ao próprio paciente ou a terceiros. Na II Jornada de Direito da Saúde, evento que reuniu magistrados, membros do Ministério Público, gestores do Sistema Único de Saúde (SUS), estudantes, advogados, defensores públicos, entre outros, foram aprovados diversos enunciados que permitem ao paciente acesso a informações sobre si próprio.

Em 2016, o paciente que deseja obter informações sobre si e sobre o ASITT precisa entrar em contato direto através da secretaria, muitas vezes ocorrem falhas de comunicação ou confusão sobre os procedimentos, segundo relato de vários usuários. Tal fato colabora para o aumento da insatisfação desnecessária de alguns pacientes.

### 2. Escopo

Um sistema de fila virtual com informações básicas e descrição das justificativas de mudanças na posição do paciente, pode resolver parte da insatisfação de alguns usuários, colaborando com a organização do serviço e com uma política de transparência mais eficiente.

O sistema pode ser disponibilizado através de um site pela internet, onde o paciente tem acesso com número de matricula, e pode acompanhar suas posições nas filas de espera para acolhimento, avaliação médica, endocrinológica, proctológica, fonoaudiológica e de Saúde Mental. O uso do número de matricula como identificador, ao invés do nome, garante o sigilo das informações.

Neste mesmo espaço serão disponibilizadas as instruções formais sobre como iniciar, dar continuidade no tratamento, ou justificativas de mudanças no processo.

Exemplo de informação disponibilizada: Paciente 000001 iniciou o uso dos serviços no ASITT em 01/01/2016, já passou pelo acolhimento, está na posição 4 de 30 pacientes na fila do clinico geral, ainda não está nas demais filas pois aguarda encaminhamento.

O objetivo não é mudar os procedimentos, corrigir possíveis falhas internas ou dar treinamento aos funcionários. Espera-se somente compartilhar, de maneira facilitada, informação do próprio usuário, permitindo que o mesmo saiba se está em uma fila ou não e em qual posição, bem como acompanhar as mudanças dessa fila e suas justificativas. O projeto contempla que essas informações sejam organizadas e publicadas, mantendo sempre o sigilo dos usuários.

### 3. Requisitos de alto nível

O novo sistema deve contemplar:

* Capacidade de permitir autenticação dos usuários, mediante e-mail;
* Um banco de dados com informações sobre os pacientes, suas posições em cada um dos procedimentos e a capacidade atual de atendimento;
* Seção de download de documentos com instruções sobre o funcionamento dos serviços;
* Seção de acompanhamento de posição e previsão estatística de atendimento;
* Módulo para alimentação e atualização do banco de dados por um responsável do próprio ASITT;
* Se o paciente desejar, o sistema poderá notifica-lo por e-mail sobre mudanças em sua situação.

Serão regras do sistema:

* Sempre que houver uma mudança de uma posição menor para maior, ou seja, o usuário for afastado de atingir a primeira posição na fila, será publicado junto a mudança a justificativa da mesma;
* O que for publicado, não pode ser removido, caso seja necessária uma alteração, ela será adicionada mediante uma nova publicação, assim como ocorrem nos sistemas judiciais de acompanhamento de processos online.

### 4. Partes afetadas

* Pacientes do ASITT: Sendo beneficiados com o acesso a informação, consequentemente se tranquilizando sobre a situação dentro da instituição.
* ASITT: Redução de serviços, automatizando tarefas de notificação e atendimento para esclarecimento de dúvidas.
* Colabores: Pessoas, que participem de forma gratuita e voluntária na implantação do projeto.

### 5. Plano de implementação

A autora deste projeto se compromete, respeitando o sigilo dos pacientes, a analisar as atuais bases de informações e desenvolver o sistema. Qualquer outro colaborador que esteja disposto a participar de forma gratuita, também poderá atuar no desenvolvimento do sistema.
O ASITT, provera o ambiente de hospedagem do sistema. Tal ambiente deve suportar as tecnologias PHP (7.0) e MySQL (5.7), comuns em grande parte dos servidores de websites.
As seguintes etapas de implantação devem ser implementadas na respectiva ordem:

1. Analise das bases de dados atuais (Planilhas, sistemas, ...), permitindo o planejamento de um mecanismo eficiente de alimentação ou possível integração com o novo sistema;
2. Desenho do sistema e coleta de opiniões das partes envolvidas;
3. Desenvolvimento do sistema;
4. Testes realizados por desenvolvedores;
5. Testes realizados com pequeno grupo de pacientes;
6. Implementação oficial da ferramenta;
7. Documentação das etapas do projeto, para futura continuidade ou aperfeiçoamento.

### 6. Resultados finais

Construir e aplicar essa política pública através do sistema proposto, pode garantir acesso a informações e transparência, tranquilizando o usuário.

Veja no youtube:

[![IMAGE ALT TEXT](http://img.youtube.com/vi/eRqxPUBjkXM/0.jpg)](https://www.youtube.com/watch?v=eRqxPUBjkXM "Fila ASITT ")
