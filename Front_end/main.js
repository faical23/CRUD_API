form();
TableContentHeader();
const url = "http://localhost/CRUD_API/Back_end/api/Api.php";
let data = {};
let params = JSON.stringify(data);
let methode = "GET";

let prop = {
    method:methode,
    headers: {
        'Content-type': 'application/json'
    }
}



function fetch_data(url, method,params){
    fetch(url ,prop).then((response) => {return response.json()})
    .then(
        (res) => {
            for(let i = 0 ; i < res.data.length ; i++){
                TableContentBody(res.data[i]);
                console.log(res.data[i])
            }
        })
}
    
fetch_data(url,methode,params)






































/////////////// V1

// // var data = {}
// // let param = JSON.stringify(data)
// //// htttp methodes
// let GET = "GET";
// let post = "POST";
// let PUT = "PUT";
// let DELETE = "DELETE";

// /// my api URL
// let Url= "http://localhost/CRUD_API/Back_end/api/Api.php/";

// function update_Rows() {
//     let all_row = document.querySelectorAll('.users_row')
//     all_row.forEach(Element => {
//         Element.innerHTML = "";
//     })
// }


// //// fetch all users and showed
// function fetch_users() {
//     fetch(Url,  {method: 'GET'})
//         .then((response) => {return response.json()})
//         .then((res) => {
//             console.log(res);
//             console.log(res.data.users.length);

//             update_Rows(); /// to delete all rows after fetching data
//             TableContentHeader();
//             for (let i = 0; i < res.data.users.length; i++) {
//                 TableContentBody(res.data.users[i]);
//             }
//             read_user(); /// to get all btn after get users data
//             Delete_user();
//             Update_user();
//          })
// }
// fetch_users(JSON.stringify({}));

// //// search users 
// document.querySelector('.search').addEventListener('keyup', () => {
//     let search = document.querySelector('.search');
//     update_Rows();
//     let Search_Value = search.value
//     var data = { Fname: Search_Value }
//     fetch_users(JSON.stringify(data))
// })


// //// make fetch data user if click read btn
// const  Read = (param) => {
//     fetch(`${Url+GET}`, {
//         method: 'POST',
//         headers: {
//             'Content-type': 'application/json'
//         },
//         body: param
//     }).then((response) => {
//         return response.json()
//     }).then((res) => {
//         let user = res.data.users[0]
//         UserData(user);
//     })
// }
// //// read button
// const read_user = () => {
//         let read = document.querySelectorAll('.read')
//         read.forEach(Element => {
//             Element.addEventListener('click', () => {
//                 var data = { ID_client: Element.value }
//                 console.log(Element.value)
//                 Read(JSON.stringify(data));
  
//             })
//         })
//     }
    
    
//   // make fetch with methode POST / PUT / DELETE
//   const Methode = (param,action) =>{
//     fetch(`${Url+action}`, {
//         method: action,
//         headers: {
//             'Content-type': 'application/json'
//         },
//         body: param
//     }).then((response) => {
//         return response.json()
//     }).then((res) => {
//         console.log(res)
//     })
//   }

    
    
// //// add user
// document.querySelector('.AddBtnInput').addEventListener('click' , (e) =>{
//     let Fname = document.querySelector('.FnameInput').value
//     let Lname = document.querySelector('.LnameInput').value
//     let Email = document.querySelector('.EmailInput').value
//     let PhoneNumber = document.querySelector('.PhoneNumberInput').value
//     var postData = { Fname: Fname ,
//                 Lname: Lname,
//                 Email: Email,
//                 PhoneNumber: PhoneNumber,
//                 ID_client : "22"

//              }
//     //  Methode(JSON.stringify(data),"POST");
//      fetch_users(JSON.stringify({}));

//      e.preventDefault()
// })

// //// delete user
// const Delete_user = () => {
//     let Delete = document.querySelectorAll('.Delete')
//     Delete.forEach(Element => {
//         Element.addEventListener('click', () => {
//             var data = { ID_client: Element.value }
//             console.log(Element.value)
//             Methode(JSON.stringify(data),"DELETE");
//         })
//     })
// }

// const Update_user =() =>{
//     let rows = document.querySelectorAll('.users_row')
//     rows.forEach(Element =>{
//         let Update = Element.querySelector('.Update');
//         Update.addEventListener('click',() =>{
//             document.querySelector('.FnameInput').value = Element.querySelector('.Fname').innerHTML 
//             document.querySelector('.LnameInput').value = Element.querySelector('.Lname').innerHTML
//             document.querySelector('.EmailInput').value = Element.querySelector('.Email').innerHTML
//             document.querySelector('.PhoneNumberInput').value = Element.querySelector('.PhoneNumber').innerHTML
//             document.querySelector('.PhoneNumberInput').value = Element.querySelector('.PhoneNumber').innerHTML
//             document.querySelector('.AddBtnInput').style="display:none"
//             document.querySelector('.UpdateBtnInput').style="display:block"

//             document.querySelector('.UpdateBtnInput').addEventListener('click' , () =>{
//                 var data = { 
//                 Fname: Element.querySelector('.Fname').innerHTML ,
//                 Lname: Element.querySelector('.Lname').innerHTML ,
//                 Email: Element.querySelector('.Email').innerHTML ,
//                 PhoneNumber: Element.querySelector('.PhoneNumber').innerHTML ,
//                 ID_client: Element.querySelector('.ID_client').innerHTML 
//                 }
//                 console.log(data.ID_client)
//                 Methode(JSON.stringify(data),"PUT");            
//             })
//         })
//     })

// }

