$("button").click(function(){
    let email = $('[name="email"]').val();
    let msg = $('[name="msg"]').val();

    $.post("/kursiustiduomenis.php",
        {
            vard_pav: $('[name="name"]').val(),
            elpastas: email,
            zinute: msg
        },
        function(data){
            $('#rez').html(data);
        });
});