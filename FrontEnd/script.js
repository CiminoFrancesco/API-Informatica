const endpoint = 'https://scamanit.alwaysdata.net';
let dati = [];

// Mappa
var map = L.map('map').setView([45.17881300, 7.93551700], 3.5);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

L.marker([45.17881300, 7.93551700]).addTo(map)
    .bindPopup('Esempio Punto di Interesse')
    .openPopup();

//Prendo i Dati
function getDati() {
    fetch(endpoint + '/progetto')
        .then(response => response.json())
        .then(data => {
            dati = data;
            StampaDati(dati);
        })
        .catch(error => console.error(error));
}

//Stampo i Dati
function StampaDati(dati) {
    let ContenitoreDati = document.getElementById("Informazioni");
    dati.forEach(oggetto => {
        let DIV_oggetto = document.createElement('div');
        DIV_oggetto.className = 'oggetto'; //css
        DIV_oggetto.innerHTML = `
            <h3>${oggetto.nome}</h3>
            <button onclick="viewDetails(${oggetto.id})">Visualizza Dettagli</button>
        `;
        ContenitoreDati.appendChild(DIV_oggetto);

        // Aggiunta dei marker sulla mappa
        L.marker([oggetto.latitudine, oggetto.longitudine])
            .addTo(map)
            .bindPopup(`<b>${oggetto.nome}</b>`)
            .openPopup();
    });
}

//Assegno l'id
function viewDetails(id) {
    window.location.href = `dettaglio.html?id=${id}`;
}