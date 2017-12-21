function pageConnexion() {
    $.ajax
            (
                    {
                        type: 'get',
                        url: "../memory/PHP/connexion.php",
                        data: "",
                        success: function (data)
                        {
                            $('#content').append(data);
                        },
                        error: function ()
                        {

                        }
                    }
            );
}

function afficherJeux() {
    $.ajax
            (
                    {
                        type: 'get',
                        url: "../memory/PHP/afficherJeux.php",
                        data: "",
                        success: function (data)
                        {
                            $('#content').empty();
                            $('#content').append(data);
                        },
                        error: function ()
                        {

                        }
                    }
            );
}
async function retournEtCheck(id) {
    //Bloque les cliques sur la page afin d'empêcher de cliquer sur plus de 2 images en même temps 
    $(document.body).css('pointer-events', 'none');
    var checkImage = $('input[name="image"]:checked').map(function ()
    {
        return $(this).val();
    }).get()
    $("#" + id + "cache").show();
    $("#" + id).hide();
    if (checkImage.length > 1) {
        if (checkImage[0] != checkImage[1]) {
            //Attend 2 sec avant de cacher les images
            await resolveAfter2Seconds();
            $("#" + id + "cache").hide();
            $("#" + id).show();
            $('input[name="image"]').each(function () {
                this.checked = false;
            });
            oldIDImage = localStorage.getItem("OldIDImage");
            $("#" + oldIDImage + "cache").hide();
            $("#" + oldIDImage).show();
            $("#nbrTour").val(parseInt($("#nbrTour").val()) + 1);
        } else {
            $('input[name="image"]:checked').each(function () {
                $(this).remove();
            });
            $("#nbrTour").val(parseInt($("#nbrTour").val()) + 1);
        }
    } else {
        localStorage.setItem("OldIDImage", id);
    }
    

    //Test si il reste des checkbox sur la page car si == non le jeux est fini
    var checkExiste = $('input[name="image"]').map(function ()
    {
        return $(this).val();
    }).get()
    if (checkExiste.length == 0) {
        var nbrTour = $("#nbrTour").val();
        $.ajax
                (
                        {
                            type: 'get',
                            url: "../memory/PHP/enregistreJeu.php",
                            data: {nbrTour: nbrTour},
                            success: function (data)
                            {
                                if (data == "success") {
                                    afficherJeux();
                                } else {
                                    $('#content').append(data);
                                }
                            },
                            error: function ()
                            {

                            }
                        }
                );
    }
$(document.body).css('pointer-events', '');
}

function resolveAfter2Seconds(x) {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(x);
        }, 1500);
    });
}

function testPseudo() {
    var pseudo = $("#lg_username").val();
    if (pseudo != "") {
        $.ajax
                (
                        {
                            type: 'get',
                            url: "../memory/PHP/testPseudo.php",
                            data: {pseudo: pseudo},
                            success: function (data)
                            {

                                if (data == "success") {
                                    afficherJeux();
                                } else {
                                    $('#content').append(data);
                                }

                            },
                            error: function ()
                            {

                            }
                        }
                );
    }
}