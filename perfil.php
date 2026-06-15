<?php
session_start();
require 'includes/conexao.php';

// 🔒 CORREÇÃO: Verifica se o array 'usuario' existe E se a chave 'id' está presente
if (!isset($_SESSION['usuario']['id'])) {
    header("Location: index.php");
    exit;
}

// CORREÇÃO: Acessa o ID do usuário a partir do array 'usuario' na sessão
$id = $_SESSION['usuario']['id'];

// Busca os dados atualizados do usuário no banco (Isso é uma ótima prática de segurança!)
$stmt = $conn->prepare("SELECT nome, email, telefone, criado_em FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    // Se o ID da sessão não for encontrado no banco (raro, mas possível), destrói a sessão e redireciona
    session_destroy();
    header("Location: login.php");
    exit;
}

// Fecha statement e conexão
$stmt->close();
$conn->close();

$pageTitle = "Meu Perfil";
$bodyClass = "perfil-page";

include 'header.php';
?>

<div class="container perfil-container">
    <h2>Meu Perfil</h2>

    <div class="perfil-card">
        <p><strong>Nome:</strong> <?= htmlspecialchars($user['nome']) ?></p>
        <p><strong>E-mail:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Telefone:</strong> <?= htmlspecialchars($user['telefone'] ?? 'Não informado') ?></p>
        <p><strong>Conta criada em:</strong> <?= date('d/m/Y H:i', strtotime($user['criado_em'])) ?></p>
    </div>

    <a href="formulario.php" class="btn-voltar">← Voltar para a Calculadora</a>
</div>

<?php include 'includes/footer.php'; ?>