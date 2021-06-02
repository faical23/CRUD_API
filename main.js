TableContentHeader();

let fname = document.querySelector('Fname')
let Lname = document.querySelector('Lname')
let Email = document.querySelector('Email')
let PhoneNumber = document.querySelector('PhoneNumber')
var data = {}
let param = JSON.stringify(data)

function update_Rows() {
    let all_row = document.querySelectorAll('.users_row')
    all_row.forEach(Element => {
        Element.innerHTML = "";
    })
}


function fetch_functions(param) {
    fetch('http://localhost/Create_API_PHP/api/Api_All_users.php', {
        method: 'POST',
        body: param,
        headers: {
            'Content-type': 'application/json'
        }
    }).then((response) => {
        return response.json()
    }).then((res) => {
        console.log(res)
        update_Rows();
        TableContentHeader();
        for (let i = 0; i < res.data.users.length; i++) {
            TableContentBody(res.data.users[i]);
        }
    })
}
fetch_functions(param);





//// search
let search = document.querySelector('.search')
search.addEventListener('keyup', () => {
    update_Rows();
    let Search_Value = search.value
    var data = { Fname: Search_Value }
    fetch_functions(JSON.stringify(data))
})



















//// saerch funtion
// const Search_users = user_name => {
//     var data = { Fname: user_name }
//     fetch_functions(JSON.stringify(data))

// }