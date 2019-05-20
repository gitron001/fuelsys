socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDstoredUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
storedUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>
   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
Invalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
Invalid Transactions<bd>Invalid Transactions<bd>socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Creating default object from empty value

  at /var/www/app/Console/Commands/CheckCardReadersCommand.php:91
    87|             usleep(150000);
    88|             TransactionService::read($socket, $pfc_id);
    89|             usleep(150000);
    90|             $proccess = Process::where('type_id', 1)->where('pfc_id', $pfc_id)->first();
  > 91|             $proccess->refresh_time = time();
    92|             $proccess->save();
    93|         }
    94| 
    95|         socket_close($socket);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Creating default object from empty value", "/var/www/app/Console/Commands/CheckCardReadersCommand.php")
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:91

  2   App\Console\Commands\CheckCardReadersCommand::handle()
      /var/www/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php:32

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("連")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("連")
      /var/www/app/Services/TransactionService.php:37

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATED
   ErrorException  : socket_write(): unable to write to socket [32]: Broken pipe

  at /var/www/app/Services/PFCServices.php:93
    89|     public static function send_message($socket, $binarydata, $message = null){
    90|         $j = 1;
    91|         while(true) {
    92|             //Send Message to the socket
  > 93|             socket_write($socket, $binarydata);
    94|             //Wait for message to be created
    95|             usleep(150000);
    96|             //Read the reply
    97|             $input = socket_read($socket, 2048);

  Exception trace:

  1   socket_write("	"")
      /var/www/app/Services/PFCServices.php:93

  2   App\Services\PFCServices::send_message("	"", "	")
      /var/www/app/Services/CardService.php:36

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDsocket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.0.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.0.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.0.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.0.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.0.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.0.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...
   ErrorException  : socket_connect(): unable to connect [111]: Connection refused

  at /var/www/app/Services/PFCServices.php:29
    25| 			echo "socket successfully created.\n";
    26| 		}
    27| 
    28| 		echo "Attempting to connect to '$address' on port '$port'...";
  > 29| 		$result = socket_connect($socket, $address, $port);
    30| 		if ($result === false) {
    31| 			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    32| 			return false;
    33| 		} else {

  Exception trace:

  1   socket_connect("192.168.0.197")
      /var/www/app/Services/PFCServices.php:29

  2   App\Services\PFCServices::create_socket(Object(App\Models\PFC))
      /var/www/app/Console/Commands/CheckCardReadersCommand.php:67

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.
storedUPDATEDstoredUPDATEDstoredUPDATEDInvalid Transactions<bd>Invalid Transactions<bd>storedUPDATEDstoredUPDATEDstoredUPDATEDstoredUPDATED