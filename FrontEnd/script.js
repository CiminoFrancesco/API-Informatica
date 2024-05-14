const endpoint = 'https://scamanit.alwaysdata.net';
let dati = [];

var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([51.5, -0.09]).addTo(map)
    .bindPopup('Esempio Punto di Interesse')
    .openPopup();

// Generazione e popolazione della Lista con i Dati
function getDati() {
    fetch(endpoint + '/progetto')
        .then(response => response.json())
        .then(data => {
            dati = data;
            StampaDati(dati);
        })
        .catch(error => console.error(error));
}


function StampaDatiCompleto(dati) {
    let ContenitoreDati = document.getElementById("Informazioni");
    //popolare ContenitoreDati con le informazioni sui punti
}
