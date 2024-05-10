
let endpoint = 'https://scamanit.alwaysdata.net';
let dati = [];

let ContenitoreDati = document.getElementById("Informazioni");

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


function StampaDati(dati) {
    let ContenitoreDati = document.getElementById("Informazioni");
    //popolare ContenitoreDati con le informazioni sui punti
}


/*
        // Generazione della scheda
        function getDetail( id ) {
            fetch( endpoint + '/person/' + id)
                .then(response => response.json())
                .then(data => {
                    // console.log(data)
                    // console.log(persons[data[0].firstparent_id].name)
                    let detail = document.getElementById('detail');
                    let person = document.getElementById('person');
                     if(data[0].firstparent_id > 0 && data[0].secondparent_id > 0 ) { 
                        person.innerHTML = 'Parenti di ' + data[0].firstname + ' ' + data[0].lastname
                        var pp = persons[data[0].firstparent_id].name + ' ' + persons[data[0].firstparent_id].surname
                        var sp = persons[data[0].secondparent_id].name + ' ' + persons[data[0].secondparent_id].surname
                        detail.innerHTML = 'Primo parente: ' + pp + ' - secondo parente: ' + sp
                    } else {
                        person.innerHTML = 'Nessun parente'
                        detail.innerHTML = ''
                    }
                })
        }*/