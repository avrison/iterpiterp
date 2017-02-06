<div class="wrap erp crm-dashboard">
    <h2><?php _e( 'CRM & Realtime Sales Pipeline GPS GROUP', 'erp' ); ?></h2>

    <div class="erp-single-container">

        <div class="erp-area-left">

                <div class="erp-grid-container badge-container">
                    <?php
                        $contacts_count  = erp_crm_customer_get_status_count( 'contact' );
                        $companies_count = erp_crm_customer_get_status_count( 'company' );
                    ?>
                    <div class="row">

<div class="col-3 badge-wrap">
                            <div class="row">
                                <div class="badge-inner total-counter col-2">
                                    <h3><?php echo number_format_i18n( $companies_count['all']['count'], 0 ); ?></h3>
                                    <p>
                                        <?php echo sprintf( _n( 'Company', 'Companies', $companies_count['all']['count'], 'erp' ), number_format_i18n( $companies_count['all']['count'] ), 0 ); ?>
                                    </p>
                                </div>

                                <div class="badge-inner col-3">
                                    <ul class="erp-dashboard-total-counter-list">
                                        <?php
                                        foreach ( $companies_count as $company_key => $company_value ) {
                                            if ( $company_key == 'all' || $company_key == 'trash' ) {
                                                continue;
                                            }
                                            ?>
                                            <li>
                                                <a href="<?php echo add_query_arg( [ 'page' => 'erp-sales-companies', 'status' => $company_key ], admin_url( 'admin.php' ) ); ?>">
                                                    <?php
                                                        if ( $company_key == 'customer' ) {
                                                            echo sprintf( _n( '%s Project Jalan', '%s Project Jalan', $coampany_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        } else if ( $company_key == 'opportunity' ) {
                                                            echo sprintf( _n( '%s Negoisasi', '%s Negoisasi', $company_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        } elseif( $company_key == 'subscriber' ) {
                                                            echo sprintf( _n( '%s Send Proposal', '%s Send Proposal', $company_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        } elseif( $company_key == 'subscribero' ) {
                                                            echo sprintf( _n( '%s Send Compro / Meeting', '%s Send Compro/ Meeting', $company_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        } else {
                                                            echo sprintf( _n( '%s PKS / PO signed', '%s PKS / PO signed', $company_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        }
                                                    ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div>
                            <div class="badge-footer wp-ui-highlight">
                                <a href="<?php echo admin_url( 'admin.php?page=erp-sales-companies' ); ?>"><?php _e( 'Lihat Semua Companies', 'erp' ); ?></a>
                            </div>
                        </div><!-- .badge-wrap -->
                        <div class="col-3 badge-wrap">
                            <div class="row">
                                <div class="badge-inner total-counter col-2">
                                    <h3><?php echo number_format_i18n( $companies_count['all']['count'], 0 ); ?></h3>
                                    <p>
                                        <?php echo sprintf( _n( 'Company', 'Companies', $companies_count['all']['count'], 'erp' ), number_format_i18n( $companies_count['all']['count'] ), 0 ); ?>
                                    </p>
                                </div>

                                <div class="badge-inner col-3">
                                    <ul class="erp-dashboard-total-counter-list">
                                        <?php
                                        foreach ( $companies_count as $company_key => $company_value ) {
                                            if ( $company_key == 'all' || $company_key == 'trash' ) {
                                                continue;
                                            }
                                            ?>
                                            <li>
                                                <a href="<?php echo add_query_arg( [ 'page' => 'erp-sales-companies', 'status' => $company_key ], admin_url( 'admin.php' ) ); ?>">
                                                    <?php
                                                        if ( $company_key == 'customer' ) {
                                                            echo sprintf( _n( '%s Project Jalan', '%s Project Jalan', $coampany_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        } else if ( $company_key == 'opportunity' ) {
                                                            echo sprintf( _n( '%s Negoisasi', '%s Negoisasi', $company_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        } elseif( $company_key == 'subscriber' ) {
                                                            echo sprintf( _n( '%s Send Proposal', '%s Send Proposal', $company_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        } elseif( $company_key == 'subscribero' ) {
                                                            echo sprintf( _n( '%s Send Compro / Meeting', '%s Send Compro/ Meeting', $company_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        } else {
                                                            echo sprintf( _n( '%s PKS / PO signed', '%s PKS / PO signed', $company_value['count'], 'erp' ), number_format_i18n( $company_value['count'] ), 0 );
                                                        }
                                                    ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div>
                            <div class="badge-footer wp-ui-highlight">
                                <a href="<?php echo admin_url( 'admin.php?page=erp-sales-companies' ); ?>"><?php _e( 'Lihat Semua Companies', 'erp' ); ?></a>
                            </div>
                        </div><!-- .badge-wrap -->
                    </div>
                </div><!-- .badge-container -->

            <?php do_action( 'erp_crm_dashboard_widgets_left' ); ?>

        </div><!-- .erp-area-left -->

        <div class="erp-area-right">
            <?php do_action( 'erp_crm_dashboard_widgets_right' ); ?>
        </div>

    </div>
</div>
