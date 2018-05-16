$(document).ready(function(){
    // alert("ready");
    $("a#show-gallery-edit-modal").click(function(e){
        // e.preventDefault();
        // $("#gallery_edit_modal").modal("hide");        
        console.log("here");        
        // alert("here");        
        // alert("here");        
        $('#container').waitMe({
            effect : 'stretch',
            text : '',
            bg : 'rgba(255,255,255,0.7)',
            color : "#000"  
        });
        var modal = $("#gallery_edit_modal");    
        var button = $(this) // Button that triggered the modal
        var cat = $(button).data("cat");
        $(".modal-body #gallery-category option").removeAttr("selected",false);    
        if(cat == "1"){
            $(".modal-body #gallery-category #gallery-game").attr("selected", true);
        }
        else if(cat == "2"){
            $(".modal-body #gallery-category #gallery-players").attr("selected", true);
        }
        else if(cat == "3"){
            $(".modal-body #gallery-category #gallery-staff").attr("selected", true);
        }
        else if(cat == "4"){
            $(".modal-body #gallery-category #gallery-others").attr("selected", true);
        }
        modal.find('.modal-body #gallery-text').val($(button).data("text"));
        modal.find('.modal-body #gallery-id').val($(button).data("id"));
        modal.find('.modal-body #gallery-text').val($(button).data("text"));
        modal.find('.modal-body #gallery-text').val($(button).data("text"));
        modal.find('.modal-body #gallery-image').attr("src","../img/clubGallery/"+button.data("image"));
        modal.find();

        $('#container').waitMe('hide');        
        // $("#gallery_edit_modal").modal("show");
        
    })
});