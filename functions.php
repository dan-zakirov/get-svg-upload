<?php
/**
 * Retrieves SVG content by attachment ID and adds a class.
 *
 * @param int $attachment_id The attachment ID.
 * @return string SVG content with a class or an error message.
 */
function air_get_svg_with_class( $attachment_id ) {
    $attachment = get_post( $attachment_id );
    if ( ! $attachment ) {
        return __( 'Attachment not found.', 'your-text-domain' );
    }

    $file_type = get_post_mime_type( $attachment );
    if ( 'image/svg+xml' !== $file_type ) {
        return __( 'This is not an SVG file.', 'your-text-domain' );
    }

    $file_path = get_attached_file( $attachment_id );
    if ( ! file_exists( $file_path ) ) {
        return __( 'SVG file not found.', 'your-text-domain' );
    }

    $svg_content = file_get_contents( $file_path );
    $svg_content = preg_replace( '/<svg([^>]*)/', '<svg$1 class="upload"', $svg_content );
    
    return $svg_content;
}
