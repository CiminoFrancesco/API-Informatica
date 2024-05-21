//Prendo l'ID dall'URL
function getID() {
    const URL = new URLSearchParams(window.location.search);
    return URL.get('id');
}

let data;
let id_uri = getID();


//Fetch per trovare il punto aperto
if (id_uri) {
    fetch(`https://scamanit.alwaysdata.net/progetto/${id_uri}`) 
        .then(response => response.json())
        .then(data => {
            var oggetto = data;
            StampaOggetto(oggetto);
        });
} else {
    console.error('ID non trovato');
}

//Stampa dati del punto
function StampaOggetto(oggetto) {
    var detailsDiv = document.getElementById('dettagli');
    detailsDiv.innerHTML = `
        <h2>${oggetto.nome}</h2>
        <p>Descrizione: ${oggetto.descrizione}</p>
        <p>Data Inizio: ${oggetto.data_inizio}</p>
        <p>Data Fine: ${oggetto.data_fine}</p>
        <p>Età Minima: ${oggetto.eta_minima}</p>
    `;

    //Mappa
    var map = L.map('map').setView([44.804039630325946, 10.343830610945576], 3);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.marker([oggetto.latitudine, oggetto.longitudine]).addTo(map)
        .bindPopup(`<b>${oggetto.nome}</b><br>${oggetto.descrizione}`)
        .openPopup();

}
