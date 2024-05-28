function Person(name, age) {
    this.name = name;
    this.age = age;

    this.greet = () => {
        console.log(`Hello, ${this.name}`);
    }
}

const ivan = new Person('Ivan', 22);
ivan.name
ivan.age
// ivan.greet();

const sayHiIvan = ivan.greet;
sayHiIvan();

Person.prototype.info = function() {
    console.log(`${this.name}, ${this.age}`);
}

// ivan.info();

const gosho = new Person('Gosho', 23);
// gosho.info()
gosho.greet.call(ivan)

function Student(name, age, fn) {
    Person.call(this, name, age);

    this.fn = fn;

    let _mark;

    this.getMark = function() {
        return _mark;
    }

    this.setMark = function(mark) {
        _mark = mark;
    }
}

Student.prototype = Object.create(Person.prototype);

const maria = new Student('Maria', 23, 666666);
maria.name
maria.age
// maria.info()
// maria.greet()

Student.prototype.studentInfo = function() {
    this.info();
    console.log(`FN: ${this.fn}`)
}

// maria.studentInfo()
// gosho.studentInfo()