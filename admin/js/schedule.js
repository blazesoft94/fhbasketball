$(document).ready(function(){
    console.log("ready")
    $(".show-schedule-edit-modal").click(function(e){
        e.preventDefault();
        $('#container').waitMe({
            effect : 'stretch',
            text : '',
            bg : 'rgba(255,255,255,0.7)',
            color : "#000"  
        });
        var modal = $("#schedule_edit_modal");
        var button = $(this)  //Button that triggered modal
        var id = button.data('id');    
        $.ajax({
            url: "ajax/schedule_info.php?schedule_id="+id,
            success: function(data){
                var obj = JSON.parse(data);           
                $(".modal-body #schedule-played option").removeAttr("selected",false);
                if(obj.schedule_played__blazeweb == "Yes"){
                    $(".modal-body #schedule-played .played-yes").attr("selected", true);
                }
                else{
                    $(".modal-body #schedule_played .played-no").attr("selected", true);
                }
    
                $(".modal-body #schedule-venue option").removeAttr("selected",false);
                if(obj.schedule_venue__blazeweb == "Home"){
                    $(".modal-body #schedule-venue .schedule-home").attr("selected", true);
                }
                else{
                    $(".modal-body #schedule-venue .schedule-away").attr("selected", true);
                }
                modal.find('.modal-body #schedule-id').val(obj.schedule_id__blazeweb);                
                modal.find('.modal-body #schedule-opponent').val(obj.schedule_opponent__blazeweb);
                modal.find('.modal-body #schedule-result').val(obj.schedule_result__blazeweb);
                modal.find('.modal-body #datepicker').val(obj.schedule_date__blazeweb);
                modal.find('.modal-body #schedule-tname').val(obj.schedule_tname__blazeweb);
                // .substr(0,5)
                modal.find('.modal-body #timepicker').val(obj.schedule_time__blazeweb);
                modal.find();

                //show modal
                $("#schedule_edit_modal").modal("show");
                $('#container').waitMe('hide');                        
            },
            error: function(err){
                console.log(error);
            }
            
        })        
    });
    $('#schedule_edit_modal').on('show.bs.modal', function (event) {
        console.log("here");    
        
        // var jersey = button.data('jersey') // Extract info from data-* attributes
        // var fname = button.data('fname')
        // var lname = button.data('lname')
        // var position = button.data('position')
        // var height = button.data('height')
        // var weight = button.data('weight')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        
        
        
      })
});