name = 'Super Global';

var ivan = { name: 'Ivan', age: 22 };
var pesho = { name: 'Pesho', age: 21 };
var gosho = { name: 'Gosho', age: 23 };

function greet(a, b, c) {
    console.log(`Hello, ${this.name}`);
}

//greet();

ivan.greeting = greet;

// console.log(ivan);
// ivan.greeting()
// ivan.greeting.call(pesho, 5, 6, 7);
// ivan.greeting.apply(pesho, [5, 6, 7]);

// greet.apply(gosho)

const sayHi = ivan.greeting.bind(ivan);
sayHi();
