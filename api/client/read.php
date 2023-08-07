<?php   
   # Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
  
   $api_key = '1234567890';

   if(!isset($_GET['api_key'])){
      echo json_encode([
        'message' => 'Opps.. You are note authorised'
      ]);
      die();
   }

   $user_id = $_GET['user_id'];
   $request_type = $_GET['request_type'];
   $online_key = $_GET['api_key'];

   if($online_key !== $api_key){
      echo json_encode(([
        'message' => 'Your api key is wrong'
      ]));
      die();
   }

   switch($request_type){
      case('get_all_history'):
         get_all_history($user_id, $request_type);
         break;
      case('get_all_data'):
         get_all_data($user_id, $request_type);
         break;
      case('history_folder'):
         history_folder($request_type, $user_id);
         break;
      case('get_all_withdraws'):
         get_all_withdraws($request_type, $user_id);
         break;
      case('withdraw_history'):
         // Admin section
         withdraw_history($request_type, $user_id);
         break;
      case('get_accts'):
         // Admin section
         get_accts($request_type, $user_id);
         break;
   }

   function get_accts($request_type, $user_id){
      $user_acct = file_get_contents('../../folds/4595122_id/account.json');
      $user_acct = file_get_contents('../../folds/'. $user_id .'_id/account.json');

     $base_acct = file_get_contents('../../folder/active/mainAccount.json');

         echo json_encode([
            'data' => [
               'user_acct' => json_decode($user_acct),
               'base_acct' => json_decode($base_acct),
            ]
            ]);
   }

   function get_all_history($user_id, $request_type){
      if($request_type == 'get_all_history'){
         $file_data = file_get_contents('../../folds/'. $user_id .'_id/docs/credit.json');
         echo $file_data;
      }else{
         echo json_encode([
            'error' => 'invalid request type try again later'
         ]);
         die();
      }
   }



   $file_path = $user_id.'_id';

   function get_all_data($user_id, $request_type){
      $info_data = file_get_contents('../../folds/'. $user_id .'_id/info_data.json');
      $acct = file_get_contents('../../folds/'. $user_id .'_id/account.json');
      $profile = file_get_contents('../../folds/'. $user_id .'_id/user_profile.json');
      $settings = file_get_contents('../../folds/'. $user_id .'_id/settings.json');

      echo json_encode([
         'msg' => 'true',
         'info_data' => json_decode($info_data),
         'acct' => json_decode($acct),
         'profile' => json_decode($profile),
         'settings' => json_decode($settings)
      ]);
      $file = json_encode([
         'msg' => 'true',
         'info_data' => json_decode($info_data),
         'acct' => json_decode($acct),
         'profile' => json_decode($profile),
         'settings' => json_decode($settings)
      ]);
      return $file;
   }

   function history_folder($request_type, $user_id){
     $file_data = file_get_contents('../../folder/active/payment.json');

     $user_data = file_get_contents('../../folds/'. $user_id . '_id/docs/credit.json');

     echo json_encode([
      'file_data' => json_decode($file_data),
      'user_data' => json_decode($user_data)
     ]);

   //   echo $file_data;
   }

   function get_all_withdraws($request_type, $user_id){
     $user_data = file_get_contents('../../folds/'. $user_id . '_id/docs/debit.json');

     echo json_encode([
      'user_data' => json_decode($user_data)
     ]);

   //   echo $file_data;
   }
   
   // Adminn Section
   function withdraw_history($request_type, $user_id){
    $base_data = file_get_contents('../../folder/active/withdraw.json');
      
    $user_data = file_get_contents('../../folds/' . $user_id . '_id/docs/debit.json');

     echo json_encode([
      'user_data' => json_decode($user_data),
      'base_data' => json_decode($base_data),
     ]);

   //   echo $file_data;
   }

?>
