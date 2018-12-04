var outputs = [];
var house = null;

$('form').on('submit', gethouse);
function gethouse(e){
    e.preventDefault();
    $.ajax({
        url: 'https://api.backhoom.com/woningscan-consolidated/prod?referral_code=cf6c19320ec80bb2a25e7d4cd6b03067d7e74dd8&postcode='+$('#inputZip').val()+'&nummer='+$('#inputHousenumber').val()+$('#inputAffix').val()+'&bewoners='+1+'&jaarverbruik_kWh=&jaarverbruik_m3=',
        method: 'GET',
        success: nextStep,
        error: showError
    });
}


function nextStep(data){
    outputs = data.woningscan.result;
    house = data.lookup;
    console.log(data);
}
function showError(data){
    console.log(data);
}

