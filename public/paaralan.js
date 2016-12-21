var board = 1;
var id;
$('.lessons div').on('click', function () {
    document.getElementById('sound').play();
    $('.lessons').hide();
    id = $(this).data('id');
    $('.lesson_content').show();
    $('.next_board').hide();
    $('.prev_board').hide();
    $('.exit').hide();
    var contents = $('.content_' + id + '.board_1');
    var contentsLength = contents.length;
    var i = 0;
    var content = contents[i++];
    var delay = $(content).data('seconds') * 1000;
    $(content).show();
    $(content).addClass('animated slideInRight');
    var audio = $(content).data('id');
    document.getElementById('audio_' + audio).play();
    setTimeout(function () {
        $(content).addClass('animated slideOutLeft');
    }, delay);
    var playthis = setInterval(function () {
        if (i >= contentsLength) {
            clearInterval(playthis);
            for (var x = 0; x < contents.length; x++) {
                if (x <= 2) {
                    $(contents[x]).css('top', '20px');
                }
                if (x == 3 || x == 4 || x == 5) {
                    $(contents[x]).css('top', '300px');
                }
                if (x == 0 || x == 3) {
                    $(contents[x]).css('left', '120px');
                }
                if (x == 1 || x == 4) {
                    $(contents[x]).css('left', '470px');
                }
                if (x == 2 || x == 5) {
                    $(contents[x]).css('left', '820px');
                }
                $('.back_lesson').show();
            }
            $(contents).removeClass('animated slideInRight slideOutLeft');
            $(contents).addClass('animated flipInX');
            $('.exit').show();
            if($('.board_' + board).length){
                $('.next_board').show();
            }
        }
        content = contents[i++];
        $(content).show();
        $(content).addClass('animated slideInRight');
        delay = $(content).data('seconds') * 1000;
        var audio = $(content).data('id');
        
        var audioplay = document.getElementById('audio_' + audio);
        if (typeof(audioplay) != 'undefined' && audioplay != null)
            {
              audioplay.play();
            }
        setTimeout(function () {
            $(content).addClass('slideOutLeft');
        }, delay);
    }, delay + 1000);
});
$('.lesson_content div').on('click', function () {
    $(this).children('audio')[0].play();
});
$('.back_lesson').on('click', function () {
    document.getElementById('sound').play();
    $('.lesson_content').hide();
    $('.lesson_content').children('div').hide();
        lesson = 0;
        for (lesson; lesson <= 2; lesson++) {
                ie += 1;
                $('.item' + (lesson + 1)).css('animation-delay', ie / 2 + 's');
                $('.item' + (lesson + 1)).addClass('animated flipInX');
                $('.lessons').show();
                $('.item' + (lesson + 1)).show();
            }
    $('.lesson_content div').css({
        top: '170px'
        , left: '500px'
    });
    $(this).hide();
    board = 1;
});
$('.next_lesson').on('click', function () {
    document.getElementById('sound').play();
    $('.lessons div').hide();
    var ie = 0;
    var lessons = lesson;
    $('.lessons div').removeClass('animated flipInX');
    for (lesson; lesson <= lessons+2; lesson++) {
        ie += 1;
        $('.item' + (lesson+1)).css('animation-delay', ie / 2 + 's');
        $('.item' + (lesson+1)).addClass('animated flipInX');
        $('.lessons').show();
        $('.item' + (lesson+1)).show();
    }
    $('.prev_lesson').show();
    if(lesson >= $('.lessons div').length -1){
        $(this).hide();
    }
});

$('.prev_lesson').on('click', function(){
    document.getElementById('sound').play();
    $('.lessons div').hide();
    $('.next_less').show();
    var ie = 0;
    lesson -= 6;
    var lessons = lesson;
    $('.lessons div').removeClass('animated flipInX');
    for (lesson; lesson <= lessons+2; lesson++) {
        ie += 1;
        $('.item' + (lesson+1)).css('animation-delay', ie / 2 + 's');
        $('.item' + (lesson+1)).addClass('animated flipInX');
        $('.lessons').show();
        $('.item' + (lesson+1)).show();
    }
    
    $('.prev_lesson').show();
    if(lesson < 4) {
        $(this).hide();
    }
    if($('.lessons div').length >= 3){
        $('.next_lesson').show();
    }
});

