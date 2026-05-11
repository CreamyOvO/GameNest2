const searchInput = document.querySelector("input[name='search']");
const genreSelect = document.querySelector("select[name='genre']");
const pegiSelect = document.querySelector("select[name='pegi']");
const sortSelect = document.querySelector("select[name='sort']");
const container = document.querySelector(".topgame-list");

let currentFilter = {
    search: "",
    genre: "",
    pegi: "",
    sort: "name",
    page: 1
};

let debounceTimer;

function fetchGames() {

    const params = new URLSearchParams(currentFilter);

    fetch("../Includes/fetch.php?" + params.toString())
        .then(res => res.text())
        .then(data => {

            if (!data || data.trim() === "") {
                container.innerHTML = `
                    <p style="color:white; text-align:center; width:100%;">
                        Game tidak ditemukan
                    </p>
                `;
                return;
            }

            container.classList.add("fade-out");

            setTimeout(() => {
                container.innerHTML = data;

                container.classList.remove("fade-out");
                container.classList.add("fade-in");

                setTimeout(() => {
                    container.classList.remove("fade-in");
                }, 250);

            }, 200);
        })
        .catch(err => {
            console.error(err);
        });
}

searchInput.addEventListener("input", () => {
    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(() => {
        currentFilter.search = searchInput.value;
        currentFilter.page = 1;
        fetchGames();
    }, 300);
});

genreSelect.addEventListener("change", function () {
    currentFilter.genre = this.value;
    currentFilter.page = 1;
    fetchGames();
});

pegiSelect.addEventListener("change", function () {
    currentFilter.pegi = this.value;
    currentFilter.page = 1;
    fetchGames();
});

if (sortSelect) {
    sortSelect.addEventListener("change", function () {
        currentFilter.sort = this.value;
        currentFilter.page = 1;
        fetchGames();
    });
}

function changePage(p) {
    currentFilter.page = p;
    fetchGames();
}

document.addEventListener("DOMContentLoaded", fetchGames);