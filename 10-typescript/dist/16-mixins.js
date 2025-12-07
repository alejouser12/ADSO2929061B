"use strict";
class CanEat {
    eat() { return "Eating..."; }
}
class CanSleep {
    sleep() { return "Sleeping zzz..."; }
}
class Pet {
    constructor(name = "Buddy") {
        this.name = name;
    }
}
function applyMixins(derivedCtor, baseCtors) {
    baseCtors.forEach(baseCtor => {
        Object.getOwnPropertyNames(baseCtor.prototype).forEach(name => {
            if (name !== "constructor") {
                derivedCtor.prototype[name] = baseCtor.prototype[name];
            }
        });
    });
}
applyMixins(Pet, [CanEat, CanSleep]);

const pet = new Pet("Gato");
// Display in browser
const output = document.getElementById('output16');
if (output) {
    output.innerHTML = `
        <li><strong>Pet:</strong> ${pet.name}</li>
        <li>${pet.eat()}</li>
        <li>${pet.sleep()}</li>
    `;
}
