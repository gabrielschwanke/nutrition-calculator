(function () {
  const canvas = document.getElementById("bgAnimado");
  if (!canvas) return;

  const ctx = canvas.getContext("2d");
  let width, height, animId;
  let time = 0;

  function resize() {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
  }
  resize();
  window.addEventListener("resize", resize);

  // --- CONFIGURAÇÃO DOS CARDS PASSANDO NO FUNDO ---
  const configCards = {
    quantidadeCards: 25,        // Mais cards para movimento contínuo
    larguraCardRatio: 0.25,     // Cards mais largos
    alturaCardRatio: 0.18,      // Altura dos cards
    arredondamento: 20,
    desfoqueBase: 35,
    velocidade: 0.2,            // MUITO LENTO e suave
    espessuraBorda: 1.5
  };

  // Cores Pastel melhoradas
  const coresPastel = [
    "rgba(200, 230, 201, 0.45)",
    "rgba(180, 210, 230, 0.45)", 
    "rgba(255, 240, 200, 0.4)",
    "rgba(240, 200, 255, 0.4)",
    "rgba(220, 240, 220, 0.35)",
    "rgba(200, 200, 240, 0.35)"
  ];

  // Criar cards com posições iniciais variadas
  const cards = [];
  for (let i = 0; i < configCards.quantidadeCards; i++) {
    cards.push({
      x: Math.random() * width * 2 + width, // Todos começam fora da tela à direita
      y: 80 + (Math.random() * 0.6) * (height - 160), // Posições verticais variadas
      cor: coresPastel[Math.floor(Math.random() * coresPastel.length)],
      escala: 0.85 + Math.random() * 0.15,
      rotacao: (Math.random() - 0.5) * 0.08, // Rotação sutil
      offsetY: (Math.random() - 0.5) * 30    // Variação vertical sutil
    });
  }

  // Função auxiliar para retângulos arredondados
  function roundRect(x, y, w, h, r) {
    if (w < 2 * r) r = w / 2;
    if (h < 2 * r) r = h / 2;
    ctx.beginPath();
    ctx.moveTo(x + r, y);
    ctx.arcTo(x + w, y, x + w, y + h, r);
    ctx.arcTo(x + w, y + h, x, y + h, r);
    ctx.arcTo(x, y + h, x, y, r);
    ctx.arcTo(x, y, x + w, y, r);
    ctx.closePath();
  }

  function animar() {
    // Fundo gradiente bem suave
    const gradient = ctx.createLinearGradient(0, 0, 0, height);
    gradient.addColorStop(0, "#fafbfc");
    gradient.addColorStop(0.5, "#f8f9ff");
    gradient.addColorStop(1, "#fafafc");
    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, width, height);

    time += 0.008; // Movimento ainda mais lento

    // Desenhar todos os cards
    const larguraCard = width * configCards.larguraCardRatio;
    const alturaCard = height * configCards.alturaCardRatio;

    cards.forEach(card => {
      // Movimento horizontal LENTO da direita para esquerda
      card.x -= configCards.velocidade;
      
      // Loop infinito suave
      const totalWidth = width + larguraCard * 1.5;
      if (card.x < -totalWidth) {
        card.x = width * 1.8 + Math.random() * width * 0.5; // Reposiciona à direita
        card.y = 80 + (Math.random() * 0.6) * (height - 160); // Nova posição Y
        card.cor = coresPastel[Math.floor(Math.random() * coresPastel.length)];
      }

      // Posição final com transformações
      const posX = card.x - (larguraCard / 2) * card.escala;
      const posY = card.y + Math.sin(time * 2 + card.x * 0.01) * 8 + card.offsetY;
      const finalLargura = larguraCard * card.escala;
      const finalAltura = alturaCard * card.escala;

      ctx.save();
      
      // Centralizar rotação
      ctx.translate(posX + finalLargura / 2, posY + finalAltura / 2);
      ctx.rotate(card.rotacao);
      
      // Desfoque e transparência
      ctx.filter = `blur(${configCards.desfoqueBase}px)`;
      ctx.globalAlpha = 0.55;
      
      // Sombra sutil
      ctx.shadowColor = "rgba(0,0,0,0.1)";
      ctx.shadowBlur = 15;
      ctx.shadowOffsetX = 2;
      ctx.shadowOffsetY = 2;
      
      ctx.fillStyle = card.cor;
      roundRect(-finalLargura / 2, -finalAltura / 2, finalLargura, finalAltura, configCards.arredondamento);
      ctx.fill();
      
      // Borda sutil
      ctx.shadowColor = "transparent";
      ctx.lineWidth = configCards.espessuraBorda;
      ctx.strokeStyle = "rgba(255,255,255,0.6)";
      ctx.stroke();
      
      ctx.restore();
    });

    animId = requestAnimationFrame(animar);
  }

  // Iniciar animação
  animar();
})();