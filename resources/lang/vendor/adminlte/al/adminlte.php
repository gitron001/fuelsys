<?php

return [
    'menu' => [
        'company'                       => 'Kompania',
        'tank'                          => 'Rezervuari',
        'transaction'                   => 'Transaksionet',
        'products'                      => 'Produktet',
        'dispanesers'                   => 'Pompat',
        'branches'                      => 'Degët',
        'users'                         => 'Përdoruesit',
        'pfc'                           => 'PFC',
        'home'                          => 'Ballina',
        'payments'                      => 'Pagesat',
        'staff'                         => 'Stafi',
        'stock'                         => 'Stoku',
        'report'                        => 'Raportet',
        'nozzle'                        => 'Dorëzat',
        'products_group'                => 'Grupi i produkteve',
        'settings'                      => 'Preferencat',
        'expenses'                      => 'Shpenzimet',
        'totalizers'                    => 'Totalizerët',
    ],

    'company_details' => [
        'create_new'        => 'Krijo një kompani të re',
        'edit'              => 'Ndrysho kompaninë',
        'delete_all'        => 'Fshini të gjitha kompanitë e zgjedhura',
    ],
    'company_fields' => [
        'has_receipt'       => 'Faturë',
        'has_receipt_number'=> 'Numër faturës',
        'has_limit'         => 'Limit',
        'starting_balance'  => 'Bilanci fillestar',
        'on_transaction'    => 'Dërgo email në çdo transaksion',
        'monthly_report'    => 'Raport mujor',
        'daily_at'          => 'Raport ditor',
        'discounts'         => 'Zbritje',
        'send_email'        => 'Dërgo email',
    ],

    'tank_details' => [
        'create_new'    => 'Krijo një rezervuar të ri',
        'edit'          => 'Ndrysho rezervuarin',
        'delete_all'    => 'Fshini të gjitha rezervuaret e zgjedhura',
        'alarm_email_water_level' => 'Dërgo email për nivelin e lartë të ujit në rezervuar',
        'high_level_water'  => 'Niveli më i lartë i ujit',
        'current_level_water' => 'Niveli aktual i ujit'
    ],
    'tank_fields' => [
        'excel_file'    => 'Excel file',
    ],

    'transactions_details' => [
        'name'                  => 'Transaksionet',
        'from_last_payment'     => 'Nga pagesa e fundit',
        'inc_transactions'      => 'Të gjitha transaksionet',
        'exc_balance'           => 'Përjashto bilancin',
        'all_day'               => 'Gjithë ditën',
        'bonus_driver_card'     => 'Bonus/Shofer kartela',
        'edit'                  => 'Ndrysho transaksionin',
        'transaction_history'   => 'Historia e transaksionit',
        'prev_user'             => 'Përdoruesi i mëparshëm',
        'current_user'          => 'Përdoruesi aktual',
        'updated_by'            => 'Ndryshuar nga',
        'nothing_to_show'       => 'Ky transaksion nuk është ndryshuar asnjëherë.'
    ],
    'transactions_pdf' => [
        'report'            => 'RAPORT',
        'location'          => 'Lokacioni',
        'email'             => 'Email',
        'tel'               => 'Telefoni',
        'nr_biz'            => 'Nr. Biz',
        'tax_nr'            => 'Tax. Nr',
        'nr_fis'            => 'Nr. Fis',
        'selected_dates'    => 'Datat e zgjedhura për paraqitjen e të dhënave',
        'products'          => 'PRODUKTI',
        'quantity'          => 'SASIA',
        'total'             => 'TOTALI',
        'date'              => 'DATA',
        'type'              => 'LLOJI',
        'user'              => 'PERSONI',
        'bonus_user'        => 'BONUS PERSONI',
        'price'             => 'MBUSHJA',
        'payment'           => 'PAGESA',
        'state'             => 'gjendja',
    ],

    'product_details' => [
        'create_new'        => 'Krijo një produkt të ri',
        'edit'              => 'Ndrysho produktin',
        'delete_all'        => 'Fshini të gjitha produktet e zgjedhura',
    ],

    'product_group_details' => [
        'create_new'        => 'Krijo një grup të produkteve',
        'edit'              => 'Ndrysho grupin e produkteve',
        'delete_all'        => 'Fshini të gjitha grupet e produkteve të zgjedhura',
    ],

    'dispensers_details' => [
        'create_new'    => 'Krijo një pomp të re',
        'edit'          => 'Ndrysho pompen',
        'delete_all'    => 'Fshini të gjitha pompat e zgjedhura',
    ],
    'dispensers_fields' => [
        'price_division'    => 'Ndarja e çmimit',
        'money_division'    => 'Ndarja e shumës',
        'liter_division'    => 'Ndarja e litrave',
    ],

    'branches_details' => [
        'create_new'    => 'Krijo një degë të re',
        'edit'          => 'Ndrysho degën',
        'delete_all'    => 'Fshini të gjitha degët e zgjedhura',
    ],

    'users_details' => [
        'one_time_limit'    => 'Limiti një përdorimësh',
        'plates'            => 'Targat',
        'vehicle'           => 'Automjeti',
        'create_new'        => 'Krijo një përdorues të ri',
        'edit'              => 'Ndrysho përdoruesin',
        'delete_all'        => 'Fshini të gjitha përdoruesit e zgjedhur',
    ],
    'users_fields' => [
        'rfid'              => 'RFID(Numri i kartelës)',
        'has_limit'         => 'A ka limit?',
        'one_time_limit'    => 'Limit një përdorimësh',
        'contact_number'    => 'Numri kontaktues',
        'application_date'  => 'Data e aplikimit',
        'residence'         => 'Vendbanimi',
        'plates'            => 'Targat',
        'send_email'        => 'Dërgo email',
        'on_transaction'    => 'Dërgo email në çdo transaksion',
        'add_discount'      => 'Shto zbritje'
    ],

    'payments_details' => [
        'created_by'    => 'Krijuar nga',
        'create_new'    => 'Krijo një pagesë të re',
        'edit'          => 'Ndrysho pagesën',
        'create_multiple'=> 'Krijo disa',
        'create_multiple_txt' => 'Krijo disa pagesa',
        'delete_all'    => 'Fshini të gjitha pagesat e zgjedhura',
    ],
    'payments_fields' => [
        'company_user'  => 'Kompania / Përdoruesi',
        'print_bill'    => 'Printo faturën',
        'add_payment'   => 'Shto pagesa',
    ],

    'pfc_details' => [
        'create_new'    => 'Krijo një PFC të re',
        'edit'          => 'Ndrysho PFC',
        'delete_all'    => 'Fshini të gjitha PFC e zgjedhura',
        'import_prices' => 'Importo çmimet',
        'upload_prices' => 'Ngarko çmimet',
        'import_channel'=> 'Importo kanalet',
        'start_pfc'     => 'Starto PFC',
        'stop_pfc'      => 'Ndalo PFC',
    ],

    'stock_details' => [
        'tank_product'  => 'Rezervuar | Produkti',
        'create_new'    => 'Krijo një rezerv të re',
        'edit'          => 'Ndrysho rezerven',
        'delete_all'    => 'Fshij të gjitha rezervat e zgjedhura',
    ],
    'stock_fields' => [
        'select_tank'   => 'Zgjedhe rezervuarin',
    ],

    'nozzle_details' => [
        'starting_totalizer'=> 'Totalizeri',
        'delete_all'        => 'Fshij të gjitha dorëzat e zgjedhura',
    ],

    'expenses_details' => [
        'created_by'    => 'Krijuar nga',
        'create_new'    => 'Krijo një shpenzim të ri',
        'edit'          => 'Ndrysho shpenzimin',
        'delete_all'    => 'Fshij të gjitha shpenzimet e zgjedhura',
    ],

    'staff_details' => [
        'totalizers'            => 'Totalizerët',
        'date_range'            => 'Intervali kohor',
        'totalizator'           => 'Totalizatori',
        'quantity_with_numbers' => 'Sasia me numra',
        'average'               => 'Mesatarja',
        'report'                => 'RAPORT',
        'selected_date'         => 'Data e zgjedhur',
        'products_by_price'     => 'Produktet në bazë të çmimit'
    ],

    'settings_details' => [
        'running_process'   => 'Procesi',
        'starting_balance'  => 'Bilanci fillestar',
        'printer_ip'        => 'IP e printerit',
        'print_transaction' => 'Printo transaksionet',
        'transaction_file_location' => 'Lokacioni i filet të transaksioneve',
        'hide_views'        => 'Largo të gjitha dritaret(Shfaq vetëm login)',
        'show_transactions_if_loggedin' => 'Shfaq transaksionet nëse përdoruesi nuk është bërë login',
        'start_time'        => 'Koha e fillimit',
        'refresh_time'      => 'Koha e azhurnimit',
        'transactions_date' => 'Data e transaksioneve',
    ],

    // GLOBAL
    'change_language'   => 'Ndrysho gjuhën',
    'name'              => 'Emri',
    'surname'           => 'Mbiemri',
    'bis_number'        => 'Numri biznesit',
    'tax_number'        => 'Numri tax',
    'res_number'        => 'Numri res',
    'company'           => 'Kompania',
    'companies'         => 'Kompanitë',
    'fis_number'        => 'Numri fiskal',
    'tel_number'        => 'Telefoni',
    'contact_person'    => 'Personi kontaktues',
    'limit_left'        => 'Limiti i mbetur',
    'email'             => 'Email',
    'password'          => 'Fjalëkalimi',
    'address'           => 'Adresa',
    'city'              => 'Qyteti',
    'country'           => 'Shteti',
    'limits'            => 'Limiti',
    'photo'             => 'Foto',
    'status'            => 'Statusi',
    'created_at'        => 'Krijuar',
    'updated_at'        => 'Azhurnuar',
    'options'           => 'Opsionet',
    'edit'              => 'Ndrysho',
    'delete'            => 'Fshij',
    'discounts'         => 'Zbritjet',
    'product'           => 'Produkti',
    'products'          => 'Produktet',
    'capacity'          => 'Kapaciteti',
    'start_date'        => 'Data e fillimit',
    'end_date'          => 'Data e përfundimit',
    'user'              => 'Përdoruesi',
    'bonus_user'        => 'Bonus përdoruesi',
    'price'             => 'Çmimi',
    'prices'            => 'Çmimet',
    'lit'               => 'Sasia',
    'total'             => 'Totali',
    'pfc'               => 'PFC',
    'vat'               => 'VAT',
    'product_group'     => 'Grupi produkteve',
    'state_code'        => 'Kodi shtetëror',
    'dispenser'         => 'Pompa',
    'dispensers'        => 'Pompat',
    'branch'            => 'Dega',
    'branches'          => 'Degët',
    'type'              => 'Tipi',
    'users'             => 'Përdoruesit',
    'rfid'              => 'RFID',
    'payments'          => 'Pagesat',
    'date'              => 'Data',
    'amount'            => 'Shuma',
    'description'       => 'Përshkrimi',
    'ip'                => 'IP',
    'port'              => 'Porti',
    'channels'          => 'Kanalet',
    'stock'             => 'Rezervat',
    'nozzle'            => 'Dorëzat',
    'tank'              => 'Rezervuari',
    'expenses'          => 'Shpenzimet',
    'shift'             => 'Ndërrimi',
    'quantity'          => 'Sasia',
    'change'            => 'Ndryshimi',
    'staff'             => 'Stafi',
    'settings'          => 'Preferencat',
    'phone'             => 'Telefoni',
    'transactions'      => 'Transaksionet',
    'save'              => 'Ruaj',
    'cancel'            => 'Anulo',
    'search'            => 'Kërko',
    'generate_bill'     => 'Gjenero faturë',
    'new'               => 'Krijo',
    'delete'            => 'Fshij',
    'fill'              => 'Mbushja',
    'state'             => 'Gjendja',
    'history'           => 'Historia',
    'created_by'        => 'Krijuar nga',
    'retype_password'               => 'Rishkruaj fjalëkalimin',
    'remember_me'                   => 'Më mbaj mend',
    'register'                      => 'Regjistrohu',
    'register_a_new_membership'     => 'Regjistro një anëtarësim të ri',
    'i_forgot_my_password'          => 'Kam harruar fjalëkalimin',
    'i_already_have_a_membership'   => 'Unë tashmë kam një anëtarësim',
    'sign_in'                       => 'Kyçu',
    'log_out'                       => 'Dil',
    'toggle_navigation'             => 'Toggle navigation',
    'login_message'                 => 'Kyçuni për të filluar sesionin tuaj',
    'register_message'              => 'Regjistro një anëtarësim të ri',
    'password_reset_message'        => 'Rikthe fjalëkalimin',
    'reset_password'                => 'Rikthe fjalëkalimin',
    'send_password_reset_link'      => 'Dërgo linkun për rikthim të fjalëkalimit',
    'selected_date_to_show_data'    => 'Datat e zgjedhura për paraqitjen e të dhënave',
];
