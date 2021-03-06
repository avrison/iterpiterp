<?php

/**
 * Register metabox widget in right side
 * for crm dashbaord
 *
 * @since 1.0
 *
 * @return void
 */
function erp_crm_dashboard_right_widgets_area() {
    erp_admin_dash_metabox( __( '<i class="fa fa-calendar-check-o"></i> Schedules Hari Ini', 'erp' ), 'erp_crm_dashboard_widget_todays_schedules' );
    erp_admin_dash_metabox( __( '<i class="fa fa-calendar-check-o"></i> Schedules Mendatang', 'erp' ), 'erp_crm_dashboard_widget_upcoming_schedules' );
    erp_admin_dash_metabox( __( '<i class="fa fa-users"></i> Terakhir Ditambahkan', 'erp' ), 'erp_crm_dashboard_widget_latest_contact' );



}

/**
 * Register metabox widget in left side
 * for crm dashboard
 *
 * @since 1.0
 *
 * @return void
 */
function erp_crm_dashboard_left_widgets_area() {
    erp_admin_dash_metabox( __( '<i class="fa fa-calendar"></i> My schedules', 'erp' ), 'erp_crm_dashboard_widget_my_schedules' );
}

/**
 * CRM Dashboard Todays Schedules widgets
 *
 * @since 1.0
 *
 * @return void [html]
 */
function erp_crm_dashboard_widget_todays_schedules() {
    $todays_schedules = erp_crm_get_todays_schedules_activity( get_current_user_id() );
    ?>
    <?php if ( $todays_schedules ): ?>

    <ul class="erp-list list-two-side list-sep erp-crm-dashbaord-todays-schedules">
        <?php foreach ( $todays_schedules as $key => $schedule ) : ?>
            <li>
                <?php
                    $users_text   = '';
                    $invite_users = isset( $schedule['extra']['invite_contact'] ) ? $schedule['extra']['invite_contact'] : [];

                    if ( in_array( 'contact', $schedule['contact']['types'] ) ) {
                        $contact_user = $schedule['contact']['first_name'] . ' ' . $schedule['contact']['last_name'];
                    } else if( in_array( 'company', $schedule['contact']['types'] ) )  {
                        $contact_user = $schedule['contact']['company'];
                    }

                    array_walk( $invite_users, function( &$val ) {
                        $val = get_the_author_meta( 'display_name', $val );
                    });

                    if ( count( $invite_users) == 1 ) {
                        $users_text = sprintf( '%s <span>%s</span>', __( 'and', 'erp' ), reset( $invite_users ) );
                    } else if ( count( $invite_users) > 1 ) {
                        $users_text = sprintf( '%s <span class="erp-tips" title="%s">%d %s</span>', __( 'and', 'erp' ), implode( '<br>', $invite_users ), count( $invite_users ), __( 'Others') );
                    }

                    if ( $schedule['log_type'] == 'meeting' ) {
                        echo sprintf( '%s <a href="%s">%s</a> %s %s %s', __( '<i class="fa fa-calendar"></i> Meeting with', 'erp' ), erp_crm_get_details_url( $schedule['contact']['id'], $schedule['contact']['types'] ), $contact_user, $users_text, __( 'at', 'erp' ), date( 'g:ia', strtotime( $schedule['start_date'] ) ) ) . " <a href='#' data-schedule_id=' " . $schedule['id'] . " ' data-title='" . $schedule['extra']['schedule_title'] . "' class='erp-crm-dashbaord-show-details-schedule'>" . __( 'Details &rarr;', 'erp' ) . "</a>";
                    }

                    if ( $schedule['log_type'] == 'call' ) {
                        echo sprintf( '%s <a href="%s">%s</a> %s %s %s', __( '<i class="fa fa-phone"></i> Call to', 'erp' ), erp_crm_get_details_url( $schedule['contact']['id'], $schedule['contact']['types'] ), $contact_user, $users_text, __( 'at', 'erp' ), date( 'g:ia', strtotime( $schedule['start_date'] ) ) ) . " <a href='#' data-schedule_id=' " . $schedule['id'] . " ' data-title='" . $schedule['extra']['schedule_title'] . "' class='erp-crm-dashbaord-show-details-schedule'>" . __( 'Details &rarr;', 'erp' ) . "</a>";
                    }
                ?>
            </li>
        <?php endforeach ?>
    </ul>
     <?php else : ?>
        <?php _e( 'Tidak Ada schedules', 'erp' ); ?>
    <?php endif;
}

