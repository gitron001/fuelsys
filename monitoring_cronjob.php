socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : Undefined offset: 8

  at /var/www/app/Services/CardService.php:71
    67|             . pack("c*", 02);
    68| 
    69|         $response = PFC::send_message($socket, $binarydata, $message);
    70| 
  > 71|         $cardNumber = pack('c', $response[8]).pack('c', $response[7]).pack('c', $response[6]).pack('c', $response[5]);
    72|         $cardNumber = unpack('i', $cardNumber)[1];
    73| 
    74|         //echo '<br> Card Number: '. $cardNumber;
    75|         $user = Users::where("rfid", $cardNumber)->where('status', 1)->first();

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Undefined offset: 8", "/var/www/app/Services/CardService.php")
      /var/www/app/Services/CardService.php:71

  2   App\Services\CardService::check_card()
      /var/www/app/Services/CardService.php:42

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
