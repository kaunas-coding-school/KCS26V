console.log('labas pasauli');

let metai = 2000;
let menuo = 11;
let diena = 12;
let suma = metai % 10 + menuo % 10 + diena % 10;

console.log('Paskutiniu skaiciu suma: ', suma);


let a = 2;
let b = 4;
let c = 1;
let d = 3;

if (
    a > b ||
    d < c ||
    b < c ||
    d < a

) {
    console.log('Neatitinka salygos');
} else {
    let x, y;

    if (c <= b && c > a) {
        x = c;
    }

    if (d <= b && d > a) {
        y = d;
    }

    if (a >= c && a < d) {
        x = a;
    }

    if (b >= c && b < d) {
        y = b;
    }

    console.log('Susikirtimo taskai: x=' + x + ' y=' + y);
}


