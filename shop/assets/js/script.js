$(document).ready(function(){
});
function AddToCart(did){
	var datastring = "action=addcart&did="+did;
	$.ajax({
		type: "POST",
		url:"cp/process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			location.reload();
		}
	});	
}
function DelFmCart(i){
	var datastring = "action=delfmcart&i="+i;
	$.ajax({
		type: "POST",
		url:"cp/process.php",
		cache: false,
		data:datastring,
		contentType: "application/x-www-form-urlencoded",
		success: function(response)
		{
			location.reload();
		}
	});		
}
function Order(){
	var did = [];
	var name = $("#name").val();
	var email = $("#email").val();
	var tel = $("#tel").val();
	if(name == ""){ return false;}
	if(email == ""){ return false;}
	if(tel == ""){ return false;}
    $('input[id^=sh]').each(function(){did.push($(this).val());});
	var datastring = "action=order&did="+did+"&name="+name+"&email="+email+"&tel="+tel;
	$.ajax({
		type: "POST",
		url:"cp/process.php",
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
function CheckOut(){
	window.location.href = "?sec=checkout";
}
function Pay(){
	var invoice = $("#invoice").val();
	var type = $("#type").val();
	var date = $("#date").val();
	var money = $("#money").val();
	var msg = $("#msg").val();

	var datastring = "action=pay&invoice="+invoice+"&type="+type+"&date="+date+"&money="+money+"&msg="+msg;
	$.ajax({
		type: "POST",
		url:"cp/process.php",
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