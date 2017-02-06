<?php

/**
 * Return contact feeds localize strings
 *
 * @since 1.1.2
 *
 * @return array
 */
function erp_crm_get_contact_feeds_localize_string() {
    return apply_filters( 'erp_crm_contact_feed_localize_string', [
        'you'                          => __( 'Anda', 'erp' ),
        'edit'                         => __( 'Edit', 'erp' ),
        'delete'                       => __( 'Hapus', 'erp' ),
        'an'                           => __( 'an', 'erp' ),
        'a'                            => __( 'sebuah', 'erp' ),
        'others'                       => __( 'lainnya', 'erp' ),
        'editThisFeed'                 => __( 'Edit aktifitas ini', 'erp' ),
        'newNoteHeadertext'            => sprintf( __( '<strong>%1s</strong> created a note for <strong>%2s</strong>', 'erp' ), '{{createdUserName}}', '{{createdForUser}}' ),
        'emailSubject'                 => __( 'Subject', 'erp' ),
        'reply'                        => __( 'Reply', 'erp' ),
        'replyThisEmail'               => __( 'Reply this email', 'erp' ),
        'viewdOn'                      => sprintf( __( 'Dilihat pada %s', 'erp' ), '{{viewdOn}}' ),
        'emailHeadertext'              => sprintf( __( '<strong>%1s</strong> kirim email <strong>%2s</strong>', 'erp' ), '{{createdUserName}}', '{{createdForUser}}' ),
        'replyEmailHeadertext'         => sprintf( __( '<strong>%1s</strong> replied to <strong>%2s</strong>', 'erp' ), '{{createdForUser}}', '{{createdUserName}}' ),
        'logHeaderText'                => sprintf( __( '<strong>%1s</strong> logged %2s on %3s for <strong>%4s</strong>', 'erp' ), '{{createdUserName}}', '{{logType}}', '{{logDateTime}}', '{{createdForUser}}' ),
        'scheduleHeaderText'           => sprintf( __( '<strong>%1s</strong> have scheduled %2s with <strong>%3s</strong>', 'erp' ), '{{createdUserName}}', '{{logType}}', '{{createdForUser}}' ),
        'logHeaderTextSingleUser'      => sprintf( __( '<strong>%1s</strong> logged %2s on %3s for <strong>%4s</strong> and <strong>%5s</strong>', 'erp' ), '{{createdUserName}}', '{{logType}}', '{{logDateTime}}', '{{createdForUser}}', '{{otherUser}}' ),
        'scheduleHeaderTextSingleUser' => sprintf( __( '<strong>%1s</strong> dijadwalkan %2s with <strong>%3s</strong> and <strong>%4s</strong>', 'erp' ), '{{createdUserName}}', '{{logType}}', '{{createdForUser}}', '{{otherUser}}' ),
        'taskDate'                     => __( 'Task Date', 'erp' ),
        'taskHeaderText'               => sprintf( __( '<strong>%1s</strong> created a task for', 'erp' ), '{{createdUserName}}' )
    ] );
}
