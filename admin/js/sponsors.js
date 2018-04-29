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
        var name = button.data("name");  
        var image = button.data("image");  
        var url = button.data("url");  
        var level = button.data("level");
        var text = button.data("text");           
        $(".modal-body #sponsor-level option").removeAttr("selected",false);
        if(level == "1"){
            $(".modal-body #sponsor-level .level-1").attr("selected", true);
        }
        else{
            $(".modal-body #sponsor-level .level-2").attr("selected", true);
        }

        
        modal.find('.modal-body #sponsor-id').val(id);                
        modal.find('.modal-body #sponsor-name').val(name);
        modal.find('.modal-body #sponsor-text').val(text);
        modal.find('.modal-body #sponsor-url').val(url);
        modal.find('.modal-body #sponsor-image').attr("src","../img/partners/"+image);        
        modal.find();

        //show modal
        $("#sponsor_edit_modal").modal("show");
        $('#container').waitMe('hide');                            
    });
});