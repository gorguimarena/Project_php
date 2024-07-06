document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');

    searchInput.addEventListener('input', function() {
        if (searchInput.value.length > 2) { // Commence la recherche après 3 caractères
            searchForm.submit();
        }
    });
});