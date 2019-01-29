$.fn.upform = function() {
    var $this = $(this);
    var container = $this.find(".upform-main");

    $(document).ready(function() {
      $(container).find(".input-block").first().click();
    });

    $($this).find("form").submit(function() {
      return false;
    });

    $(container)
      .find(".input-block")
      .not(".input-block input")
      .on("click", function() {
      rescroll(this);
    });

    $(container).find(".input-block input").keypress(function(e) {
      if (e.which == 13) {
        if ($(this).hasClass("required") && $(this).val() == "") {
        } else moveNext(this);
      }
    });

    $(container).find('.input-block input[type="radio"]').change(function(e) {
      moveNext(this);
    });

    $(window).on("scroll", function() {
      $(container).find(".input-block").each(function() {
        var etop = $(this).offset().top;
        var diff = etop - $(window).scrollTop();

        if (diff > 100 && diff < 300) {
          reinitState(this);
        }
      });
    });

    function reinitState(e) {
      $(container).find(".input-block").removeClass("active");

      $(container).find(".input-block input").each(function() {
        $(this).blur();
      });
      $(e).addClass("active");
      /*$(e).find('input').focus();*/
    }

    function rescroll(e) {
      $(window).scrollTo($(e), 200, {
        offset: { left: 100, top: -200 },
        queue: false
      });
    }

    function reinit(e) {
      reinitState(e);
      rescroll(e);
    }

    function moveNext(e) {
      $(e).parent().parent().next().click();
    }

    function movePrev(e) {
      $(e).parent().parent().prev().click();
    }
  };

  $(".upform").upform();
  $.fn.upform = function() {
    var $this = $(this);
    var container = $this.find(".upform-main");

    $(document).ready(function() {
      $(container).find(".input-block").first().click();
    });

    $($this).find("form").submit(function() {
      return false;
    });

    $(container)
      .find(".input-block")
      .not(".input-block input")
      .on("click", function() {
        rescroll(this);
      });

    $(container).find(".input-block input").keypress(function(e) {
      if (e.which == 13) {
        if ($(this).hasClass("required") && $(this).val() == "") {
        } else moveNext(this);
      }
    });

    $(container).find('.input-block input[type="radio"]').change(function(e) {
      moveNext(this);
    });

    $(window).on("scroll", function() {
      $(container).find(".input-block").each(function() {
        var etop = $(this).offset().top;
        var diff = etop - $(window).scrollTop();

        if (diff > 100 && diff < 300) {
          reinitState(this);
        }
      });
    });

    function reinitState(e) {
      $(container).find(".input-block").removeClass("active");

      $(container).find(".input-block input").each(function() {
        $(this).blur();
      });
      $(e).addClass("active");
      /*$(e).find('input').focus();*/
    }

    function rescroll(e) {
      $(window).scrollTo($(e), 200, {
        offset: { left: 100, top: -200 },
        queue: false
      });
    }

    function reinit(e) {
      reinitState(e);
      rescroll(e);
    }

    function moveNext(e) {
      $(e).parent().parent().next().click();
    }

    function movePrev(e) {
      $(e).parent().parent().prev().click();
    }
  };

  $(".upform").upform();

  // I know that the code could be better.
// If you have some tips or improvement, please let me know.

$('.img-parallax').each(function(){
  var img = $(this);
  var imgParent = $(this).parent();
  function parallaxImg () {
    var speed = img.data('speed');
    var imgY = imgParent.offset().top;
    var winY = $(this).scrollTop();
    var winH = $(this).height();
    var parentH = imgParent.innerHeight();


    // The next pixel to show on screen
    var winBottom = winY + winH;

    // If block is shown on screen
    if (winBottom > imgY && winY < imgY + parentH) {
      // Number of pixels shown after block appear
      var imgBottom = ((winBottom - imgY) * speed);
      // Max number of pixels until block disappear
      var imgTop = winH + parentH;
      // Porcentage between start showing until disappearing
      var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
    }
    img.css({
      top: imgPercent + '%',
      transform: 'translate(-50%, -' + imgPercent + '%)'
    });
  }
  $(document).on({
    scroll: function () {
      parallaxImg();
    }, ready: function () {
      parallaxImg();
    }
  });
});
