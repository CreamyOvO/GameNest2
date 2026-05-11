document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.pertanyaan').forEach(item => {
        item.addEventListener('click', () => {

            document.querySelectorAll('.pertanyaan').forEach(el => {
                if (el !== item) el.classList.remove('active');
            });

            item.classList.toggle('active');
        });
    });
});