/**
 * CRM Dashbaord upcoming schedules widgets
 *
 * @since 1.0
 *
 * @return void [html]
 */
function erp_crm_dashboard_widget_upcoming_schedules() {
    $upcoming_schedules = erp_crm_get_next_seven_day_schedules_activities( get_current_user_id() );
    ?>

    <?php if ( $upcoming_schedules ): ?>
        <ul class="erp-list list-two-side list-sep erp-crm-dashbaord-upcoming-schedules">
            <?php foreach ( $upcoming_schedules as $key => $schedule ) : ?>
                <li>
                    <?php
                        $users_text   = '';
                        $invite_users = isset( $schedule['extra']['invite_contact'] ) ? $schedule['extra']['invite_contact'] : [];
                        $contact_user = $schedule['contact']['first_name'] . ' ' . $schedule['contact']['last_name'];

                        array_walk( $invite_users, function( &$val ) {
                            $val = get_the_author_meta( 'display_name', $val );
                        });

                        if ( count( $invite_users) == 1 ) {
                            $users_text = sprintf( '%s <span>%s</span>', __( 'and', 'erp' ), reset( $invite_users ) );
                        } else if ( count( $invite_users) > 1 ) {
                            $users_text = sprintf( '%s <span class="erp-tips" title="%s">%d %s</span>', __( 'and', 'erp' ), implode( '<br>', $invite_users ), count( $invite_users ), __( 'Others') );
                        }

                        if ( $schedule['log_type'] == 'meeting' ) {
                            echo sprintf( '%s <a href="%s">%s</a> %s %s %s %s %s', __( '<i class="fa fa-calendar"></i> Meeting with', 'erp' ), erp_crm_get_details_url( $schedule['contact']['id'], $schedule['contact']['types'] ), $contact_user, $users_text, __( 'on', 'erp' ), erp_format_date( $schedule['start_date'] ), __( 'at', 'erp' ), date( 'g:ia', strtotime( $schedule['start_date'] ) ) ) . " <a href='#' data-schedule_id=' " . $schedule['id'] . " ' data-title='" . $schedule['extra']['schedule_title'] . "' class='erp-crm-dashbaord-show-details-schedule'>" . __( 'Details &rarr;', 'erp' ) . "</a>";
                        }

                        if ( $schedule['log_type'] == 'call' ) {
                            echo sprintf( '%s <a href="%s">%s</a> %s %s %s %s %s', __( '<i class="fa fa-phone"></i> Call to', 'erp' ), erp_crm_get_details_url( $schedule['contact']['id'], $schedule['contact']['types'] ), $contact_user, $users_text, __( 'on', 'erp' ), erp_format_date( $schedule['start_date'] ), __( 'at', 'erp' ), date( 'g:ia', strtotime( $schedule['start_date'] ) ) ) . " <a href='#' data-schedule_id=' " . $schedule['id'] . " ' data-title='" . $schedule['extra']['schedule_title'] . "' class='erp-crm-dashbaord-show-details-schedule'>" . __( 'Details &rarr;', 'erp' ) . "</a>";
                        }
                    ?>
                </li>
            <?php endforeach ?>
        </ul>
    <?php else : ?>
        <?php _e( 'Tidak ada schedules', 'erp' ); ?>
    <?php endif;
}

/**
 * Show all schedules in calendar
 *
 * @since 1.0
 *
 * @return void
 */
