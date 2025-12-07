// function with typed parameters & return type
function calculateAttack(baseDamage: number, multiplier: number): number {
    return baseDamage * multiplier;
}

const attack = calculateAttack(15, 2);

// Display in browser
const output03 = document.getElementById('output03');
if (output03) {
    output03.innerHTML = `
        <li><strong>Attack Base Damage:</strong> 15 </li>
        <li><strong>Attack Multiplier:</strong> 2X</li>
        <li><strong>Attack :</strong> ${attack}</li>
        `;
}