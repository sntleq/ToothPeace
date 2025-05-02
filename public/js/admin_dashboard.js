const appointments = [];

document.addEventListener('DOMContentLoaded', function () {
    const tbody = document.getElementById('appointments-body');
    appointments.forEach(a => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${a.id}</td>
        <td>${a.name}</td>
        <td>${a.type}</td>
        <td>${a.date}</td>
        <td>${a.duration}</td>
        <td>${a.dentist}</td>
      `;
      tbody.appendChild(tr);
    });
  });