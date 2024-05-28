const person = {
    name: 'Nevena',
    age: 27,
}

const { name: firstName, age, email = 'a@a' } = person;
console.log(email);
console.log(firstName);

const numbers = [1, 8, 6, 8];

const [ first, , , , fifth = 9 ] = numbers;
console.log(first)
console.log(fifth)

let a = 5;
let b = 9;

[ a, b ] = [b, a];
console.log(a)
console.log(b)

// Spread operator
const extendedNumbers = [7, 8, ...numbers, 4, 6];
console.log(extendedNumbers)
const copyNumbers = [...numbers]

const student = {
    name: 'Maria',
    ...person,
    fn: 66666,
};

console.log(student)

// Rest operator
function double(...numbers) {
    console.log(numbers.map(number => number * 2))
}

double(1)
double(8, 9)
double(9,5,6,2,3)

const [ firstNumber, second, ...rest ] = numbers
console.log(firstNumber)
console.log(second)
console.log(rest)