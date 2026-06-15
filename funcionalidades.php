<?php 
require 'verifica_login.php';
$pageTitle = "Funcionalidades";
$bodyClass = "funcionalidades-page";
include 'includes/header.php'; 
?>

<main class="funcionalidades-section">
  <div class="container-funcionalidades">
    <h1>Como o sistema funciona</h1>
    <p class="subtitulo">Descubra como montamos sua dieta personalizada e ajudamos você a manter o foco</p>

    <div class="passos">
      <div class="passo-card">
        <h3>1️⃣ Informe seus dados</h3>
        <p>Preencha suas informações: idade, peso, altura, nível de atividade física e seu objetivo — emagrecer, ganhar massa ou manter o peso ideal.</p>
      </div>

      <div class="passo-card">
        <h3>2️⃣ Cálculo dos Macronutrientes</h3>
        <p>O sistema calcula automaticamente as quantidades ideais de proteínas, carboidratos e gorduras com base no seu perfil metabólico.</p>
      </div>

      <div class="passo-card">
        <h3>3️⃣ Dicas diárias de alimentação</h3>
        <p>Receba dicas práticas e sugestões de refeições balanceadas todos os dias, para manter uma rotina saudável e sem monotonia.</p>
      </div>

      <div class="passo-card">
        <h3>4️⃣ Acompanhe sua evolução</h3>
        <p>Visualize seus relatórios semanais, acompanhe o progresso e veja como pequenas mudanças diárias geram grandes resultados.</p>
      </div>

      <div class="passo-card">
        <h3>5️⃣ Personalize sua experiência</h3>
        <p>Adicione alimentos favoritos, monte suas próprias receitas e ajuste o plano de acordo com suas preferências e necessidades.</p>
      </div>

      <div class="passo-card">
        <h3>6️⃣ Inteligência Artificial integrada</h3>
        <p>Nosso assistente utiliza IA para gerar recomendações personalizadas, identificar padrões e otimizar seus resultados de forma inteligente.</p>
      </div>
    </div>

    <div class="recursos">
      <h2>Principais recursos</h2>
      <ul>
        <li>✅ Cálculo automático dos macronutrientes</li>
        <li>✅ Dicas diárias e lembretes de alimentação</li>
        <li>✅ Relatórios inteligentes de evolução</li>
        <li>✅ Personalização completa da dieta</li>
        <li>✅ Assistente de IA para recomendações</li>
        <li>✅ Interface moderna e intuitiva</li>
      </ul>
    </div>

    <div class="cta">
      <p>💡 Quer descobrir sua dieta ideal?</p>
      <a href="processa.php" class="btn-teste">Começar Agora</a>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>