var data = {}
let param = JSON.stringify(data)

function update_Rows() {
    let all_row = document.querySelectorAll('.users_row')
    all_row.forEach(Element => {
        Element.innerHTML = "";
    })
}

//// get all users 
function fetch_users(param) {
    fetch('http://localhost/CRUD_API/Back_end/api/Api.php', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: param
    }).then((response) => {
        return response.json()
    }).then((res) => {
        console.log(res);
        console.log(res.data.users.length);

        update_Rows(); /// to delete all rows after fetching data
        TableContentHeader();
        for (let i = 0; i < res.data.users.length; i++) {
            TableContentBody(res.data.users[i]);
        }
        read_user(); /// to get all btn after get users data
    })
}
fetch_users(param);

//// search users 
let search = document.querySelector('.search')
search.addEventListener('keyup', () => {
    update_Rows();
    let Search_Value = search.value
    var data = { Fname: Search_Value }
    fetch_users(JSON.stringify(data))
})

//// fetch data user if click read btn
function fetch_methode(param) {
    fetch('http://localhost/CRUD_API/Back_end/api/Api.php', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: param
    }).then((response) => {
        return response.json()
    }).then((res) => {
        let user = res.data.users[0]
            // console.log(res.data.users[0].first_name);
            // console.log(user.last_name);
        UserData(user);
    })
}
//// read button

const read_user = () => {
    let read = document.querySelectorAll('.read')
    console.log(read)
    read.forEach(Element => {
        Element.addEventListener('click', () => {
            var data = { id: Element.value }
            console.log(Element.value)
            fetch_methode(JSON.stringify(data));
        })
    })
}