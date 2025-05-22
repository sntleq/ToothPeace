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
        fetch(`/search/waitlist?query=${encodeURIComponent(query)}`)
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

                    data.forEach(waitlist => {
                        const date = waitlist.date ? new Date(waitlist.date).toISOString().split('T')[0] : '-';
                        const timeStart = waitlist.time_start || '-';
                        const timeEnd = waitlist.time_end || '-';
                        const patientName = waitlist.patient ? waitlist.patient.name : 'N/A';
                        const dentistName = waitlist.dentist ? waitlist.dentist.name : 'N/A';
                        const appointmentType = waitlist.appointment_type ? waitlist.appointment_type.name : 'N/A';

                        tableContent += `<tr>
                            <td>${patientName}</td>
                            <td>${dentistName}</td>
                            <td>${appointmentType}</td>
                            <td>${date}</td>
                            <td>${timeStart}</td>
                            <td>${timeEnd}</td>
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
