"use strict";
function isEvenNumber(value) {
    return typeof value === "number" && value % 2 === 0;
}

function isShortString(value) {
    return typeof value === "string" && value.length <= 3;
}

const value1 = 10;      
const value2 = "cat";   

const item1 = isEvenNumber(value1)
    ? `Valor: ${value1} es un número par.`
    : `Valor: ${value1} no es un número par.`;

const item2 = isShortString(value2)
    ? `Valor: "${value2}" es una cadena corta.`
    : `Valor: "${value2}" no es una cadena corta.`;

// Display in browser
const output = document.getElementById('output11');
if (output) {
    output.innerHTML = `<li>${item1}</li><li>${item2}</li>`;
}
