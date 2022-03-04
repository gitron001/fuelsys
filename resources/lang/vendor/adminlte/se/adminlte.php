<?php

return [
    'menu' => [
        'company'                       => 'Kompanija',
        'tank'                          => 'Tank',
        'transaction'                   => 'Transakcije',
        'products'                      => 'Proizvodi',
        'dispanesers'                   => 'Pumpe',
        'branches'                      => 'Podružnice',
        'users'                         => 'Korisnik',
        'pfc'                           => 'PFC',
        'home'                          => 'Kuća',
        'payments'                      => 'Plaćanja',
        'staff'                         => 'Štab',
        'stock'                         => 'Akcija',
        'report'                        => 'Izveštaji',
        'nozzle'                        => 'Rukavice',
        'products_group'                => 'Grupa proizvoda',
        'settings'                      => 'Postavke',
        'expenses'                      => 'Izdatak',
        'totalizers'                    => 'Totalizeret',
        'invoices'                      => 'Računi',
        'banks'                         => 'Banke',
        'pos_sales'                     => 'POS prodaja',
    ],

    'company_details' => [
        'create_new'        => 'Napravite novu kompaniju',
        'edit'              => 'Promenite kompaniju',
        'delete_all'        => 'Izbrišite sve izabrane kompanije',
    ],
    'company_fields' => [
        'has_receipt'       => 'Račun',
        'has_receipt_number'=> 'Broj fakture',
        'has_limit'         => 'Limit',
        'starting_balance'  => 'Početni bilans stanja',
        'on_transaction'    => 'Pošaljite e-poštu o svakoj transakciji',
        'monthly_report'    => 'Mesečni izveštaj',
        'daily_at'          => 'Dnevni izveštaj',
        'discounts'         => 'Popust',
        'send_email'        => 'Šalji imejl',
        'display_users_by_plates' => 'Prikaži po trošku korisnika',
    ],

    'tank_details' => [
        'create_new'    => 'Napravite novi rezervoar',
        'edit'          => 'Promenite rezervoar',
        'delete_all'    => 'Izbrišite sve izabrane rezervoare',
        'alarm_email_water_level' => 'Pošaljite e-poštu o visokom nivou vode u rezervoaru',
        'high_level_water'  => 'Viši nivo vode',
        'current_level_water' => 'Trenutni nivo vode'
    ],
    'tank_fields' => [
        'excel_file'    => 'Excel file',
    ],

    'transactions_details' => [
        'name'                  => 'Transakcije',
        'from_last_payment'     => 'Od poslednje uplate',
        'inc_transactions'      => 'Sve transakcije',
        'exc_balance'           => 'Izuzmi ravnotežu',
        'all_day'               => 'Ceo dan',
        'bonus_driver_card'     => 'Bonus/Vozačka kartica',
        'driver_card'           => 'Vozačka kartica',
        'edit'                  => 'Promenite transakciju',
        'transaction_history'   => 'Istorija e transakcije',
        'prev_user'             => 'Prethodni korisnik',
        'current_user'          => 'Trenutni korisnik',
        'updated_by'            => 'Modifikovana',
        'nothing_to_show'       => 'Ova transakcija nikada nije promenjena.'
    ],
    'transactions_pdf' => [
        'report'            => 'IZVEŠTAJ',
        'location'          => 'Lokacija',
        'email'             => 'Email',
        'tel'               => 'Telefon',
        'nr_biz'            => 'Nr. Biz',
        'tax_nr'            => 'Tax. Nr',
        'nr_fis'            => 'Nr. Fis',
        'selected_dates'    => 'Datumi odabrani za predaju podataka',
        'products'          => 'PROIZVODA',
        'quantity'          => 'KOLICINA',
        'total'             => 'UKUPNO',
        'date'              => 'DATUM',
        'type'              => 'POSAO',
        'user'              => 'KORISNIK',
        'bonus_user'        => 'BONUS KORISNIK',
        'price'             => 'CENA',
        'payment'           => 'PAI',
        'state'             => 'stanje',
    ],

    'product_details' => [
        'create_new'        => 'Napravite novu proizvod',
        'edit'              => 'Promenite proizvod',
        'delete_all'        => 'Izbrišite sve izabrane proizvode',
    ],

    'banks_details' => [
        'create_new'        => 'Napravite novu banku',
        'edit'              => 'Promenite banku',
        'delete_all'        => 'Izbrišite sve izabrane banke',
    ],

    'pos_payment_details' => [
        'create_new'        => 'Kreirajte novu uplatu',
        'edit'              => 'Izmenite plaćanje',
        'delete_all'        => 'Izbrišite sva izabrana plaćanja',
    ],

    'product_group_details' => [
        'create_new'        => 'Napravite skup proizvoda',
        'edit'              => 'Promenite grupu proizvoda',
        'delete_all'        => 'Izbrišite sve izabrane grupe proizvoda',
    ],

    'dispensers_details' => [
        'create_new'    => 'Napravite novu pumpu',
        'edit'          => 'Promenite pumpu',
        'delete_all'    => 'Obrišite sve odabrane pumpe',
    ],
    'dispensers_fields' => [
        'price_division'    => 'Podjela cena',
        'money_division'    => 'Podelite iznos',
        'liter_division'    => 'Odvajanje litara',
    ],

    'branches_details' => [
        'create_new'    => 'Napravite novu granu',
        'edit'          => 'Promenite granu',
        'delete_all'    => 'Izbrišite sve izabrane grane',
    ],

    'users' => [
        'one_time_limit'    => 'Ograničenje za jednokratnu upotrebu',
        'plates'            => 'Ploče',
        'vehicle'           => 'Vozilo',
        'create_new'        => 'Napravite novog korisnika',
        'edit'              => 'Promenite korisnika',
        'delete_all'        => 'Izbriši sve izabrane korisnike',
    ],
    'users_fields' => [
        'rfid'              => 'RFID(Broj kartice)',
        'has_limit'         => 'Postoji li ograničenje?',
        'one_time_limit'    => 'Ograničenje za jednokratnu upotrebu',
        'contact_number'    => 'Kontakt broj',
        'application_date'  => 'Datum podnošenja zahteva',
        'residence'         => 'Poravnanje',
        'plates'            => 'Staza',
        'send_email'        => 'Šalji imejl',
        'on_transaction'    => 'Pošaljite e-poštu o svakoj transakciji',
        'add_discount'      => 'Dodajte popust',
        'starting_balance'  => 'Početni bilans stanja',
        'limit'             => 'Ograničenja'
    ],

    'payments_details' => [
        'created_by'    => 'Created bi',
        'create_new'    => 'Napravite novu uplatu',
        'edit'          => 'Promenite uplatu',
        'create_multiple'=> 'Napravite neke',
        'create_multiple_txt' => 'Napravite neke uplate',
        'delete_all'    => 'Izbrišite sve izabrane uplate',
    ],
    'payments_fields' => [
        'company_user'  => 'Kompanija / Korisnik',
        'print_bill'    => 'Odštampajte račun',
        'add_payment'   => 'Dodajte uplatu',
    ],

    'pfc_details' => [
        'create_new'    => 'Napravite novi PFC',
        'edit'          => 'Promenite PFC',
        'delete_all'    => 'Izbriši sve izabrane PFC',
        'import_prices' => 'Uvozne cene',
        'upload_prices' => 'Otpremite cene',
        'import_channel'=> 'Uvezi kanale',
        'start_pfc'     => 'Pokrenite PFC',
        'stop_pfc'      => 'Zaustaviti PFC',
    ],

    'stock_details' => [
        'tank_product'  => 'Rezervoar | Proizvoda',
        'create_new'    => 'Napravite novu rezervnu kopiju',
        'edit'          => 'Promenite rezervnu',
        'delete_all'    => 'Izbrišite sve izabrane zalihe',
    ],
    'stock_fields' => [
        'select_tank'   => 'Izaberite rezervoar',
    ],

    'nozzle_details' => [
        'starting_totalizer'=> 'Totalizer',
        'delete_all'        => 'Obrišite sve odabrane mlaznice',
    ],

    'expenses_details' => [
        'created_by'    => 'Created bi',
        'create_new'    => 'Napravite novi trošak',
        'edit'          => 'Promenite troškove',
        'delete_all'    => 'Izbrišite sve izabrane troškove',
    ],

    'staff_details' => [
        'totalizers'            => 'Totalizatori',
        'date_range'            => 'Vremenski intervali',
        'totalizator'           => 'Totalizator',
        'quantity_with_numbers' => 'Količina sa brojevima',
        'average'               => 'Prosek',
        'report'                => 'IZVEŠTAJ',
        'selected_date'         => 'Datum odabran',
        'products_by_price'     => 'Proizvodi zasnovani na ceni'
    ],

    'settings_details' => [
        'running_process'   => 'Proces',
        'starting_balance'  => 'Početni bilans stanja',
        'printer_ip'        => 'IP štampača',
        'print_transaction' => 'Štampanje transakcija',
        'transaction_file_location' => 'Lokacija datoteke transakcije',
        'hide_views'        => 'Ukloni sve prozore (prikaži samo prijavu)',
        'show_transactions_if_loggedin' => 'Prikazuje transakcije ako se korisnik nije prijavio',
        'start_time'        => 'Početno vreme',
        'refresh_time'      => 'Ažuriraj vreme',
        'transactions_date' => 'Datum transakcija',
    ],

    // GLOBAL
    'change_language'   => 'Promenite jezik',
    'name'              => 'Ime',
    'surname'           => 'Poslednja',
    'bis_number'        => 'Poslovni broj',
    'tax_number'        => 'Poreski broj',
    'res_number'        => 'Res broj',
    'company'           => 'Kompanija',
    'companies'         => 'Kompanije',
    'fis_number'        => 'Fiskalni broj',
    'tel_number'        => 'Telefonija',
    'contact_person'    => 'Kontakt osoba',
    'limit_left'        => 'Preostalo ograničenje',
    'email'             => 'Email',
    'password'          => 'Lozinka',
    'address'           => 'Adresa',
    'city'              => 'Grad',
    'country'           => 'Countri',
    'limits'            => 'Granica',
    'photo'             => 'Slika',
    'status'            => 'Status',
    'created_at'        => 'Stvoreno',
    'updated_at'        => 'Ažuriranje',
    'options'           => 'Opcije',
    'edit'              => 'Urediti',
    'delete'            => 'Trljati',
    'discounts'         => 'Odbitci',
    'description'       => 'Opis',
    'product'           => 'Proizvod',
    'products'          => 'Proizvod',
    'capacity'          => 'Kapacitet',
    'start_date'        => 'Datum početka',
    'end_date'          => 'Datum završetka',
    'user'              => 'Korisnik',
    'bonus_user'        => 'Bonus korisnik',
    'price'             => 'Cena',
    'prices'            => 'Cene',
    'lit'               => 'Iznos',
    'total'             => 'Ukupno',
    'state_code'        => 'Državni zakonik',
    'dispenser'         => 'Pumpe',
    'dispensers'        => 'Pumped',
    'branch'            => 'Grana',
    'branches'          => 'Podružnice',
    'users'             => 'Korisnik',
    'type'              => 'Tip',
    'rfid'              => 'RFID',
    'payments'          => 'Plaćanja',
    'date'              => 'Datum',
    'amount'            => 'Iznosi',
    'ip'                => 'IP',
    'port'              => 'Port',
    'channels'          => 'Kanali',
    'nozzle'            => 'Rukavice',
    'tank'              => 'Tank',
    'expenses'          => 'Izdatak',
    'shift'             => 'Prebacivanje',
    'quantity'          => 'Iznos',
    'change'            => 'Promena',
    'staff'             => 'Štab',
    'settings'          => 'Postavke',
    'phone'             => 'Telefon',
    'transactions'      => 'Transakcije',
    'save'              => 'Sačuvati',
    'cancel'            => 'Prsten',
    'search'            => 'Pretraga',
    'generate_bill'     => 'Generišite fakturu',
    'fill'              => 'Napuniti',
    'state'             => 'Stanje',
    'history'           => 'Istorija',
    'created_by'        => 'Created bi',
    'invoices'          => 'Računi',
    'invoice'           => 'BR.RACUNA',
    'paid'              => 'Platiti',
    'unpaid'            => 'Neplaćeno',
    'view'              => 'Gledaj',
    'banks'             => 'Banke',
    'bank_number'       => 'Broj racuna',
    'price_without_tax' => 'Cena bez PDV-a',
    'tax'               => 'PDV',
    'total_with_tax'    => 'Iznos sa PDV-om',
    'taxable_value'     => 'Oporeziva vrednost',
    'print_invoice'     => 'Odštampajte račun',
    'comment'           => 'Komentar',
    'signature'         => 'Izdao racun',
    'seal'              => 'Primio racun',
    'water_level'       => 'Vodostaj',
    'fuel_level'        => 'Nivo goriva',
    'reference_number'  => 'Referentni broj',
    'start_stop'        => 'Start/Stop',
    'api'               => 'API',
    'add_product'       => 'Kakav proizvod',
    'addedd_stock'      => 'Added stock',
    'pos_sales'                     => 'POS prodaja',
    'total_before_shift_open'       => 'Ukupne zalihe pre otvaranja smene',
    'retype_password'               => 'Prepišite lozinku',
    'remember_me'                   => 'Sećam se',
    'register'                      => 'Registrovati',
    'register_a_new_membership'     => 'Registrujte novo članstvo',
    'i_forgot_my_password'          => 'Zaboravio sam šifru',
    'i_already_have_a_membership'   => 'Već imam članstvo',
    'sign_in'                       => 'Prijavite se',
    'log_out'                       => 'Izlaz',
    'toggle_navigation'             => 'Toggle navigation',
    'login_message'                 => 'Prijavite se da biste započeli sesiju',
    'register_message'              => 'Registrujte novo članstvo',
    'password_reset_message'        => 'Resetuj šifru',
    'reset_password'                => 'Resetuj šifru',
    'send_password_reset_link'      => 'Pošaljite vezu za resetovanje lozinke',
    'new'                           => 'Kreiraj',
    'delete'                        => 'Trljati',
    'edit'                          => 'Ndrysho',
    'selected_date_to_show_data'    => 'Odabrani datumi za podnošenje podataka',
    'payment_due_in_30_days'        => 'Rok plaćanja u roku od 30 dana',
    'invoice_number_payment_method' => 'Unesite broj fakture na uplati',
];
