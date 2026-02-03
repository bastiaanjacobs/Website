import './styles/main.scss';

const html = document.documentElement;
const toggleBtn = document.getElementById('theme-toggle');

toggleBtn.addEventListener('click', () => {
  html.dataset.theme = html.dataset.theme === 'dark' ? 'light' : 'dark';
});
