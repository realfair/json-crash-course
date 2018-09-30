<!DOCTYPE html>
<html>
<head>
	<title>Jquery JSON Pasing</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>
<body>

<p id="demo">dsdsds</p>
<table id="table" class="table table-striped" border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript">
 //  	$(function(){
	// $.ajax({
	// 	url:"http://localhost:8080/kiza/crop_grades?crop=1",
	// 	method:'GET',
	// 	dataType: 'json'
	// }).done(function(data){
	// 	//console.log(data);
	// 	//var myArr = JSON.parse(data);
	// 	//$("#demo").html(data);
	// 	// $.map(data, function(grade, i){
	// 	// 	$("#demo").append("<li>"+grade.grade+"</li>");
	// 	// });
	// });

	// var text='{"name":"samuel","email":"sam@test.com","phone":"07888",pets:[{"name":"sam"}]}';
	// //var obj=JSON.parse(text);
	// $("#demo").append(text.name);
 //  	});
  </script>
  <script>
  	$(function(){
  		loadData();
  	});
function loadData(){
	$("#table>tbody>*").remove();
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myArr = JSON.parse(this.responseText);
        console.log(myArr);
        var status=myArr.status;
        if(status===true){
        	var data=myArr.data;
        	$.map(data, function(member, i){
        		fillTable(member.name,member.memberId)
        	});
        }
  //       var pets=myArr.pets;
		// $.map(pets, function(grade, i){
		// 	$("#demo").append("<li>"+grade.animal+"</li>");
		// });
        //$("#demo").append();
    }
};
xmlhttp.open("GET", "http://www.agri.kizalab.com/kiza/api/index.php?controller=members&action=getMembers&token=42941b300ec72d59e57b97b95d9166df&cooperative=7", true);
xmlhttp.send();
}
function show(msg){
	$("#demo").append("<li>"+msg+"</li>");
}
function fillTable(name,id){
	$("#table>tbody").append("<tr><td>"+id+"</td><td>"+name+"</td><td><button class='btn btn-danger delete' onclick='deleteUser("+id+")' action="+id+">DELETE</button></td></tr>");
}
function deleteUser(id){
	var url="http://localhost:8080/kiza/api/index.php?controller=members&cooperative=7&action=removeMember&memberId="+id;
	var confirms=confirm("Do you want to delete this user.");
	if(confirms){
		$.get(url,function(data){
			loadData();
		});
	}
}
</script>
</body>
</html>