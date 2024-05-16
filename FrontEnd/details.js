function getID() {
    const URL = new URLSearchURL(window.location.search);
    return URL.get('id');
}

let id_uri = getID();

if (id_uri) {
    fetch(`https://scamanit.alwaysdata.net/progetto/${id_uri}`) 
        .then(response => response.json())
        .then(data => {
            dati = data;
            StampaDati(dati);
        });
} else {
    console.error('ID non trovato');
}

function StampaDati(dati) {
    var detailsDiv = document.getElementById('dettagli');
    detailsDiv.innerHTML = `
        <h2>${dati.nome}</h2>
        <p>Descrizione: ${dati.descrizione}</p>
        <p>Data Inizio: ${dati.data_inizio}</p>
        <p>Data Fine: ${dati.data_fine}</p>
        <p>Età Minima: ${dati.eta_minima}</p>
    `;

    var map = L.map('map').setView([data.latitudine, data.longitudine], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.marker([data.latitudine, data.longitudine]).addTo(map)
        .bindPopup(`<b>${data.nome}</b><br>${data.descrizione}`)
        .openPopup();

}
