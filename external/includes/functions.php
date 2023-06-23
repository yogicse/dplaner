<?php
function getTitle(){

$activePage = basename($_SERVER['PHP_SELF']);
$activePage = ucfirst(rtrim($activePage,"\.php"));
echo $activePage;
}

function current_time( $type, $gmt = 0 ) {
	// Don't use non-GMT timestamp, unless you know the difference and really need to.
	if ( 'timestamp' === $type || 'U' === $type ) {
		return $gmt ? time() : time() + (int) ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS );
	}

	if ( 'mysql' === $type ) {
		$type = 'Y-m-d H:i:s';
	}

	$timezone = $gmt ? new DateTimeZone( 'UTC' ) : wp_timezone();
	$datetime = new DateTime( 'now', $timezone );

	return $datetime->format( $type );
}

function current_datetime() {
	return new DateTimeImmutable( 'now', wp_timezone() );
}

?>


<html>
<script src="/ckeditor/ckeditor.js"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
</script>
</html>