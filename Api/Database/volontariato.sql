drop database volontariato;
CREATE DATABASE if NOT EXISTS volontariato;
USE volontariato;

CREATE TABLE if NOT EXISTS utente (
ID INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255) NOT NULL,
cognome VARCHAR(255) NOT NULL,
eta INT NOT NULL,
codiceFiscale VARCHAR(16) NOT NULL,
cellulare CHAR(10),
email VARCHAR(255) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL);

CREATE TABLE if NOT EXISTS progetto(
ID INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255) NOT NULL,
descrizione TEXT,
data_inizio DATE NOT NULL,
data_fine DATE,
latitudine DECIMAL(10, 6),
longitudine DECIMAL(10, 6), 
eta_minima INT);

CREATE TABLE if NOT EXISTS organizzazione(
ID INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255) NOT NULL,
sito VARCHAR(255));

CREATE TABLE if NOT EXISTS utente_progetto(
ID INT PRIMARY KEY AUTO_INCREMENT,
ID_utente INT NOT NULL,
ID_progetto INT NOT NULL,
FOREIGN KEY (ID_utente) REFERENCES utente(ID),
FOREIGN KEY (ID_progetto) REFERENCES progetto(ID));

CREATE TABLE if NOT EXISTS progetto_organizzazione(
ID INT PRIMARY KEY AUTO_INCREMENT,
ID_progetto INT NOT NULL,
ID_organizzazione INT NOT NULL,
FOREIGN KEY (ID_progetto) REFERENCES progetto(ID),
FOREIGN KEY (ID_organizzazione) REFERENCES organizzazione(ID));





-- Insert data into Utente table
INSERT INTO utente (nome, cognome, eta, codiceFiscale, cellulare, email, password)
VALUES ('Mario', 'Rossi', 30, 'RSSMRA87A01H501Q', '3331234567', 'mario.rossi@example.com', 'password123');

INSERT INTO utente (nome, cognome, eta, codiceFiscale, cellulare, email, password)
VALUES ('Maria', 'Bianchi', 25, 'BNCMRA99D02A123Z', '3487654321', 'maria.bianchi@example.com', 'password456');

INSERT INTO utente (nome, cognome, eta, codiceFiscale, cellulare, email, password)
VALUES ('Giovanni', 'Verdi', 40, 'VRDGNI78B03I456T', '3398765432', 'giovanni.verdi@example.com', 'password789');

-- Insert data into Progetto table
INSERT INTO progetto (nome, descrizione, data_inizio, data_fine, latitudine, longitudine, eta_minima)
VALUES ('Raccolta Alimentare', 'Giornata di raccolta cibo per i meno fortunati', '2024-05-10', '2024-05-10', 44.509038, 11.620984, 18);

INSERT INTO progetto (nome, descrizione, data_inizio, data_fine, latitudine, longitudine, eta_minima)
VALUES ('Sentieristica', 'Manutenzione sentieri del Parco Nazionale', '2024-06-01', '2024-06-30', 44.493332, 11.658691, 15);

INSERT INTO progetto (nome, descrizione, data_inizio, data_fine, latitudine, longitudine, eta_minima)
VALUES ('Giornata Ecologica', 'Pulizia del Parco Fluviale', '2024-04-20', '2024-04-20', 44.477218, 11.639016, 10);

-- Insert data into Organizzazione table
INSERT INTO organizzazione (nome, sito)
VALUES ('Associazione Volontariato Rossi', 'https://www.associazioneross volontariato.it');

INSERT INTO organizzazione (nome, sito)
VALUES ('Pro Natura', 'https://www.pronatura.org');

-- Insert data into utente_progetto table
INSERT INTO utente_progetto (ID_utente, ID_progetto)
VALUES (1, 1);

INSERT INTO utente_progetto (ID_utente, ID_progetto)
VALUES (2, 2);

INSERT INTO utente_progetto (ID_utente, ID_progetto)
VALUES (3, 3);

-- Insert data into progetto_organizzazione table
INSERT INTO progetto_organizzazione (ID_progetto, ID_organizzazione)
VALUES (1, 1);

INSERT INTO progetto_organizzazione (ID_progetto, ID_organizzazione)
VALUES (2, 2);

INSERT INTO progetto_organizzazione (ID_progetto, ID_organizzazione)
VALUES (3, 1);