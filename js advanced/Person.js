class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }

    greet() {
        console.log(`Hello, ${this.name}`);
    }

    info() {
        console.log(`${this.name}, ${this.age}`);
    }
}

const ivan = new Person('Ivan', 22);
ivan.greet()
ivan.info()
ivan.name
ivan.age

module.exports = { Person };