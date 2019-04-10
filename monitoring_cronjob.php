socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   Symfony\Component\Debug\Exception\FatalThrowableError  : Class 'App\Services\Dispanser' not found

  at /var/www/app/Services/DispanserService.php:129
    125|     public static function checkForUpdates($socket, $pfc_id = 1){
    126| 
    127|         $loadPrice = Process::where('type_id', 2)->where('pfc_id', $pfc_id)->count();
    128|         if($loadPrice != 0){
  > 129|             Dispanser::fuelPrices($socket,$pfc_id);
    130|             Process::where('type_id', 2)->where('pfc_id', $pfc_id)->delete();
    131|         }
    132|         $loadChannel = Process::where('type_id', 3)->where('pfc_id', $pfc_id)->count();
    133|         if($loadChannel != 0){

  Exception trace:

  1   App\Services\DispanserService::checkForUpdates()
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:83

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   Symfony\Component\Debug\Exception\FatalThrowableError  : Class 'App\Services\Dispanser' not found

  at /var/www/app/Services/DispanserService.php:129
    125|     public static function checkForUpdates($socket, $pfc_id = 1){
    126| 
    127|         $loadPrice = Process::where('type_id', 2)->where('pfc_id', $pfc_id)->count();
    128|         if($loadPrice != 0){
  > 129|             Dispanser::fuelPrices($socket,$pfc_id);
    130|             Process::where('type_id', 2)->where('pfc_id', $pfc_id)->delete();
    131|         }
    132|         $loadChannel = Process::where('type_id', 3)->where('pfc_id', $pfc_id)->count();
    133|         if($loadChannel != 0){

  Exception trace:

  1   App\Services\DispanserService::checkForUpdates()
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:83

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   Symfony\Component\Debug\Exception\FatalThrowableError  : Class 'App\Services\Dispanser' not found

  at /var/www/app/Services/DispanserService.php:129
    125|     public static function checkForUpdates($socket, $pfc_id = 1){
    126| 
    127|         $loadPrice = Process::where('type_id', 2)->where('pfc_id', $pfc_id)->count();
    128|         if($loadPrice != 0){
  > 129|             Dispanser::fuelPrices($socket,$pfc_id);
    130|             Process::where('type_id', 2)->where('pfc_id', $pfc_id)->delete();
    131|         }
    132|         $loadChannel = Process::where('type_id', 3)->where('pfc_id', $pfc_id)->count();
    133|         if($loadChannel != 0){

  Exception trace:

  1   App\Services\DispanserService::checkForUpdates()
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:83

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   Symfony\Component\Debug\Exception\FatalThrowableError  : Class 'App\Services\Dispanser' not found

  at /var/www/app/Services/DispanserService.php:129
    125|     public static function checkForUpdates($socket, $pfc_id = 1){
    126| 
    127|         $loadPrice = Process::where('type_id', 2)->where('pfc_id', $pfc_id)->count();
    128|         if($loadPrice != 0){
  > 129|             Dispanser::fuelPrices($socket,$pfc_id);
    130|             Process::where('type_id', 2)->where('pfc_id', $pfc_id)->delete();
    131|         }
    132|         $loadChannel = Process::where('type_id', 3)->where('pfc_id', $pfc_id)->count();
    133|         if($loadChannel != 0){

  Exception trace:

  1   App\Services\DispanserService::checkForUpdates()
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:83

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
<<<<<<< HEAD
=======
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
>>>>>>> 6372690ef289bab09ee42815807ed7f8a19b02a3
