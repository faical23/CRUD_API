const TableContentHeader = () => {
    document.querySelector('.table_users').innerHTML = /*html*/
        `
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>PRIX</th>
                <th>Client ID</th>
                <th>Actions</th>
            </tr>
        </table>
    `
}
const TableContentBody = data => {
    document.querySelector('.table_users table').innerHTML += /*html*/
        `   <tr class="users_row">
                <td class="Fname">${data.FirstName}</td>
                <td  class="Lname">${data.LastName}</td>
                <td  class="Email">${data.TotalPrix}</td>
                <td  class="PhoneNumber">${data.IdClient}</td>
                <td>
                    <button class="read" value='${data.IdClient}'>Read</button>
                    <button class="Update" value='${data.IdClient}' >Update</button>
                    <button class="Delete" value='${data.IdClient}' >Delete</button>
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
const form = () =>{
    document.querySelector('.add_user').innerHTML += /*html */
    `
       <input class='FnameInput' name="Fname" placeholder="First Name">
        <input class='LnameInput' name="Lname" placeholder="Last Name">
        <input class='TotalPrix' name="TotalPrix" placeholder="TotalPrix">
        <input class='IdClient' name="IdClient" placeholder="IdClient">
        <button class="AddBtnInput" >Add</button>
        <button class="UpdateBtnInput" style="display:none" >Update</button>

    `
}
