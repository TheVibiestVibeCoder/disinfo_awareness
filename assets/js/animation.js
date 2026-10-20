import * as THREE from 'three';

function initParticleCanvas() {
    const container = document.getElementById('canvas-container');
    if (!container) return;

    const isMobile = window.innerWidth < 768;

    const scene = new THREE.Scene();
    scene.fog = new THREE.FogExp2(0x050505, isMobile ? 0.045 : 0.035);

    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 100);
    camera.position.z = 10;

    const renderer = new THREE.WebGLRenderer({ antialias: !isMobile, alpha: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, isMobile ? 1.5 : 2));
    container.appendChild(renderer.domElement);

    const bgCount = isMobile ? 150 : 600;
    const bgGeo = new THREE.BufferGeometry();
    const bgPos = new Float32Array(bgCount * 3);
    for (let i = 0; i < bgCount; i++) {
        bgPos[i * 3]     = (Math.random() - 0.5) * 60;
        bgPos[i * 3 + 1] = (Math.random() - 0.5) * 60;
        bgPos[i * 3 + 2] = (Math.random() - 0.5) * 60;
    }
    bgGeo.setAttribute('position', new THREE.BufferAttribute(bgPos, 3));
    const bgParticles = new THREE.Points(bgGeo, new THREE.PointsMaterial({
        size: 0.05, color: 0x444444, transparent: true, opacity: 0.6
    }));
    scene.add(bgParticles);

    const fgCount = isMobile ? 40 : 100;
    const fgGeo = new THREE.BufferGeometry();
    const fgPos = new Float32Array(fgCount * 3);
    for (let i = 0; i < fgCount; i++) {
        fgPos[i * 3]     = (Math.random() - 0.5) * 30;
        fgPos[i * 3 + 1] = (Math.random() - 0.5) * 20;
        fgPos[i * 3 + 2] = (Math.random() - 0.5) * 10;
    }
    fgGeo.setAttribute('position', new THREE.BufferAttribute(fgPos, 3));
    const fgParticles = new THREE.Points(fgGeo, new THREE.PointsMaterial({
        size: isMobile ? 0.12 : 0.09, color: 0xffffff, transparent: true, opacity: 0.8
    }));
    scene.add(fgParticles);

    let mouseX = 0, mouseY = 0;
    document.addEventListener('mousemove', e => {
        mouseX = e.clientX - window.innerWidth / 2;
        mouseY = e.clientY - window.innerHeight / 2;
    });

    if (isMobile) {
        window.addEventListener('deviceorientation', e => {
            if (e.gamma && e.beta) { mouseX = e.gamma * 10; mouseY = e.beta * 10; }
        });
    }

    const clock = new THREE.Clock();
    (function animate() {
        requestAnimationFrame(animate);
        const time = clock.getElapsedTime();
        camera.rotation.x += 0.05 * (-mouseY * 0.0005 - camera.rotation.x);
        camera.rotation.y += 0.05 * (-mouseX * 0.0005 - camera.rotation.y);
        bgParticles.rotation.y = time * 0.05;
        fgParticles.rotation.y = time * 0.1;
        renderer.render(scene, camera);
    })();

    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
}

initParticleCanvas();
