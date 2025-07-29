document.addEventListener("DOMContentLoaded",()=>{
    renderDoashboard();
})

function renderDoashboard(){

    const List_API = [
        {api:"http://127.0.0.1:8000/api/TotalOrdersPendingConfirmation",documentid:"status-1"},
        {api:"http://127.0.0.1:8000/api/TotalConfirmedOrders",documentid:"status-2"},
        {api:"http://127.0.0.1:8000/api/TotalOrdersInTransit",documentid:"status-3"},
        {api:"http://127.0.0.1:8000/api/TotalCancelledOrders",documentid:"status-4"},
    ]

    List_API.forEach((e)=>{
        reponseView(e.api,e.documentid)
    })
}

function reponseView(urlApi,documentid){
    
    fetch(urlApi)
    .then( respon =>{
        if(!respon.ok){
            return new Error("lỗi")
        }
        return respon.json();
    }).then(data =>{
        const renderid = document.getElementById(documentid);
        if(renderid){
            renderid.textContent = data.data;
        }else{
            renderid.textContent = data || 0;
        }
        return data
    }).catch(error=>{
         alert("hiển thị lỗi" + error);
        renderid.textContent = error;
    })
}