function erp_crm_dashboard_widget_my_schedules() {
    $user_id        = get_current_user_id();
    $args           = [
        'created_by' => $user_id,
        'number'     => -1,
        'type'       => 'log_activity'
    ];

    $schedules      = erp_crm_get_feed_activity( $args );
    $schedules_data = erp_crm_prepare_calendar_schedule_data( $schedules );

    ?>
    <style>
        .fc-time {
            display:none;
        }
        .fc-title {
            cursor: pointer;
        }
        .fc-day-grid-event .fc-content {
            white-space: normal;
        }
    </style>

    <div id="erp-crm-calendar"></div>
    <script>
        ;jQuery(document).ready(function($) {
            $('#erp-crm-calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: false,
                eventLimit: true,
                events: <?php echo json_encode( $schedules_data ); ?>,
                eventClick: function(calEvent, jsEvent, view) {
                    var scheduleId = calEvent.schedule.id;
                    $.erpPopup({
                        title: ( calEvent.schedule.extra.schedule_title ) ? calEvent.schedule.extra.schedule_title : '<?php _e( 'Log Details', 'erp' ) ?>',
                        button: '',
                        id: 'erp-customer-edit',
                        onReady: function() {
                            var modal = this;

                            $( 'header', modal).after( $('<div class="loader"></div>').show() );

                            wp.ajax.send( 'erp-crm-get-single-schedule-details', {
                                data: {
                                    id: scheduleId,
                                    _wpnonce: '<?php echo wp_create_nonce( 'wp-erp-crm-nonce' ); ?>'
                                },

                                success: function( response ) {
                                    var startDate = wperp.dateFormat( response.start_date, 'j F' ),
                                        startTime = wperp.timeFormat( response.start_date ),
                                        endDate = wperp.dateFormat( response.end_date, 'j F' ),
                                        endTime = wperp.timeFormat( response.end_date );

                                    if ( ! response.end_date ) {
                                        var datetime = startDate + ' at ' + startTime;
                                    } else {
                                        if ( response.extra.all_day == 'true' ) {
                                            if ( wperp.dateFormat( response.start_date, 'Y-m-d' ) == wperp.dateFormat( response.end_date, 'Y-m-d' ) ) {
                                                var datetime = startDate;
                                            } else {
                                                var datetime = startDate + ' to ' + endDate;
                                            }
                                        } else {
                                            if ( wperp.dateFormat( response.start_date, 'Y-m-d' ) == wperp.dateFormat( response.end_date, 'Y-m-d' ) ) {
                                                var datetime = startDate + ' at ' + startTime + ' to ' + endTime;
                                            } else {
                                                var datetime = startDate + ' at ' + startTime + ' to ' + endDate + ' at ' + endTime;
                                            }
                                        }
                                    }

                                    var html = wp.template('erp-crm-single-schedule-details')( { date: datetime, schedule: response } );
                                    $( '.content', modal ).html( html );
                                    $( '.loader', modal).remove();

                                    $('.erp-tips').tipTip( {
                                        defaultPosition: "top",
                                        fadeIn: 100,
                                        fadeOut: 100,
                                    } );

                                },

                                error: function( response ) {
                                    alert(response);
                                }

                            });
                        }
                    });
                },

            });
        });
    </script>
    <?php
}

/**
 * Latest contact widget in crm dashboard
 *
 * @since 1.0
 *
 * @return html|void
 */
function erp_crm_dashboard_widget_latest_contact() {
    $contacts  = erp_get_peoples( [ 'type' => 'contact', 'orderby' => 'created', 'order' => 'DESC', 'number' => 5 ] );
    $companies = erp_get_peoples( [ 'type' => 'company', 'orderby' => 'created', 'order' => 'DESC', 'number' => 5 ] );
    ?>

    

    <h4><?php _e( 'Companies', 'erp' ); ?></h4>

    <?php if ( $companies ) { ?>
        <ul class="erp-list erp-latest-contact-list">
            <?php foreach ( $companies as $company ) : ?>
                <?php $company_obj = new WeDevs\ERP\CRM\Contact( intval( $company->id ) ) ?>
                <li>
                    <div class="avatar">
                        <?php echo $company_obj->get_avatar(28); ?>
                    </div>

                    <div class="details">
                        <p class="contact-name"><a href="<?php echo $company_obj->get_details_url(); ?>"><?php echo $company_obj->get_full_name(); ?></a></p>
                    
                    </div>
                    <span class="contact-created-time erp-tips" title="<?php echo sprintf( '%s %s', __( 'Created on', 'erp' ), erp_format_date( $company->created ) )  ?>"><i class="fa fa-clock-o"></i></span>
                </li>
            <?php endforeach ?>
        </ul>
    <?php
    } else {
        _e( 'Tidak ditemukan', 'erp' );
    }
}

/**
 * CRM Dashboard Inbound Emails widget.
 *
 * @since 1.0
 *
 * @return void [html]
 */
function erp_crm_dashboard_widget_inbound_emails() {
    $total_emails_count = get_option( 'wp_erp_inbound_email_count', 0 );
    echo '<h1 style="text-align: center;">' . $total_emails_count . '</h1>';
}
