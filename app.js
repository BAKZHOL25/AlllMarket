$( document ).ready(function() {
    $(".link").click (function(){
        var hh = $(this).data("num")

        // $('.modal-img').attr('src', 'images/'+hh+'.jpg' )
        $('.modal_okno').toggleClass("active")
            $(".p1").html("Жүгіру- " + 0.5*hh + " KM")
            $(".p2").html("Приседания- " + 1*hh +" Рет")
            $(".p").html("Отжимания- " + 1*hh +" рет")
            $(".p4").html("Жүгіру- " + 1*hh + " KM")
            $(".p5").html("Приседания- " + 2*hh +" Рет")
            $(".p6").html("Отжимания- " + 2*hh +" рет")
            $(".p7").html("Жүгіру- " + 1.5*hh + " KM")
            $(".p8").html("Приседания- " + 3*hh +" Рет")
            $(".p9").html("Отжимания- " + 3*hh +" рет")
            $(".xday").html(30-hh +" күн қалды")
            $(".yday").html(0+hh +" күн өтті")
    })

    $(".modal_okno").click (function(){
        $('.modal_okno').removeClass('active')
    })
});