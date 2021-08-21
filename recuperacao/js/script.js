function load(){
    if ($("input[name='tipo']:checked").val() == 1){
        $('#gs').show(1000);
        $('#milhar').hide(1000);
    }else{
        $('#gs').hide(1000);
        $('#milhar').show(1000);
    }
}

function load_body(){
    if ($("input[name='tipo']:checked").val() == 1){
        $('#gs').show();
        $('#milhar').hide();
    }else{
        $('#gs').hide();
        $('#milhar').show();
    }

}
