$(document).ready(function () {
    $("#test").click(function () {
        console.log($('.chips-placeholder').material_chip('data'));
    })
    $("button[name='action']").click(function () {// click sur submit
        console.log("click");
        $.post( // envoi de donnee a  url
            "Controleur/Controleur_CreationEvent.php", //url
            {
                data : $('.chips-placeholder').material_chip('data')
            }, function (data) {
                for(i=0;i<data.length;i++){
                    console.log(data[i]);
                }
            },"text"
        );
    });
})