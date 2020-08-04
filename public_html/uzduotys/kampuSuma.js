let n1 = 3;
let n2 = 4;

let S1 = (n1 - 2) * 180;
let S2 = (n2 - 2) * 180;

let S3 = S1 + S2;

let atsakymas = document.getElementById('ats1');
atsakymas.innerText = "Pirmojo kampo slaipsniu suma: " + S1 ;
atsakymas.innerHTML += "<br>Antrojo kampo slaipsniu suma: " + S2 ;

document.getElementById('ats2').innerText = S3;