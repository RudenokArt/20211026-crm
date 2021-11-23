<script>

	$( function() {
		$('input[name="order_date"], .drop_calendar').datepicker({
			  dateFormat: "dd-mm-yy"
		});
	} );

	$('input[name="customer_phone"]').mask('+7 (999) 999-9999');
	$('input[name="order_date"]').mask('99-99-9999');

</script>
</body>
</html>