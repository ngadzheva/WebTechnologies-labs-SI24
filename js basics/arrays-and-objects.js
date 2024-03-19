const arr = Array(5, 6, 8);
console.log(arr)
const numbers = [5, 8, 9];
console.log(numbers[8])
// numbers[5] = 6;
console.log(numbers[4])

numbers.push(7)
console.log(numbers)
numbers.unshift(4)
console.log(numbers)
numbers.pop()
console.log(numbers)
numbers.shift()
console.log(numbers)

numbers.splice(1, 0, 3, 7)
console.log(numbers)
numbers.splice(2, 1, 6)
console.log(numbers)
numbers.splice(2, 2)
console.log(numbers)

for(var key in numbers) {
    console.log(numbers[key])
}

for(var item of numbers) {
    console.log(item)
}

numbers.forEach(function (value, index) {
    console.log(`${index}: ${value}`)
})

const doubled = numbers.map(function (value) {
    return 2 * value;
})
console.log(doubled)

const result = numbers.filter(function(_, index) {
    return index % 2 === 0;
})
console.log(result)

const sum = numbers.reduce(function (accumulator, value) {
    return accumulator + value;
}, 0)
console.log(sum)

const person = {
    firstName: 'Nevena',
    lastName: 'Gadzheva',
    age: 27,
    greeting: function () {
        console.log('Hello!')
    },
    5: 'asdf',
    number: 27,
    age: 26,
    prop: {
        a: 5,
        b: 6
    }
};


person['firstName']
person.greeting()

const lastNameKey = 'lastName';
console.log(person[lastNameKey])
console.log(person.address)

person.asdf = 'hdgjs'
console.log(person)
person[5] = 5
console.log(person)

const freezedPerson = Object.freeze(person);
freezedPerson.age = 27
freezedPerson.prop.a = 10
freezedPerson.prop = {}

console.log(freezedPerson.prop)

const copiedPerson = Object.assign(person)
console.log(copiedPerson)

for(let key in person) {
    console.log(person[key])
}

Object.keys(person).forEach(function(value) {
    console.log(person[value])
})

Object.values(person).forEach(function(value) {
    console.log(value)
})

Object.entries(person).forEach(function(value) {
    console.log(`${value[0]}: ${value[1]}`)
})