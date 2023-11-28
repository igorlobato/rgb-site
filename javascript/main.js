$(function (){

    var $usuario = $('#usuarios');
    $.ajax({
        type:'GET',
        url: 'http://localhost:3000/usuarios',
        sucess: function(usuario) {
            $.each(usuario, function(i, usuario) {
                $orders.append('<li>nome: ' + usuario.nome + ', email: '+ usuario.email + '</li>');
        });
        }
    });
});