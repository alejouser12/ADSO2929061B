"use strict";
const needle = {
    name: 'Silken Needle',
    damage: 15,
    range: 3
};
// Display in browser
const output02 = document.getElementById('output02');
if (output02) {
    output02.innerHTML = `
        <li><strong>Name:</strong> ${needle.name}</li>
        <li><strong>Damage:</strong> ${needle.damage}</li>
        <li><strong>Range:</strong> ${needle.range}</li>
    `;
}
