<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?php echo base_url() ?>">
	 <link rel="stylesheet" href="assets/login/bootstrap/css/bootstrap.min.css">
	 <script src="assets/login/js/jquery-1.11.1.min.js"></script>
	 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php 
$id = $_GET['pin'];
if ($id == 'undefined') {
	?>
	<script type="text/javascript">
		alert('Pin tidak berlaku, silahkan coba lagi');
		window.location='<?php echo base_url() ?>';
	</script>
	<?php
}
 ?>	

<a href="web/kembali/<?php echo $id ?>" class="btn btn-block btn-primary" id="kembali"> KEMBALI</a>
<iframe width="100%" height="500px;" src="https://appr.tc/r/<?php echo $id ?>" allow="geolocation; microphone; camera"></iframe>

<script type="text/javascript">
    window.onbeforeunload = function() { return "Yakin Kamu Akan Keluar."; };
 //    $(document).ready(function() {
 //    	$("#kembali").click(function(event) {
 //    		swal({
	// 		  title: "Yakin Akan Keluar?",
	// 		  text: "Once deleted, you will not be able to recover this imaginary file!",
	// 		  icon: "warning",
	// 		  buttons: true,
	// 		  dangerMode: true,
	// 		})
	// 		.then((willDelete) => {
	// 		  if (willDelete) {
	// 		    swal("Poof! Your imaginary file has been deleted!", {
	// 		      icon: "success",
	// 		    });
	// 		  } else {
	// 		    swal("Your imaginary file is safe!");
	// 		  }
	// 		});
 //    	});
	// });
</script>



</body>
</html>