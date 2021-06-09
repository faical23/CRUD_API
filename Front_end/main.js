form();
TableContentHeader();
const url = "http://localhost/CRUD_API/Back_end/api/Api.php";


function fetch_data(url,search=""){
    fetch(`${url+search}` ,{
        method:"GET",
        headers: {
            'Content-type': 'application/json'
        }
    }).then((response) => {return response.json()})
    .then(
        (res) => {
            Update__Rows()
            for(let i = 0 ; i < res.data.length ; i++){
                TableContentBody(res.data[i]);
            }
            Update__user();
            Delete__user();
            Add__user();
            Search__user();
            change__btn_Add_Update("block","none")
        })
}
function Api__Methode(url , methode,params){
    fetch(url ,{
        method:methode,
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify(params)
    }).then((response) => {return response.json()})
    .then(
        (res) => {
            console.log(res)
            fetch_data(url)
    })
}

fetch_data(url)
///// change button betwee  update and add
const change__btn_Add_Update = (style__1 , style__2) =>{
    document.querySelector('.AddBtnInput').style=`display:${style__1}`;
    document.querySelector('.UpdateBtnInput').style=`display:${style__2}`;
}
//// update rows if we use some methodes like delete or add ....
const  Update__Rows = () => {
    let all_row = document.querySelectorAll('.users_row')
    all_row.forEach(Element => {
        Element.remove();
    })
}
/// seearch users
const Search__user = () =>{
    document.querySelector('.search').addEventListener('keyup', ()=>{
        let search = document.querySelector('.search').value
        search = `?Fname=`+search;
        fetch_data(url+search)
    })
}
/// add users
const Add__user = () =>{
    document.querySelector('.AddBtnInput').addEventListener('click', ()=>{
        let F__name = document.querySelector('.FnameInput').value
        let L__name = document.querySelector('.LnameInput').value
        let Total__Prix = document.querySelector('.TotalPrix').value
        let Id__Client = document.querySelector('.IdClient').value
        var Data = { Fname: F__name ,
                    Lname: L__name,
                    total_Prix : Total__Prix,
                    ID_client : Id__Client
        }
        Api__Methode(url , "POST",Data)

    })
}
// delete users
const Delete__user = () => {
    let Delete = document.querySelectorAll('.Delete')
    Delete.forEach(Element => {
        Element.addEventListener('click', () => {
            console.log(Element.value)
            var data = { ID_client: Element.value }
            Api__Methode(url , "DELETE",data)
        })
    })
}
//// update user
const Update__user = () =>{
    let rows = document.querySelectorAll('.users_row')
    rows.forEach(Element =>{
        Element.querySelector('.Update').addEventListener('click', () =>{
            change__btn_Add_Update("none","block")
            document.querySelector('.FnameInput').value = Element.querySelector('.Fname').innerHTML
            document.querySelector('.LnameInput').value = Element.querySelector('.Lname').innerHTML
            document.querySelector('.TotalPrix').value = Element.querySelector('.Total_Prix').innerHTML
            document.querySelector('.IdClient').value = Element.querySelector('.Id_Client').innerHTML

            document.querySelector('.UpdateBtnInput').addEventListener('click' , () =>{
                var data = { 
                    Fname:document.querySelector('.FnameInput').value ,
                    Lname:document.querySelector('.LnameInput').value ,
                    total_Prix:document.querySelector('.TotalPrix').value ,
                    ID_client:document.querySelector('.IdClient').value 
                }
                console.log(data.ID_client)
                Api__Methode(url , "PUT",data)

            })
        })
    })
}


















