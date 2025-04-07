<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Scent – Premium Aromatherapy Products</title>
    
    <!-- Meta tags for SEO -->
    <meta name="description" content="Discover premium aromatherapy products at The Scent. Essential oils and natural soaps crafted with globally sourced ingredients for your wellbeing.">
    <meta name="keywords" content="aromatherapy, essential oils, natural soap, wellness, health">
    
    <!-- Open Graph tags -->
    <meta property="og:title" content="The Scent – Premium Aromatherapy">
    <meta property="og:description" content="Premium aromatherapy products for your wellbeing">
    <meta property="og:image" content="https://raw.githubusercontent.com/nordeim/The-Scent/refs/heads/main/images/scent6.jpg">
    
    <!-- Fonts and CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,700;1,400&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <img src="/assets/images/logo.png" alt="The Scent Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#story">Our Story</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="/cart" class="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
            </ul>
        </nav>
        <div class="mobile-menu-toggle">
            <span></span><span></span><span></span>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div id="hero-sphere"></div>
        <div class="hero-content" data-aos="fade-up">
            <h1>Welcome to The Scent</h1>
            <div class="typed-text"></div>
            <a href="#products" class="cta-button">Explore Our Collection</a>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="products" class="products">
        <h2 data-aos="fade-up">Our Premium Collection</h2>
        <div class="product-grid">
            <?php
            $featured_products = [
                [
                    'image' => 'https://raw.githubusercontent.com/nordeim/The-Scent/refs/heads/main/images/scent2.jpg',
                    'name' => 'Lavender Dreams Essential Oil',
                    'price' => 39.99,
                    'description' => 'Calming lavender essential oil for relaxation and better sleep',
                    'category' => 'essential-oil'
                ],
                [
                    'image' => 'https://raw.githubusercontent.com/nordeim/The-Scent/refs/heads/main/images/scent4.jpg',
                    'name' => 'Citrus Burst Essential Oil',
                    'price' => 42.99,
                    'description' => 'Energizing citrus blend for mental clarity',
                    'category' => 'essential-oil'
                ],
                [
                    'image' => 'https://raw.githubusercontent.com/nordeim/The-Scent/refs/heads/main/images/soap2.jpg',
                    'name' => 'Lavender Calm Soap',
                    'price' => 12.99,
                    'description' => 'Natural soap enriched with lavender essential oil',
                    'category' => 'soap'
                ],
                [
                    'image' => 'https://raw.githubusercontent.com/nordeim/The-Scent/refs/heads/main/images/soap4.jpg',
                    'name' => 'Rose Garden Soap',
                    'price' => 14.99,
                    'description' => 'Luxury rose-infused natural soap',
                    'category' => 'soap'
                ]
            ];

            foreach ($featured_products as $product): ?>
                <div class="product-card" data-aos="fade-up">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="product-info">
                        <h3><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="price">$<?= number_format($product['price'], 2) ?></p>
                        <button class="add-to-cart" data-product-id="<?= $product['id'] ?? '' ?>">
                            Add to Cart
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Story Section -->
    <section id="story" class="story">
        <div class="story-content" data-aos="fade-right">
            <h2>Our Journey</h2>
            <p>At The Scent, we believe in the power of nature's aromatherapy to promote mental and physical wellbeing. Our premium products are crafted using the finest ingredients sourced from around the world, created with unique formulations that bring harmony to your daily life.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-content">
            <div class="social-links">
                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="newsletter">
                <h3>Stay Connected</h3>
                <form id="newsletter-form">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
