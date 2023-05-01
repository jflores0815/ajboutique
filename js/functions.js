$(document).ready(function(){

    // alert('dsaad');

});

$(document).on('click', '#editprofile', function(){

    $('#divprofile').css('display','none');

    $('#updateprofile').css('display','block');

})

.on('click', '#savedetails',function(){

    // alert('SAVE!');

})

.on('submit','#udDetails', function(e){

    e.preventDefault();

    var form = $('#udDetails');

    var id = $('#savedetails').val();

    $.ajax({

        type:form.attr('method'),
 
        url:form.attr('action'),

        data:form.serialize()+'&req=update&id='+id,

        success:function(data){

            console.log(data);

            if(data=='success'){

                $('#showalert').html("<div class='alert alert-success'><strong>Successfully updated profile!</strong></div>");

                $('#showalert').fadeOut(6000);



                window.location.href = "../views/client_profile.php";



            }else{

                
                  
                $('#showalert').html("<div class='alert alert-success'><strong>Successfully updated profile!</strong></div>");
                  window.location.href = "../views/client_profile.php";
                $('#showalert').fadeOut(6000);

               

            }

        },error:function(data){

            alert('error');

        }

    });

})

.on('change', 'input[type=radio][name=shipadd]', function(){

    var val = $(this).val();

    console.log(val);

    switch(val){

        case 'ship1':

        $('#newaddress').val("");

        $('#newaddress').attr('disabled','disabled');

        break;

        case 'newadd':

        $('#newaddress').removeAttr('disabled');

        break;

        case 'ship3':

        break;

    }

})

.on('submit', '#shipDetail',function(e){

    e.preventDefault();

    var form = $('#shipDetail');

    var shiptype=$('input[type=radio][name=shipadd]:checked').val();

    if(shiptype == 'ship2'){

        $('#newaddress').prop('required', true);

    }else if(shiptype!='ship2'){

        $('#newaddress').removeAttr('required');

    }

    $.ajax({

        url: form.attr('action'),

        method: form.attr('method'),

        data: form.serialize()+'&req=ship',

        success:function(data){

            if(data=='success'){

                alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction')

            }else{

                alert(data);

            }

        },

        error: function(data){

            alert('error');

        },

        complete:function(){

            window.location = '../views/shop.php';

        }

    }); 

});

