require('./bootstrap');


import Vue from 'vue';
import App from './components/App.vue';


const app = new Vue({
    el: '#app',
    components: {
        App
    }
});



//zo srandy aktualny cas na stranke, nema ziadne vyuzitie
function aktualnyCas() {
    let date = new Date(),
        hour = date.getHours(),
        min = date.getMinutes(),
        sec = date.getSeconds();
    hour = updateTime(hour);
    min = updateTime(min);
    sec = updateTime(sec);
    document.getElementById('clock').innerText = hour + " : " + min + " : " + sec;
    var t = setTimeout( () => {
        aktualnyCas()
    }, 1000);
}

function updateTime(cislo) {
    if(cislo < 10) {
        return "0" + cislo;
    } else {
        return cislo;
    }
}

aktualnyCas();

