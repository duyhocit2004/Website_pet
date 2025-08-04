

const autoLoad =document.addEventListener('DOMContentLoaded',()=>{
    RenderChart();
    Foreach();
})

function Foreach(){
    const list = [
        {api : "CountActiveUsers",documentId :"status-5"},
        {api : "CountOrderInOneDay",documentId :"status-6"}
    ];
    list.forEach(e=>{
        renderDoashboard(e.api,e.documentId);
    })
}

function renderDoashboard(api,documentId){
    const API = `http://127.0.0.1:8000/api/${api}`;

    fetch(API).then(res=>{
        if(!res){
            return new Error("lỗi")
        }

        return res.json();
    }).then(respon =>{
        console.log(respon);
        if(respon){
            document.getElementById(documentId).textContent = respon;
        }else{
            document.getElementById(documentId).textContent = respon || 0;
        }
    }).catch(error =>{
        console.log("lỗi" + error);
        return
    })
}


async function RenderChart(){
    const Url = 'http://127.0.0.1:8000/api/getRealTimeRevenue';

    let chart;
    try {
        const data = await fetch(Url);
        const res = await data.json();



        const label = res.map(item => item.time);
        const total = res.map(item =>item.total);
        console.log(label,total)
        const ctx = document.getElementById('myChart');

        if(chart){
            chart.destroy();
        }

        chart = new Chart(ctx,{
            type : "line",
            data : {
                labels :label ,
                datasets : [{
                label: 'Tổng doanh thu ',
                data :total ,
                borderColor: 'rgb(75, 192, 192)',
            }],
            },
            options : {

                scales :{
                    y:{
                        beginAtZero:true
                    }

                }


            }

        })

   console.log(chart);
    } catch (error) {
        console.log(error);
    }


}
setInterval(autoLoad, 60000)
