<?php
/* ---------- Louis Miguel Terrago — portfolio ----------
   Run locally:  php -S localhost:8000   (then open http://localhost:8000)
   Edit the arrays below to change content. */
function h($s){return htmlspecialchars((string)$s,ENT_QUOTES,'UTF-8');}

// BACKGROUND IMAGE: replace assets/background.jpg with your own image (or change this path).
$bgImage='assets/background.jpg';
$bgDim=0.55;   // 0 = image at full brightness, 1 = fully dark. Raise it if text is hard to read.
$hasBg=$bgImage&&is_file(__DIR__.'/'.$bgImage);

$me=[
  'first'=>'Louis Miguel','last'=>'Terrago','role'=>'BSIT Student',
  'skills'=>['Web Developer','Graphic Designer','Pitch Leader'],
  'tagline'=>'Turning ideas into digital experiences, with a passion for code and creativity.',
  'email'=>'louismiguelterrago@gmail.com','github'=>'wheeze-cmd','location'=>'Philippines',
];
// Replace these placeholders with your real projects and milestones.
$achievements=[
  ['TOP 10 CEISSAFP Ideathon 2026','Held in Camp Aguinaldo, this event challenged students to develop innovative solutions for real-world problems.'],
  ['Pitch Leader','In ideathon, I led the pitch team, crafting compelling presentations that effectively communicated our ideas to judges and stakeholders.'],
  ['Web Development Intern','Gained hands-on experience in web development, contributing to real projects and enhancing my coding skills.'],
  ['Graphic Design Projects','Created visually appealing graphics for various clients, honing my design skills and understanding of visual communication.'],
];

// Your intro video: paste the YouTube video ID here (the part after "v=" in the link, e.g. dQw4w9WgXcQ).
// While it is empty, a placeholder box is shown under the About text.
$youtubeId='4zvdGliW8Ek';

// Projects: replace these placeholders. 'image' is optional (e.g. assets/projects/shop.jpg), 'link' is optional.
$projects=[
  ['The Capital Barbershop','A portfolio and appointment booking website for a local barbershop.','HTML · CSS · JS · SUPABASE','thecapitalbarbersop.online','assets/projects/project1.jpg'],
  ['House of Origami','Origami school portfolio website.','HTML · CSS · JS','https://house-of-origami-website.vercel.app/','assets/projects/project2.png'],
  ['IntraGo','A Java application that uses graph data structures to determine the nearest location in Intramuros efficiently. It implements pathfinding logic to calculate optimal routes.','Java','','assets/projects/project3.jpg'],
  ['Restaurant POS','A Java-based POS system that handles orders, billing, and inventory. Designed with a clean UI and efficient workflow for small businesses.','Java','','assets/projects/project2.jpg'],
  ['Inventory System','A Java-based inventory system designed to track products, manage stock levels, and organize data efficiently. It features a structured interface for adding, updating, and monitoring items.','Java','','assets/projects/project2.jpg'],
];

