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
        fetch(`/search/appointments?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    // Show no results message and clear table
                    tableBody.innerHTML = '<tr><td colspan="5">No results found</td></tr>';
                    searchResults.innerHTML = '';
                    searchResults.classList.add('hidden');
                } else {
                    // Update the existing table with search results
                    let tableContent = '';

                    data.forEach(appointment => {
                        const date = appointment.date ? new Date(appointment.date).toISOString().split('T')[0] : '-';
                        const time = appointment.time || '-';
                        const patientName = appointment.patient ? appointment.patient.name : 'N/A';
                        const dentistName = appointment.dentist ? appointment.dentist.name : 'N/A';
                        const appointmentType = appointment.appointment_type ? appointment.appointment_type.name : 'N/A';

                        tableContent += `<tr>
                            <td>${patientName}</td>
                            <td>${appointmentType}</td>
                            <td>${date}</td>
                            <td>${time}</td>
                            <td>${dentistName}</td>
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
