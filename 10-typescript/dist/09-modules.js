"use strict";
// 09 - Modules: ejemplo conceptual de un módulo simple
class Student {
    constructor(name, grade) {
        this.name = name;
        this.grade = grade;
    }
    improve(by = 5) {
        this.grade = Math.min(100, this.grade + by);
    }
}
const student = new Student("Carlos", 88);
student.improve(7);
// Display in browser
const output = document.getElementById('output09');
if (output) {
    output.innerHTML = `
        <ul>
            <li><strong>Nombre:</strong> ${student.name}</li>
            <li><strong>Nota:</strong> ${student.grade}</li>
        </ul>
    `;
}
