socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Undefined variable: pfc_id

  at /var/www/app/Models/Transaction.php:58
    54|         $transaction = new Transaction();
    55| 
    56|         $transaction->status = $response[4];
    57| 
  > 58|         $transaction->pfc_id = $pfc_id;
    59| 
    60|         $transaction->locker = $response[5];
    61| 
    62|         $tr_no = pack('c', $response[7]).pack('c', $response[6]);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Undefined variable: pfc_id", "/var/www/app/Models/Transaction.php", [Object(App\Models\Transaction)])
      /var/www/app/Models/Transaction.php:58

  2   App\Models\Transaction::insertTransactionData()
      /var/www/app/Services/TransactionService.php:87

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   ErrorException  : Undefined variable: pfc_id

  at /var/www/app/Models/Transaction.php:58
    54|         $transaction = new Transaction();
    55| 
    56|         $transaction->status = $response[4];
    57| 
  > 58|         $transaction->pfc_id = $pfc_id;
    59| 
    60|         $transaction->locker = $response[5];
    61| 
    62|         $tr_no = pack('c', $response[7]).pack('c', $response[6]);

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Undefined variable: pfc_id", "/var/www/app/Models/Transaction.php", [Object(App\Models\Transaction)])
      /var/www/app/Models/Transaction.php:58

  2   App\Models\Transaction::insertTransactionData()
      /var/www/app/Services/TransactionService.php:87

  Please use the argument -v to see more details.
socket successfully created.
Attempting to connect to '192.168.0.197' on port '40097'...successfully connected to 192.168.0.197.

   Symfony\Component\Debug\Exception\FatalThrowableError  : Too few arguments to function App\Models\Transaction::insertTransactionData(), 1 passed in /var/www/app/Services/TransactionService.php on line 87 and exactly 2 expected

  at /var/www/app/Models/Transaction.php:52
    48|     public function pfc(){
    49|         return $this->belongsTo('App\Models\PFC');
    50|     }
    51| 
  > 52|     public static function insertTransactionData($response, $pfc_id){
    53| 
    54|         $transaction = new Transaction();
    55| 
    56|         $transaction->status = $response[4];

  Exception trace:

  1   App\Models\Transaction::insertTransactionData()
      /var/www/app/Services/TransactionService.php:87

  2   App\Services\TransactionService::read_data()
      /var/www/app/Services/TransactionService.php:54

  Please use the argument -v to see more details.
