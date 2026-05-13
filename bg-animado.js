(function () {
  const canvas = document.getElementById("bgAnimado");
  if (!canvas) return;

  const ctx = canvas.getContext("2d");
  let width, height, animId;
  let mouseX = width / 2, mouseY = height / 2;
  let time = 0;

  function resize() {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
  }
  resize();
  window.addEventListener("resize", resize);

  // 🎨 PALETA PREMIUM (mais suave e moderna)
  const cores = [
    "rgba(168, 203, 25, 0.35)",    // Verde principal
    "rgba(34, 197, 94, 0.28)",     // Verde claro
    "rgba(124, 58, 237, 0.22)",    // Roxo suave
    "rgba(59, 130, 246, 0.25)",    // Azul céu
    "rgba(16, 185, 129, 0.30)",    // Verde menta
    "rgba(236, 72, 153, 0.20)",    // Rosa suave
    "rgba(245, 158, 11, 0.25)",    // Laranja dourado
  ];

  // 🌊 Blobs principais (maiores e mais suaves)
  const blobs = Array.from({ length: 6 }, (_, i) => ({
    x: Math.random() * width,
    y: Math.random() * height,
    r: 180 + Math.random() * 220,
    vx: (Math.random() - 0.5) * 1.8,
    vy: (Math.random() - 0.5) * 1.8,
    cor: cores[i % cores.length],
    phase: Math.random() * Math.PI * 2
  }));

  // ✨ Partículas pequenas (efeito estrelas)
  const particles = Array.from({ length: 80 }, () => ({
    x: Math.random() * width,
    y: Math.random() * height,
    vx: (Math.random() - 0.5) * 0.8,
    vy: (Math.random() - 0.5) * 0.8,
    size: Math.random() * 3 + 1,
    alpha: Math.random() * 0.5 + 0.2,
    cor: `hsl(${Math.random() * 60 + 100}, 70%, 60%)`
  }));

  function animar() {
    ctx.fillStyle = "rgba(250, 250, 252, 0.95)"; // Fundo super suave
    ctx.fillRect(0, 0, width, height);

    time += 0.015;

    // 🎨 Blobs com gradiente orgânico
    blobs.forEach((b, i) => {
      // Segue o mouse sutilmente
      b.vx += (mouseX - b.x) * 0.0008;
      b.vy += (mouseY - b.y) * 0.0008;
      
      b.x += b.vx + Math.sin(time + b.phase) * 0.5;
      b.y += b.vy + Math.cos(time + b.phase * 1.3) * 0.5;
      
      // Limites suaves
      b.x = Math.max(b.r, Math.min(width - b.r, b.x));
      b.y = Math.max(b.r, Math.min(height - b.r, b.y));

      // 🌈 Gradiente MULTICAMADA
      const grad = ctx.createRadialGradient(b.x, b.y, 0, b.x, b.y, b.r * 1.4);
      grad.addColorStop(0, b.cor);
      grad.addColorStop(0.3, `${b.cor.slice(0, -4)}, 0.6)`);
      grad.addColorStop(0.7, `${b.cor.slice(0, -4)}, 0.15)`);
      grad.addColorStop(1, "rgba(255,255,255,0)");
      
      ctx.save();
      ctx.translate(b.x, b.y);
      ctx.scale(1 + Math.sin(time * 2 + b.phase) * 0.08, 1 + Math.cos(time * 2 + b.phase) * 0.08);
      ctx.fillStyle = grad;
      ctx.beginPath();
      ctx.arc(0, 0, b.r, 0, Math.PI * 2);
      ctx.fill();
      ctx.restore();
    });

    // ⭐ Partículas brilhantes
    particles.forEach(p => {
      p.x += p.vx;
      p.y += p.vy;
      
      if (p.x < 0 || p.x > width) p.vx *= -1;
      if (p.y < 0 || p.y > height) p.vy *= -1;

      ctx.save();
      ctx.globalAlpha = p.alpha;
      ctx.fillStyle = p.cor;
      ctx.shadowColor = p.cor;
      ctx.shadowBlur = 8;
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
      ctx.fill();
      ctx.restore();
    });

    animId = requestAnimationFrame(animar);
  }

  // 🖱️ Mouse tracking suave
  document.addEventListener("mousemove", (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
  });

  // ⏸️ Otimização (mesma lógica do seu código)
  document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
      cancelAnimationFrame(animId);
    } else {
      animar();
    }
  });

  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    // Versão estática
    ctx.fillStyle = "rgba(250, 250, 252, 0.98)";
    ctx.fillRect(0, 0, width, height);
  } else {
    animar();
  }
})();