const menuBar = document.querySelector('.content nav .bi.bi-list');
const sidebar = document.querySelector('.sidebar');
menuBar.addEventListener('click', () => {
    sidebar.classList.toggle('close');
});
window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sidebar.classList.add('close');
    } else {
        sidebar.classList.remove('close');
    }
});
