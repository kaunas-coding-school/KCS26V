//
// let busena = true;
//
// function sleptiTurini(){
//     if(busena){
//         $('main').hide();
// //      document.getElementsByTagName('main').style.display = 'block';
//     } else {
//         $('main').show();
//     }
//
//     busena = !busena;
// }


$('header').click(
    function(){
        $('main').toggle()
    }
);
