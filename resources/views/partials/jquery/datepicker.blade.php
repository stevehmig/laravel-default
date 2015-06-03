<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script>
			$(function(){
			   $('.datepicker').datepicker({
					format: 'yyyy/mm/dd',
				}).on('changeDate', function(e){
					$(this).datepicker('hide');
				});
			});
						
</script>