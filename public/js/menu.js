$(document).ready(function(){
/***********************************************************/
	$('#btnCheck').click(function() {
      checked = $("input[type=checkbox]:checked").length;
      console.log(checked);
      if(checked < 1) {
        alert("You must check at least two checkbox.");
        return false;
      }else{
      	 $('#myForm').submit();
      }

    });
/***********************************************************/
	$('#hospital').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    // var nameSelected = $(this).attr('name');
    // var idSelected = $(this).attr('id');
    if(valueSelected == ''){
      $("#serc").empty().append("<option value=''>Service Type (Must select hospital first)</option>");
    }else{
      $.post('includes/ajax.php',
      {service_selected:valueSelected}, function(data){
        console.log(data);
        $("#serc").empty().append(data);
      });
    }


    if(valueSelected == ''){
      $("#doc").empty().append("<option value=''>Select Doctor (Must select hospital first)</option>");
    }else{
      $.post('includes/ajax.php',
      {value_selected:valueSelected}, function(data){
        console.log(data);
        $("#doc").empty().append(data);
      });
    }
    console.log(dateSelected);
  });
/***********************************************************/
    
});