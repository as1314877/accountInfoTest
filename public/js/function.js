$(function(){
    $("#createAccount").validate({
        rules: {
            account: {
                required: true,
                // account { regex: "/^[a-zA-Z0-9{0,40}-_]+$/" }
            },
			name: "required",
			gender: "required",
			birthday: "required",
			email: "required",
        },
        messages: {
            account: {
                required: "Please enter  account",
				"add": "只能英文+數字"
            },
			name: "Please enter name",
			gender: "Please enter gender",
			birthday: "Please enter birthday",
			email: "Please enter email",
        }
    });

    $(".createButtoon").on("click", function(){
		console.log("on Click");
        if($("#createAccount").valid()){
            //alert("success");
            $("#myCreate").modal("show");
        } else {
            alert("Values are not entered");
            //whatever you want to do when values are not entered
        }
        return false;
    });
})

function getEditData(info) {
	console.log(info);
	$('#edit_account').val(info['account']);
	$('#edit_name').val(info['name']);
	info['gender'] == 'male' ? $("#edit_gender1").prop("checked", true) : $("#edit_gender2").prop("checked", true);
	$('#edit_birthday').val(info['birthday']);
	$('#edit_email').val(info['email']);
	$('#edit_remark').val(info['remark']);
}

function updateAccountInfo(){
	//call controller to update
	var info = {
		editAccount: $('#edit_account').val(),
		editName: $('#edit_name').val(),
		editGender: $('input[name="gender"]:checked').val(),
		editBirthday: $('#edit_birthday').val(),
		editEmail: $('#edit_email').val(),
		editRemark: $('#edit_remark').val()
	}
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type:"POST",
		url:"/account_info/update",
		dataType:"json",
		data:{
			updateData: info
		},
		success:function(result){
			$("#myEdit").modal('hide');
			alert("successful");
			location.reload(true);
		},
		error: function(result){
			$("#myEdit").modal('hide');
			alert("error");
		}
	});
}

function getDeleteData(info) {
	console.log(info);
	$('#askDeleteAccoounnt').val(info['account']);
}

function deleteAccountInfo(){
	var info = {
		deleteAccount: $('#askDeleteAccoounnt').val(),
	}
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type:"POST",
		url:"/account_info/destroy",
		dataType:"json",
		data:{
			deleteData: info
		},
		success:function(result){
			$("#myDelete").modal('hide');
			alert("successful");
			location.reload(true);
		},
		error: function(result){
			$("#myDelete").modal('hide');
			alert("error");
		}
	});
}

function searchAccount(){
	//call controller to update
	var info = {
		account: $('#account').val(),
	}
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type:"POST",
		url:"/account_info/findByAccount",
		dataType:"json",
		data:{
			updateData: info
		},
		success:function(result){
			$("#myEdit").modal('hide');
			alert("successful");
			location.reload(true);
		},
		error: function(result){
			$("#myEdit").modal('hide');
			alert("error");
		}
	});
}