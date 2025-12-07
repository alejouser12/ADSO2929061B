// Generics inventory for any type
class inventory<T> {
    private items: T[] = [];

    addItem(item: T): void {
        this.items.push(item);
    }

    getItems(): T[] {
        return this.items;
    }
}

const charmInventory = new inventory<string>();
charmInventory.addItem('Mothwing Cloak');
charmInventory.addItem('Crystal Heart');

// Display in browser
const output05 = document.getElementById('output05');
if (output05) {
    output05.innerHTML = `
        <li><strong>Charms collected:</strong></li>
        <ul>${charmInventory.getItems().map(c => `<li>${c}</li>`).join('')}</ul>
    `;
}
