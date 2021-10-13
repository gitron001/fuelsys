<?php

return [
    'menu' => [
        'company'                       => 'Company',
        'tank'                          => 'Tank',
        'transaction'                   => 'Transactions',
        'products'                      => 'Products',
        'dispanesers'                   => 'Dispenesers',
        'branches'                      => 'Branches',
        'users'                         => 'Users',
        'payments'                      => 'Payments',
        'pfc'                           => 'PFC',
        'home'                          => 'Home',
        'settings'                      => 'Settings',
        'report'                        => 'Reports',
        'products_group'                => 'Products Group',
        'staff'                         => 'Staff',
        'stock'                         => 'Stock',
        'nozzle'                        => 'Nozzle',
        'expenses'                      => 'Expenses',
        'totalizers'                    => 'Totalizers',
        'invoices'                      => 'Invoices',
        'banks'                         => 'Banks',
    ],

    'company_details' => [
        'create_new'        => 'Create new company',
        'edit'              => 'Edit company',
        'delete_all'        => 'Delete all selected companies',
    ],
    'company_fields' => [
        'has_receipt'       => 'Receipt',
        'has_receipt_number'=> 'Receipt number',
        'has_limit'         => 'Limit',
        'starting_balance'  => 'Starting balance',
        'on_transaction'    => 'On Transaction',
        'monthly_report'    => 'Monthly report',
        'daily_at'          => 'Daily at',
        'discounts'         => 'Discounts',
        'send_email'        => 'Send Email',
    ],

    'tank_details' => [
        'create_new'    => 'Create new tank',
        'edit'          => 'Edit tank',
        'delete_all'    => 'Delete all selected tanks',
        'alarm_email_water_level' => 'Send email about the high water level in the tank',
        'high_level_water'  => 'High level water',
        'current_level_water' => 'Current level water'
    ],
    'tank_fields' => [
        'excel_file'    => 'Excel file',
    ],

    'transactions_details' => [
        'name'                  => 'Transactions',
        'from_last_payment'     => 'From last payment',
        'inc_transactions'      => 'Inc transactions',
        'exc_balance'           => 'Exc balance',
        'all_day'               => 'All day',
        'bonus_driver_card'     => 'Bonus/Driver card',
        'edit'                  => 'Edit transaction',
        'transaction_history'   => 'Transaction history',
        'prev_user'             => 'Previous user',
        'current_user'          => 'Current user',
        'updated_by'            => 'Updated by',
        'nothing_to_show'       => 'This transaction has never been changed.'
    ],
    'transactions_pdf' => [
        'report'            => 'REPORT',
        'location'          => 'Location',
        'email'             => 'Email',
        'tel'               => 'Phone',
        'nr_biz'            => 'Nr. Biz',
        'tax_nr'            => 'Tax. Nr',
        'nr_fis'            => 'Nr. Fis',
        'selected_dates'    => 'Selected dates for data presentation',
        'products'          => 'PRODUCT',
        'quantity'          => 'QUANTITY',
        'total'             => 'TOTAL',
        'date'              => 'DATE',
        'type'              => 'TYPE',
        'user'              => 'USER',
        'bonus_user'        => 'BONUS USER',
        'price'             => 'PRICE',
        'payment'           => 'PAYMENT',
        'state'             => 'state',
    ],

    'product_details' => [
        'create_new'        => 'Create new product',
        'edit'              => 'Edit product',
        'delete_all'        => 'Delete all selected products',
    ],

    'banks_details' => [
        'create_new'        => 'Create new bank',
        'edit'              => 'Edit bank',
        'delete_all'        => 'Delete all selected banks',
    ],

    'product_group_details' => [
        'create_new'        => 'Create new product group',
        'edit'              => 'Edit product group',
        'delete_all'        => 'Delete all selected products group',
    ],

    'dispensers_details' => [
        'create_new'    => 'Create new dispenser',
        'edit'          => 'Edit dispenser',
        'delete_all'    => 'Delete all selected dispanesers',
    ],
    'dispensers_fields' => [
        'price_division'    => 'Price division',
        'money_division'    => 'Money division',
        'liter_division'    => 'Liter division',
    ],

    'branches_details' => [
        'create_new'    => 'Create new branch',
        'edit'          => 'Edit branch',
        'delete_all'    => 'Delete all selected branches',
    ],

    'users_details' => [
        'one_time_limit'    => 'One time limit',
        'plates'            => 'Plates',
        'vehicle'           => 'Vehicle',
        'create_new'        => 'Create new user',
        'edit'              => 'Edit user',
        'delete_all'        => 'Delete all selected users',
    ],
    'users_fields' => [
        'rfid'              => 'RFID(Card number)',
        'has_limit'         => 'Has limit',
        'one_time_limit'    => 'One time limit',
        'contact_number'    => 'Contact number',
        'application_date'  => 'Application date',
        'residence'         => 'Residence',
        'plates'            => 'Plates',
        'send_email'        => 'Send email',
        'on_transaction'    => 'On transaction',
        'add_discount'      => 'Add discount',
        'starting_balance'  => 'Starting balance',
        'limit'             => 'Limit'
    ],

    'payments_details' => [
        'created_by'    => 'Created by',
        'create_new'    => 'Create new payment',
        'edit'          => 'Edit payment',
        'create_multiple'=> 'Multiple',
        'create_multiple_txt' => 'Create multiple payments',
        'delete_all'    => 'Delete all selected payments',
    ],
    'payments_fields' => [
        'company_user'  => 'Company / User',
        'print_bill'    => 'Print the bill',
        'add_payment'   => 'Add payment',
    ],

    'pfc_details' => [
        'create_new'    => 'Create new PFC',
        'edit'          => 'Edit PFC',
        'delete_all'    => 'Delete all selected PFC',
        'import_prices' => 'Import prices',
        'upload_prices' => 'Upload prices',
        'import_channel'=> 'Import channels',
        'start_pfc'     => 'Start PFC',
        'stop_pfc'      => 'Stop PFC',
    ],

    'stock_details' => [
        'tank_product'  => 'Tank | Product',
        'create_new'    => 'Create new stock',
        'edit'          => 'Edit stock',
        'delete_all'    => 'Delete all selected stocks',
    ],
    'stock_fields' => [
        'select_tank'   => 'Select tank',
    ],

    'nozzle_details' => [
        'starting_totalizer'=> 'Starting Totalizer',
        'delete_all'        => 'Delete all selected nozzle',
    ],

    'expenses_details' => [
        'created_by'    => 'Created by',
        'create_new'    => 'Create new expenses',
        'edit'          => 'Edit expense',
        'delete_all'    => 'Delete all selected expenses',
    ],

    'staff_details' => [
        'totalizers'            => 'Totalizers',
        'date_range'            => 'Date range',
        'totalizator'           => 'Totalizotor',
        'quantity_with_numbers' => 'Quantity with numbers',
        'average'               => 'Average',
        'report'                => 'REPORT',
        'selected_date'         => 'Selected date',
        'products_by_price'     => 'Products by price'
    ],

    'settings_details' => [
        'running_process'   => 'Running process',
        'starting_balance'  => 'Starting balance',
        'printer_ip'        => 'Printer IP',
        'print_transaction' => 'Print transactions',
        'transaction_file_location' => 'Transaction file location',
        'hide_views'        => 'Hide all view(Show only login)',
        'show_transactions_if_loggedin' => 'Displays transactions if the user has not logged in',
        'photo'             => 'Photo',
        'start_time'        => 'Start time',
        'refresh_time'      => 'Refresh time',
        'transactions_date' => 'Transactions Date',
    ],

    // GLOBAL
    'change_language'   => 'Change language',
    'name'              => 'Name',
    'surname'           => 'Surname',
    'bis_number'        => 'Bussines number',
    'tax_number'        => 'Tax number',
    'res_number'        => 'Res number',
    'company'           => 'Company',
    'companies'         => 'Companies',
    'fis_number'        => 'Fiscal number',
    'tel_number'        => 'Phone',
    'contact_person'    => 'Contact person',
    'limit_left'        => 'Limit left',
    'email'             => 'Email',
    'password'          => 'Password',
    'address'           => 'Address',
    'city'              => 'City',
    'country'           => 'Country',
    'limits'            => 'Limits',
    'photo'             => 'Photo',
    'status'            => 'Status',
    'created_at'        => 'Created at',
    'updated_at'        => 'Updated at',
    'options'           => 'Options',
    'edit'              => 'Edit',
    'delete'            => 'Delete',
    'discounts'         => 'Discounts',
    'product'           => 'Product',
    'products'          => 'Products',
    'capacity'          => 'Capacity',
    'start_date'        => 'Start date',
    'end_date'          => 'End date',
    'user'              => 'User',
    'bonus_user'        => 'Bonus user',
    'price'             => 'Price',
    'prices'            => 'Prices',
    'lit'               => 'Quantity',
    'total'             => 'Total',
    'state_code'        => 'State Code',
    'dispenser'         => 'Dispenser',
    'dispensers'        => 'Dispensers',
    'branch'            => 'Branch',
    'branches'          => 'Branches',
    'users'             => 'Users',
    'type'              => 'Type',
    'rfid'              => 'RFID',
    'payments'          => 'Payments',
    'date'              => 'Date',
    'amount'            => 'Amount',
    'ip'                => 'IP',
    'port'              => 'Port',
    'channels'          => 'Channels',
    'nozzle'            => 'Nozzle',
    'tank'              => 'Tank',
    'expenses'          => 'Expenses',
    'shift'             => 'Shift',
    'quantity'          => 'Quantity',
    'change'            => 'Change',
    'staff'             => 'Staff',
    'settings'          => 'Settings',
    'phone'             => 'Phone',
    'transactions'      => 'Transactions',
    'save'              => 'Save',
    'cancel'            => 'Cancel',
    'search'            => 'Search',
    'generate_bill'     => 'Generate bill',
    'fill'              => 'Fill',
    'state'             => 'State',
    'history'           => 'History',
    'created_by'        => 'Created by',
    'invoices'          => 'Invoices',
    'invoice'           => 'Invoice',
    'paid'              => 'Paid',
    'unpaid'            => 'Unpaid',
    'view'              => 'View',
    'banks'             => 'Banks',
    'bank_number'       => 'Account number',
    'price_without_tax' => 'Price without tax',
    'tax'               => 'Tax',
    'total_with_tax'    => 'Total',
    'taxable_value'     => 'Taxable Value',
    'print_invoice'     => 'Print Invoice',
    'comment'           => 'Comment',
    'signature'         => 'Signature',
    'seal'              => 'Seal',
    'water_level'       => 'Water level',
    'fuel_level'        => 'Fuel level',
    'reference_number'  => 'Reference number',
    'start_stop'        => 'Start/Stop',
    'api'               => 'API',
    'add_product'       => 'Add product',
    'addedd_stock'      => 'Addedd Stock',
    'total_before_shift_open'       => 'Total stock before opening shift',
    'retype_password'               => 'Retype password',
    'remember_me'                   => 'Remember Me',
    'register'                      => 'Register',
    'register_a_new_membership'     => 'Register a new membership',
    'i_forgot_my_password'          => 'I forgot my password',
    'i_already_have_a_membership'   => 'I already have a membership',
    'sign_in'                       => 'Sign In',
    'log_out'                       => 'Log Out',
    'toggle_navigation'             => 'Toggle navigation',
    'login_message'                 => 'Sign in to start your session',
    'register_message'              => 'Register a new membership',
    'password_reset_message'        => 'Reset Password',
    'reset_password'                => 'Reset Password',
    'send_password_reset_link'      => 'Send Password Reset Link',
    'new'                           => 'New',
    'delete'                        => 'Delete',
    'selected_date_to_show_data'    => 'Selected dates for data submisson',
    'payment_due_in_30_days'        => 'Payment due in 30 days',
    'invoice_number_payment_method' => 'Please note the invoice number in your payment method',
];
