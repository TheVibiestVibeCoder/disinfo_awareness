/**
 * Hero particle field (three.js).
 * Renders into the [data-hero-canvas] element of the page hero.
 */
import * as THREE from 'three';

const MOBILE_BREAKPOINT = 768;

/** Fog colour follows the --color-bg design token so the particles fade into the page. */
function backgroundColor() {
    const token = getComputedStyle(document.documentElement).getPropertyValue('--color-bg').trim();
    return new THREE.Color(token || '#050505');
}

function createParticles({ count, spread: [x, y, z], size, color, opacity }) {
    const positions = new Float32Array(count * 3);
    for (let i = 0; i < count; i++) {
        positions[i * 3]     = (Math.random() - 0.5) * x;
        positions[i * 3 + 1] = (Math.random() - 0.5) * y;
        positions[i * 3 + 2] = (Math.random() - 0.5) * z;
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

    return new THREE.Points(geometry, new THREE.PointsMaterial({ size, color, transparent: true, opacity }));
}

function initHeroCanvas(container) {
    const isMobile = window.innerWidth < MOBILE_BREAKPOINT;

    const scene = new THREE.Scene();
    scene.fog = new THREE.FogExp2(backgroundColor(), isMobile ? 0.045 : 0.035);

    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 100);
    camera.position.z = 10;

    const renderer = new THREE.WebGLRenderer({ antialias: !isMobile, alpha: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, isMobile ? 1.5 : 2));
    container.appendChild(renderer.domElement);

    const background = createParticles({
        count: isMobile ? 150 : 600,
        spread: [60, 60, 60],
        size: 0.05,
        color: 0x444444,
        opacity: 0.6,
    });
    const foreground = createParticles({
        count: isMobile ? 40 : 100,
        spread: [30, 20, 10],
        size: isMobile ? 0.12 : 0.09,
        color: 0xffffff,
        opacity: 0.8,
    });
    scene.add(background, foreground);

    // Parallax: follows the mouse on desktop, device tilt on mobile.
    const pointer = { x: 0, y: 0 };
    document.addEventListener('mousemove', (event) => {
        pointer.x = event.clientX - window.innerWidth / 2;
        pointer.y = event.clientY - window.innerHeight / 2;
    });
    if (isMobile) {
        window.addEventListener('deviceorientation', (event) => {
            if (event.gamma && event.beta) {
                pointer.x = event.gamma * 10;
                pointer.y = event.beta * 10;
            }
        });
    }

    const clock = new THREE.Clock();
    const render = () => {
        const time = clock.getElapsedTime();
        camera.rotation.x += 0.05 * (-pointer.y * 0.0005 - camera.rotation.x);
        camera.rotation.y += 0.05 * (-pointer.x * 0.0005 - camera.rotation.y);
        background.rotation.y = time * 0.05;
        foreground.rotation.y = time * 0.1;
        renderer.render(scene, camera);
    };

    // Only animate while the hero is on screen — saves CPU and battery.
    new IntersectionObserver(([entry]) => {
        renderer.setAnimationLoop(entry.isIntersecting ? render : null);
    }).observe(container);

    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
}

const container = document.querySelector('[data-hero-canvas]');
if (container) {
    initHeroCanvas(container);
}
