"use strict";

function delay(ms, value) {
    return new Promise(resolve => setTimeout(() => resolve(value), ms));
}

async function fetchRedesigned() {
    return await delay(1500, {
        msg: "Datos cargados con éxito",
        time: new Date().toLocaleTimeString()
    });
}

async function fetchSimple() {
    const num = await delay(500, Math.floor(Math.random() * 100) + 1);
    return `Número aleatorio = ${num}`;
}

async function displayMessage() {
    const output = document.getElementById('output13');
    if (!output) return;

    const data = await fetchRedesigned();
    const li1 = document.createElement('li');
    li1.textContent = `${data.msg} (hora: ${data.time})`;
    output.appendChild(li1);

    const simple = await fetchSimple();
    const li2 = document.createElement('li');
    li2.textContent = simple;
    output.appendChild(li2);
}

displayMessage();
