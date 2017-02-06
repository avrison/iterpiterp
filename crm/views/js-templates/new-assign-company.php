<div class="crm-customer-assign-company-wrap">

    <# if ( data.type == 'assign_company' ) { #>

        <div class="row">
            <label for="erp-select-customer-company"><?php _e( 'Nama Company', 'erp' ); ?> <span class="required">*</span></label>
            <select style="width:240px;" name="erp_assign_company_id" id="erp-select-customer-company" required="required" data-types="company" class="erp-crm-contact-list-dropdown" data-placeholder="<?php _e( 'Select a company', 'erp' )?>">
                <option value=""><?php _e( 'Pilih Company', 'erp' ); ?></option>
            </select>
        </div>

    <# } else if ( data.type == 'assign_customer' ) { #>
        <div class="row">
            <label for="erp-select-customer-company"><?php _e( 'Nama Kontak', 'erp' ); ?> <span class="required">*</span></label>
            <select style="width:240px;" name="erp_assign_customer_id" id="erp-select-customer-company" required="required" data-types="contact" class="erp-crm-contact-list-dropdown" data-placeholder="<?php _e( 'Select a Contact', 'erp' )?>">
                <option value=""><?php _e( 'Pilih Kontak', 'erp' ); ?></option>
            </select>
        </div>
    <# } #>

    <?php wp_nonce_field( 'wp-erp-crm-assign-customer-company-nonce' ); ?>

    <input type="hidden" name="action" value="erp-crm-customer-add-company">
    <input type="hidden" name="id" value="{{ data.id }}">
    <input type="hidden" name="assign_type" value="{{ data.type }}">
</div>
