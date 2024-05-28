const { Person } = require('./Person');

class Student extends Person {
    #mark;

    constructor(name, age, fn) {
        super(name, age);

        this.fn = fn;
    }

    get mark() {
        return this.#mark;
    }

    set mark(mark) {
        this.#mark = mark;
    }

    studentInfo() {
        super.info();
        console.log(`FN: ${this.fn}`);
    }
}


const pesho = new Student('Pesho', 22, 666666);
pesho.name
pesho.greet()
pesho.studentInfo()
pesho.fn
pesho.mark = 5
console.log(pesho.mark)