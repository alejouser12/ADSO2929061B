"use strict";
function safeDivide(a, b) {
    if (b === 0)
        throw new Error("No se puede dividir por cero");
    return a / b;
}

function parseNumber(text) {
    const n = Number(text);
    if (Number.isNaN(n))
        throw new Error(`'${text}' no es un número válido`);
    return n;
}

const messages = [];

try {
    const result1 = safeDivide(10, 2);
    messages.push(`División: 10 / 2 = ${result1}`);
} catch (error) {
    messages.push(`Error división: ${error instanceof Error ? error.message : String(error)}`);
}

try {
    const result2 = parseNumber("42a"); 
    messages.push(`Parseo: "42a" => ${result2}`);
} catch (error) {
    messages.push(`Error parseo: ${error instanceof Error ? error.message : String(error)}`);
}

// Display in browser
const output = document.getElementById('output15');
if (output) {
    output.innerHTML = messages.map(m => `<li>${m}</li>`).join("");
}
