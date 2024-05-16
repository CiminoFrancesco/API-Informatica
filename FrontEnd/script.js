const endpoint = 'https://scamanit.alwaysdata.net';
let dati = [];

// Inizializzazione della mappa
var map = L.map('map').setView([45.17881300, 7.93551700], 3.5);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Aggiunta di un marker di esempio
L.marker([45.17881300, 7.93551700]).addTo(map)
    .bindPopup('Esempio Punto di Interesse')
    .openPopup();

// Funzione per ottenere i dati dall'API
function getDati() {
    fetch(endpoint + '/progetto')
        .then(response => response.json())
        .then(data => {
            dati = data;
            StampaDati(dati);
        })
        .catch(error => console.error(error));
}

// Funzione per stampare i dati nella homepage
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

// Funzione per visualizzare i dettagli di un oggetto
function viewDetails(id) {
    window.location.href = `dettaglio.html?id=${id}`;
}

// Chiamata alla funzione per caricare i dati
//getDati();