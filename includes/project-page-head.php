<?php
/**
 * Shared head for project detail pages (schulprojekte, ngobusiness, gemeinde, diaspora).
 * Set $page_title, $page_desc, $page_canonical, $og_type, $og_title, $og_image_alt,
 * and $schema_json before requiring this file.
 */

$extra_head = <<<'CSS'
<style>
    h1 { font-size: clamp(3.5rem, 14vw, 12rem); hyphens: auto; }
    h2 { font-size: clamp(2.5rem, 6vw, 5rem); line-height: 0.9; }
    h3 { font-size: clamp(2.5rem, 6vw, 4rem); color: var(--highlight); margin-bottom: 1rem; line-height: 0.9; }
    .hero { height: 85dvh; min-height: 500px; }
    .hero-subtitle { font-size: clamp(1rem, 2vw, 1.5rem); margin-bottom: 2.5rem; }
    #canvas-container { opacity: 0.5; }

    .grid-wrapper { display: grid; grid-template-columns: 1fr; width: 100%; }
    @media (min-width: 900px) { .content-split { grid-template-columns: 1fr 1fr; min-height: 80vh; } }

    .card-item {
        position: relative; border-bottom: 1px solid var(--grid-line); padding: 2rem;
        display: flex; flex-direction: column; justify-content: flex-end;
        overflow: hidden; height: 60dvh; min-height: 450px;
    }
    @media (min-width: 900px) {
        .card-item { height: 100%; border-right: 1px solid var(--grid-line); border-bottom: 0; padding: 4rem 3rem; }
        .card-item:last-child { border-right: none; }
    }
    @media (min-width: 900px) {
        .swap-desktop .card-item:first-child { order: 2; border-right: none; }
        .swap-desktop .card-item:last-child  { order: 1; border-right: 1px solid var(--grid-line); }
    }

    .card-bg {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-size: cover; background-position: center; z-index: 1;
        transition: transform 0.8s ease, filter 0.8s ease;
        filter: grayscale(100%) brightness(0.3);
    }
    .card-item:hover .card-bg, .card-item.is-in-view .card-bg { transform: scale(1.05); filter: grayscale(0%) brightness(0.5); }

    .card-content { position: relative; z-index: 2; pointer-events: none; text-shadow: 0 2px 20px rgba(0,0,0,0.8); }
    .card-item p { font-size: 1.1rem; opacity: 0.95; margin-bottom: 1.5rem; margin-left: 0; max-width: 50ch; color: #d0d0d0; }

    .text-card {
        background: linear-gradient(to bottom, #0a0a0a, #050505);
        justify-content: center; height: auto; min-height: 40dvh;
    }
    @media (min-width: 900px) { .text-card { height: 100%; } }

    .cta-section {
        padding: 6rem 1.5rem; border-top: 1px solid var(--grid-line);
        text-align: center; background: linear-gradient(to top, #0a0a0a, var(--bg-color));
    }
    .cta-section h2 { margin-bottom: 1rem; }
    .cta-section p { margin: 0 auto 2rem auto; }
</style>
CSS;

require __DIR__ . '/head.php';