$('.next_board').on('click',function(){
    $('.board_' + board).hide();
    $('.board_' + board).css({
        top: '170px',
        left: '500px'
    });
    $('.next_board').hide();
    $('.prev_board').hide();
    board+=1;
    $('.exit').hide();
    $('.back_lesson').hide();
    var contents = $('.content_' + id + '.board_'+board);
    var contentsLength = contents.length;
    var i = 0;
    var content = contents[i++];
    var delay = $(content).data('seconds') * 1000;
    $(content).show();
    $(content).addClass('animated slideInRight');
    var audio = $(content).data('id');
    document.getElementById('audio_' + audio).play();
    setTimeout(function () {
        $(content).addClass('animated slideOutLeft');
    }, delay);
    var playthis = setInterval(function () {
        if (i >= contentsLength) {
            clearInterval(playthis);
            for (var x = 0; x < contents.length; x++) {
                if (x <= 2) {
                    $(contents[x]).css('top', '20px');
                }
                if (x == 3 || x == 4 || x == 5) {
                    $(contents[x]).css('top', '300px');
                }
                if (x == 0 || x == 3) {
                    $(contents[x]).css('left', '120px');
                }
                if (x == 1 || x == 4) {
                    $(contents[x]).css('left', '470px');
                }
                if (x == 2 || x == 5) {
                    $(contents[x]).css('left', '820px');
                }
                $('.back_lesson').show();
            }
            $(contents).removeClass('animated slideInRight slideOutLeft');
            $(contents).addClass('animated flipInX');
            $('.exit').show();
             if($('.board_' + (board + 1)).length){
                $('.next_board').show();
            }
            else{
                $('.next_board').hide();
            }
            if($('.board_' + (board - 1))){
               $('.prev_board').show(); 
            }
            else{
                $('.prev_board').hide();
            }
        }
        content = contents[i++];
        $(content).show();
        $(content).addClass('animated slideInRight');
        delay = $(content).data('seconds') * 1000;
        var audio = $(content).data('id');
        
        var audioplay = document.getElementById('audio_' + audio);
        if (typeof(audioplay) != 'undefined' && audioplay != null)
            {
              audioplay.play();
            }
        setTimeout(function () {
            $(content).addClass('slideOutLeft');
        }, delay);
    }, delay + 1000);
});

$('.prev_board').on('click',function(){
    $('.board_' + board).hide();
    $('.board_' + board).css({
        top: '170px',
        left: '500px'
    });
    board-=1;
    $('.next_board').hide();
    $('.prev_board').hide();
    $('.exit').hide();
    $('.back_lesson').hide();
    var contents = $('.content_' + id + '.board_'+board);
    var contentsLength = contents.length;
    var i = 0;
    var content = contents[i++];
    var delay = $(content).data('seconds') * 1000;
    $(content).show();
    $(content).addClass('animated slideInRight');
    var audio = $(content).data('id');
    document.getElementById('audio_' + audio).play();
    setTimeout(function () {
        $(content).addClass('animated slideOutLeft');
    }, delay);
    var playthis = setInterval(function () {
        if (i >= contentsLength) {
            clearInterval(playthis);
            for (var x = 0; x < contents.length; x++) {
                if (x <= 2) {
                    $(contents[x]).css('top', '20px');
                }
                if (x == 3 || x == 4 || x == 5) {
                    $(contents[x]).css('top', '300px');
                }
                if (x == 0 || x == 3) {
                    $(contents[x]).css('left', '120px');
                }
                if (x == 1 || x == 4) {
                    $(contents[x]).css('left', '470px');
                }
                if (x == 2 || x == 5) {
                    $(contents[x]).css('left', '820px');
                }
                $('.back_lesson').show();
            }
            $(contents).removeClass('animated slideInRight slideOutLeft');
            $(contents).addClass('animated flipInX');
            $('.exit').show();
            if($('.board_' + board).length){
                $('.next_board').show();
            }
            else{
                $('.next_board').hide();
            }
            if($('.board_' + (board - 1))){
               $('.prev_board').show(); 
            }
            else{
                $('.prev_board').hide();
            }
             
        }
        content = contents[i++];
        $(content).show();
        $(content).addClass('animated slideInRight');
        delay = $(content).data('seconds') * 1000;
        var audio = $(content).data('id');
        
        var audioplay = document.getElementById('audio_' + audio);
        if (typeof(audioplay) != 'undefined' && audioplay != null)
            {
              audioplay.play();
            }
        setTimeout(function () {
            $(content).addClass('slideOutLeft');
        }, delay);
    }, delay + 1000);
})