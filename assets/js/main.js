// Initialize AOS
AOS.init({
    duration: 1000,
    once: true
});

// Initialize Typed.js
new Typed('.typed-text', {
    strings: [
        'Nature\'s Healing Power',
        'Global Premium Ingredients',
        'Wellness Through Aromatherapy'
    ],
    typeSpeed: 50,
    backSpeed: 30,
    loop: true
});

// 3D Sphere Animation
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ alpha: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('hero-sphere').appendChild(renderer.domElement);

// Create sphere
const geometry = new THREE.SphereGeometry(5, 32, 32);
const material = new THREE.MeshPhongMaterial({
    color: 0x588157,
    transparent: true,
    opacity: 0.8
});
const sphere = new THREE.Mesh(geometry, material);
scene.add(sphere);

// Add lights
const light = new THREE.PointLight(0xffffff, 1, 100);
light.position.set(10, 10, 10);
scene.add(light);

camera.position.z = 15;

// Animation loop
function animate() {
    requestAnimationFrame(animate);
    sphere.rotation.x += 0.01;
    sphere.rotation.y += 0.01;
    renderer.render(scene, camera);
}
animate();

// Cart functionality
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', async (e) => {
        const productId = e.target.dataset.productId;
        try {
            const response = await fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ productId })
            });
            if (response.ok) {
                alert('Product added to cart!');
            }
        } catch (error) {
            console.error('Error adding to cart:', error);
        }
    });
});
