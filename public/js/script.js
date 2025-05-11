const recordsPerPage = 5; // Limite de registros por página
let currentPage = 1;

function displayUsers(page) {
    const startIndex = (page - 1) * recordsPerPage;
    const endIndex = page * recordsPerPage;
    const paginatedUsers = users.slice(startIndex, endIndex);
    const tbody = document.querySelector("#userTable tbody");
    tbody.innerHTML = ''; // Limpa a tabela antes de adicionar novos registros

    // Preenche a tabela com os usuários da página atual
    paginatedUsers.forEach(user => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </td>
        `;
        tbody.appendChild(row);
    });

    // Atualiza os botões de navegação
    document.getElementById('prevBtn').disabled = page === 1;
    document.getElementById('nextBtn').disabled = page * recordsPerPage >= users.length;
}

function changePage(direction) {
    if (direction === 'next') {
        if (currentPage * recordsPerPage < users.length) {
            currentPage++;
        }
    } else if (direction === 'prev') {
        if (currentPage > 1) {
            currentPage--;
        }
    }
    displayUsers(currentPage); // Atualiza a tabela ao mudar de página
}

// Inicializa a exibição da tabela na primeira página
displayUsers(currentPage);