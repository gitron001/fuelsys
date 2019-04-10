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