// The contact form is sent with EmailJS (see script.js), so no PHP form handling is needed.
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="assets/favicon.png" type="image/png">
<title><?=h($me['first'].' '.$me['last'])?></title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root{--ink:#04061a;--blue:#5468ff;--ice:#b4c0ff;--mist:#8e9ad0;--text:#e8ecff}
*{box-sizing:border-box;margin:0}
html{scroll-behavior:smooth;background:var(--ink);font-size:150%}
body{font:300 1rem/1.6 Outfit,system-ui,sans-serif;color:var(--text);background:var(--ink)}
.stage{position:fixed;inset:0;z-index:0}
.stage{background:linear-gradient(112deg,transparent 52%,rgba(20,32,120,.32) 52.2%,rgba(20,32,120,.32) 60%,transparent 60.2%),linear-gradient(98deg,transparent 70%,rgba(10,17,72,.7) 70.2%,rgba(10,17,72,.7) 77%,transparent 77.2%),radial-gradient(ellipse at 72% 50%,#142070 0%,transparent 62%),var(--ink)}
.stage .bg{position:absolute;left:0;right:0;top:-6vh;bottom:-6vh;background:center/cover no-repeat;will-change:transform}
.stage .shade{position:absolute;inset:0;pointer-events:none;background:rgba(4,6,26,<?=(float)$bgDim?>)}
.stage canvas{position:relative;width:100%;height:100%;display:block;opacity:0;transition:opacity 1.2s}
.stage.ready canvas{opacity:1}
.load{position:fixed;right:8vw;top:50%;z-index:6;font-size:.8rem;color:var(--mist)}
.stage::after{pointer-events:none;content:"";position:absolute;inset:0;background:linear-gradient(90deg,rgba(4,6,26,.9),rgba(4,6,26,.45) 50%,transparent 85%),radial-gradient(ellipse at 70% 50%,transparent 40%,rgba(4,6,26,.7))}
header{position:fixed;top:0;left:0;right:0;z-index:10;display:flex;justify-content:space-between;align-items:center;padding:1.6rem 5vw}
.logo img{width:5rem;display:inline-block;line-height:0}
nav{display:flex;gap:2.2rem;align-items:center;list-style:none;font:400 .85rem Outfit,sans-serif}
nav a{font-size:.78rem;color:var(--mist);text-decoration:none;transition:color .2s}
nav a.on,nav a:hover{color:var(--blue)}
.count{position:fixed;right:4vw;top:50%;transform:translateY(-50%);z-index:10;display:flex;flex-direction:column;align-items:center;gap:.5rem;font-size:.75rem;color:var(--ice)}
.count i{width:1px;height:48px;background:rgba(180,192,255,.35)}
.count b{font-weight:400;border-bottom:1px solid var(--ice);padding-bottom:2px}
.count span{color:var(--mist)}
main{position:relative;z-index:5;pointer-events:none}
.copy,.hint,footer{pointer-events:auto}
.panel{min-height:100svh;display:flex;align-items:center;padding:6rem 8vw 5rem}
.copy{max-width:30rem}
.tag{font-size:.7rem;letter-spacing:.3em;text-transform:uppercase;color:var(--ice);margin-bottom:1.1rem}
h1,h2{font-weight:600;line-height:1.05;letter-spacing:-.01em;font-size:clamp(2.4rem,5.2vw,4.1rem)}
h2{font-size:clamp(2.2rem,4.4vw,3.4rem)}
.hl{color:var(--blue)}
.skills{margin-top:1.1rem;font-size:.85rem;display:flex;flex-wrap:wrap;gap:.4rem .5rem;padding:0}
.skills li{list-style:none}
.skills li+li::before{content:"•";margin-right:1.1rem;color:var(--mist)}
.lead{margin-top:1.4rem;color:#b9c3ee;max-width:26rem}
.btn{margin-top:1.8rem;display:inline-flex;align-items:center;gap:.7rem;font:400 .85rem Outfit,sans-serif;color:var(--ice);background:rgba(84,104,255,.1);border:1px solid var(--blue);border-radius:99px;padding:.7rem 1.3rem;cursor:pointer;text-decoration:none;transition:background .2s,box-shadow .2s}
.btn:hover{background:rgba(84,104,255,.28);box-shadow:0 0 24px rgba(84,104,255,.45)}
.btn:focus-visible,nav a:focus-visible,input:focus-visible,textarea:focus-visible{outline:2px solid var(--ice);outline-offset:3px}
.btn svg{width:14px;height:14px}
.chord small{color:var(--mist);margin-left:.2rem}
.hint{position:absolute;left:8vw;bottom:2.2rem;font-size:.7rem;color:var(--mist);display:flex;gap:.8rem;align-items:center}
.hint i{width:16px;height:26px;border:1px solid var(--mist);border-radius:9px;position:relative}
.hint i::after{content:"";position:absolute;left:50%;top:5px;width:2px;height:5px;margin-left:-1px;background:var(--ice);border-radius:2px;animation:wheel 1.8s ease-in-out infinite}
@keyframes wheel{0%{opacity:0;transform:translateY(0)}40%{opacity:1}100%{opacity:0;transform:translateY(8px)}}
.panel{position:relative}
#achievements .copy,#projects .copy,#contact .copy{margin-left:auto;margin-right:5vw;width:min(36rem,43vw)}
#achievements .copy,#projects .copy{padding:1.8rem 2rem;border:1px solid rgba(180,192,255,.18);border-radius:24px;background:rgba(5,9,35,.56);backdrop-filter:blur(14px)}
#contact .copy{padding:1.8rem 2rem;border:1px solid rgba(180,192,255,.18);border-radius:24px;background:rgba(5,9,35,.62);backdrop-filter:blur(14px)}
.ach{margin-top:1.6rem;display:grid;gap:1rem;list-style:none;padding:0}
.ach li{border-left:2px solid var(--blue);padding-left:1rem}
.ach b{display:block;font-weight:500}.ach span{font-size:.9rem;color:#9fabdc}
.ach[hidden],form[hidden]{display:none}
.video{margin-top:1.6rem;width:min(100%,22rem);aspect-ratio:16/9;border-radius:16px;overflow:hidden;border:1px solid rgba(180,192,255,.25);background:rgba(10,16,48,.6)}
.video iframe{width:100%;height:100%;border:0;display:block}
.video.ph{display:grid;place-items:center;text-align:center;border:2px dashed rgba(180,192,255,.4);color:var(--mist);font-size:.75rem;padding:1rem}
.video.ph svg{width:2.4rem;height:2.4rem;fill:none;stroke:var(--ice);stroke-width:1.5;margin-bottom:.4rem}
.proj{margin-top:1.4rem;display:grid;gap:.9rem}
.card{display:grid;grid-template-columns:6.5rem 1fr;gap:1rem;align-items:center;padding:.8rem;border:1px solid rgba(180,192,255,.18);border-radius:16px;background:rgba(10,16,48,.55)}
.thumb{aspect-ratio:16/10;border-radius:10px;border:1px dashed rgba(180,192,255,.4);display:grid;place-items:center;font-size:.6rem;text-align:center;color:var(--mist);background:rgba(84,104,255,.08) center/cover no-repeat}
.thumb.has{border-style:solid;color:transparent}
.card b{display:block;font-weight:500}.card p{font-size:.82rem;color:#9fabdc;line-height:1.4}
.card small{display:block;margin-top:.2rem;font-size:.7rem;color:var(--ice)}
.card a{display:inline-block;margin-top:.3rem;font-size:.78rem;color:var(--blue);text-decoration:none}
.info{margin-top:2rem;display:grid;gap:1rem}
.info div{display:flex;gap:1rem;align-items:center;font-size:.85rem}
.info em{font-style:normal;display:block;font-size:.7rem;color:var(--mist)}
.info a{color:var(--text);text-decoration:none}.info a:hover{color:var(--blue)}
.ico{flex:none;width:38px;height:38px;border-radius:50%;border:1px solid rgba(180,192,255,.35);display:grid;place-items:center;background:rgba(10,16,48,.7)}
.ico svg{width:16px;height:16px;fill:none;stroke:var(--ice);stroke-width:1.7}
#contact form {width: 100%;max-width: 100%;min-width: 0;margin-top: 1.4rem;display: grid;gap: .8rem;}
#contact form input,
#contact form textarea {display: block;width: 100%;max-width: 100%;min-width: 0;box-sizing: border-box;background:rgba(10,16,48,.75);border:1px solid rgba(180,192,255,.3);border-radius:12px;padding:.75rem 1rem;font:300 .95rem Outfit,sans-serif;color:var(--text);}
#contact form textarea {resize: vertical;min-height: 120px;}
#contact form[hidden] {display: none !important;}
.hp{position:absolute;left:-9999px}
.note{margin-top:1rem;font-size:.9rem;padding:.7rem 1rem;border-radius:12px;background:rgba(84,104,255,.15)}
.note.err{background:rgba(255,90,110,.15)}
footer{position:absolute;left:8vw;right:8vw;bottom:1.6rem;display:flex;justify-content:space-between;align-items: center;gap:1rem;font-size:.7rem;color:var(--mist)}
footer img{width: 3rem;}
@media(max-width:800px){
  html{font-size:100%;}
  #achievements .copy,#projects .copy,#contact .copy{width:100%;padding:1.2rem;background:rgba(5,9,35,.8);margin-bottom:9rem;margin-right: 0;}
  nav{gap:1rem}.count{display:none}
  .panel{align-items:flex-end;padding-bottom:6rem}
  .stage::after{background:linear-gradient(0deg,rgba(4,6,26,.95),rgba(4,6,26,.55) 55%,transparent)}
  footer{flex-direction:column}
}
/* Mobile navigation */
.menu-toggle,
.mobile-sidebar,
.menu-overlay {
    display: none;
}

@media (max-width: 800px) {

    /* Hide desktop navigation */
    header nav {
        display: none;
    }

    /* Hamburger */
    .menu-toggle {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 6px;
        position: fixed;
        top: 1.5rem;
        right: 6vw;
        z-index: 30;
        width: 45px;
        height: 45px;
        padding: 10px;
        background: rgba(10,16,48,.85);
        border: 1px solid rgba(180,192,255,.3);
        border-radius: 10px;
        cursor: pointer;
    }

    .menu-toggle span {
        height: 2px;
        width: 100%;
        background: var(--ice);
    }

    /* Sidebar */
    .mobile-sidebar {
        display: flex;
        flex-direction: column;
        position: fixed;
        top: 0;
        right: 0;
        width: min(300px, 80vw);
        height: 100vh;
        padding: 2rem;
        z-index: 40;
        background: rgba(5,9,35,.97);
        border-left: 1px solid rgba(180,192,255,.2);
        backdrop-filter: blur(20px);
        transform: translateX(100%);
        visibility: hidden;
        transition: .35s ease;
    }

    .mobile-sidebar.open {
        transform: translateX(0);
        visibility: visible;
    }

    .sidebar-header {
        display: flex;
        justify-content: end;
        align-items: center;
    }

    #menuClose {
        background: none;
        border: none;
        color: var(--ice);
        font-size: 2rem;
        cursor: pointer;
    }

    .mobile-sidebar nav {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        margin-top: 4rem;
    }

    .mobile-sidebar nav a {
        font-size: 1.2rem;
    }

    .sidebar-footer {
        margin-top: auto;
        font-size: .7rem;
        color: var(--mist);
    }

    /* Overlay */
    .menu-overlay {
        display: block;
        position: fixed;
        inset: 0;
        z-index: 35;
        background: rgba(0,0,0,.6);
        opacity: 0;
        visibility: hidden;
        transition: .3s;
    }

    .menu-overlay.show {
        opacity: 1;
        visibility: visible;
    }
}
@media(prefers-reduced-motion:reduce){.hint i::after{animation:none}}

</style>
</head>
<body>

<div class="stage">
  <?php if($hasBg){?><div class="bg" id="bg" style="background-image:url('<?=h($bgImage)?>')"></div><div class="shade"></div><?php }?>
  <canvas id="gl" aria-label="3D acoustic guitar. Click it to play a chord."></canvas>
</div>
<div class="load" id="load" role="status">Tuning up… 0%</div>

<header>
  <a class="logo" href="#home" aria-label="Home"><img src="assets/favicon.png"></a>
  <nav aria-label="Primary">
    <li><a href="#home" class="active" data-strum="0">Home</a></li>
    <li><a href="#about" data-strum="1">About me</a></li>
    <li><a href="#achievements" data-strum="2">Achievements</a></li>
    <li><a href="#projects" data-strum="3">Projects</a></li>
    <li><a href="#contact" data-strum="4">Contact</a></li>
  </nav>
    <!-- Mobile hamburger button -->
  <button class="menu-toggle" id="menuToggle"
          aria-label="Open navigation"
          aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
  </button>

  <!-- Mobile overlay -->
  <div class="menu-overlay" id="menuOverlay"></div>

  <!-- Mobile sidebar -->
  <aside class="mobile-sidebar" id="mobileSidebar">
      <div class="sidebar-header">
          <button id="menuClose" aria-label="Close navigation">&times;</button>
      </div>

      <nav>
          <a href="#home">Home</a>
          <a href="#about">About</a>
          <a href="#achievements">Achievements</a>
          <a href="#projects">Projects</a>
          <a href="#contact">Contact</a>
      </nav>

      <p class="sidebar-footer">Louis Miguel Terrago © 2026</p>
  </aside>
</header>
<div class="count" aria-hidden="true"><i></i><div><b id="cur">01</b><br><span>05</span></div><i></i></div>

<main>
  <section class="panel" id="home">
    <div class="copy">
      <p class="tag"><?=h($me['role'])?></p>
      <h1><?=h($me['first'])?><br><span class="hl"><?=h($me['last'])?></span></h1>
      <ul class="skills"><?php foreach($me['skills'] as $s){?><li><?=h($s)?></li><?php }?></ul>
      <p class="lead"><?=h($me['tagline'])?></p>
      <a class="btn" href="#about">Explore my journey <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 1l6 6-6 6"/></svg></a>
    </div>
    <div class="hint"><i></i>Scroll up the guitar · click it to strum</div>
  </section>

  <section class="panel" id="about">
    <div class="copy">
      <p class="tag">About me</p>
      <h2>A developer<br>with a <span class="hl">rhythm.</span></h2>
      <p class="lead">I'm <?=h($me['first'].' '.$me['last'])?>, a dedicated and driven aspiring developer focused on building clean, efficient, and user-centered web applications. I value structured code, responsive design, and attention to detail. With every project, I aim to deliver high-quality digital experiences while continuously improving my technical expertise and problem-solving skills.</p>
      <button class="btn chord" id="play" type="button" aria-live="polite">
        <svg viewBox="0 0 14 14" fill="currentColor"><path d="M3 1l9 6-9 6z"/></svg><span>Play a chord</span><small id="cname">Em</small>
      </button>
      <?php if($youtubeId){?>
      <div class="video"><iframe src="https://www.youtube-nocookie.com/embed/<?=h($youtubeId)?>?rel=0" title="Intro video" loading="lazy" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture; fullscreen" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe></div>
      <?php }else{?>
      <div class="video ph"><div><svg viewBox="0 0 24 24"><rect x="2.5" y="5" width="19" height="14" rx="4"/><path d="M10 9.500l5 2.500-5 2.500z"/></svg><br>Intro video placeholder<br>Set <b>$youtubeId</b> at the top of index.php</div></div>
      <?php }?>
    </div>
  </section>

  <section class="panel" id="achievements">
    <div class="copy">
      <p class="tag">Achievements</p>
      <h2>Milestones<br>in my <span class="hl">journey.</span></h2>
      <p class="lead">A showcase of my projects, achievements, and contributions.</p>
      <button class="btn" id="achBtn" type="button" aria-expanded="false" aria-controls="achList">View achievements <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 1l6 6-6 6"/></svg></button>
      <ul class="ach" id="achList" hidden>
        <?php foreach($achievements as [$t,$d]){?><li><b><?=h($t)?></b><span><?=h($d)?></span></li><?php }?>
      </ul>
    </div>
  </section>

  <section class="panel" id="projects">
    <div class="copy">
      <p class="tag">Projects</p>
      <h2>Things I've<br><span class="hl">built.</span></h2>
      <p class="lead">A few projects I'm proud of. Replace these placeholders with your own work.</p>
      <div class="proj">
        <?php foreach($projects as [$t,$d,$stack,$link,$img]){$has=$img&&is_file(__DIR__.'/'.$img);?>
        <article class="card">
          <div class="thumb<?=$has?' has':''?>" <?=$has?'style="background-image:url(\''.h($img).'\')"':''?>><?=$has?'':'Project image'?></div>
          <div><b><?=h($t)?></b><p><?=h($d)?></p><small><?=h($stack)?></small><?php if($link){?><a href="<?=h($link)?>" target="_blank" rel="noopener">View project →</a><?php }?></div>
        </article>
        <?php }?>
      </div>
    </div>
  </section>

  <section class="panel" id="contact">
    <div class="copy">
      <p class="tag">Contact</p>
      <h2>Let's <span class="hl">connect.</span></h2>
      <p class="lead">Have a project in mind? <a href="#contact" id="cLink" style="color:var(--blue);text-decoration:none">Let's make it real.</a></p>
      <button class="btn" id="msgBtn" type="button" aria-expanded="false" aria-controls="msgForm">Send a message <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 1l6 6-6 6"/></svg></button>
      <p class="note" id="formNote" role="status" hidden></p>
      <form class="contact-form" id="msgForm" hidden>
        <input class="hp" type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">
        <input name="from_name" placeholder="Your name" required maxlength="100" aria-label="Your name">
        <input name="reply_to" type="email" placeholder="Your email" required aria-label="Your email">
        <textarea name="message" rows="4" placeholder="Your message" required maxlength="3000" aria-label="Your message"></textarea>
        <button class="btn" type="submit" style="justify-self:start">Send message</button>
      </form>
      <div class="info">
        <div><span class="ico"><svg viewBox="0 0 16 16"><rect x="1.5" y="3" width="13" height="10" rx="2"/><path d="M2 4l6 5 6-5"/></svg></span><p><em>Email</em><a href="mailto:<?=h($me['email'])?>"><?=h($me['email'])?></a></p></div>
        <div><span class="ico"><svg viewBox="0 0 16 16"><path d="M5 4L1 8l4 4M11 4l4 4-4 4M9.500 2.500l-3 11"/></svg></span><p><em>GitHub</em><a href="https://github.com/<?=h($me['github'])?>" target="_blank" rel="noopener"><?=h($me['github'])?></a></p></div>
        <div><span class="ico"><svg viewBox="0 0 16 16"><path d="M8 15s5-4.500 5-8.500a5 5 0 0 0-10 0C3 10.500 8 15 8 15z"/><circle cx="8" cy="6.500" r="1.800"/></svg></span><p><em>Location</em><?=h($me['location'])?></p></div>
      </div>
    </div>
    <footer><img src="assets/favicon.png"><span><?=h($me['first'].' '.$me['last'])?></span><span>3d model from sketchfab.com</span></footer>
  </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<script src="script.js" defer></script>
<script type="importmap">{"imports":{"three":"https://cdn.jsdelivr.net/npm/three@0.170.0/build/three.module.js","three/addons/":"https://cdn.jsdelivr.net/npm/three@0.170.0/examples/jsm/"}}</script>
<script type="module">
import * as THREE from 'three';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';
import { DRACOLoader } from 'three/addons/loaders/DRACOLoader.js';
import { RoomEnvironment } from 'three/addons/environments/RoomEnvironment.js';

const $ = s => document.querySelector(s), $$ = s => [...document.querySelectorAll(s)];

const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;



/* ---- 3D scene: acoustic_guitar.glb ---- */
const stage = $('.stage'), loadEl = $('#load'), bgEl = $('#bg');
const renderer = new THREE.WebGLRenderer({canvas: $('#gl'), antialias: true, alpha: true});
renderer.setPixelRatio(Math.min(devicePixelRatio, 1.5));
renderer.toneMapping = THREE.ACESFilmicToneMapping;
renderer.toneMappingExposure = 1.1;
const scene = new THREE.Scene();
scene.environment = new THREE.PMREMGenerator(renderer).fromScene(new RoomEnvironment(), .04).texture;
scene.environmentIntensity = .5;
const camera = new THREE.PerspectiveCamera(28, 1, .01, 20);
const key = new THREE.DirectionalLight(0xc8d4ff, 2.4); key.position.set(-1, 1.2, 2);
const rim = new THREE.DirectionalLight(0x5468ff, 4);   rim.position.set(2, .4, -1.5);
scene.add(key, rim, new THREE.HemisphereLight(0x8fa2ff, 0x0a1030, .6));
const pivot = new THREE.Group(); scene.add(pivot);

const ZTOP = -0.513;          // headstock tip along the guitar's length axis (model units)
const STRING_ORDER = ['mi basso','la','re','sol','si','mi cantino'];
let H = 1, ready = false;
const strs = [], strMats = new Set();
const draco = new DRACOLoader().setDecoderPath('https://www.gstatic.com/draco/versioned/decoders/1.5.7/');   // the model is Draco-compressed (1.2 MB instead of 23 MB)
new GLTFLoader().setDRACOLoader(draco).load('assets/acoustic_guitar.glb', gltf => {
  const holder = new THREE.Group();
  holder.add(gltf.scene);
  holder.rotation.x = Math.PI / 2;                             // model lies face-up: stand it up so the face looks at the camera
  pivot.add(holder); holder.updateMatrixWorld(true);
  const inv = new THREE.Matrix4().copy(gltf.scene.matrixWorld).invert();
  gltf.scene.traverse(o => {                                   // collect the six strings so they can vibrate
    if (!o.isMesh || !o.name.startsWith('corda')) return;
    const S = new THREE.Matrix4().multiplyMatrices(inv, o.matrixWorld), Si = S.clone().invert();
    const pos = o.geometry.attributes.position, orig = pos.array.slice(), u = new Float32Array(pos.count), v = new THREE.Vector3();
    for (let i = 0; i < pos.count; i++) { v.fromArray(orig, i * 3).applyMatrix4(S); u[i] = THREE.MathUtils.clamp((v.z + .358) / .663, 0, 1); }  // 0 at nut, 1 at bridge
    const d = new THREE.Vector3(1, 0, 0).applyMatrix4(Si).sub(new THREE.Vector3().applyMatrix4(Si));   // sideways direction in the mesh's own space
    const k = STRING_ORDER.findIndex(n => o.name.startsWith('corda ' + n));
    strs.push({pos, orig, u, d, k: Math.max(0, k)});
    o.material = o.material.clone(); o.material.emissive = new THREE.Color(0x7f93ff); strMats.add(o.material);
  });
  const box = new THREE.Box3().setFromObject(holder, true);
  holder.position.sub(box.getCenter(new THREE.Vector3()));
  H = box.max.y - box.min.y; ready = true;
  stage.classList.add('ready'); loadEl.remove();
}, e => { if (e.total) loadEl.textContent = 'Tuning up… ' + Math.round(e.loaded / e.total * 100) + '%'; },
   () => { loadEl.textContent = 'Could not load assets/acoustic_guitar.glb. Check the file path.'; });

/* ---- scroll camera: each section looks at a different part of the neck ---- */
// z = position along the guitar (-0.51 headstock … +0.52 bottom of the body) · vh = how much of it is visible · yaw = slight turn
const desktopK = [
    {z: .144, vh:.50, yaw:-.25, ax:.70, ay:.5},
    {z:-.040, vh:.30, yaw: .20, ax:.50, ay:.5},
    {z:-.240, vh:.28, yaw:-.15, ax:.25, ay:.5},
    {z:-.340, vh:.27, yaw: .12, ax:.25, ay:.4},   // projects: just below the nut
    {z:-.440, vh:.26, yaw: .25, ax:-.07, ay:.25},
];

const mobileK = [
    {z: .144, vh:.50, yaw:-.25, ax:.70, ay:.5},
    {z:-.040, vh:.30, yaw: .20, ax:.50, ay:.5},
    {z:-.240, vh:.28, yaw:-.15, ax:.25, ay:.5},
    {z:-.340, vh:.27, yaw: .12, ax:.25, ay:.4},
    {z:-.440, vh:.26, yaw: .25, ax:-.10, ay:.25},
];

let K = window.matchMedia("(max-width: 800px)").matches
    ? mobileK
    : desktopK;

const media = window.matchMedia("(max-width: 800px)");

media.addEventListener("change", e => {
    K = e.matches ? mobileK : desktopK;
});

const panels = $$('.panel'), links = $$('header > nav a'), sideLinks = $$('#mobileSidebar nav a'), cur = $('#cur');
let tops = [], target = 0, p = 0, shown = -1, px = 0, py = 0, vibT = -1;

const measure = () => { tops = panels.map(e => e.offsetTop); onScroll(); };
const onScroll = () => {
  let i = 0;
  for (let k = 0; k < tops.length; k++) if (scrollY >= tops[k] - 1) i = k;
  const end = i < tops.length - 1 ? tops[i + 1] : tops[i] + 1;
  const last = tops.length - 1;
  target = Math.min(last, i + (i < last ? Math.min(1, (scrollY - tops[i]) / (end - tops[i])) : 0));
};
const resize = () => {
  renderer.setSize(innerWidth, innerHeight, false);
  camera.aspect = innerWidth / innerHeight; camera.updateProjectionMatrix(); measure();
};
addEventListener('scroll', onScroll, {passive:true});
addEventListener('resize', resize);
addEventListener('pointermove', e => { px = e.clientX / innerWidth - .5; py = e.clientY / innerHeight - .5; });

const lerp = (a, b, t) => a + (b - a) * t;
function frame(now) {
  p = reduce ? target : lerp(p, target, .1);
  if (bgEl) bgEl.style.transform = `translateY(${-p * 1.8}vh)`;   // slow drift on your background image
  if (ready) {
    const i = Math.min(K.length - 2, Math.floor(p)), f = p - i, e = f * f * (3 - 2 * f);
    const v = k => lerp(K[i][k], K[i + 1][k], e), m = innerWidth < 800;
    const vh = v('vh') * (m ? 1.25 : 1);
    const ax = v('ax');
    const ay = v('ay');
    const d = vh / (2 * Math.tan(THREE.MathUtils.degToRad(camera.fov / 2)));
    camera.position.set(-(ax - .5) * camera.aspect * vh, H / 2 - (v('z') - ZTOP) - (.5 - ay) * vh, d);
    pivot.rotation.y = v('yaw') + (reduce ? 0 : px * .1);
    pivot.rotation.x = reduce ? 0 : py * .05;
    pivot.rotation.z = innerWidth < 800 ? -0.22 : -0.38;
    // chord ring: each string vibrates sideways (strummed low to high) and glows, then fades out
    let glow = 0;
    if (vibT >= 0) {
      const t0 = (now - vibT) / 1000;
      if (t0 > 3.4) {
        vibT = -1;
        strs.forEach(s => { s.pos.array.set(s.orig); s.pos.needsUpdate = true; });
      } else {
        for (const s of strs) {
          const t = t0 - s.k * .045; if (t < 0) continue;
          const env = Math.exp(-t * 1.7), a = (reduce ? 0 : .0042) * env * Math.sin(2 * Math.PI * (13 + s.k * 2.4) * t);
          const arr = s.pos.array, o = s.orig, u = s.u;
          for (let i = 0, n = u.length; i < n; i++) {
            const off = a * Math.sin(Math.PI * u[i]);
            arr[i*3] = o[i*3] + s.d.x * off; arr[i*3+1] = o[i*3+1] + s.d.y * off; arr[i*3+2] = o[i*3+2] + s.d.z * off;
          }
          s.pos.needsUpdate = true; glow = Math.max(glow, env);
        }
      }
    }
    strMats.forEach(mt => mt.emissiveIntensity = glow * 1.3);
    renderer.render(scene, camera);
  }
  const idx = Math.round(p);
  if (idx !== shown) {
    shown = idx; cur.textContent = '0' + (idx + 1);
    links.forEach((l, k) => l.classList.toggle('on', k === idx));
    sideLinks.forEach((l, k) => l.classList.toggle('on', k === idx));
  }
  requestAnimationFrame(frame);
}
resize(); addEventListener('load', measure); requestAnimationFrame(frame);

/* ---- guitar chord (Karplus-Strong plucked-string synthesis) ---- */
const chords = [
  ['Em', [82.41,123.47,164.81,196,246.94,329.63]],
  ['G',  [98,123.47,146.83,196,246.94,392]],
  ['D',  [146.83,220,293.66,369.99]],
  ['Am', [110,164.81,220,261.63,329.63]],
];
let ctx, out, ci = 0;
const cache = {};
function setup() {
  ctx = new (window.AudioContext || window.webkitAudioContext)();
  const shaper = ctx.createWaveShaper(), c = new Float32Array(256);
  for (let i = 0; i < 256; i++) c[i] = Math.tanh((i / 128 - 1) * 2.2);
  shaper.curve = c;
  const lp = ctx.createBiquadFilter(); lp.type = 'lowpass'; lp.frequency.value = 4200;
  out = ctx.createGain(); out.gain.value = .32;
  shaper.connect(lp); lp.connect(out); out.connect(ctx.destination); out.shaper = shaper;
}
function pluck(freq, when) {
  let buf = cache[freq];
  if (!buf) {
    const sr = ctx.sampleRate, n = Math.round(sr / freq), len = sr * 2.8 | 0;
    buf = ctx.createBuffer(1, len, sr); const d = buf.getChannelData(0);
    for (let i = 0; i < n + 1; i++) d[i] = Math.random() * 2 - 1;
    for (let i = n + 1; i < len; i++) d[i] = .5 * (d[i - n] + d[i - n - 1]) * .9985;
    cache[freq] = buf;
  }
  const src = ctx.createBufferSource(), g = ctx.createGain();
  src.buffer = buf; g.gain.value = .5; src.connect(g); g.connect(out.shaper); src.start(when);
}
function strum() {
  if (!ctx) setup();
  ctx.resume();
  const [name, notes] = chords[ci], t0 = ctx.currentTime + .02;
  notes.forEach((f, k) => pluck(f, t0 + k * .045));
  setTimeout(() => vibT = performance.now(), 20);
  ci = (ci + 1) % chords.length;
  $('#cname').textContent = chords[ci][0];   // the chord you'll hear next
  const lab = $('#play span'); lab.textContent = 'Playing ' + name;
  clearTimeout(strum.t); strum.t = setTimeout(() => lab.textContent = 'Play a chord', 1400);
}
$('#play').addEventListener('click', strum);
// click the guitar itself
const ray = new THREE.Raycaster(), ndc = new THREE.Vector2();
$('#gl').addEventListener('click', e => {
  if (!ready) return;
  ndc.set(e.clientX / innerWidth * 2 - 1, -(e.clientY / innerHeight) * 2 + 1);
  ray.setFromCamera(ndc, camera);
  if (ray.intersectObject(pivot, true).length) strum();
});

/* ---- toggles ---- */
const toggle = (btn, el) => btn.addEventListener('click', () => {
  el.hidden = !el.hidden; btn.setAttribute('aria-expanded', String(!el.hidden));
  setTimeout(measure, 0);
});
toggle($('#achBtn'), $('#achList'));
toggle($('#msgBtn'), $('#msgForm'));
$('#cLink').addEventListener('click', e => { e.preventDefault(); const f = $('#msgForm'); f.hidden = false; $('#msgBtn').setAttribute('aria-expanded','true'); f.querySelector('input[name=from_name]').focus(); });

if (location.hash) setTimeout(() => $(location.hash)?.scrollIntoView(), 50);
const menuToggle = document.getElementById('menuToggle');
const mobileSidebar = document.getElementById('mobileSidebar');
const menuOverlay = document.getElementById('menuOverlay');
const menuClose = document.getElementById('menuClose');

function openMenu() {
    mobileSidebar.classList.add('open');
    menuOverlay.classList.add('show');
    menuToggle.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
}

function closeMenu() {
    mobileSidebar.classList.remove('open');
    menuOverlay.classList.remove('show');
    menuToggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
}

menuToggle.addEventListener('click', openMenu);
menuClose.addEventListener('click', closeMenu);
menuOverlay.addEventListener('click', closeMenu);

mobileSidebar.querySelectorAll('nav a').forEach(link => {
    link.addEventListener('click', closeMenu);
});

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeMenu();
});
</script>
</body>
</html>
