TableContentHeader();

let fname = document.querySelector('Fname')
let Lname = document.querySelector('Lname')
let Email = document.querySelector('Email')
let PhoneNumber = document.querySelector('PhoneNumber')
var data = {

}
let param = JSON.stringify(data)

function update_Rows() {
    let all_row = document.querySelectorAll('.users_row')
    all_row.forEach(Element => {
        Element.innerHTML = "";
    })
}


function fetch_functions(param) {
    fetch('http://localhost/CRUD_API/api/Api_All_users.php', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: param
    }).then((response) => {
        return response.json()
    }).then((res) => {
        // console.log(res)
        update_Rows();
        TableContentHeader();
        for (let i = 0; i < res.data.users.length; i++) {
            TableContentBody(res.data.users[i]);
        }
        read_user(res);
    })

}
fetch_functions(param);




//// read button
function read_user(res) {
    let read = document.querySelectorAll('.read')
    read.forEach(Element => {
        Element.addEventListener('click', () => {
            var data = { id: Element.value }
            fetch_functions(JSON.stringify(data))
            console.log(res.data.users)
        })
    })
}


//// search
let search = document.querySelector('.search')
search.addEventListener('keyup', () => {
    update_Rows();
    let Search_Value = search.value
    var data = { Fname: Search_Value }
    fetch_functions(JSON.stringify(data))
})