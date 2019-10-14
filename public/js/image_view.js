function readURLSetBackground(input) {
    for ( i =0; i< input.files.length; i++){
        var a = 0;
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.img-div').append(
                '<div data-index="'+a+'" class="provider_logo_upload img-append" style="background-image: url(' + e.target.result + '); background-color: transparent" id="image-block'+i+'">' +
                '<div  class="remove-img"></div>' +
                '</div>')
            a++
        };
        reader.readAsDataURL(input.files[i]);
    }

    $('.image-input').find('#removeImages').remove()
    $('.image-input').append('<button type="button" id="removeImages">Remove</button>')



}

function readURLSetDrawings(input) {
    for ( i =0; i< input.files.length; i++){
        var a = 0;
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.drawings-div').append(
                '<div data-index="'+a+'" class="provider_logo_upload drawings-append" style="background-image: url(' + e.target.result + '); background-color: transparent" id="image-block'+i+'">' +
                '<div  class="remove-img"></div>' +
                '</div>')
            a++
        };
        reader.readAsDataURL(input.files[i]);
    }

    $('.drawings-input').find('#removeDrawings').remove()
    $('.drawings-input').append('<button type="button" id="removeDrawings">Remove</button>')



}
