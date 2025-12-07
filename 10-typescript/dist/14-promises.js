"use strict";

function loadUser() {
    return new Promise((resolve, reject) => {
        const success = Math.random() > 0.5;
        setTimeout(() => {
            success ? resolve("Usuario cargado correctamente") : reject("Error al cargar usuario");
        }, 1000);
    });
}

function getNumber() {
    return new Promise((resolve) => {
        setTimeout(() => resolve(Math.floor(Math.random() * 10)), 400);
    });
}

const output = document.getElementById('output14');
if (output) {
    loadUser()
        .then(msg => {
            const li = document.createElement('li');
            li.textContent = msg;
            output.appendChild(li);
        })
        .catch(err => {
            const li = document.createElement('li');
            li.style.color = 'red';
            li.textContent = err;
            output.appendChild(li);
        });

    getNumber()
        .then(num => {
            const li = document.createElement('li');
            li.textContent = `Número simple: ${num}`;
            output.appendChild(li);
        });
}
