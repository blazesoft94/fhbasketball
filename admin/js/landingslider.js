$(document).ready(function(){
    console.log("ready");
    $(".show-sponsor-edit-modal").click(function(e){
        console.log("here");
        e.preventDefault();
        $('#container').waitMe({
            effect : 'stretch',
            text : '',
            bg : 'rgba(255,255,255,0.7)',
            color : "#000"  
        });
        var modal = $("#sponsor_edit_modal");
        var button = $(this)  //Button that triggered modal
        var id = button.data('id');  
        var heading = button.data("heading");  
        var image = button.data("image");  
        var subtext = button.data("subtext");  

        
        modal.find('.modal-body #lp-id').val(id);                
        modal.find('.modal-body #lp-heading').val(heading);
        modal.find('.modal-body #lp-subtext').val(subtext);
        modal.find('.modal-body #lp-image').attr("src","../img/carousel/"+image);        
        modal.find();

        //show modal
        $("#sponsor_edit_modal").modal("show");
        $('#container').waitMe('hide');                            
    });
});