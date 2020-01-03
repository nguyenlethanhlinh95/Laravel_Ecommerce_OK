$(function() {

    $('#side-menu').metisMenu();

    $('.icon_right').click(function () {
        var $this = $(this);
        $this.parent().next().slideToggle('100', "linear");
    });
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
$(function() {
    $(window).bind("load resize", function() {
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    })
})
