<script>
  // Theme Toggle
  const themeToggle = document.getElementById('themeToggle');
  const html = document.documentElement;

  themeToggle?.addEventListener('change', () => {
    html.setAttribute('data-theme', themeToggle.checked ? 'dark' : 'light');
    localStorage.setItem('theme', themeToggle.checked ? 'dark' : 'light');
  });

  // Load saved theme
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme) {
    html.setAttribute('data-theme', savedTheme);
    if (themeToggle) themeToggle.checked = savedTheme === 'dark';
  }

  // Fade-in animation on scroll
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
</script>