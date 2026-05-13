<?php 
require 'verifica_login.php';
$pageTitle = "Calculadora de Dieta - Formulário";
$bodyClass = "formulario-page";
include 'header.php'; 
?>

<div class="form-layout">

    <!-- LADO ESQUERDO -->
    <div class="features-side">

        <div class="feature-card">
            <div class="feature-content">
                <span>🥗</span>
                <h3>Plano alimentar inteligente</h3>
                <p>
                    Receba sugestões personalizadas
                    com base nos seus objetivos.
                </p>
            </div>

            <div class="feature-image">
                <img src="img/card1.png" alt="">
            </div>
        </div>

        <div class="feature-card">
            <div class="feature-content">
                <span>📱</span>
                <h3>Acompanhe seu progresso</h3>
                <p>
                    Monitore sua evolução
                    diretamente pela plataforma.
                </p>
            </div>

            <div class="feature-image">
                <img src="img/card2.png" alt="">
            </div>
        </div>

        <div class="feature-card">
            <div class="feature-content">
                <span>⚡</span>
                <h3>Cálculos automáticos</h3>
                <p>
                    Tudo automatizado
                    para facilitar sua rotina.
                </p>
            </div>

            <div class="feature-image">
                <img src="img/card3.png" alt="">
            </div>
        </div>

    </div>

    
    <form action="processa.php" method="post" class="form-card">

        <div class="form-group">
            <h2>Preencha seus dados</h2>
            <label for="sexo">Sexo:</label>
            <div class="custom-select">
                <div class="selected">Selecione</div>
                <div class="options">
                    <div data-value="M">Masculino</div>
                    <div data-value="F">Feminino</div>
                </div>
                <input type="hidden" name="sexo" id="sexo" required>
            </div>
        </div>

        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" min="10" max="120" required>
        </div>

        <div class="form-group">
            <label for="peso">Peso (kg):</label>
            <input type="number" name="peso" id="peso" step="0.1" min="20" max="300" required>
        </div>

        <div class="form-group">
            <label for="altura">Altura (cm ou m):</label>
            <input type="number" name="altura" id="altura" step="0.01" min="0.5" max="2.5" placeholder="Ex: 1.75 ou 175" required>
        </div>

        <div class="form-group">
            <label for="atividade">Nível de Atividade:</label>
            <div class="custom-select">
                <div class="selected">Selecione</div>
                <div class="options">
                    <div data-value="1.2">Sedentário</div>
                    <div data-value="1.375">Leve (1–3x por semana)</div>
                    <div data-value="1.55">Moderado (3–5x por semana)</div>
                    <div data-value="1.725">Intenso (6–7x por semana)</div>
                    <div data-value="1.9">Atleta</div>
                </div>
                <input type="hidden" name="atividade" id="atividade" required>
            </div>
        </div>

        <div class="form-group">
            <label for="objetivo">Objetivo:</label>
            <div class="custom-select">
                <div class="selected">Selecione</div>
                <div class="options">
                    <div data-value="perder">Perder peso</div>
                    <div data-value="manter">Manter peso</div>
                    <div data-value="ganhar">Ganhar peso</div>
                </div>
                <input type="hidden" name="objetivo" id="objetivo" required>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-primary">Calcular</button>
        </div>

    </form>
</div>

<?php include 'footer.php'; ?>
