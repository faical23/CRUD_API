const TableContentHeader = () => {
    document.querySelector('.table_users').innerHTML = /*html*/
        `
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Client ID</th>
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
                <td>${data.email}</td>
                <td>${data.number}</td>
                <td>${data.id}</td>
                <td>
                    <button class="read" value='${data.id}' onlick="read_data()">read</button>
                    <button>Update</button>
                    <button>Delete</button>
                </td>
            </tr>
        `
}
const UserData = data => {
    document.querySelector('.user_data').innerHTML = /*html*/
        `
        <h1>${data.first_name}</h1>
        <h1>${data.last_name}</h1>
        `

}