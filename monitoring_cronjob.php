socket successfully created.
Attempting to connect to '192.168.1.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.1.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
