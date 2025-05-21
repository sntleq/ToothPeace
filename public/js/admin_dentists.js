// Add Dentist button event listener
try {
    const addDentistBtn = document.getElementById("addDentistBtn");
    if (addDentistBtn) {
        addDentistBtn.addEventListener("click", () => {
            window.location.href = "admin/dentists/create";
        });
    }
} catch (error) {
    console.error("Error setting up Add Dentist button:", error);
}

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const searchResults = document.getElementById('searchResults');
    const tableBody = document.querySelector('.table-wrapper tbody');
    const originalTableContent = tableBody.innerHTML;

    // Function to perform search
    function performSearch() {
        const query = searchInput.value.trim();

        if (query === '') {
            // Restore original table content
            tableBody.innerHTML = originalTableContent;
            searchResults.innerHTML = '';
            searchResults.classList.add('hidden');
            return;
        }

        // Make AJAX request to search endpoint
        fetch(`/search/dentists?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    // Show no results message and clear table
                    tableBody.innerHTML = '<tr><td colspan="6">No results found</td></tr>';
                    searchResults.innerHTML = '';
                    searchResults.classList.add('hidden');
                } else {
                    // Update the existing table with search results
                    let tableContent = '';

                    data.forEach(dentist => {
                        const dob = dentist.dob ? new Date(dentist.dob).toISOString().split('T')[0] : '-';
                        tableContent += `<tr>
                            <td>${dentist.last_name}</td>
                            <td>${dentist.first_name}</td>
                            <td>${dentist.email}</td>
                            <td>${dob}</td>
                            <td>${dentist.age || '-'}</td>
                            <td>${dentist.created_at ? new Date(dentist.created_at).toISOString().replace('T', ' ').substr(0, 19) : '-'}</td>
                        </tr>`;
                    });

                    tableBody.innerHTML = tableContent;
                    searchResults.innerHTML = '';
                    searchResults.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Error performing search:', error);
                searchResults.innerHTML = '<p>An error occurred while searching</p>';
                searchResults.classList.remove('hidden');
            });
    }

    // Event listeners for search
    if (searchBtn) {
        searchBtn.addEventListener('click', performSearch);
    }

    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    }
});
