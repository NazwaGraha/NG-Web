(() => {
  const menuButton = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.primary-nav');
  const dropdown = document.querySelector('.nav-dropdown');
  const dropdownButton = document.querySelector('.dropdown-toggle');
  const backToTop = document.querySelector('.back-to-top');

  const closeDropdown = () => {
    if (dropdown && dropdownButton) {
      dropdown.classList.remove('open');
      dropdownButton.setAttribute('aria-expanded', 'false');
    }
  };

  // Mobile Menu Toggle
  if (menuButton && nav) {
    menuButton.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
      menuButton.setAttribute('aria-expanded', String(!isOpen));
      nav.classList.toggle('open', !isOpen);
      menuButton.setAttribute('aria-label', isOpen ? 'Buka menu navigasi' : 'Tutup menu navigasi');
    });
  }

  // Handle Dropdown Toggle (Layanan Kami)
  if (dropdown && dropdownButton) {
    dropdownButton.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      const isOpen = dropdown.classList.contains('open');
      if (isOpen) {
        closeDropdown();
      } else {
        dropdown.classList.add('open');
        dropdownButton.setAttribute('aria-expanded', 'true');
      }
    });
  }

  // Handle all link clicks inside navigation:
  // When ANY link is clicked (e.g. Home, About Us, News, Contact, or items inside dropdown):
  // Close dropdown immediately, close mobile menu, and update active state!
  if (nav) {
    nav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        closeDropdown();
        nav.classList.remove('open');
        if (menuButton) {
          menuButton.setAttribute('aria-expanded', 'false');
          menuButton.setAttribute('aria-label', 'Buka menu navigasi');
        }

        // Update active class
        nav.querySelectorAll('.nav-link').forEach((l) => l.classList.remove('active'));
        if (link.classList.contains('nav-link')) {
          link.classList.add('active');
        }
      });
    });
  }

  // Close dropdown when clicking anywhere outside of it
  document.addEventListener('click', (e) => {
    if (dropdown && !dropdown.contains(e.target)) {
      closeDropdown();
    }
  });

  // Close dropdown when Escape key is pressed
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeDropdown();
    }
  });

  // Back to top & Scroll handling
  const updateScrollControls = () => {
    if (backToTop) backToTop.classList.toggle('visible', window.scrollY > 500);
  };
  window.addEventListener('scroll', updateScrollControls, { passive: true });
  updateScrollControls();
  if (backToTop) {
    backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  }

  // Auto copyright year
  const year = document.getElementById('year');
  if (year) year.textContent = new Date().getFullYear();
})();
