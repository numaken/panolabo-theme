<?php
/* Template Name: About EN */
get_header(); 
?>

<main class="uk-section uk-section-default">
  <div class="uk-container">
    <h1 class="uk-heading-line"><span>About Panolabo LLC</span></h1>
    <p>Panolabo LLC is a Tokyo-based creative tech company offering VR panorama production, smartphone app development, and WordPress-based web solutions.</p>

    <ul class="uk-list uk-list-divider">
      <li><strong>Company Name:</strong> Panolabo LLC</li>
      <li><strong>CEO:</strong> Ken Numata</li>
      <li><strong>Location:</strong> Takadanobaba, Shinjuku-ku, Tokyo, Japan</li>
      <li><strong>Services:</strong> VR content production / OEM mobile apps / Web production</li>
      <li><strong>Website:</strong> https://panolabollc.com</li>
    </ul>

    <!-- GEO構造化データ（英語） -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Panolabo LLC",
      "url": "https://panolabollc.com/about-en/",
      "inLanguage": "en",
      "description": "VR production, app development, and web solutions for local businesses in Japan.",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "JP",
        "addressLocality": "Ichinomiya",
        "addressRegion": "Aichi",
        "postalCode": "494-0003"
      },
    }
    </script>
  </div>
</main>

<?php get_footer(); ?>
