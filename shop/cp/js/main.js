$(document).ready(function(){
	tinymce.init({
		selector: "#body",
		theme: "modern",
		height: 150,
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor emoticons",
		image_advtab: true,
		templates: [
			{title: 'Test template 1', content: 'Test 1'},
			{title: 'Test template 2', content: 'Test 2'}
		]
	});
});

function DoLogin()
{
	var user = $("#user").val();
	var pass = $("#pass").val();
	if(user== "")
	{
		alert("Username");
		return false
	}
	if(pass == "")
	{
		alert("Password");
		return false
	}
	var datastring = "action=adminlog&user="+user+"&pass="+pass;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			location.reload();
		}
	});
}
function DataAdd(){
	var name = $("#name").val();
	var details = $("#details").val();
	var image = $("#image").val();
	var price = $("#price").val();

	var desc = tinyMCE.get('body').getContent();
	var ampc = desc.split("&").length - 1;
	
	for(i = 0;i<=ampc;i++){
		desc = desc.replace("&","%26");
	}

	var cate = $("#cate").val();
	var keyword = $("#keyword").val();	
	var contact = $("#contact").val();

	if(name == ""){return false}
	if(details == ""){return false}
	if(image == ""){return false}
	if(price == ""){return false}
	if(keyword == ""){return false}

	var datastring = "action=adddata&name="+name+"&details="+details+"&image="+image+"&price="+price+"&desc="+desc+"&cate="+cate+"&keyword="+keyword+"&contact="+contact;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			window.location.href = "?sec=data";
		}
	}); 
}
function DataEdit(){
	var name = $("#name").val();
	var details = $("#details").val();
	var image = $("#image").val();
	var price = $("#price").val();

	var desc = tinyMCE.get('body').getContent();
	var ampc = desc.split("&").length - 1;
	
	for(i = 0;i<=ampc;i++){
		desc = desc.replace("&","%26");
	}

	var cate = $("#cate").val();
	var keyword = $("#keyword").val();	
	var contact = $("#contact").val();
	var did = $("#did").val();

	if(name == ""){return false}
	if(details == ""){return false}
	if(image == ""){return false}
	if(price == ""){return false}
	if(keyword == ""){return false}

	var datastring = "action=editdata&name="+name+"&details="+details+"&image="+image+"&price="+price+"&desc="+desc+"&cate="+cate+"&keyword="+keyword+"&contact="+contact+"&did="+did;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			location.reload();
		}
	}); 
}
function DataDel(){
	var did = $("#did").val();

	var datastring = "action=deldata&did="+did;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			window.location.href = "?sec=data&insub=data-edit";
		}
	}); 
}
function CateAdd(){
	var name = $("#name").val();
	if(name == ""){return false}


	var datastring = "action=addcate&name="+name;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			window.location.href = "?sec=category";
		}
	}); 
}
function CateEdit(){
	var name = $("#name").val();
	var cid = $("#cid").val();

	if(name == ""){return false}


	var datastring = "action=editcate&name="+name+"&cid="+cid;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			window.location.href = "?sec=category&insub=cate-edit";
		}
	}); 
}
function CateDel(){
	var cid = $("#cid").val();

	var datastring = "action=delcate&cid="+cid;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			window.location.href = "?sec=category&insub=cate-edit";
		}
	}); 
}
function PayAdd(){
	var icon = $("#icon").val();
	var data = $("#data").val();

	var datastring = "action=addpay&icon="+icon+"&data="+data;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			window.location.href = "?sec=payments";
		}
	}); 	
}
function PayEdit(){
	var icon = $("#icon").val();
	var data = $("#data").val();
	var pid = $("#pid").val();

	var datastring = "action=editpay&icon="+icon+"&data="+data+"&pid="+pid;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			window.location.href = "?sec=payments&insub=pay-edit";
		}
	}); 	
}
function PayDel(){
	var pid = $("#pid").val();

	var datastring = "action=delpay&pid="+pid;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			window.location.href = "?sec=payments&insub=pay-edit";
		}
	}); 	
}
function PayApp(){
	var invoice = $("#invoice").val();

	var datastring = "action=payapp&invoice="+invoice;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			location.reload();
		}
	}); 		
}
function EmailSend(invoice){

	var datastring = "action=emailsend&invoice="+invoice;
	$.ajax({
		type: "POST",
		url:"process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			alert(response);
			location.reload();
		}
	}); 
}