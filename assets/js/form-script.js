


function formValidate(formId,formMsg){
	var flag	=	0;
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

	$(formId).find('#signinname').each(function(){
		if( !testEmail.test($(this).val())){
			$(this).addClass('is-invalid');
			flag	=	2;
			$(formMsg).html('');
		}
		else if($(this).val()===""){
			$(this).addClass('is-invalid');
			flag	=	1;
		}
		else{
			$(this).removeClass('is-invalid');
			$(this).addClass('is-valid');
			$(formMsg).html('');
		}
	});

	$(formId).find('#signinpassword').each(function(){
		if($(this).val()===""){
			$(this).addClass('is-invalid');
			flag	=	1;
		}
		else{
			$(this).removeClass('is-invalid');
			$(this).addClass('is-valid');
			$(formMsg).html('');
		}
	});

	if(flag==1){
	    $(formMsg).html('<div class="text-danger"><i class="fa fa-exclamation-circle"></i> Asterisk fields are mandatory! </div>');
		return false;
	}
	else if(flag==2){
	    $(formMsg).html('<div class="text-danger"><i class="fa fa-exclamation-circle"></i>INALID EMAIL ADDRESS ! </div>');
		return false;
	}
	
	
	
	$(".overlay").show();
	$(".overlay").html('<div class="text-light"><span class="spinner-grow spinner-grow-sm" role="status"></span> Please wait...!</div>');
	setTimeout(function(){$(".overlay").hide()},800);
	// $.ajax({
	// 	type:'POST',
	// 	url:'main.php'
	// 	// data:$(formId).serialize(),
	// 	// success: function(){
	// 	// 	setTimeout(function(){$(".overlay").hide()},800);
	// 	// 	var a	=	 data.split('|***|');
	// 	// 	// if(a[1]==1){
	// 	// 	// 	$(formMsg).html(a[0]);
	// 	// 	// 	if(typeof(a[2]) != "undefined" && a[2] !== null) {
	// 	// 	// 		setTimeout(function(){window.location.href=""+a[2]},800);
	// 	// 	// 	}
	// 	// 	// }else{
	// 	// 	// 	$(formMsg).html(a[0]);
	// 	// 	// }
	// 	// }
	// });
	
	
}