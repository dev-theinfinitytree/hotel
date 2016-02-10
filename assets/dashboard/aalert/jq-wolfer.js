    $.jqWolfer = function(align) { $.jqWolfer.align(align); };

    $.jqWolfer.align = function(align)
    {
        if (align == "Middle")
        {
            var bw = parseInt($(".jqWolferContainer").css("width"));
            var bh = parseInt($(".jqWolferContainer").css("height"));
            var mw = $(".jqWolferView div#jqWolferMsg").width();
            var mh = $(".jqWolferView div#jqWolferMsg").height();

            var top = parseInt((bh / 2) - (mh / 2)) + "px";

            $("body").prepend(bw + "," + bh + "</br>");

            $(".jqWolferView div#jqWolferMsg").css( { top: top } );
        }
        else
        if (align == "UpperMiddle")
        {
            var bw = parseInt($(".jqWolferContainer").css("width"));
            var bh = parseInt($(".jqWolferContainer").css("height"));
            var mw = $(".jqWolferView div#jqWolferMsg").width();
            var mh = $(".jqWolferView div#jqWolferMsg").height();
            $(".jqWolferView div#jqWolferMsg").css( { top: (bh / 2) - (mh / 2) - (bh / 4) } );
        }
        else
        if (align == "UpperLeft")
        {
            $(".jqWolferView div#jqWolferMsg").css( { border: '1px solid red', position: 'absolute', top: '16px', left: '16px' } );
        }
        else
        if (align == "UpperRight")
        {
            $(".jqWolferView div#jqWolferMsg").css( { border: '1px solid blue', position: 'absolute', top: '16px', right: '16px' } );
        }
    };

    $.jqWolfer.close = function() {
         $('.jqWolferView').fadeOut(300, function() { $('.jqWolferContainer').fadeOut(200); } );
         //$('.jqWolferView').hide();
         //$('.jqWolferContainer').hide();
    };

    $(document).ready(function()
    {
        $.jqWolfer("UpperMiddle");

        // Overwrite the alert() method
        window.alert = function(sMessage, title, align) {

            // align
            $.jqWolfer.align(align);

            // reset opacity (IE will wipe it out after fades)
            $(".jsWolferView, .jsWolferContainer").css("opacity", "0.8");
            $(".jsWolferView, .jsWolferContainer").css("filter", "alpha(opacity = 80)");

            // Write your own code to execute whenever alert is called
            $(".jqWolferView div#jqWolferMsg #wf1").text(title);
            $(".jqWolferView div#jqWolferMsg #wf2").html(sMessage);

            // display the message
            $(".jqWolferContainer").css({display:'block',visibility:'visible'});
            $(".jqWolferView").css({display:'block',visibility:'visible'});

            var snd = new Audio("wolfer-1.wav"); // buffers automatically when created
            snd.play();

            return false;
        };
    });