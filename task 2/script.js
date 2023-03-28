function sort(){
    let divs = $('div').filter(function() {
        return !jQuery.isEmptyObject($(this).data())
    });

    divs.sort(function(a,b){
        if (jQuery.isEmptyObject($(a).data()) || jQuery.isEmptyObject($(b).data())) return 0

        let aWidth = $(a).width(),
            bWidth = $(b).width();

        if(aWidth > bWidth) return 1;

        if(aWidth < bWidth) return -1;

        return 0

    });

    divs.detach().appendTo($(document.getElementById('container')));
}
