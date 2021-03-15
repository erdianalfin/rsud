@if (session('success'))
<script>
	Swal.fire({
		icon: 'success',
		text: "{{ session('success') }}",
		showConfirmButton: false,
		timer: 5000
	})
</script>
@elseif (session('error'))
<script>
	Swal.fire({
		icon: 'error',
		text: "{{ session('error') }}",
		showConfirmButton: true,
	})
</script>
@endif