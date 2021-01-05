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
	$("#searchItem").empty();
	var info = {
		account: $('#account').val(),
	}
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type:"POST",
		url:"account_info/search",
		dataType:"json",
		data:{
			searchData: info
		},
		success:function(result){
			if(result.length < 1) {
				alert("查無資訊!!");
				return;
			}
			for(var i = 0; i < result.length; i++){
				$("#searchItem").append("<tr> + \
					<td>"+ result[i]['account'] +"</td> + \
					<td>"+ result[i]['name'] +"</td> + \
					<td>"+ result[i]['gender'] +"</td> + \
					<td>"+ result[i]['birthday'] +"</td> + \
					<td>"+ result[i]['email'] +"</td> + \
					<td>"+ result[i]['remark'] +"</td>"
				);
			}
		},
		error: function(result){
			console.log(result);
		}
	});
}