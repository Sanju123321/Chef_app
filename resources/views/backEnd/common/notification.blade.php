<?php if(Session::has('success')){ //echo 'o'; die; ?>
<script>
	$.toaster({
	  // toast message
	  message : "{{ Session::get('success') }}",
	  // toast title
	  title : "Success",
	  // or 'success', 'info', 'warning', 'danger'
	  priority : 'success'

	});
</script>
<?php } ?>

<?php if(Session::has('error')){ ?>
<script>
	$.toaster({
	  // toast message
	  message : "{{ Session::get('error') }}",
	  // toast title
	  title : "Error",
	  // or 'success', 'info', 'warning', 'danger'
	  priority : 'danger'

	});

	//    $.toaster('Your message here');
</script>
<?php } ?>

<?php //echo 'ok'; die;
	Session::forget('success');
	Session::forget('error');
?>
