$('.availabilities-btn').click(function(){
    // var leader_id = $(this).attr("id");
    $.ajax({
        url:'api/vehicles',
        type:'GET',
        success:function(response){
            $('#availabilities-modal').modal("show");
            $('#availabilities-details').html(
                `At ${getDateNow()} there are ${200 - response.length } available places in the parking`
            );
        }
    });
});

function checkVehiclesTime(id) {
    var id = $('#' + id)[0];
    $.ajax({
        url:`api/vehicles/${id.value}`,
        type:'GET',
        success:function(response){
            if (!response.data) {
                $('#time-details').html('No exising vehicle with that registration number');
                return;
            }
            $('#time-details').html(`${sumPayment(response.data)}` + ' lv.');
        },
        error:function( req, status, err ) {
            console.log('Something went wrong', status, err);
        }
    });
}

function register(formId) {
    var form = $(`#${formId}`);

    $(`#${formId} input[type="text"]`).blur(function(){
        if(!$(this).val()){
            $(this).addClass("error");
        } else{
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success:function(){},
                error:function( req, status, err ) {
                    console.log('Something went wrong', status, err);
                }
            });                        }
    });
}

function unregister(id) {
    var id = $('#' + id)[0];
    $.ajax({
        url:`api/vehicles/${id.value}`,
        type: 'DELETE',
        success:function(){
            alert("Unregister the vehicle successfully");
            location.reload();
        },
        error:function() {
            alert("Problem while unregistering the vehicle. Try again latter.");
            location.reload();
        }
    });
}

function sumPayment(vehicle) {
    const dateNow = new Date();
    const time = Math.round(((Math.round(dateNow / 1000) - vehicle.entrance_time) / 3600))
    const fee = (8 < dateNow.getHours() < 18) ? vehicle.vehicle_type.day_fee : vehicle.vehicle_type.night_fee;
    const discount = vehicle.discount_card ? vehicle.discount_card.value / 100 : 1;

    return discount * time * fee;
}

function getDateNow() {
    const dateNow = new Date();
    return dateNow.getHours() + ':' + dateNow.getMinutes();
}
