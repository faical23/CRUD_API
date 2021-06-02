const TableContentHeader = () => {
    document.querySelector('.table_users').innerHTML = /*html*/
        `
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </table>
    `
}
const TableContentBody = data => {
    document.querySelector('.table_users table').innerHTML += /*html*/
        `   <tr class="users_row">
                <td>${data.first_name}</td>
                <td>${data.last_name}</td>
                <td>${data.number}</td>
                <td>${data.email}</td>
                <td><button class="read" onclick = 'read(6)'>Read</button><button>Update</button><button>Delete</button></td>
            </tr>
        `
}