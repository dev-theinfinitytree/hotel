jQuery.fn.addColorPicker = function(C) {
    if (!C) {
        C = []
    }
    C = jQuery.extend({
        blotchElemType: "span",
        blotchClass: "ColorBlotch",
        clickCallback: function(F) {},
        iterationCallback: null,
        fillString: "&nbsp;",
        fillStringX: "?",
        colors: ["transparent", "#ffffff", "#d0d0d0", "#777777", "#000000", "#ffaaaa", "#ff00ff", "#ff0000", "#aa0000", "#9000ff", "#ff6c00", "#ffff00", "#ffbb00", "#f0e68c", "#d2b229", "#aaffaa", "#00ff00", "#00aa00", "#6b8e23", "#007700", "#bbddff", "#00ffdd", "#aaaaff", "#0000ff", "#0000aa"]
    }, C);
    var E = C.colors.length;
    for (var B = 0; B < E; ++B) {
        var A = C.colors[B];
        if (!A) {
            A = "transparent"
        }
        var D = jQuery("<" + C.blotchElemType + "/>").addClass(C.blotchClass).css("background-color", A);
        D.html(("transparent" == A) ? C.fillStringX : C.fillString);
        if (C.clickCallback) {
            D.click(function() {
                C.clickCallback(jQuery(this).css("background-color"))
            })
        }
        this.append(D);
        if (C.iterationCallback) {
            C.iterationCallback(this, D, A, B)
        }
    }
    return this
}