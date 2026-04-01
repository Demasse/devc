<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevC | Plateforme de Développement Tactique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #050505; color: #fff; }
        .mono { font-family: 'JetBrains Mono', monospace; }
        .gradient-text { background: linear-gradient(90deg, #6366f1, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .terminal-card { background: rgba(15, 15, 20, 0.8); border: 1px solid rgba(255,255,255,0.1); }
        .section-reveal { opacity: 0; transform: translateY(30px); }
    </style>
</head>
<body class="overflow-x-hidden">

    <nav class="fixed w-full z-50 backdrop-blur-md border-b border-white/10 px-8 py-4 flex justify-between items-center">
        <div class="text-2xl font-black tracking-tighter mono">DEV<span class="text-indigo-500">C</span></div>
        <div class="hidden md:flex space-x-8 text-sm font-medium text-slate-400">
            <a href="#features" class="hover:text-white transition">FONCTIONS</a>
            <a href="#stats" class="hover:text-white transition">STATS</a>
            <a href="#footer" class="hover:text-white transition">CONTACT</a>
        </div>
        <button class="bg-indigo-600 px-5 py-2 rounded-full text-xs font-bold hover:bg-indigo-500 transition-all active:scale-95 shadow-lg shadow-indigo-500/20">
            DÉMARRER LE TERMINAL
        </button>
    </nav>

    <header class="h-screen flex flex-col items-center justify-center text-center px-4 pt-20">
        <div class="mono text-xs text-indigo-400 mb-4 tracking-[0.5em] uppercase">Built for high-performance</div>
        <h1 id="hero-title" class="text-6xl md:text-8xl font-black leading-tight mb-6">
            DÉVELOPPEZ <br> <span class="gradient-text">SANS LIMITES.</span>
        </h1>
        <p id="hero-desc" class="text-slate-400 max-w-xl mb-10 text-lg">
            DevC est la plateforme tactique ultime pour concevoir des applications web en un temps record. Pas de blabla, juste du code.
        </p>
        <div class="flex space-x-4">
            <button class="px-8 py-4 bg-white text-black font-bold rounded-lg hover:invert transition">Explorer</button>
            <button class="px-8 py-4 border border-white/20 rounded-lg hover:bg-white/5 transition">Documentation</button>
        </div>
    </header>

    <section id="features" class="py-32 px-8 max-w-7xl mx-auto section-reveal">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="terminal-card p-8 rounded-2xl">
                <div class="w-12 h-12 bg-indigo-500/20 rounded-lg flex items-center justify-center text-indigo-500 mb-6 font-bold">01</div>
                <h3 class="text-xl font-bold mb-4">Architecture Tactique</h3>
                <p class="text-slate-400 leading-relaxed">Une structure pensée pour la vitesse et la scalabilité maximale.</p>
            </div>
            <div class="terminal-card p-8 rounded-2xl border-indigo-500/30">
                <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center text-purple-500 mb-6 font-bold">02</div>
                <h3 class="text-xl font-bold mb-4">Animations Fluides</h3>
                <p class="text-slate-400 leading-relaxed">Chaque interaction est une expérience visuelle grâce à notre moteur Anime.js.</p>
            </div>
            <div class="terminal-card p-8 rounded-2xl">
                <div class="w-12 h-12 bg-emerald-500/20 rounded-lg flex items-center justify-center text-emerald-500 mb-6 font-bold">03</div>
                <h3 class="text-xl font-bold mb-4">Zéro Friction</h3>
                <p class="text-slate-400 leading-relaxed">Pas de comptes inutiles. Codez, sauvegardez, déployez instantanément.</p>
            </div>
        </div>
    </section>

    <section id="stats" class="py-32 bg-[#080808] section-reveal">
        <div class="max-w-4xl mx-auto px-8">
            <h2 class="text-3xl font-bold mb-12 text-center">Performances du Système</h2>
            <div class="space-y-8">
                <div>
                    <div class="flex justify-between mb-2 mono text-xs uppercase"><span>Vitesse de Compilation</span><span>98%</span></div>
                    <div class="h-1 bg-slate-800 rounded-full overflow-hidden"><div class="stat-bar h-full bg-indigo-500 w-[98%]"></div></div>
                </div>
                <div>
                    <div class="flex justify-between mb-2 mono text-xs uppercase"><span>Optimisation Code</span><span>85%</span></div>
                    <div class="h-1 bg-slate-800 rounded-full overflow-hidden"><div class="stat-bar h-full bg-purple-500 w-[85%]"></div></div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer" class="py-20 border-t border-white/5 text-center text-slate-500">
        <div class="mb-8 font-black text-white text-xl">DEV<span class="text-indigo-500">C</span></div>
        <p class="text-sm mb-6 uppercase tracking-widest mono">&copy; 2026 DevC System - No Rights Reserved</p>
        <div class="flex justify-center space-x-6">
            <a href="#" class="hover:text-white transition">Twitter</a>
            <a href="#" class="hover:text-white transition">GitHub</a>
            <a href="#" class="hover:text-white transition">Discord</a>
        </div>
    </footer>

    <script>
        // Animation du Hero au chargement
        let tl = anime.timeline({
            easing: 'easeOutExpo',
            duration: 1200
        });

        tl.add({
            targets: '#hero-title',
            translateY: [100, 0],
            opacity: [0, 1],
            delay: 300
        })
        .add({
            targets: '#hero-desc',
            opacity: [0, 1],
            translateY: [20, 0]
        }, '-=800')
        .add({
            targets: '.stat-bar',
            width: (el) => el.style.width,
            delay: anime.stagger(200),
            duration: 2000
        });

        // Effet au scroll pour révéler les sections
        window.addEventListener('scroll', () => {
            document.querySelectorAll('.section-reveal').forEach(el => {
                let pos = el.getBoundingClientRect().top;
                if(pos < window.innerHeight - 100) {
                    anime({
                        targets: el,
                        translateY: 0,
                        opacity: 1,
                        duration: 1000,
                        easing: 'easeOutQuad'
                    });
                }
            });
        });
    </script>
</body>
</html>
