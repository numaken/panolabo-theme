# Changelog

All notable changes to the Panolabo WordPress Theme will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2024-01-16

### Added
- Initial release of Panolabo WordPress Theme
- Complete front-page.php with modern design
- Three business pillars section (受託開発・自社開発・OEM供給)
- SaaS products showcase (AiPostPilot Pro, Chat2Doc)
- FAQ section with accordion UI
- Theme.json for block editor compatibility
- OGP/Twitter Card meta tags support
- Accessibility features (skip link, focus rings)
- Performance optimizations (preload, lazy loading)
- Security enhancements (escaping, nonce support)
- Automated deployment scripts
- GitHub Actions CI/CD pipeline
- Comprehensive documentation

### Security
- All output properly escaped with esc_url(), esc_attr(), esc_html()
- Nonce field support for forms
- Security headers implementation
- Removed WordPress version info from head

### Performance
- UIKit loaded from CDN with integrity checks
- Critical CSS inlined
- Hero image preloading
- Optimized asset loading

### Changed
- Migrated from local UIKit to CDN version
- Improved responsive design for mobile devices
- Enhanced brand color consistency

### Fixed
- PHP compatibility issues
- CSS specificity conflicts
- Mobile navigation improvements

## [0.9.0] - 2024-01-15 (Pre-release)

### Added
- Basic theme structure
- UIKit 3.23.11 integration
- WordPress standard features support
- Custom post types preparation

---

## Roadmap

### [1.1.0] - Planned
- [ ] Advanced block patterns
- [ ] WooCommerce integration
- [ ] Multi-language support (i18n)
- [ ] Enhanced SEO features

### [1.2.0] - Planned
- [ ] Full Site Editing (FSE) support
- [ ] Custom Gutenberg blocks
- [ ] Performance monitoring dashboard
- [ ] A/B testing framework

### [2.0.0] - Future
- [ ] Complete redesign with React
- [ ] Headless WordPress support
- [ ] GraphQL API integration
- [ ] PWA capabilities