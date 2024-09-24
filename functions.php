<?php
/**
 * Retrieves SVG content by attachment ID and adds a class.
 *
 * @param int $attachment_id The attachment ID.
 * @return string|WP_Error SVG content with a class or WP_Error on failure.
 */
function air_get_svg_with_class( $attachment_id ) {
    $attachment = get_post( $attachment_id );
    if ( ! $attachment ) {
        return new WP_Error( 'attachment_not_found', __( 'Attachment not found.', 'your-text-domain' ) );
    }

    $file_type = get_post_mime_type( $attachment );
    if ( 'image/svg+xml' !== $file_type ) {
        return new WP_Error( 'invalid_file_type', __( 'This is not an SVG file.', 'your-text-domain' ) );
    }

    $file_path = get_attached_file( $attachment_id );
    if ( ! file_exists( $file_path ) ) {
        return new WP_Error( 'file_not_found', __( 'SVG file not found.', 'your-text-domain' ) );
    }

    $svg_content = file_get_contents( $file_path );
    $svg_content = preg_replace( '/<svg([^>]*)/', '<svg$1 class="upload"', $svg_content );
    
    return $svg_content;
}
