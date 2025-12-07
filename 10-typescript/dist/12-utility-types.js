"use strict";
const bookOriginal = {
    title: "La sombra del viento",
    author: "Carlos Ruiz Zafón",
    year: 2001,
    genre: "Misterio"
};
const bookPartial = { year: 2020 }; 
const bookPicked = { title: "1984", author: "George Orwell" }; 

const userSettings = Object.freeze({
    theme: "dark",
    notifications: true
});

let settingsMessage;
try {

    userSettings.theme = "light";
    settingsMessage = "Ajuste cambiado (no esperado).";
} catch (e) {
    settingsMessage = "Ajuste inmutable: no se pudo cambiar.";
}

// Display in browser
const output = document.getElementById('output12');
if (output) {
    output.innerHTML = `
        <li><strong>Rediseñado - Original (Libro):</strong> ${bookOriginal.title} por ${bookOriginal.author} (${bookOriginal.year}) - género: ${bookOriginal.genre}</li>
        <li><strong>Rediseñado - Parcial:</strong> ${bookOriginal.title} → año actualizado a ${bookPartial.year}</li>
        <li><strong>Rediseñado - Seleccionado:</strong> ${bookPicked.title} por ${bookPicked.author}</li>
        <li><strong>Simple - Ajustes:</strong> tema: ${userSettings.theme}, notificaciones: ${userSettings.notifications} — ${settingsMessage}</li>
    `;
}
