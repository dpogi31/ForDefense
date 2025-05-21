document.addEventListener('DOMContentLoaded', () => {
  // ======== MODAL HELPERS ========
  function showModal(modal) {
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }

  function hideModal(modal) {
    modal.style.display = 'none';
    document.body.style.overflow = '';
  }

  function closeOnOutsideClick(modal) {
    window.addEventListener('click', (e) => {
      if (e.target === modal) {
        hideModal(modal);
      }
    });
  }

  // ======== AUTH MODAL ========
  const authModal = document.getElementById('authModal');
  const openAuthBtn = document.getElementById('loginBtn');
  const closeAuthBtn = document.querySelector('.close-btn');
  const loginForm = document.getElementById('loginForm');
  const signupForm = document.getElementById('signupForm');
  const loginToggle = document.getElementById('loginToggle');
  const signupToggle = document.getElementById('signupToggle');
  const loginErrorDiv = document.getElementById('loginError');

  if (openAuthBtn && authModal) {
    openAuthBtn.addEventListener('click', (e) => {
      e.preventDefault();
      showModal(authModal);
    });
  }

  if (closeAuthBtn && authModal) {
    closeAuthBtn.addEventListener('click', () => hideModal(authModal));
  }

  if (authModal) closeOnOutsideClick(authModal);

  if (loginToggle && signupToggle && loginForm && signupForm) {
    loginToggle.addEventListener('click', () => {
      loginForm.classList.remove('hidden');
      signupForm.classList.add('hidden');
      loginToggle.classList.add('active');
      signupToggle.classList.remove('active');
    });

    signupToggle.addEventListener('click', () => {
      signupForm.classList.remove('hidden');
      loginForm.classList.add('hidden');
      signupToggle.classList.add('active');
      loginToggle.classList.remove('active');
    });
  }

  if (loginForm && loginErrorDiv) {
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      loginErrorDiv.textContent = '';

      const formData = new FormData(loginForm);

      fetch('login_process.php', {
        method: 'POST',
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            window.location.href = 'CSHomePage.php';
          } else {
            loginErrorDiv.textContent = data.message || 'Login failed.';
          }
        })
        .catch(() => {
          loginErrorDiv.textContent = 'Error connecting to server.';
        });
    });
  }

  // ======== SEARCH FUNCTION ========
  const searchInput = document.getElementById('productSearch');
  const searchButton = document.querySelector('.search-container button');

  function searchProducts() {
    const query = searchInput.value.toLowerCase();
    const products = document.querySelectorAll('.product-card');

    products.forEach((card) => {
      const title = card.querySelector('h2').textContent.toLowerCase();
      card.classList.toggle('hidden', !title.includes(query));
    });
  }

  if (searchInput) searchInput.addEventListener('input', searchProducts);
  if (searchButton) searchButton.addEventListener('click', searchProducts);

  // ======== LEARN MORE MODAL ========
  const learnMoreBtn = document.getElementById('learnMoreBtn');
  const learnMoreModal = document.getElementById('learnMoreModal');
  const closeLearnMoreBtn = document.getElementById('closeModal');

  if (learnMoreBtn && learnMoreModal && closeLearnMoreBtn) {
    learnMoreBtn.addEventListener('click', (e) => {
      e.preventDefault();
      showModal(learnMoreModal);
    });

    closeLearnMoreBtn.addEventListener('click', () => hideModal(learnMoreModal));
    closeOnOutsideClick(learnMoreModal);
  }

  // ======== LOGOUT MODAL ========
  const logoutBtn = document.getElementById('logoutBtn');
  const logoutModal = document.getElementById('logoutModal');
  const cancelLogoutBtn = document.getElementById('cancelLogout');

  if (logoutBtn && logoutModal && cancelLogoutBtn) {
    logoutBtn.addEventListener('click', (e) => {
      e.preventDefault();
      showModal(logoutModal);
    });

    cancelLogoutBtn.addEventListener('click', () => hideModal(logoutModal));

    closeOnOutsideClick(logoutModal);
  }

  // ======== CONTACT MODAL ========
  const contactBtn = document.getElementById('contactBtn');
  const contactModal = document.getElementById('contactModal');
  const closeContactModal = document.getElementById('closeContactModal');
  const contactForm = document.getElementById('contactForm');

  if (contactBtn && contactModal && closeContactModal && contactForm) {
    contactBtn.addEventListener('click', (e) => {
      e.preventDefault();
      showModal(contactModal);
    });

    closeContactModal.addEventListener('click', () => hideModal(contactModal));
    closeOnOutsideClick(contactModal);

    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert("Thank you for reaching out. We'll get back to you soon!");
      hideModal(contactModal);
      contactForm.reset();
    });
  }

  // ======== SUPPORT MODAL ========
  const supportBtn = document.getElementById('supportBtn');
  const supportModal = document.getElementById('supportModal');
  const closeSupportBtn = document.getElementById('closeSupportModal');
  const supportForm = document.getElementById('supportForm');

  if (supportBtn && supportModal && closeSupportBtn && supportForm) {
    supportBtn.addEventListener('click', (e) => {
      e.preventDefault();
      showModal(supportModal);
    });

    closeSupportBtn.addEventListener('click', () => hideModal(supportModal));
    closeOnOutsideClick(supportModal);

    supportForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert("Thank you for contacting support. We'll respond shortly.");
      hideModal(supportModal);
      supportForm.reset();
    });
  }
});
