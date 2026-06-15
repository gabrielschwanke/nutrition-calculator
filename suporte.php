<?php
session_start();
$pageTitle = "Suporte";
$bodyClass = "suporte-page"; // classe para o body
include 'includes/header.php';
?>

<div class="container suporte-container">
  <h1>Central de Suporte</h1>
  <p class="suporte-intro">Encontre respostas rápidas ou entre em contato com nossa equipe.</p>

  <div class="suporte-grid">
    <div class="suporte-card">
      <h2>📘 FAQ</h2>
      <p>Tire dúvidas comuns sobre o uso da Calculadora de Dieta e planos disponíveis.</p>
      <a href="#" class="btn-suporte">Ver perguntas frequentes</a>
    </div>

    <div class="suporte-card">
      <h2>💬 Fale Conosco</h2>
      <p>Entre em contato diretamente com nosso time de suporte via formulário.</p>
      <a href="contato.php" class="btn-suporte">Abrir formulário</a>
    </div>

    <div class="suporte-card">
      <h2>⚙️ Configurações</h2>
      <p>Gerencie sua conta, altere senha ou atualize suas informações pessoais.</p>
      <a href="perfil.php" class="btn-suporte">Ir para perfil</a>
    </div>

    <div class="suporte-card">
      <h2>📧 Enviar Mensagem</h2>
      <p>Não encontrou o que procurava? Envie uma mensagem personalizada.</p>
      <a href="mailto:suporte@calculadoradieta.com" class="btn-suporte">Enviar e-mail</a>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
