"use strict";
var Garden;
(function (Garden) {
    class Flower {
        constructor(name, color) {
            this.name = name;
            this.color = color;
        }
    }
    Garden.Flower = Flower;
    function describe(flower) {
        return `${flower.name} is ${flower.color}.`;
    }
    Garden.describe = describe;
})(Garden || (Garden = {}));

const rose = new Garden.Flower("Rose", "red");
const info = Garden.describe(rose);

// Display in browser
const output = document.getElementById('output10');
if (output) {
    output.innerHTML = `<li>${info}</li>`;
}
